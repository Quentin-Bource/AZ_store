<?php

if(!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

if(isset($_POST['add_to_cart'])) {
    $shoe_id = $_POST['shoe_id'];
    $shoe = $shoes[$shoe_id];
    array_push($_SESSION['cart'], $shoe);
    header("Location: index.php");
}
