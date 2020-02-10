<?php
include('./includes/security.php');
include("./includes/dbconfig.php");
include("./header.php");
$input_err = "";
$result = "";
function test_input($data)
{
    include("./includes/dbconfig.php");
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = mysqli_real_escape_string($conn, $data);
    return $data;
}

if (isset($_POST['search'])) {
    if (empty($_POST["search_str"])) {
?>
        <script>
            alert("No search parameter given. Please input search parameter");
        </script>
    <?php
    } else {
        $search_str = test_input($_POST['search_str']);
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
                                        <li class="breadcrumb-item active" aria-current="page">Black List</li>
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

                        <!-- ============================================================== -->

                        <!-- recent orders  -->
                        <!-- ============================================================== -->
                        <?php
                        $sql = mysqli_query($conn, "SELECT * FROM blacklist WHERE matric_no= '$search_str' OR first_name LIKE '%$search_str%' OR middlename LIKE '%$search_str%' OR surname LIKE '%$search_str%'");
                        if ($sql && mysqli_num_rows($sql) > 0) {
                        ?>
                            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">CRIME RECORDS</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">S/N</th>
                                                        <th class="border-0">NAME</th>
                                                        <th class="border-0">MATRIC NO</th>
                                                        <th class="border-0">DEPARTMENT</th>
                                                        <th class="border-0">CRIME COMMITTED</th>
                                                        <th class="border-0">DATE COMMITTED</th>
                                                        <th class="border-0">COMPLAINER</th>
                                                        <th class="border-0">PENALTY</th>
                                                        <th class="border-0">IMAGE</th>
                                                        <th class="border-0">VIEW MORE</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <?php
                                                        $count = 1;
                                                        while ($row = mysqli_fetch_assoc($sql)) {
                                                        ?>
                                                            <td><?php echo $count; ?></td>
                                                            <td><?php echo $row['surname'] . " " . $row['first_name'] . " " . $row['middlename']; ?> </td>
                                                            <td><?php echo $row['matric_no']; ?> </td>
                                                            <td><?php echo $row['department']; ?> </td>
                                                            <td><?php echo $row['crime']; ?></td>
                                                            <td><?php echo $row['date']; ?> </td>
                                                            <td><?php echo $row['complainer']; ?></td>
                                                            <td><?php echo $row['penalty']; ?> </td>
                                                            <td>
                                                                <div class="m-r-10"><img src="uploads/<?php echo $row['passport']; ?>" alt="<?php echo $row['passport']; ?>" class="rounded" width="45"></div>
                                                            </td>
                                                            <td>
                                                                <form method="POST" action="">
                                                                    <input type="text" value="<?php echo $row['id']; ?>" name="id" class="form-control" hidden>
                                                                    <a type="submit" value=" class=" btn btn-block btn-success"><i class=" fa fa-fw fa-eye" data-toggle="modal" data-target="#exampleModalScrollable"></i></a>
                                                                </form>
                                                            </td>
                                                    </tr>
                                        <?php
                                                            $count++;
                                                        }
                                                    } else {
                                                        echo "<h1>Student has no crime record!!!</h1>";
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
    </div>
    <!-- View more record Modal -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">More information about the culprit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End of view more record modal -->


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
    <!-- chart c3 js -->
    <script src="assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="assets/libs/js/dashboard-ecommerce.js"></script>

    <script>
        $('#myModal').on('shown.bs.modal', function() {
            $('#myInput').trigger('focus')
        })
    </script>
    </body>

    </html>