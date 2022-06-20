<?php
session_start();
require 'Config.php';

if(isset($_SESSION['cart']))
$req = "Insert into orders(type, total_price, order_time, status, user_id) values ('Livraison'," . $_GET['total'] . "," . time() . ",'pending'," . $_SESSION['user_id'] . ")";
$res = mysqli_query($link, $req);

$id = mysqli_insert_id($link);

foreach ($_SESSION['cart'] as $key => $value) {
    $req = 'insert into order_line(item_id, order_id, qte) values(' . $value['id'] . ', ' . $id . ', ' . $value['qte'] . ' )';
    mysqli_query($link, $req);
}

$_SESSION['cart'] = [];
?>