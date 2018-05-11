<?php
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $street = $_POST["street"];
    $city = $_POST["city"];
    $zip = $_POST["zip"];

    echo $fname;
    echo $lname;
    echo $street;
    echo $city;
    echo $zip;
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Shop | Confirmation</title>
        <link rel="stylesheet" href="index.css">
    </head>
    
    <body>
        <?php require "navbar.php"?>
        <div id="header">
            <h1>Confirmation</h1>
        </div>
        <?php require "bottom.php"?>
    </body>
</html>