<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="output.css">
    <title>A-Z [Store]</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-900 text-white font-Lexend">
    <header class="flex flex-row justify-around pt-5 font-serif pb-3">
        <form action="index.php">
            <button class="">AZ[Store]</button>
        </form>
        <nav class="navbar mr-5 ml-5">
            <ul class="flex flex-row ">
                <li class="home mr-2.5">Home</li>
                <li class="about mr-2.5 ">About</li>
                <li class="product mr-2.5">Products</li>
                <li class="contact ">Contact</li>
            </ul>
        </nav>

    </header>
    <hr class="ligne border-gray-600">
    <div class="all_basket class='flex flex-col '">
        <?php
            require ("buttonremove.php");
            require("add-to-cart.php");

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) { 
    echo "<form method='post' >";
    foreach ($_SESSION['cart'] as $key=> $shoe) {
        echo '<div class="bg-gray-800 max-w-xl rounded-lg p-5 justify-center' . $shoe['product'] . ' pb-5 mb-4 mt-2">';
        echo "<img  src=" . $shoe['image_url'] . " class='w-40 ' >";
        echo '<p class="text-base mb-2 font-Lexend ">'  . $shoe['product'] . '</p>';
        echo '<p class ="font-Lexend">' . $shoe['price'] . '</p>';
        echo '<input class=" m-3 rounded-lg bg-blue-500 hover:bg-blue-700 active:bg-blue-900 pl-4 pr-4 p-6" type="submit" value="Supprimer" name="remove'.$shoe['id'].'">';
        echo "</div>";
    }
    echo "</form>";
} else {
    echo "Le panier est vide ! ";
};
?>