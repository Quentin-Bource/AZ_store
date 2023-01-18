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
</head>

<body class="bg-gray-900 text-white">
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
</body>

</html>
<?php
require("add-to-cart.php");

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) { 
    echo "<form method='post'>";
    foreach ($_SESSION['cart'] as $key=> $shoe) {
        echo '<div class="' . $shoe['product'] . '">';
        echo "<img src=" . $shoe['image_url'] . ">";
        echo '<p>' . $shoe['product'] . '</p>';
        echo '<p>' . $shoe['price'] . '</p>';
        echo '<input type="submit" value="Supprimer" name="remove'.$shoe['id'].'">';
        echo "</div>";
    }
    echo "</form>";
} else {
    echo "Le panier est vide ! ";
};
?>