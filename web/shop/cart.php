<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Shop | Cart</title>
        <link rel="stylesheet" href="index.css">
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    </head>
    
    <body>
        <?php require "navbar.php"?>
        <h1>Cart</h1>
        <p>You ordered: 
            <?php
                echo count($_SESSION['cart']);
                foreach ($_SESSION['cart'] as $value) {
                    echo "<p>";
                    echo $value;
                    echo "</p>";
                }
            ?>
        </p>
    </body>
</html>