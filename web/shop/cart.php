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
                    echo $num;
                    echo "</h2>";
        
                    if (num == 0) {
                        echo "<p>You have no itmes in your cart.</p><a class=\"detail\" href=\"/shop/home.php\">Continue browsing?</a>";
                    }
                    else {
                        echo "<table><tr>";
                        foreach ($_SESSION['cart'] as $value) {
                            echo "<td>";
                            if ($value === "Deku Mask") {
                                echo "<p>Deku Mask</p>
                                    <img id=\"pic\" src=\"https://pre00.deviantart.net/2677/th/pre/f/2012/030/0/6/deku_mask_by_blueamnesiac-d4o3mwf.png\" alt=\"Zelda Deku Mask\">";
                            }
                            echo "</td>";
                        }
                    }
                ?>
        </div>
        
        <?php require "bottom.php"?>
    </body>
</html>