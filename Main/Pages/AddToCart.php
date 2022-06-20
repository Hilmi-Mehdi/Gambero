<?php 
    session_start();
    $line = [];
    if(isset($_GET['id']) && isset($_SESSION['products'])){
        foreach ($_SESSION['products'] as $key => $value) {
            if($key == $_GET['id']){
                $line = $value;
            }
        }
        array_push($_SESSION['cart'], $line);
        header('location: Cart.php ');
    }
    else{
        echo 'An error has occured';
    }
?>