<?php
include('./includes/security.php');
include("./includes/dbconfig.php");
include("./header.php");
$input_err = "";
$status = "";
$emailErr = "";
//$sname = $fname = $mname = $matno = $dept = $faculty = $level = $gender = $crime = $complainer = $crimeDate = $witness = $penalty = $passport = "";
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
    if (empty($_POST["matno"])) {
        $input_err = "* This field is required";
    } else {
        $matno = test_input($_POST['matno']);
    }
    if (empty($_POST["dept"])) {
        $input_err = "* This field is required";
    } else {
        $dept = test_input($_POST['dept']);
    }
    if (empty($_POST["faculty"])) {
        $input_err = "* This field is required";
    } else {
        $faculty = test_input($_POST['faculty']);
    }
    if (empty($_POST["level"])) {
        $input_err = "* This field is required";
    } else {
        $level = test_input($_POST['level']);
    }
    if (empty($_POST["gender"])) {
        $input_err = "* This field is required";
    } else {
        $gender = test_input($_POST['gender']);
    }
    if (empty($_POST["crimeName"])) {
        $input_err = "* This field is required";
    } else {
        $crime = test_input($_POST['crimeName']);
    }
    if (empty($_POST["complainer"])) {
        $input_err = "* This field is required";
    } else {
        $complainer = test_input($_POST['complainer']);
    }
    if (empty($_POST["crimeDate"])) {
        $input_err = "* This field is required";
    } else {
        $crimeDate = test_input($_POST['crimeDate']);
    }
    if (empty($_POST["witness"])) {
        $input_err = "* This field is required";
    } else {
        $witness = test_input($_POST['witness']);
    }
    if (empty($_POST["penalty"])) {
        $input_err = "* This field is required";
    } else {
        $penalty = test_input($_POST['penalty']);
    }

    $passport = $_FILES['passport']['name'];
    $temp = $_FILES['passport']['tmp_name'];
    $types = $_FILES['passport']['type'];
    if (($types == "image/jpeg") || ($types == "image/jpg") || ($types == "image/bmp") || ($types == "image/png") || ($types == "")) {
        $tempx = explode(".", $passport);
        $passportname = $fname . "_" . time() . "." . end($tempx);
        $sql = "INSERT INTO blacklist (surname, first_name, middlename, matric_no, department, faculty, level, sex, crime, complainer, eye_witness, penalty, passport, date)
                VALUES('$sname', '$fname', '$mname', '$matno', '$dept', '$faculty', '$level', '$gender', '$crime', '$complainer', '$witness',  '$penalty', '$passport','$crimeDate')";
        if (mysqli_query($conn, $sql)) {
            move_uploaded_file($_FILES['passport']['tmp_name'], "uploads/" . $_FILES['passport']['name']);
            $status .= "<b style='color:green'>Culprit Added successfully to  LASU Blacklist !</b>";
        } else {
            $status .= '<div class="alert alert-danger">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  Unable to add user!</b>
                  </div>';
        }
    } else {
        $status .= '<div class="alert alert-danger">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  Invalid image format. Only jpg/JPEG/bmp/png image format is allowed.
                  </div>';
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
                                    <li class="breadcrumb-item active" aria-current="page">Blacklist
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
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Black Book</h5>
                            <div class="card-body">
                                <?php echo $status; ?>
                                <form method="POST" action="" id="basicform" data-parsley-validate="" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="inputUserName">Surname</label>
                                                <input id="inputSurname" type="text" name="surname" data-parsley-trigger="change" placeholder="Enter user name" autocomplete="off" class="form-control">
                                                <span class="error"> <?php echo $input_err; ?></span></div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="inputUserName">First Name</label>
                                                <input id="inputFirstName" type="text" name="firstname" data-parsley-trigger="change" placeholder="Enter user name" autocomplete="off" class="form-control">
                                                <span class="error"> <?php echo $input_err; ?></span></div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="inputMiddleName">Middle Name</label>
                                                <input id="inputUserName" type="text" name="middlename" data-parsley-trigger="change" placeholder="Enter user name" autocomplete="off" class="form-control">
                                                <span class="error"> <?php echo $input_err; ?></span></div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="inputMatNo">Matric No.</label>
                                                <input id="inputMatNo" type="text" name="matno" data-parsley-trigger="change" placeholder="Enter Matric No." autocomplete="off" class="form-control">
                                                <span class="error"> <?php echo $input_err; ?></span></div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="inputdept">Department</label>
                                                <input id="inputdept" type="text" placeholder="Enter Department" name="dept" class="form-control">
                                                <span class="error"> <?php echo $input_err; ?></span></div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="inputFaculty">Enter Faculty</label>
                                                <input id="inputFaculty" type="text" placeholder="Enter Faculty" name="faculty" class="form-control">
                                                <span class="error"> <?php echo $input_err; ?></span></div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="input-select">Level</label>
                                                <select class="form-control" id="inputLevel" name="level">
                                                    <option>Choose Level</option>
                                                    <option>100Level</option>
                                                    <option>200Level</option>
                                                    <option>300Level</option>
                                                    <option>400Level</option>
                                                    <option>500Level</option>
                                                    <option>1st Extra Year</option>
                                                    <option>2nd Extra Year</option>
                                                </select>
                                                <span class="error"> <?php echo $input_err; ?></span></div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="inputGender">Gender</label>
                                                <select class="form-control" id="inputGender" name="gender">
                                                    <option>Choose Option</option>
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                    <option>Others</option>

                                                </select> <span class="error"> <?php echo $input_err; ?></span>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="inputCrime">Crime</label>
                                                <input id="inputCrime" type="text" placeholder="Enter Crime committed" name="crimeName" class=" form-control">
                                                <span class="error"> <?php echo $input_err; ?></span> </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="inputComplainer">Complainer/Victim</label>
                                                <input id="inputComplainer" type="text" placeholder="Enter Victim/Complainer" name="complainer" class=" form-control">
                                                <span class="error"> <?php echo $input_err; ?></span></div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="inputCrimeDate">Crime Date</label>
                                                <input id="inputCrimeDate" type="date" placeholder="Enter Crime Date" name="crimeDate" class="datepicker form-control">
                                                <span class="error"> <?php echo $input_err; ?></span> </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="inputWitness">Eye Witness</label>
                                                <input name="witness" id="inputWitness" type="text" placeholder="Enter Witness" class="form-control">
                                                <span class="error"> <?php echo $input_err; ?></span></div>
                                        </div>
                                        <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="inputPenalty">Penalty for Crime</label>
                                                <input name="penalty" id="inputPenalty" type="text" placeholder="Enter Crime Penalty" class="form-control">
                                                <span class="error"> <?php echo $input_err; ?></span></div>
                                        </div>
                                        <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="exampleFormControlFile1">Upload Passport</label>
                                                <input type="file" name="passport" class="form-control-file" id="exampleFormControlFile1">
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <p class="text-right">
                                                <button type="submit" class="btn btn-space btn-dark btn-block" name="submit">Submit</button>
                                            </p>
                                        </div>
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
    $(document).ready(function() {
        $.datepicker.setDefaults({
            dateFormat: 'yyyy-mm-dd'
        });

        $(function() {
            $("#inputCrimeDate").datepicker();

        });
    });
    $('.datepicker').datepicker();
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