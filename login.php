<?php session_start();
include('./includes/dbconfig.php');
$input_err = "";
$status = "";
$username = "";
$pwd = "";
function test_input($data)
{
    include("./includes/dbconfig.php");
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = mysqli_real_escape_string($conn, $data);
    return $data;
}

if (isset($_POST['login'])) {
    if (empty($_POST["username"])) {
        // $username="";
        $input_err = "* This field is required";
    } else {
        $username = test_input($_POST['username']);
    }
    if (empty($_POST["pwd"])) {
        // $pwd="";
        $input_err = "* This field is required";
    } else {
        $pwd = test_input($_POST['pwd']);
    }
    if (empty($_POST["usertype"])) {
        // $pwd="";
        $input_err = "* This field is required";
    } else {
        $usertype = test_input($_POST['usertype']);
    }

    //$hash = password_hash($pwd, PASSWORD_DEFAULT);
    $query_user = "SELECT * FROM users WHERE username='$username' AND usertype='$usertype'";
    if (($query = mysqli_query($conn, $query_user)) && (mysqli_num_rows($query) == 1)) {
        $row = mysqli_fetch_assoc($query);
        $hash = $row['pwd'];
        if (password_verify($pwd, $hash)) {
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['usertype'] = $row['usertype'];
            $_SESSION['image'] = $row['image'];

            if ($_SESSION['usertype'] == "admin") {
                header("Location: dashboard.php");
            } elseif ($_SESSION['usertype'] == "dean student affairs") {
                header("Location: dean-dashboard.php");
            } else {
                header("Location: sdc-dashboard.php");
            }
        } else {
            $status .= '<div class="alert alert-danger">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Incorrect login details!</strong>
          </div>';
        }
    }
}
?>


<!DOCTYPE html>
<html>

<link>
<title>LASU's Black Book</title>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/style.css">

    <title>LASU's Black Book</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="d-flex w-50 order-0">
                <a class="navbar-brand mr-1" href="#"> <img src="uploads/lasu_logo.png" width="30" height="30" class="d-inline-block align-top" alt="lasu logo">
                    LASU BLACKBOOK</a></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse justify-content-center order-2" id="collapsingNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <a class="nav-link center" href="index.php">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="login.php">Login<span class="sr-only">(current)</span></a>
                    </li>

                </ul>
            </div>
        </nav>
        <style>

        </style>
    </header>
    <div class="container">
        <div class="d-flex justify-content-center h-100" style="margin-top:15%;">
            <div class="card">
                <div class="card-header">
                    <h3 style="text-align:center">Admin Login</h3>

                </div>
                <div class="card-body">
                    <?php echo $status; ?>
                    <form method="POST" action="#">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="username" name="username">
                        </div>
                        <span class="error"> <?php echo $input_err; ?></span>

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="password" name="pwd">
                        </div>
                        <span class="error"> <?php echo $input_err; ?></span>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">User Type</label>
                            </div>
                            <select class="custom-select" id="inputGroupSelect01" name="usertype">
                                <option selected>Choose...</option>
                                <option value="admin">Admin</option>
                                <option value="dean student affairs">Dean Student Affairs</option>
                                <option value="sdc">SDC</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <a href="./forgot_password.php" class="float-left" style="color:red;">Forgot password?</a>
                            <input type="submit" value="Login" name="login" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <?php include("footer.php"); ?>

    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>