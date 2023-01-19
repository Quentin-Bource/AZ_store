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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend&display=swap" rel="stylesheet">
    <title>A-Z Store</title>
</head>

<body class="bg-gray-900 text-white font-Lexend ">
    <header class="flex flex-row justify-around pt-5 pb-3 text-xl">
        <form action="index.php">
            <button class="text-2xl">AZ[Store]</button>
        </form>
        <nav class="navbar mr-5 ml-5">
            <ul class="flex flex-row ">
                <li class="about mr-9 ">About</li>
                <li class="contact ">Contact</li>
            </ul>
        </nav>
        <div class="flex flex-row">
            <form action="panier-achat.php">
                <button class="panier w-5"><img class="text-center w-5" src="./assets/images/cart2.svg" alt="panier"></a></button>
            </form>
            <button class="login pl-9">Login</button>
        </div>

    </header>
    <hr class="ligne border-gray-600">
    <main>
        <div class="bg flex flex-row">
            <div class="flex flex-col self-center  p-32">
            <h2 class="titre text-7xl uppercase">Shoe the right <span class=" text-blue-500">one</span>.</h2>
            <button class=" m-3 rounded-lg bg-blue-500 hover:bg-blue-700 active:bg-blue-900 pl-4 pr-4 p-6 ml-12 w-44 mt-8"><a href="">See our store</a></button>
            </div>
            <img class=" w-2/5 mt-10 mb-10 mr-10"src="./assets/images/shoe_one.png" alt="shoe">
        </div>
        <hr class="ligne border-gray-600">
        <h3 class=' text-2xl m-10'> <span class=" text-blue-500">Our</span> last products</h3>
        <div class="carroussel flex flex-row justify-around ml-20 mr-20">

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
            require("add-to-cart.php");

            foreach ($shoes as $shoe) {
                echo '<div class="bg-gray-800 max-w-xl items-center rounded-lg p-5 ' . $shoe['product'] . '">';
                echo "<img src=" . $shoe['image_url'] . " class=' pb-5 w-40 h-auto'>";
                echo '<p class="nom text-xl">' . $shoe['product'] . '</p>';
                echo '<p class=" text-xl">' . $shoe['price'] . '</p>';
                echo '<form method="post">';
                echo '<input type="hidden" name="shoe_id" value="' . $shoe["id"] . '">';
                echo '<input class=" m-3 rounded-lg bg-blue-500 hover:bg-blue-700 active:bg-blue-900 pl-4 pr-4" type="submit" name="add_to_cart" value="Add to Cart">';
                echo '</form>';
                echo "</div>";
            };

            ?>
            
        </div>
        <div class="flex flex-col items-center">
        <img class=" w-72 pt-10" src="./assets/images/shoe_two.png" alt="shoe2">
        <p class=" text-7xl p-6 uppercase text-center">We provide you <br> the <span class=" text-blue-500">best</span> quality.</p>
        <p class=" text-center m-6 pr-32 pl-32">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam pariatur possimus fuga facilis repellendus ipsum aut est
             id nostrum minus ea, aliquam perspiciatis fugit rerum ab praesentium odit
              fugiat repellat.</p>
        </div>
        <section class=" flex flex-row text-center">
            <div>
                <img src="./assets/images/image-emily.jpg" alt="Emily">
                <h3>Emily from xyz</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Praesentium sequi natus vero distinctio cupiditate quas debitis reiciendis.</p>
                
            </div>
            <div>
                <img src="./assets/images/image-jennie.jpg" alt="Emily">
                <h3>Emily from Nike</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Praesentium sequi natus vero distinctio cupiditate quas debitis reiciendis.</p>
                
            </div>
            <div>
                <img src="./assets/images/image-thomas.jpg" alt="Emily">
                <h3>Emily from Adidas</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Praesentium sequi natus vero distinctio cupiditate quas debitis reiciendis.</p>
                

            </div>

        </section>
            

    </main>
</body>

</html>