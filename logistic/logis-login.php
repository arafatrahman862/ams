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
        <h4 style="color: white;">Logistic Login Form</h4>
    </div>
    <div class="loginBody">
        <form action="../includes/process.php" method="post">
            <div class="loginInputsContainer">
                <label for="username">Username</label>
                <input type="text" name="username" required>
            </div>
            <div class="loginInputsContainer">
                <label for="password">Password</label>
                <input type="password" name="password" required>
            </div>
            <div class="loginButtonContainer">
                <button type="submit"  name="login">Login</button>
            </div>

            <div class="other-login"><a href="../officer/officer-login.php">Officer Login</a><a href="../index.php">Solider Login</a> <br> <a href="logis-reg.php">Logistic Registration</a></div>
        </form>
    </div>
</div>

</body>
</html>
