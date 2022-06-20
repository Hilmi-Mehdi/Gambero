<?php
    require_once "Config.php";

    session_start();
    if(!isset($_SESSION['user']) and !isset($_SESSION['pass']) and !isset($_SESSION['rem']) and !isset($_GET['id'])){
        header("location: Login.php");
    }else{
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }else{
            $id = $_SESSION['user_id'];
        }
        $sql = "SELECT * FROM users WHERE user_id=".$id;
            if($stmnt = mysqli_prepare($link, $sql)){
                if(mysqli_stmt_execute($stmnt)){
                    $result = mysqli_stmt_get_result($stmnt);
                    if (mysqli_num_rows($result) != 0) {
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $img = $row['image'];
                        $user = $row['username'];
                    }
                }else {
                    echo "Oops! Something went wrong. Please try again later.";
                    exit();
                }
            }
    }
?>