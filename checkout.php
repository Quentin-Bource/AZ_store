<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="output.css" type="text/css">
    <title>Checkout</title>

</head>

<body class=" bg-gray-900 text-white ml-7 font-Lexend ">

    <header class="flex flex-row justify-around pt-5 font-sans pb-3">
        <form action="index.php">
        <button class="text-2xl">AZ[Store]</button>
        </form>
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
    <form action="panier-achat.php">
    <button type="submit" class="text-xl ml-6 mt-6 mb-6 pb-4 pt-2 rounded-lg bg-blue-500 hover:bg-blue-700 active:bg-blue-900 pl-4 pr-4"> ← Retour au panier </button>
    </form>
    <div id="products">
        <div id="product">

<?php
require("add-to-cart.php");
//require("panier-achat.php");

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) { 
    echo "<form method='post' class='flex flex-col items-center'>";
    foreach ($_SESSION['cart'] as $key=> $shoe) {
        echo '<div class="bg-gray-800 max-w-xl flex flex-col items-center rounded-lg p-5 ' . $shoe['product'] . ' pb-5 mb-4 mt-2">';
        echo "<img  src=" . $shoe['image_url'] . " class='w-40 ' >";
        echo '<p class="text-base mb-2">'  . $shoe['product'] . '</p>';
        echo '<p>' . $shoe['price'] . '</p>';
        echo '<input class=" m-3 rounded-lg bg-blue-500 hover:bg-blue-700 active:bg-blue-900 pl-4 pr-4" type="submit" value="Supprimer" name="remove'.$shoe['id'].'">';
        echo "</div>";
    }
    echo "</form>";
}
?>
        </div>
    </div>


    <form method="POST" action="checkout.php" class="leading-8 ml-8 pb-4">
        <p>
            <label class="w-48 " for="name">Firstname</label>
            <input class="bg-gray-600 rounded-lg ml-3 mb-3" type="text" name="firstname" placeholder="  Firstname" id='firstname' required><br>
        </p>

        <p>
            <label for="name">Name</label>
            <input class="bg-gray-600 rounded-lg ml-10 mb-3" type="text" name="name" placeholder="  Name" id="name" required><br>
        </p>

        <p>
            <label for="name">E-mail</label>
            <input class="bg-gray-600 rounded-lg ml-10 mb-3" type="text" name="email" placeholder="  E-mail" id="email" required><br>
        </p>

        <p>
            <label for="name">Address</label>
            <input class="bg-gray-600 rounded-lg ml-6 mb-3" type="text" name="address" placeholder="  Address" id="address" required><br>
        </p>

        <p>
            <label for="zipcode">Zip Code</label>
            <input class="bg-gray-600 rounded-lg ml-5 mb-3" type="text" pattern="[0-9]*" name="zipcode" placeholder="  Zip-code" id="zipcode" maxlength="6" minlength="4" required><br>
        </p>

        <p>
            <label for="name">City</label>
            <input class="bg-gray-600 rounded-lg ml-14 mb-3" type="text" name="city" placeholder="  City" id="city" required><br>
        </p>

        <label for="country">Country</label>
        <select class="bg-gray-600 rounded-lg ml-7 mb-3 p-2" id="country" name="country" required>
            <option value=" Belgium">Belgium</option>
            <option value=" France">France</option>
            <option value=" Germany">Germany</option>
            <option value=" Netherlands">Netherland</option>
        </select>

        <input class="ml-3 rounded-lg bg-blue-500 hover:bg-blue-700 active:bg-blue-900 pl-4 pr-4" type="submit" name="submit" value="Submit">

    </form>

    <?php



    // we initiate an array that will contain any potential errors.

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $errors = array();
        $firstname = $name = $email = $address = $zipcode = $city = $country = "";


        if (isset($_POST['submit']) && $_POST['submit'] == 'Submit') {
            if (empty($_POST['email'])) {
                $errors['email'] = "Email is required.";
            } else {
                $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                if (false === filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors['email'] = "This email address is invalid.";
                }
            }

            // Validate the first name
            if (empty($_POST['firstname'])) {
                $errors['firstname'] = "First name is required.";
            } else {
                $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
                if (!preg_match("/^[a-zA-Z ]*$/", $firstname)) {
                    $errors['firstname'] = "Only letters and white space allowed in the first name.";
                }
            }

            // Validate the name
            if (empty($_POST['name'])) {
                $errors['name'] = "Name is required.";
            } else {
                $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
                if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                    $errors['name'] = "Only letters and white space allowed in the name.";
                }
            }

            // Validate the address
            if (empty($_POST['address'])) {
                $errors['address'] = "Address is required.";
            } else {
                $address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
                if (!preg_match("/^[0-9a-zA-Z\s,.'-]*$/", $address)) {
                    $errors['address'] = "Only letters, numbers and white space allowed in the address field.";
                }
            }

            // Validate the zipcode
            if (empty($_POST['zipcode'])) {
                $errors['zipcode'] = "Zipcode is required.";
            } else {
                $zipcode = filter_var($_POST['zipcode'], FILTER_SANITIZE_STRING);
                if (!preg_match("/^[0-9 ]*$/", $zipcode)) {
                    $errors['city'] = "Only numbers allowed in the zip code field.";
                }
            }

            // Validate the city
            if (empty($_POST['city'])) {
                $errors['city'] = "City is required.";
            } else {
                $city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
                if (!preg_match("/^[a-zA-Z ]*$/", $city)) {
                    $errors['city'] = "Only letters and white space allowed in the city field.";
                }
            }

            // Validate the country
            if (empty($_POST['country'])) {
                $errors['country'] = "country is required.";
            } else {
                $country = filter_var($_POST['country'], FILTER_SANITIZE_STRING);
                if (!preg_match("/^[a-zA-Z ]*$/", $country)) {
                    $errors['country'] = "Only letters and white space allowed in the country field.";
                }
            }




            if (count($errors) === 0) {
                echo '<p class="text-base italic p-2">Merci pour votre commande !</p>';
            } else {

                foreach ($errors as $error) {
                    echo $error . "<br>";
                }
                echo 'warning';
            }
        }
    }


    ?>

  
</body>

</html>