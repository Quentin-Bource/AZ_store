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

<body class="bg bg-gray-900 text-white ">

    <h2>Checkout</h2>

    <div id="products">
        <div id="product"></div>
    </div>


    <form method="GET" action="checkout.php">

        <p>
            <label for="name">Firstname</label>
            <input type="text" name="name" placeholder="Firstname" id='firstname' required><br>
        </p>

        <p>
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Name" id="name" required><br>
        </p>

        <p>
            <label for="name">E-mail</label>
            <input type="text" name="name" placeholder="E-mail" id="email" required><br>
        </p>

        <p>
            <label for="name">Address</label>
            <input type="text" name="name" placeholder="Address" id="address" required><br>
        </p>

        <p>
            <label for="zipcode">Zip Code</label>
            <input type="number" name="name" placeholder="Zip-code" id="zipcode" maxlength="6" minlength="4" required><br>
        </p>

        <p>
            <label for="name">City</label>
            <input type="text" name="name" placeholder="City" id="city" required><br>
        </p>

        <label for="country">Country</label>
        <select id="country" name="country" required>
            <option value="Belgium">Belgium</option>
            <option value="France">France</option>
            <option value="Germany">Germany</option>
            <option value="Netherlands">Netherland</option>
        </select>

        <input type="submit" value="Submit">

    </form>

    <?php

    // we initiate an array that will contain any potential errors.

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $errors = array();
        $firstname = $name = $email = $address = $zipcode = $city = $country = "";


        if (isset($_GET['submit']) && $_GET['submit'] == 'Submit') {
            if (isset($_GET['email'])) {
                $errors['email'] = "Email is required.";
            } else {
                $email = filter_var($_GET['email'], FILTER_SANITIZE_EMAIL);
                if (false === filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors[] = "This email address is invalid.";
                }
            }

            // Validate the first name
            if (empty($_GET['firstname'])) {
                $errors['firstname'] = "First name is required.";
            } else {
                $firstname = filter_var($_GET['firstname'], FILTER_SANITIZE_STRING);
                if (!preg_match("/^[a-zA-Z ]*$/", $firstname)) {
                    $errors['firstname'] = "Only letters and white space allowed in the first name.";
                }
            }

            // Validate the name
            if (empty($_GET['name'])) {
                $errors['name'] = "Name is required.";
            } else {
                $name = filter_var($_GET['name'], FILTER_SANITIZE_STRING);
                if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                    $errors['name'] = "Only letters and white space allowed in the name.";
                }
            }

            // Validate the address
            if (empty($_GET['address'])) {
                $errors['address'] = "Address is required.";
            } else {
                $address = filter_var($_GET['address'], FILTER_SANITIZE_STRING);
                if (!preg_match("/^[0-9a-zA-Z\s,.'-]*$/", $address)) {
                    $errors['address'] = "Only letters, numbers and white space allowed in the address field.";
                }
            }

            // Validate the zipcode
            if (empty($_GET['zipcode'])) {
                $errors['zipcode'] = "Zipcode is required.";
            } else {
                $zipcode = filter_var($_GET['zipcode'], FILTER_SANITIZE_STRING);
                if (!preg_match("/^[0-9 ]*$/", $zipcode)) {
                    $errors['city'] = "Only numbers allowed in the zip code field.";
                }
            }

            // Validate the city
            if (empty($_GET['city'])) {
                $errors['city'] = "City is required.";
            } else {
                $city = filter_var($_GET['city'], FILTER_SANITIZE_STRING);
                if (!preg_match("/^[a-zA-Z ]*$/", $city)) {
                    $errors['city'] = "Only letters and white space allowed in the city field.";
                }
            }

            // Validate the country
            if (empty($_GET['country'])) {
                $errors['country'] = "country is required.";
            } else {
                $country = filter_var($_GET['country'], FILTER_SANITIZE_STRING);
                if (!preg_match("/^[a-zA-Z ]*$/", $country)) {
                    $errors['country'] = "Only letters and white space allowed in the country field.";
                }
            }



            // 1. Sanitisation
            //$firstname = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
            //$name = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
            //$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            //$address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
            //$zipcode = filter_var($_POST['email'], FILTER_SANITIZE_NUMBER_INT);
            //$city = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
            //$country = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
            // 2. Validation
            //if (false === filter_var($email, FILTER_VALIDATE_EMAIL) || false === filter_var//($firstname, FILTER_SANITIZE_STRING);) {
            //   $errors['email'] = "This address is invalid."
            //   $errors['firstname'] = "Your firstname is not valid"
            //}

            // 3. execution
            //if (count($errors)> 0){
            //	echo "There are mistakes!";
            //	print_r($errors);
            //	exit;
            //}

            //if ($_SERVER["REQUEST_METHOD"] == "POST"){
            //    $firstname = text_input($_POST["firstname"]);
            //    $name = text_input($_POST["name"]);
            //    $email = text_input($_POST["email"]);
            //    $address = text_input($_POST["address"]);
            //    $zipcode = text_input($_POST["zipcode"]);
            //    $city = text_input($_POST["city"]);
            //    $country = text_input($_POST["country"]);
            //}
            if (count($errors) === 0) {
                echo 'Correct data';
            } else {
                // Print the error messages
                //echo '<pre>';
                //print_r($errors);
                //echo '</pre>';
                foreach ($errors as $error) {
                    echo $error . "<br>";
                }
                echo 'warning';
            }
        }
    }
    //echo htmlspecialchars($_SERVER["PHP_SELF"]);

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