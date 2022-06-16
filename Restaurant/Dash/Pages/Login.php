<?php

require_once "Config.php";

$user = $password = "";
session_start();

if (isset($_GET["user"]) && isset($_GET["pass"])) {
    $user = $_GET["user"];
    $password = $_GET["pass"];
    $rem = isset($_GET["remember"]);

    if (!empty($user) && !empty($password)) {
        $sql = "SELECT role_id,user_id FROM users where username = ? and password = ?";
        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, 'ss', $param_user, $param_pass);

            $param_user = $user;
            $param_pass = $password;

            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);
                if (mysqli_num_rows($result) != 0) {
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $role = $row['role_id'];
                    $userid = $row['user_id'];
                    if ($role == 3) {
                        if ($rem == 1) {
                            $_SESSION['user_id'] = $userid;
                            $_SESSION['user'] = $user;
                            $_SESSION['pass'] = $password;
                        }
                        header("location: Dashboard.php?id=" . $userid);
                    }
                    exit();
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                    exit();
                }
            }
        }
        mysqli_close($link);
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Styles/LoginStyle.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <section>
        <div class="imgBx">
            <img src="../images/login.jpg" alt="">
        </div>
        <div class="contentBx">
            <div class="formBx">
                <h2>Login</h2>
                <form action="">
                    <div class="inputBx">
                        <span>Username</span>
                        <input type="text" name="user" value="<?php if (isset($_SESSION['user']) and isset($_SESSION['pass'])) { echo $_SESSION['user']; }?>" required>
                    </div>
                    <div class="inputBx">
                        <span>Password</span>
                        <input type="password" name="pass" value="<?php if (isset($_SESSION['user']) and isset($_SESSION['pass'])) { echo $_SESSION['pass']; }?>" required>
                    </div>
                    <div class="remember">
                        <label for=""><input type="checkbox" name="remember"> Remember me</label>
                    </div>
                    <div class="inputBx">
                        <input type="submit" value="Sign in" name="">
                    </div>
                    <div class="inputBx">
                        <p>Don't have an account? <a href="../Pages/Register.php">Sign up</a></p>
                    </div>
                </form>
                <h3>Or sign in with : </h3>
                <ul class="sci">
                    <li><img src="../images/google.png" alt=""></li>
                </ul>
            </div>
        </div>
    </section>
</body>

</html>