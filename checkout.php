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

<body class="bg bg-gray-900 text-red ">

    <h2>Checkout</h2>

    <div id="products">
        <div id="product"></div>
    </div>


    <form method="POST" action="checkout.php">

        <p>
            <label for="name">Firstname</label>
            <input type="text" name="firstname" placeholder="Firstname" id='firstname' required><br>
        </p>

        <p>
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Name" id="name" required><br>
        </p>

        <p>
            <label for="name">E-mail</label>
            <input type="text" name="email" placeholder="E-mail" id="email" required><br>
        </p>

        <p>
            <label for="name">Address</label>
            <input type="text" name="address" placeholder="Address" id="address" required><br>
        </p>

        <p>
            <label for="zipcode">Zip Code</label>
            <input type="text" pattern="[0-9]*" name="zipcode" placeholder="Zip-code" id="zipcode" maxlength="6" minlength="4" required><br>
        </p>

        <p>
            <label for="name">City</label>
            <input type="text" name="city" placeholder="City" id="city" required><br>
        </p>

        <label for="country">Country</label>
        <select id="country" name="country" required>
            <option value="Belgium">Belgium</option>
            <option value="France">France</option>
            <option value="Germany">Germany</option>
            <option value="Netherlands">Netherland</option>
        </select>

        <input type="submit" name="submit" value="Submit">

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
                echo 'Correct data';
            } else {
                
                foreach ($errors as $error) {
                    echo $error . "<br>";
                }
                echo 'warning';
            }
        }
    }
   

    ?>

    <?php
    echo "<h2>Your Input:</h2>";
    echo $firstname;
    echo "<br>";
    echo $name;
    echo "<br>";
    echo $email;
    echo "<br>";
    echo $address;
    echo "<br>";
    echo $zipcode;
    echo "<br>";
    echo $city;
    echo "<br>";
    echo $country;
    ?>


</body>

</html>