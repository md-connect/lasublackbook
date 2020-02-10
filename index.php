<!DOCTYPE html>
<html>

<link>
<title>LASU's Black Book</title>

<head>
    <title>LASU's Black Book</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/style.css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Numans');

        html,
        body {
            background-image: url('assets/images/2-5.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            /*   overflow: hidden; */
            height: 50vh;
            font-family: 'Numans', sans-serif;
        }

        .footer {
            background: black;
            color: white;
            position: absolute;
            bottom: 0;
            width: 100%;
            /* Footer height */
        }

        .card {
            height: 370px;
            margin-top: auto;
            margin-bottom: auto;
            width: 400px;
            background-color: rgba(0, 0, 0, 0.5) !important;
        }

        .card-header h3 {
            color: white;
        }

        .input-group-prepend span {
            width: 50px;
            background-color: #ffc312;
            color: black;
            border: 0 !important;
        }

        input:focus {
            outline: 0 0 0 0 !important;
            box-shadow: 0 0 0 0 !important;
        }

        .remember {
            color: white;
        }

        .remember input {
            width: 20px;
            height: 20px;
            margin-left: 15px;
            margin-right: 5px;
        }

        .login_btn {
            color: black;
            background-color: #ffc312;
            width: 100px;
        }

        .login_btn:hover {
            color: black;
            background-color: white;
        }

        .links {
            color: white;
        }

        .links a {
            margin-left: 4px;
        }

        @media (min-width: 768px) {
            .navbar-brand {
                /* position: absolute; */
                width: 100%;
                left: 0;
                text-align: center;
            }
        }

        .error {
            color: red;
        }
    </style>
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
                    <li class="nav-item active">
                        <a class="nav-link center" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>

                </ul>
            </div>
        </nav>

    </header>

    <div class="container" style="margin-top:6%;">
        <div class="row">
            <div class="col-md-4">
                <div>
                    <center class="mt-5">
                        <img src="uploads/lasu_logo.png" alt="lasu logo" class="mt-3" height="250" width="250">
                    </center>
                </div>
            </div>
            <div class="col-md-8">
                <div>
                    <div class="mt-5">
                        <h3 class="p" style="text-align:center; color:whitesmoke;">Welcome to</h3>
                    </div>
                    <div class="card-body text-white">
                        <h6 class="h2 font-weight-bold text-uppercase" style="text-align:center;">
                            Lagos State state University
                        </h6>
                        <h6 class="h2 font-weight-bold text-uppercase" style="text-align:center;">
                            BLACK BOOK
                        </h6>
                        <h6 class="text-center">
                            Lagos State state University is a displined school.
                        </h6>
                        <h6 class="card-text text-justify">
                            Lagos State state University is a displined school.
                            All students (Fresher's/Returning) are required to sign the Lagos State University Code of Conduct at the beginning of every session. Without prejudice to the existing rules and regulation this Code of Conduct shall guide the behaviour of students in the University.</h6>
                        <h6 class="card-text" style="text-align:center;">We are LASU, we are Proud!</h6>
                        <center class="mt-5">
                            <a href="login.php" class="btn btn-success text-white center">Get Started</a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="">
            <p style="text-align: center" class=""><span>Copyright © LASU 2019 Concept. All rights reserved. Developed by Omojuwa Oluwatoyin</span></p>
        </div>

    </div>

</body>
<!-- Optional JavaScript -->
<!-- jquery 3.3.1 -->
<script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<!-- bootstap bundle js -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>

</html>