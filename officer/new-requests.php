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

        <title>AMS: Requests List</title>

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
                    <a class="navbar-brand" href="javascript:void(0);">Requests List</a>
                </nav>
                <div class="container-fluid">
                    
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="header">
                                    <h2><strong>Requests</strong> List </h2>
                                </div>
                                <div class="body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Request ID</th>
                                                    <th>Requested By</th>
                                                    <th>Accepted By</th>
                                                    <th>Weapon Name</th>
                                                    <th>Issue Date</th>
                                                    <th>Approve Date</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Request ID</th>
                                                    <th>Requested By</th>
                                                    <th>Accepted By</th>
                                                    <th>Weapon Name</th>
                                                    <th>Issue Date</th>
                                                    <th>Approve Date</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <tr>
                                                    <?php
                                                    $sql = "SELECT 
                                                        r.request_id,
                                                        r.soldier_id,
                                                        s.name AS soldier_name,
                                                        o.officer_id,
                                                        o.name AS officer_name,
                                                        w.weapon_id,
                                                        w.weapon_name,
                                                        r.request_status,
                                                        r.request_date,
                                                        r.approval_date
                                                    FROM weapon_requests r
                                                    INNER JOIN soldier s ON r.soldier_id = s.soldier_id
                                                    LEFT JOIN officer o ON r.officer_id = o.officer_id
                                                    INNER JOIN weapon w ON r.weapon_id = w.weapon_id";
                                                    $result = mysqli_query($conn, $sql);
                                                    $cnt = 1;
                                                    if (mysqli_num_rows($result) > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {              ?>
                                                            <td><?php echo htmlentities($cnt); ?></td>
                                                            <td><?php echo $row["request_id"]; ?></td>
                                                            <td><?php echo $row["soldier_name"]; ?></td>
                                                            <td><?php echo $row["officer_name"]; ?></td>
                                                            <td><?php echo $row["weapon_name"]; ?></td>
                                                            <td><?php echo $row["request_date"]; ?></td>
                                                            <td><?php echo $row["approval_date"]; ?></td>
                                                            <td><?php echo $row["request_status"]; ?></td>
                                                            <td>
                                                            <?php if($row['request_status']=='approved'){
                                                                    ?>
                                                                    <a href="../includes/process.php?removeid=<?php echo $row["request_id"]; ?>" onclick="return confirm('Are you sure you want to remove this Item?');" class="btn btn-warning">
                                                                    Remove
                                                                </a>
                                                                <?php
                                                                }
                                                                else
                                                                { ?>
                                                                    <a href="../includes/process.php?approveid=<?php echo $row["request_id"]; ?>" onclick="return confirm('Are you sure you want to remove this record?');" class="btn btn-success">
                                                                    Approve
                                                                </a>
                                                                <a href="../includes/process.php?denyid=<?php echo $row["request_id"]; ?>" onclick="return confirm('Are you sure you want to remove this record?');" class="btn btn-danger">
                                                                    Deny
                                                                </a><?php
                                                                }
                                                                ?>





                                                                
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