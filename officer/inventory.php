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

        <title>AMS: Weapon List</title>

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
                    <a class="navbar-brand" href="javascript:void(0);">Weapon List</a>
                </nav>
                <div class="container-fluid">
                    
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="header">
                                    <h2><strong>Weapons</strong> List </h2>
                                </div>
                                <div class="body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                            <thead>
                                                <tr>
                                                    <th>Serial.No</th>
                                                    <th>Image</th>
                                                    <th>Weapon Name</th>
                                                    <th>Weapon Type</th>
                                                    <th>Manufactured Comapany</th>
                                                    <th>Manufactured Country</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Serial.No</th>
                                                    <th>Image</th>
                                                    <th>Weapon Name</th>
                                                    <th>Weapon Type</th>
                                                    <th>Manufactured Comapany</th>
                                                    <th>Manufactured Country</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <tr>
                                                    <?php
                                                    $sql = "SELECT * from  weapon";
                                                    $result = mysqli_query($conn, $sql);
                                                    $cnt = 1;
                                                    if (mysqli_num_rows($result) > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {              ?>
                                                            <td><?php echo $row["weapon_id"]; ?></td>
                                                            <td><img src="../uploads/<?php echo $row["img"]; ?>" width="80" height="80"></td>
                                                            <td><?php echo $row["weapon_name"]; ?></td>
                                                            <td><?php echo $row["weapon_type"]; ?></td>
                                                            <td><?php echo $row["company"]; ?></td>
                                                            <td><?php echo $row["country"]; ?></td>
                                                            <td><?php echo $row["availability_status"]; ?></td>
                                                            <td>
                                                                <?php if($row['availability_status']=='available'){
                                                                    ?>
                                                                    <a href="../includes/process.php?banid=<?php echo $row["weapon_id"]; ?>" onclick="return confirm('Are you sure you want to Ban this Item?');" class="btn btn-danger">
                                                                    Ban
                                                                </a>
                                                                <?php
                                                                }
                                                                else
                                                                { ?>
                                                                    <a href="../includes/process.php?openid=<?php echo $row["weapon_id"]; ?>" onclick="return confirm('Are you sure you want to make it available this item?');" class="btn btn-success">
                                                                    Open
                                                                </a><?php
                                                                }
                                                                ?>
                                                            </td>
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