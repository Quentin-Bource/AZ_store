<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="output.css" rel="stylesheet" type="text/css">
    <title>A-Z Store</title>
</head>
<body class="bg-gray-900 text-white">
    <header class="grid grid-cols-3 grid-rows-1 ">
            <h2 class="grid col-span-1 grid-rows-1">AZ[Store]</h2>
            <nav class="navbar grid col-span-2 grid-rows-1">
                <ul>
                    <li class="home">Home</li>
                    <li class="about">About</li>
                    <li class="product">Products</li>
                    <li class="contact">Contact</li>
                </ul>
                <button class="panier grid col-span-3 grid-rows-1"><img src="./assets//images//cart2.svg" alt="panier"></a></button>
                <button class="login grid col-span-3 grid-rows-1">Login</button>

            </nav>
    </header>
    <div class="bg" >
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
        'product'=> 'Nike Air Max 275',
        'price'=> "145 €",
        'image_url'=> './assets/images/Basket_2.png',
    ],
    [
        'id' => 2,
        'product'=> 'Nike Air Max 280',
        'price'=> "145 €",
        'image_url'=> './assets/images/Basket_3.png',
    ],
    [
        'id' => 3,
        'product'=> 'Nike Air Max 285',
        'price'=> "145 €",
        'image_url'=> './assets/images/Basket_4.png',
    ],
];

foreach ($shoes as $shoe){
    echo "<div class =".$shoe['product']."></div>";
    echo "<img src=".$shoe['image_url']."><div>";
    echo '<p>'.$shoe['price'].'</p>';
    echo '<button type="submit" class='.$shoe["id"].'>Add to card</button>';
};
$array= [];
$submit= ($_GET['id']);

