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
            <h2>Items in your cart: 
                <?php
                    $num = count($_SESSION['cart']);
                    echo num;
                    echo "</h2>";
        
                    if (num == 0) {
                        echo "<p>You have no itmes in your cart. <a href=\"/shop/home.php\">Continue browsing?</a></p>";
                    }
                    else {
                        foreach ($_SESSION['cart'] as $value) {
                            echo "<p>";
                            echo $value;
                            echo "</p>";
                        }
                    }
                ?>
        </div>
        
        <?php require "bottom.php"?>
    </body>
</html>