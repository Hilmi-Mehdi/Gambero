<?php
require_once "Config.php";

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require 'PHPMailer-master/src/Exception.php';
// require 'PHPMailer-master/src/PHPMailer.php';
// require 'PHPMailer-master/src/SMTP.php';

// $mail = new PHPMailer();
// $mail->IsSMTP();
// $mail->Mailer = "smtp";

// $mail->SMTPDebug  = 1;
// $mail->SMTPAuth   = TRUE;
// $mail->SMTPSecure = "tls";
// $mail->Port       = 587;
// $mail->Host       = "smtp.gmail.com";
// $mail->Username   = "hilmimehdi2000@gmail.com";
// $mail->Password   = "hossamaya123";


// $user = $password = $email = "";

// if (isset($_GET["user"]) && isset($_GET["email"]) && isset($_GET["pass"])) {
//     $user = $_GET["user"];
//     $email = $_GET["email"];
//     $message = $_GET["pass"];


//     $mail->IsHTML(true);
//     $mail->AddAddress("zwochanglee@gmail.com", "GAMBERO");
//     $mail->SetFrom("hilmimehdi2000@gmail.com", "$user");
//     $mail->Subject = "Test is Test Email sent via Gmail SMTP Server using PHP Mailer";
//     $content = "<b>This is a Test Email sent via Gmail SMTP Server using PHP mailer class.</b>";

//     if (!empty($user) and !empty($email) and !empty($message)) {

//         $mail->MsgHTML($content);
//         if (!$mail->Send()) {
//             echo "Error while sending Email.";
//             var_dump($mail);
//         } else {
//             echo "Email sent successfully";
//         }
//     }
// }
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../Dashboard/Styles/LoginStyle.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <section>
        <div class="imgBx">
            <img src="../../Dashboard/images/login.jpg" alt="">
        </div>
        <div class="contentBx">
            <div class="formBx">
                <h2>CONTACT US</h2>
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
                        <span>Message</span>
                        <input style="height: 200px;" type="text" name="pass" required>
                    </div>
                    <div class="inputBx">
                        <input type="submit" value="SEND" name="">
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>

</html>