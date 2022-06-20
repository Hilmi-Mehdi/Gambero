<?php 
    session_start();
    if(isset($_GET['id']) && isset($_SESSION['products'])){
        foreach ($_SESSION['cart'] as $key => $value) {
            if($key == $_GET['id']){
                unset($_SESSION['cart'][$key]);
            }
        }
        header('location: Cart.php ');
    }
    else{
        echo 'An error has occured';
    }
?>