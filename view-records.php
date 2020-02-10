<?php
include('./includes/security.php');
include("./includes/dbconfig.php");
include("./header.php");
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
                                    <li class="breadcrumb-item active" aria-current="page">Crime Records</li>
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
                    $sql = "SELECT * FROM blacklist";
                    $cases = mysqli_query($conn, $sql);
                    $num_cases = mysqli_num_rows($cases);
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
                                                <th class="border-0">MATRIC NO</th>
                                                <th class="border-0">NAME</th>
                                                <th class="border-0">DEPARTMENT</th>
                                                <th class="border-0">CRIME COMMITTED</th>
                                                <th class="border-0">DATE COMMITTED</th>
                                                <th class="border-0">PENALTY</th>
                                                <th class="border-0">IMAGE</th>
                                                <th class="border-0">VIEW MORE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php
                                                if ($num_cases > 0) {
                                                    $count = 1;
                                                    while ($row = mysqli_fetch_assoc($cases)) {

                                                ?>
                                                        <td><?php echo $count; ?></td>
                                                        <td><?php echo $row['matric_no']; ?> </td>
                                                        <td><?php echo $row['surname'] . " " . $row['first_name'] . " " . $row['middlename']; ?> </td>
                                                        <td><?php echo $row['department']; ?> </td>
                                                        <td><?php echo $row['crime']; ?></td>
                                                        <td><?php echo $row['date']; ?> </td>
                                                        <td><?php echo $row['penalty']; ?> </td>
                                                        <td>
                                                            <div class="m-r-10"><img src="uploads/<?php echo $row['passport']; ?>" alt="<?php echo $row['passport']; ?>" class="rounded" width="45"></div>
                                                        </td>
                                                        <td>
                                                            <a type="submit"><i class=" fa fa-fw fa-eye btn btn-flat btn-warning" data-toggle="modal" data-id="<?php echo $row['id']; ?>" data-target="#myModal"></i></a>
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
</div>
<!-- View more record Modal -->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">More information about the Student</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="fetched-data"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

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
    });
    $(document).ready(function() {
        $('#myModal').on('show.bs.modal', function(e) {
            var rowid = $(e.relatedTarget).data('id');
            $.ajax({
                type: 'post',
                url: 'fetch_record.php', //Here you will fetch records 
                data: 'rowid=' + rowid, //Pass $id
                success: function(data) {
                    $('.fetched-data').html(data); //Show fetched data from database
                }
            });
        });
    });
</script>
</body>

</html>