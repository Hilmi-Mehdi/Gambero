<?php
require_once "Config.php";

$user = $password = $email = "";

if (isset($_GET["user"]) && isset($_GET["email"]) && isset($_GET["pass"])) {
    $user = $_GET["user"];
    $email = $_GET["email"];
    $password = $_GET["pass"];

    if (!empty($user) and !empty($email) and !empty($password)) {
        $sql = "INSERT INTO users(username, password, email) values (?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, 'sss', $param_user, $param_pass, $param_email);

            $param_user = $user;
            $param_pass = $password;
            $param_email = $email;

            if (mysqli_stmt_execute($stmt)) {
                header("location: login.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Styles/LoginStyle.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <section>
        <div class="imgBx">
            <img src="../images/login.jpg" alt="">
        </div>
        <div class="contentBx">
            <div class="formBx">
                <h2>REGISTER</h2>
                <form action="#">
                    <div class="inputBx">
                        <span>Username</span>
                        <input type="text" name="user" required>
                    </div>
                    <div class="inputBx">
                        <span>Email</span>
                        <input type="email" name="email" required>
                    </div>
                    <div class="inputBx">
                        <span>Password</span>
                        <input type="password" name="pass" required>
                    </div>
                    <div class="inputBx">
                        <input type="submit" value="Sign up" name="">
                    </div>
                    <div class="inputBx">
                        <p>have an account ? <a href="../Pages/Login.php">Sign in</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>

</html>