<?php
session_start();

?>
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

if(isset($_POST)){
    foreach ($_POST as $key => $value){
        if(strpos($key,'remove') === 0){
            $id=str_replace('remove','',$key);
            foreach ($_SESSION['cart'] as $key => $shoe) {
                if($shoe['id']==$id){
                    unset($_SESSION['cart'][$key]);
                }
            }
        }
    }
}
?>