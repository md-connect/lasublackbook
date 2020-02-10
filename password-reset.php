<?php session_start();
include('./includes/dbconfig.php');
$input_err = "";
$status = "";
$username = "";
$pwd_hash = "";
function test_input($data)
{
    include("./includes/dbconfig.php");
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = mysqli_real_escape_string($conn, $data);
    return $data;
}
$id = $_GET['id'];
if (isset($_POST['reset'])) {
    if (empty($_POST["pwd"])) {
        // $username="";
        $input_err = "* This field is required";
    } else {
        $pwd = test_input($_POST['pwd']);
    }
    if (empty($_POST["npwd"])) {
        // $username="";
        $input_err = "* This field is required";
    } else {
        $npwd = test_input($_POST['npwd']);
    }
    if ($pwd == $npwd) {
        $pwd_hash = password_hash($pwd, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET pwd='$pwd_hash' WHERE id='$id'";
        if ($query = mysqli_query($conn, $sql)) {
?>
            <script>
                alert("Password reset was successful, please proceeed to login.");
                window.location.assign("index.php");
            </script>
<?php
        } else {
            $status .= '<div class="alert alert-danger">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Password reset failed, please try again later.</strong>
          </div>';
        }
    } else {
        $status .= '<div class="alert alert-danger">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Password does not match!</strong>
          </div>';
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

    <title>LASU's Black Book</title>
</head>
<link rel="stylesheet" type="text/css" href="./assets/vendor/style.css">

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
                    <li class="nav-item active">
                        <a class="nav-link center" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Admin Login</a>
                    </li>

                </ul>
            </div>
        </nav>

    </header>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">

                <div class="card-header mt-5">
                    <h4 style="text-align:center; color:white">Password Recovery Center</h4>
                </div>
                <div class="card-body">
                    <?php echo $status; ?>
                    <form method="POST" action="">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Enter new password" name="pwd" required="required" <br />
                            <br /><span class="error"> <?php echo $input_err; ?></span>
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Enter password again" name="npwd" required="required"><br />
                            <br /><span class="error"> <?php echo $input_err; ?></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Reset" name="reset" class="btn btn-block login_btn">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="footer" style="background: whitesmoke">
        <div class="container-fluid">
            <p style="text-align: center"> Copyright © LASU 2019 Concept. All rights reserved. Designed by Omojuwa Oluwatoyin</p>
        </div>

    </div>


    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>