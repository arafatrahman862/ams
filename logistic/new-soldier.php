<?php
session_start();
error_reporting(0);
include('../includes/db.php');
if (strlen($_SESSION['username'] == 0)) {
    header('location:logout.php');
} else {

    if (isset($_POST["submit"])) {

        $username = $_POST["username"];
        $fullName = $_POST["fullname"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $password = $_POST["password"];
        $rank = $_POST["rank"];
        $sql = "INSERT INTO soldier (username, name, email, phone, password, rank) 
                VALUES ('$username', '$fullName', '$email', '$phone', '$password', '$rank')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>
                alert('Soldier Account created successfully');
                window.location.href='soldiers.php';
              </script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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
                    <a class="navbar-brand" href="javascript:void(0);">Add Soldier</a>

                </nav>
                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h2>Add Soldier</h2>
                                </div>
                                <div class="body">
                                    <form method="post" action="">

                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control" id="exampleTextInput1" name="username" value="" required='true' maxlength="30">
                                        </div>
                                        <div class="form-group">
                                            <label>Full Name</label>
                                            <input type="text" class="form-control" id="exampleTextInput1" name="fullname" value="" required='true'>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" id="exampleTextInput1" name="email" value="" required='true'>
                                        </div>
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input type="text" class="form-control" id="exampleTextInput1" name="phone" value="" required='true'>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" id="exampleTextInput1" name="password" value="" required='true'>
                                        </div>
                                        <div class="form-group">
                                            <label for="rank">Rank</label>
                                            <select class="form-control" id="rank" name="rank" required="true">
                                                <option value="" disabled selected>Select Rank</option>
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

                                        <button type="submit" class="btn btn-primary" name="submit">Add</button>
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
    </body>

    </html><?php }  ?>