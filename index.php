<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="output.css" rel="stylesheet" type="text/css">
    <title>A-Z Store</title>
</head>

<body class="bg-gray-900 text-white ">
    <header class="flex flex-row justify-around pt-5 font-serif pb-3">
        <h2 class="">AZ[Store]</h2>
        <nav class="navbar mr-5 ml-5">
            <ul class="flex flex-row ">
                <li class="home mr-2.5">Home</li>
                <li class="about mr-2.5 ">About</li>
                <li class="product mr-2.5">Products</li>
                <li class="contact ">Contact</li>
            </ul>
        </nav>
        <div class="">
            <button class="panier w-5"><img src="./assets//images//cart2.svg" alt="panier"></a></button>
            <button class="login">Login</button>
        </div>

    </header>
    <hr>
    <div class="bg">
        <h2>Shoe the right one.</h2>
        <button class="store"><a href="">Aller vous faire foutre</a></button>
    </div>
    <div class="carroussel">
        <h3>Our last products</h3>
    </div>
</body>

</html>

<?php

$shoes =
    [
        [
            'id' => 0,
            'product' => 'Nike Air Max 270',
            'price' => "145 €",
            'image_url' => './assets/images/Basket_1.png',
        ],
        [
            'id' => 1,
            'product' => 'Nike Air Max 275',
            'price' => "145 €",
            'image_url' => './assets/images/Basket_2.png',
        ],
        [
            'id' => 2,
            'product' => 'Nike Air Max 280',
            'price' => "145 €",
            'image_url' => './assets/images/Basket_3.png',
        ],
        [
            'id' => 3,
            'product' => 'Nike Air Max 285',
            'price' => "145 €",
            'image_url' => './assets/images/Basket_4.png',
        ],
    ];


foreach ($shoes as $shoe){
    echo '<div class="'.$shoe['product'].'">';    
    echo "<img src=".$shoe['image_url']."><div>";
    echo '<p>'.$shoe['price'].'</p>';
    echo '<form method="post" >';
    echo '<input type="hidden" name="shoe_id" value="'.$shoe["id"].'">';
    echo '<input type="submit" name="add_to_cart" value="Add to Cart">';
    echo '</form>';
};
require("add-to-cart.php");
require("panier-achat.php");


?>