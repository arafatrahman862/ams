<?php
session_start();
error_reporting(0);
include('../includes/db.php');
if (strlen($_SESSION['username'] == 0)) {
    header('location:logout.php');
} else {

    if (isset($_POST['submit'])) {

        $soldierID = $_POST['logistic_id'];
        $username = $_POST['username'];
        $fullName = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $mobileNumber = $_POST['mobilenumber'];
        $rank = $_POST['rank'];

        $updateQuery = "UPDATE logistic 
                        SET username = '$username', 
                            fullname = '$fullName', 
                            email = '$email', 
                            password = '$password', 
                            phone = '$mobileNumber', 
                            rank = '$rank'
                        WHERE logistic_id = '$soldierID'";
        if (mysqli_query($conn, $updateQuery)) {
             echo "<script>
                alert('Profile Updated successfully');
                window.location.href='profile.php';
              </script>";
        } else {
            echo "Error updating data: " . mysqli_error($conn);
        }
    }
?>
    <!doctype html>
    <html lang="en">

    <head>
        <title>AMS: Profile</title>

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
                    <a class="navbar-brand" href="javascript:void(0);">User Profile</a>

                </nav>
                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h2>User Profile</h2>
                                </div>
                                <div class="body">
                                    <?php
                                    $did=$_SESSION['username'];
                                    $sql = "SELECT * FROM logistic WHERE username = '$did'";
                                    $result = mysqli_query($conn, $sql);
                                    if ($result) {
                                        if (mysqli_num_rows($result) > 0) {
                                            $row = mysqli_fetch_assoc($result);
                                        } else {
                                            echo "No records found for username: $did";
                                        }
                                    } else {
                                        echo "Error: " . mysqli_error($conn);
                                    }?>
                                    <form id="" method="post">
                                                <div class="form-group">
                                                    <label>Your ID</label>
                                                    <input type="text" class="form-control" id="exampleTextInput1" name="logistic_id" value="<?php echo $row['logistic_id']; ?>" readonly='true'>
                                                </div>
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input type="text" class="form-control" id="address" name="username" value="<?php echo $row['username']; ?>" readonly='true'>
                                                </div>
                                                <div class="form-group">
                                                    <label>Full Name</label>
                                                    <input type="text" class="form-control" id="email2" name="fullname" value="<?php echo $row['fullname']; ?>" readonly='true'>
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" id="email2" name="email" value="<?php echo $row['email']; ?>" readonly='true'>
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="text" class="form-control" id="pass" name="password" value="<?php echo $row['password']; ?>" readonly='true'>
                                                </div>
                                                <div class="form-group">
                                                    <label>Contact Number</label>
                                                    <input type="text" class="form-control" id="email2" name="mobilenumber" value="<?php echo $row['phone']; ?>" readonly='true'>
                                                </div>
                                                <div class="form-group">
                                                    <label for="rank">Rank</label>
                                                        <select class="form-control" id="rank" name="rank" required="true">
                                                            <option value="<?php echo $row['rank']; ?>" selected><?php echo $row['rank']; ?></option>
                                                            <option value="Private">Private</option>
                                                            <option value="Corporal">Corporal</option>
                                                            <option value="Sergeant">Sergeant</option>
                                                            <option value="Staff Sergeant">Staff Sergeant</option>
                                                            <option value="Sergeant First Class">Sergeant First Class</option>
                                                            <option value="Master Sergeant">Master Sergeant</option>
                                                            <option value="First Sergeant">First Sergeant</option>
                                                            <option value="Second Lieutenant">Second Lieutenant</option>
                                                            <option value="First Lieutenant">First Lieutenant</option>
                                                            <option value="Captain">Captain</option>
                                                            <option value="Major">Major</option>
                                                            <option value="Lieutenant Colonel">Lieutenant Colonel</option>
                                                            <option value="Colonel">Colonel</option>
                                                            <option value="Brigadier General">Brigadier General</option>
                                                            <option value="Major General">Major General</option>
                                                            <option value="Lieutenant General">Lieutenant General</option>
                                                            <option value="General">General</option>
                                                        </select>
                                                </div>
                                        <br>
                                      
                                    </form>
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
        <script>
            $(function() {
                // validation needs name of the element
                $('#food').multiselect();

                // initialize after multiselect
                $('#basic-form').parsley();
            });
        </script>
    </body>

    </html><?php }  ?>