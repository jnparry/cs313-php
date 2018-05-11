<?php
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $street = $_POST["street"];
    $city = $_POST["city"];
    $zip = $_POST["zip"];

    print_r($_POST);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Shop | Confirmation</title>
        <link rel="stylesheet" href="index.css">
        <script src="index.css"></script>
    </head>
    
    <body>
        <?php require "navbar.php"?>
        <div id="header">
            <h1>Confirmation</h1>
        </div>
        <?php require "bottom.php"?>
    </body>
</html>