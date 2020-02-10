<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <title>LASU's Black Book</title>

</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar fixed-top navbar-expand-lg bg-white">
                <a class="navbar-brand" href="dashboard.php" style="color: black !important">Blackbook</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item">
                            <form class="inline" method="POST" action="search.php" id="basicform" data-parsley-validate="" role="form" enctype="multipart/form-data">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="search_str" placeholder=" Search..." aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-brand" type="submit" id="button-addon2" name="search"><i class="fas fa-search"></i></button>
                                    </div>
                                    <!--  <div id="custom-search" class="top-search-bar">
                                    <input class="form-control" type="text" placeholder="Search..">
                                    <button class="btn btn" type="submit"><i class="fas fa-search"></i></button>
                                </div> -->
                            </form>
                        </li>


                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="uploads/<?php echo $_SESSION['image']; ?>" alt="<?php echo $_SESSION['image']; ?>" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo $_SESSION['username']; ?> </h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <a class="dropdown-item" href="password-reset.php?id=<?php echo $_SESSION['id']; ?>"><i class="fas fa-user mr-2"></i>Change Password</a>
                                <a class="dropdown-item" href="./logout.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-divider">
                                <a class="nav-link" href="dashboard.php"><i class="fa fa-fw fa-tachometer-alt"></i>Dashboard
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="user-form.php"><i class="fa fa-fw fa-user-plus"></i>Add
                                    User</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="crime-form.php"><i class="fa fa-fw fa-plus"></i>Add to Blacklist
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="view-records.php"><i class="fa fa-fw fa-list"></i>Crime
                                    Records</a>
                            </li>

                            <li class="nav-divider">

                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./logout.php"><i class="fa fa-fw fa-power-off"></i>Logout</a>
                            </li>

                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->