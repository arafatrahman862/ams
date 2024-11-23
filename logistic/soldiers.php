<?php
session_start();
error_reporting(0);
include('../includes/db.php');
if (strlen($_SESSION['username'] == 0)) {
    header('location:logout.php');
} else {



?>
    <!doctype html>
    <html lang="en">

    <head>

        <title>AMS: Soldier List</title>

        <link rel="stylesheet" href="../assets/vendor/themify-icons/themify-icons.css">
        <link rel="stylesheet" href="../assets/vendor/fontawesome/css/font-awesome.min.css">

        <link rel="stylesheet" href="../assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css">

        <link rel="stylesheet" href="../assets/css/main.css">
    </head>

    <body class="theme-indigo">
        <!-- Page Loader -->

        <?php include_once('includes/header.php'); ?>

        <div class="main_content" id="main-content">
            <?php include_once('includes/sidebar.php'); ?>



            <div class="page">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="javascript:void(0);">Soldier List</a>
                </nav>
                <div class="pt-3 d-flex justify-content-end mr-5">
                    <a href="new-soldier.php" class="btn btn-success">Add Soldier</a>
                </div>
                <div class="container-fluid">
                    
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="header">
                                    <h2><strong>Soldier</strong> List </h2>
                                </div>
                                <div class="body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Soldier ID</th>
                                                    <th>Full Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Rank</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Soldier ID</th>
                                                    <th>Full Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Rank</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <tr>
                                                    <?php
                                                    $sql = "SELECT * from  soldier";
                                                    $result = mysqli_query($conn, $sql);
                                                    $cnt = 1;
                                                    if (mysqli_num_rows($result) > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {              ?>
                                                            <td><?php echo htmlentities($cnt); ?></td>
                                                            <td><?php echo $row["soldier_id"]; ?></td>
                                                            <td><?php echo $row["name"]; ?></td>
                                                            <td><?php echo $row["email"]; ?></td>
                                                            <td><?php echo $row["phone"]; ?></td>
                                                            <td><?php echo $row["rank"]; ?></td>
                                                            <td>
                                                                <a href="../includes/process.php?editid=<?php echo $row["username"]; ?>" class="btn btn-warning">Edit</a>
                                                                <a href="../includes/process.php?deleteid=<?php echo $row["soldier_id"]; ?>" onclick="return confirm('Are you sure you want to delete this record?');" class="btn btn-danger">
                                                                    Delete
                                                                </a>
                                                            </td>
                                                </tr>
                                        <?php $cnt = $cnt + 1;
                                                        }
                                                    } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <!-- Jquery Core Js -->
        <script src="../assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
        <script src="../assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

        <!-- Jquery DataTable Plugin Js -->
        <script src="../assets/bundles/datatablescripts.bundle.js"></script>
        <script src="../assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
        <script src="../assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
        <script src="../assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js"></script>
        <script src="../assets/vendor/jquery-datatable/buttons/buttons.flash.min.js"></script>
        <script src="../assets/vendor/jquery-datatable/buttons/buttons.html5.min.js"></script>
        <script src="../assets/vendor/jquery-datatable/buttons/buttons.print.min.js"></script>

        <script src="../assets/js/theme.js"></script><!-- Custom Js -->
        <script src="../assets/js/pages/tables/jquery-datatable.js"></script>
    </body>

    </html><?php }  ?>