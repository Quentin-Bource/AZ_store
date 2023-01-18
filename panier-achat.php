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
if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
    foreach($_SESSION['cart'] as $shoe){
        echo '<div class="'.$shoe['product'].'">';    
        echo "<img src=".$shoe['image_url']."><div>";
        echo '<p>'.$shoe['price'].'</p>';

    }
} else {
    echo "Le panier est vide ! ";
}


?>