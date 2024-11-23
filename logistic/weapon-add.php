<?php
session_start();
error_reporting(0);
include('../includes/db.php');
if (strlen($_SESSION['username'] == 0)) {
    header('location:logout.php');
} else {
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

            $weaponType = $_POST["weapon_type"];
            $weaponName = $_POST["name"];
            $c_name = $_POST["c_name"];
            $com_name = $_POST["com_name"];
            $imageName = htmlspecialchars(basename($_FILES["fileToUpload"]["name"]));

            $sql = "INSERT INTO weapon (img, weapon_name, weapon_type, country, company) VALUES ('$imageName', '$weaponName', '$weaponType', '$c_name', '$com_name')";

            if (mysqli_query($conn, $sql)) {
               echo "<script>
                alert('Weapon added successfully');
                window.location.href='weapon-add.php';
              </script>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

?>
    <!doctype html>
    <html lang="en">

    <head>
        <title>AMS: Add Weapon</title>

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
                    <a class="navbar-brand" href="javascript:void(0);">Add Weapon</a>

                </nav>
                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h2>Add Weapon</h2>
                                </div>
                                <div class="body">
                                    <form method="post" enctype="multipart/form-data" action="">

                                        <div class="form-group">
                                            <label>Serial No.</label>
                                            <input type="text" class="form-control" id="exampleTextInput1" name="driid" value="" required='true' maxlength="30">
                                        </div>
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" id="exampleTextInput2" name="name" value="" required='true'>
                                        </div>
                                        <div class="form-group">
                                            <label>Manufactured Country</label>
                                            <input type="text" class="form-control" id="exampleTextInput3" name="c_name"  required='true'>
                                        </div>
                                        <div class="form-group">
                                            <label>Manufactured Company</label>
                                            <input type="text" class="form-control" id="exampleTextInput4" name="com_name"  required='true'>
                                        </div>
                                        <div class="form-group">
                                            <label for="weaponType">Weapon Type</label>
                                            <select class="form-control" id="weaponType" name="weapon_type" required="true">
                                                <option value="" disabled selected>Select Weapon Type</option>
                                                <option value="Assault Rifle">Assault Rifle</option>
                                                <option value="Submachine Gun">Submachine Gun</option>
                                                <option value="Shotgun">Shotgun</option>
                                                <option value="Sniper Rifle">Sniper Rifle</option>
                                                <option value="Pistol">Pistol</option>
                                                <option value="Machine Gun">Machine Gun</option>
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