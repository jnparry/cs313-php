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
        
        <div id="browse" class="fullPage">
            <h2>Items in your cart: 
                <?php
                    $num = count($_SESSION['cart']);
                    echo $num;
                ?>
            </h2>
            
            <?php

                if ($num == 0) {
                    echo "<p>You have no itmes in your cart.</p><a class=\"detail\" href=\"/shop/home.php\">Continue browsing?</a>";
                }
                else {
                    echo "<table>";
                    foreach ($_SESSION['cart'] as $value) {
                        echo "<tr><td>";
                        if ($value === "Deku Mask") {
                            echo "<p>Deku Mask</p><img id=\"resultPic\" src=\"https://pre00.deviantart.net/2677/th/pre/f/2012/030/0/6/deku_mask_by_blueamnesiac-d4o3mwf.png\" alt=\"Zelda Deku Mask\"><p>$49.99</p>";
                        }
                        else if ($value === "Deity Mask") {
                            echo "<p>Deity Mask</p><img id=\"resultPic\" src=\"https://pre00.deviantart.net/fcbf/th/pre/f/2012/032/2/6/fierce_deity__s_mask_by_blueamnesiac-d4ob1ax.png\" alt=\"Zelda Diety Mask\"><p>$49.99</p>";
                        }
                        else if ($value === "Keaton Mask") {
                            echo "<p>Keaton Mask</p><img id=\"resultPic\" src=\"https://orig00.deviantart.net/2de5/f/2012/020/8/6/keaton_mask_by_blueamnesiac-d4n04xk.png\" alt=\"Zelda Keaton Mask\"><p>$49.99</p>";
                        }
                        else if ($value === "Kafei Mask") {
                            echo "<p>Kafei Mask</p><img id=\"resultPic\" src=\"https://pre00.deviantart.net/80e5/th/pre/f/2012/025/d/7/kafei__s_mask_by_blueamnesiac-d4nlgmh.png\" alt=\"Zelda Kafei Mask\"><p>$49.99</p>";
                        }
                        else if ($value === "Gorgon Mask") {
                            echo "<p>Goron Mask</p><img id=\"resultPic\" src=\"https://pre00.deviantart.net/4b94/th/pre/f/2012/031/3/5/goron_mask_by_blueamnesiac-d4o7875.png\" alt=\"Zelda Goron Mask\"><p>$49.99</p>";
                        }
                        else if ($value === "Majora's Mask") {
                            echo "<p>Majora's Mask</p><img id=\"resultPic\" src=\"https://pre00.deviantart.net/b9bb/th/pre/f/2012/036/0/1/majora__s_mask_by_blueamnesiac-d4osuud.png\" alt=\"Zelda Majora's Mask\"><p>$49.99</p>";
                        }
                        echo "</td></tr>";
                    }
                }
            ?>
        </div>
        <?php require "bottom.php"?>
    </body>
</html>