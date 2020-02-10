<?php session_start();

if ($_SESSION['usertype'] != "admin") {
    header('Location: logout.php');
}
include("./includes/dbconfig.php");
include("./header.php");
$input_err = "";
$status = "";
$emailErr = "";
function test_input($data)
{
    include("./includes/dbconfig.php");
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = mysqli_real_escape_string($conn, $data);
    return $data;
}

if (isset($_POST['submit'])) {
    if (empty($_POST["surname"])) {
        $input_err = "* This field is required";
    } else {
        $sname = test_input($_POST['surname']);
    }
    if (empty($_POST["firstname"])) {
        $input_err = "* This field is required";
    } else {
        $fname = test_input($_POST['firstname']);
    }
    if (empty($_POST["middlename"])) {
        $input_err = "* This field is required";
    } else {
        $mname = test_input($_POST['middlename']);
    }
    if (empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "* This field is required";
    } else {
        $email = test_input($_POST['email']);
    }
    if (empty($_POST["username"])) {
        $input_err = "* This field is required";
    } else {
        $username = test_input($_POST['username']);
    }
    if (empty($_POST["usertype"])) {
        $input_err = "* This field is required";
    } else {
        $usertype = test_input($_POST['usertype']);
    }
    if (empty($_POST["pwd"])) {
        $input_err = "* This field is required";
    } else {
        $pwd = test_input($_POST['pwd']);
    }
    if (empty($_POST["npwd"])) {
        $input_err = "* This field is required";
    } else {
        $npwd = test_input($_POST['npwd']);
    }

    if ($pwd == $npwd) {
        $password = password_hash($pwd, PASSWORD_DEFAULT);
    } else {
        $status .= '<div class="alert alert-danger">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Password do not match!</strong>
          </div>';
    }
    $check = "SELECT * FROM users WHERE username='$username'";
    if (($query = mysqli_query($conn, $check)) && (mysqli_num_rows($query) > 0)) {
        $status .= '<div class="alert alert-danger">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Username already exists!</strong>
          </div>';
    } else {
        $passport = $_FILES['passport']['name'];
        $temp = $_FILES['passport']['tmp_name'];
        $types = $_FILES['passport']['type'];
        if (($types == "image/jpeg") || ($types == "image/jpg") || ($types == "image/bmp") || ($types == "image/png") || ($types == "")) {
            $sql = "INSERT INTO users (surname, first_name, middle_name, usertype, email, username, pwd, image)
                VALUES('$sname', '$fname', '$mname', '$usertype', '$email', '$username', '$password', '$passport')";
            if (mysqli_query($conn, $sql)) {
                move_uploaded_file($_FILES['passport']['tmp_name'], "uploads/" . $_FILES['passport']['name']);
                $status .= "<b style='color:green'>User Added successfully!</b>";
            } else {
                $status .= '<div class="alert alert-danger">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  Unable to add user!</b>
                  </div>';
            }
        } else {
            $status .= '<div class="alert alert-danger">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  Invalid image format. Upload only jpg/JPEG/bmp/png image format
                  </div>';
        }
    }
}


?>

<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">LASU BLACKBOOK</h2>

                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/dashboard.php" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add User
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader  -->
            <!-- ============================================================== -->
            <div class="ecommerce-widget">
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic form -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">User Form</h5>
                            <div class="card-body">
                                <?php echo $status; ?>
                                <form method="POST" action="#" id="basicform" data-parsley-validate="" role="form" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="inputUserName">Surname</label>
                                                <input id="inputSurname" type="text" name="surname" data-parsley-trigger="change" required="" placeholder="Enter user name" autocomplete="off" class="form-control">
                                                <span class="error"> <?php echo $input_err; ?></span>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="inputUserName">First Name</label>
                                                <input id="inputFirstName" type="text" name="firstname" data-parsley-trigger="change" required="" placeholder="Enter user name" autocomplete="off" class="form-control">
                                                <span class="error"> <?php echo $input_err; ?></span>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="inputMiddleName">Middle Name</label>
                                                <input id="inputUserName" type="text" name="middlename" data-parsley-trigger="change" required="" placeholder="Enter user name" autocomplete="off" class="form-control">
                                                <span class="error"> <?php echo $input_err; ?></span>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="inputEmail">Email address</label>
                                                <input id="inputEmail" type="email" name="email" data-parsley-trigger="change" required="" placeholder="Enter email" autocomplete="off" class="form-control">
                                                <span class="error"> <?php echo $emailErr; ?></span>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="inputUsername">Username</label>
                                                <input id="inputUsername" type="text" name="username" data-parsley-trigger="change" required="" placeholder="Choose username" autocomplete="off" class="form-control">
                                                <span class="error"> <?php echo $input_err; ?></span>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect2">User Type</label>
                                                <select class="form-control" id="exampleFormControlSelect2" name="usertype">
                                                    <option selected>Choose...</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="dean student affairs">Dean Student Affairs</option>
                                                    <option value="sdc">SDC</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="inputPassword">Password</label>
                                                <input id="inputPassword" type="password" name="pwd" placeholder="Enter Password" required="" class="form-control">
                                                <span class="error"> <?php echo $input_err; ?></span>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="inputRepeatPassword">Repeat Password</label>
                                                <input id="inputRepeatPassword" data-parsley-equalto="#inputPassword" name="npwd" type="password" required="" placeholder="Re-enter Password" class="form-control">
                                                <span class="error"> <?php echo $input_err; ?></span>
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="exampleFormControlFile1">Upload Passport</label>
                                                <input type="file" name="passport" class="form-control-file" id="exampleFormControlFile1">
                                            </div>
                                            <!-- <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroupFileAddon01">Passport</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" name="passport" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                    <p class="text-right">
                                        <button type="submit" class="btn btn-space btn-primary btn-block" name="submit">Register User</button>

                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end basic form -->
                    <!-- ============================================================== -->
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <div class="footer">
            <div class="container-fluid">
                <p style="text-align: center"> Copyright © LASU 2019 Concept. All rights reserved.</p>
            </div>

        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- end footer -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- end wrapper  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- end main wrapper  -->
<!-- ============================================================== -->
<!-- Optional JavaScript -->
<!-- jquery 3.3.1 -->
<script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<!-- bootstap bundle js -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<!-- slimscroll js -->
<script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
<!-- main js -->
<script src="assets/libs/js/main-js.js"></script>
<!-- chart chartist js -->
<script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
<!-- sparkline js -->
<script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
<!-- morris js -->
<script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
<script src="assets/vendor/charts/morris-bundle/morris.js"></script>

<script src="../assets/vendor/parsley/parsley.js"></script>

<script>
    $('#form').parsley();
</script>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
</body>

</html>