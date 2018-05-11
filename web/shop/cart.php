<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Shop | Cart</title>
        <link rel="stylesheet" href="index.css">
        <script type="index.css"></script>
    </head>
    
    <body>
        <?php require "navbar.php"?>
        <div id="header">
            <h1>Cart</h1>
        </div>
        
        <div id="browse">
            <p>Items in your cart: 
                <?php
                    echo count($_SESSION['cart']);
                    foreach ($_SESSION['cart'] as $value) {
                        echo "<p>";
                        echo $value;
                        echo "</p>";
                    }
                ?>
            </p>
        </div>
        
        <?php require "bottom.php"?>
    </body>
</html>