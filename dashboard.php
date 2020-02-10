<?php
include('./includes/security.php');
include("./includes/dbconfig.php");
include("./header.php");
$_SESSION['success'] = "";
/* if (isset($_POST['delete_btn'])) {
    $id = $_POST['delete_id'];
    $query = "DELETE FROM users WHERE id='$id'";
    $run = mysqli_query($conn, $query);

    if ($run) {
        $_SESSION['success'] = '<div class="alert alert-success">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Record Deleted!</strong>
          </div>';

        // header('Location: dashboard.php');
    } else {
        $_SESSION['success'] = '<div class="alert alert-danger">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Record NOT Deleted!</strong>
          </div>';
    }
} */
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
                        <h2 class="pageheader-title" style="color: black !important">LASU BLACKBOOK</h2>

                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Admin Panel</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader  -->
            <!-- ============================================================== -->
            <?php

            $sql = "SELECT * FROM users";
            $result = mysqli_query($conn, $sql);
            $num_rows = mysqli_num_rows($result);

            $sql2 = "SELECT * FROM blacklist";
            $cases = mysqli_query($conn, $sql2);
            $num_cases = mysqli_num_rows($cases);

            ?>
            <div class="ecommerce-widget">

                <div class="row">

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <i class="fa fa-fw fa-users" style="font-size:80px; color:blue"></i>

                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="metric-value d-inline-block">

                                            <h1 class="mb-1"> <?php echo $num_rows; ?></h1>
                                        </div>
                                        <h5 class="text-muted">Total Users</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12"> <a href="view-records.php">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                            <i class="fa fa-fw fa-user" style="font-size:80px; color:orange"></i>

                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                            <div class="metric-value d-inline-block">

                                                <h1 class="mb-1"> <?php echo $num_cases; ?></h1>
                                            </div>
                                            <h5 class="text-muted">Total Cases</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    </a>
                </div>
                <div class="row">
                    <!-- ============================================================== -->

                    <!-- ============================================================== -->

                    <!-- recent orders  -->
                    <!-- ============================================================== -->

                    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <h3 class="card-header">List of Users</h3>
                            <h4><?php echo $_SESSION['success']; ?></h4>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="bg-light">
                                            <tr class="border-0">
                                                <th class="border-0">S/N</th>
                                                <th class="border-0">Name</th>
                                                <th class="border-0">Email</th>
                                                <th class="border-0">User Name</th>
                                                <th class="border-0">User Type</th>
                                                <th class="border-0">Image</th>
                                                <th class="border-0">Change</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php
                                                if ($num_rows  > 0) {
                                                    $count = 1;
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <td><?php echo $count; ?></td>

                                                        <td><?php echo $row['surname'] . " " . $row['first_name'] . " " . $row['middle_name']; ?> </td>
                                                        <td><?php echo $row['email']; ?> </td>
                                                        <td><?php echo $row['username']; ?></td>
                                                        <td><?php echo $row['usertype']; ?></td>
                                                        <td>
                                                            <div class="m-r-10"><img src="uploads/<?php echo $row['image']; ?>" alt="<?php echo $row['image']; ?>" class="rounded" width="45"></div>
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-primary" href="change-user.php?id=<?php echo $row['id']; ?>">
                                                                <i class="fa fa-fw fa-edit"></i></a>
                                                            </form>
                                                        </td>
                                            </tr>
                                    <?php
                                                        $count++;
                                                    }
                                                }
                                    ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end recent orders  -->

                </div>

            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <?php include("footer.php"); ?>

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
<!-- chart c3 js -->
<script src="assets/vendor/charts/c3charts/c3.min.js"></script>
<script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
<script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
<script src="assets/libs/js/dashboard-ecommerce.js"></script>
</body>

</html>