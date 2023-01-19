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

<body class="bg-gray-900 text-white">
    <header class="flex flex-row justify-around pt-5 font-Lexend pb-3 text-xl">
        <form action="index.php">
            <button class="text-2xl">AZ[Store]</button>
        </form>
        <nav class="navbar mr-5 ml-5">
            <ul class="flex flex-row ">
                <li class="home mr-9">Home</li>
                <li class="about mr-9 ">About</li>
                <li class="product mr-9">Products</li>
                <li class="contact ">Contact</li>
            </ul>
        </nav>
    </header>
    <hr class="ligne border-gray-600">
     <form action="index.php">
        <button type="submit" class="text-xl ml-6 mt-6 pb-4 pt-2 rounded-lg bg-blue-500 hover:bg-blue-700 active:bg-blue-900 pl-4 pr-4"> ← Page d'accueil</button>
    </form> 
    <div class="all_basket flex flex-col flex-wrap items-center ">
        <?php
            require ("buttonremove.php");
            require("add-to-cart.php");

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) { 
    foreach ($_SESSION['cart']as $i => $value){
        $total= $total+ ($_SESSION['cart'][$i]['price']);
    }
    echo "<form method='post' class='flex flex-col  w-96'>";
    foreach ($_SESSION['cart'] as $key=> $shoe) {
        echo '<div class="bg-gray-800 max-w-xl rounded-lg p-5 mt-12 flex flex-col items-center' . $shoe['product'] . ' pb-5 mb-4 ">';
        echo "<img  src=" . $shoe['image_url'] . ">";
        echo '<p class="text-base mb-2 font-Lexend text-center">'  . $shoe['product'] . '</p>';
        echo '<p class="font-Lexend text-center">' . $shoe['price'] . '</p>';
        echo '<input class=" m-3 rounded-lg bg-blue-500 hover:bg-blue-700 active:bg-blue-900 pl-4 pr-4 p-6 ml-8" type="submit" value="Supprimer" name="remove'.$shoe['id'].'">';
        echo "</div>";
    }
    echo "</p>";
    echo "</form>";

} else {
    echo "Le panier est vide ! ";
};

echo "<p class='bg-gray-800 max-w-xl rounded-lg p-5 mt-12 flex flex-col items-center font-Lexend'> Le total de votre panier est de ".$total . " €</p>"
?>

<form action="checkout.php">
    <button type="submit" name="paiement" class="m-3 w-56 rounded-lg bg-blue-500 hover:bg-blue-700 active:bg-blue-900 pl-4 pr-4 p-6 ml-8">Paiement</button>
</form>