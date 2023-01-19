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
    <header class="flex flex-row justify-around pt-5 font-Lexend pb-3">
        <form action="index.php">
            <button class="">AZ[Store]</button>
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
        <div class="max-w-full bg flex flex-col">
            <div class="flex flex-col self-center p-32">
            <h2 class="titre text-7xl uppercase">Merci pour votre <span class=" text-blue-500">achat!</span></h2>
            </div>
        </div>
</body>
</html>