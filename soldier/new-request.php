<?php
session_start();
error_reporting(0);
include('../includes/db.php');
if (strlen($_SESSION['username'] == 0)) {
    header('location:logout.php');
} else {

    if (isset($_POST['apply'])) {
        $soldierid = $_POST['soldierid'];
        $weaponid = $_POST['weaponid'];
        $issueDate = $_POST['issuedate'];
        $requestStatus = "pending";
    
        $insertQuery = "INSERT INTO weapon_requests (soldier_id, weapon_id, request_date, request_status)
                        VALUES ('$soldierid', '$weaponid', '$issueDate', '$requestStatus')";
 
        if (mysqli_query($conn, $insertQuery)) {
            echo "<script>
                alert('Weapon added successfully');
                window.location.href='inventory.php';
              </script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
  
?>
    <!doctype html>
    <html lang="en">

    <head>
        <title>AMS: Add Soldier</title>

        <link rel="stylesheet" href="../assets/vendor/themify-icons/themify-icons.css">
        <link rel="stylesheet" href="../assets/vendor/fontawesome/css/font-awesome.min.css">

        <link rel="stylesheet" href="../assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css">
        <link rel="stylesheet" href="../assets/vendor/parsleyjs/css/parsley.css">

        <link rel="stylesheet" href="../assets/css/main.css" type="text/css">
    </head>

    <body class="theme-indigo">
        <?php include_once('includes/header.php'); ?>

        <div class="main_content" id="main-content">
            <?php include_once('includes/sidebar.php'); ?>



            <div class="page">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="javascript:void(0);">New Request</a>

                </nav>
                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h2>New Request</h2>
                                </div>
                                <?php
                                    $id = $_GET['weaponid'];
                                    $name = $_SESSION['username'];

                                    $sqlWeapon = "SELECT * FROM weapon WHERE weapon_id = '$id'";
                                    $resultWeapon = mysqli_query($conn, $sqlWeapon);

                                    $sqlSoldier = "SELECT * FROM soldier WHERE username = '$name'";
                                    $resultSoldier = mysqli_query($conn, $sqlSoldier);

                                    if ($resultWeapon && $resultSoldier) {
                                        $rowWeapon = mysqli_fetch_assoc($resultWeapon);
                                        $rowSoldier = mysqli_fetch_assoc($resultSoldier);
                                        ?>
                                        <div class="body">
                                            <form method="post" action="">
                                                <div class="form-group">
                                                    <label>Requestee Name</label>
                                                    <input type="text" class="form-control" id="exampleTextInput1" name="username" value="<?php echo $rowSoldier['name']; ?>" required='true'>
                                                </div>
                                                <div class="form-group">
                                                    <label>Weapon Model </label>
                                                    <input type="text" class="form-control" id="exampleTextInput1" name="soldierid" value="<?php echo $rowSoldier['soldier_id']; ?>" hidden>
                                                    <input type="text" class="form-control" id="exampleTextInput1" name="fullname" value="<?php echo $rowWeapon['weapon_name']; ?>" required='true'>
                                                </div>
                                                <div class="form-group">
                                                    <label>Weapon Type</label>
                                                    <input type="text" class="form-control" id="exampleTextInput1" name="weaponid" value="<?php echo $rowWeapon['weapon_id']; ?>" hidden>
                                                    <input type="text" class="form-control" id="exampleTextInput1" name="model" value="<?php echo $rowWeapon['weapon_type']; ?>" required='true'>
                                                </div>
                                                <div class="form-group">
                                                    <label>Issue Date</label>
                                                    <input type="date" class="form-control" id="exampleTextInput1" name="issuedate" required='true'>
                                                </div>
                                                <div class="form-group">
                                                    <label>Return Date</label>
                                                    <input type="date" class="form-control" id="exampleTextInput1" name="returndate" required='true'>
                                                </div>
                                                <button type="submit" class="btn btn-primary" name="apply">Apply</button>
                                            </form>
                                        </div>
                                    <?php
                                    } else {
                                        echo "Error fetching records: " . mysqli_error($conn);
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Core -->
        <script src="../assets/bundles/libscripts.bundle.js"></script>
        <script src="../assets/bundles/vendorscripts.bundle.js"></script>

        <script src="../assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
        <script src="../assets/vendor/parsleyjs/js/parsley.min.js"></script>

        <!-- Theme JS -->
        <script src="../assets/js/theme.js"></script>
    </body>

    </html><?php }  ?>