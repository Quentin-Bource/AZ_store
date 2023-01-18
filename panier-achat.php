<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php 
require ('add-to-cart.php');
if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
    echo "<ul class='panier'>";
    foreach($_SESSION['cart'] as $shoe){
        echo '<li>' . $shoe["id"] . '</li>';
        
    }
    echo "</ul>";
} else {
    echo "Le panier est vide ! ";
}

?>