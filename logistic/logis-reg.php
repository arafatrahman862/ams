<!DOCTYPE html>
<html>
<head>
    <title>Login- Armory Management System</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>

    <style type="text/css">
        body{
             background: url('../imagess/login.jpg') no-repeat center center fixed;
             background-size: cover;
        }
    </style>

<div class="container">
    <div class="loginHeader">
        <h1 style="color: white;">Armory Management System</h1>
        <h4 style="color: white;">Logistic Registration Form</h4>
    </div>
    <div class="loginBody">
        <form action="../includes/process.php" method="post">
            <div class="loginInputsContainer">
                <label for="username">Username</label>
                <input type="text" name="username" required>
            </div>
            <div class="loginInputsContainer">
                <label for="fullname">Full Name</label>
                <input type="text" name="fullname" required>
            </div>
            <div class="loginInputsContainer">
                <label for="email">Email</label>
                <input type="text" name="email" required>
            </div>
            <div class="loginInputsContainer">
                <label for="phone">Phone</label>
                <input type="text" name="phone" required>
            </div>
            <div class="loginInputsContainer">
                <label for="password">Password</label>
                <input type="password" name="password" required>
            </div>
            <div class="loginInputsContainer">
                <label for="rank">Rank</label>
                <input type="text" name="rank" required>
            </div>
            <div class="loginButtonContainer">
                <button type="submit" name="register">Register</button>
            </div>

            <div class="other-login"><a href="logis-login.php">Logistic Login</a><a href="../officer/officer-login.php">Officer Login</a><a href="../index.php">Soldier Login</a></div>
        </form>

    </div>
</div>

</body>
</html>
