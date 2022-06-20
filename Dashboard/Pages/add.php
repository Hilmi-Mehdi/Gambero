<?php

require_once "Config.php";

session_start();

if(isset($_POST['up']) && isset($_POST['name']) && isset($_POST['cat']) && isset($_POST['det']) && isset($_POST['price'])){
    $img_name = $_FILES['image']['name'];
    $tmp_img_name = $_FILES['image']['tmp_name'];
    $folder = '../../Main/images/';
    move_uploaded_file($tmp_img_name, $folder.$img_name);

    $image = '../images/'.$img_name;
    $name = $_POST['name'];
    $price = $_POST['price'];
    $det = $_POST['det'];
    $cat = $_POST['cat'];


    $stmt = $link->prepare("insert into menu(name, details, price, image, category_id) VALUES (?, ?, ?, ?, ?)");
    
        if($stmt !== FALSE)
        {
            $stmt->bind_param("sssss", $name, $det, $price, $image, $cat);
            echo $stmt->execute();
            $stmt->close();
            $link->close();
            echo 'success';
        }
}else{
    echo 'walo';
}

?>