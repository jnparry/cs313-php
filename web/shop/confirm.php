<?php
    session_start();

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $street = $_POST["street"];
    $city = $_POST["city"];
    $zip = $_POST["zip"];
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
        
        <h2>Purchase Proccessed</h2>
    
        <div id="browse">
            <p>Items Purchased:</p>
            <?php
                echo "<table>";
                foreach ($_SESSION['cart'] as $value) {
                    echo "<tr><td>";
                    if ($value === "Deku Mask") {
                        echo "<p>Deku Mask</p><img id=\"confirmPic\" src=\"https://pre00.deviantart.net/2677/th/pre/f/2012/030/0/6/deku_mask_by_blueamnesiac-d4o3mwf.png\" alt=\"Zelda Deku Mask\"><p>$49.99</p>";
                    }
                    else if ($value === "Deity Mask") {
                            echo "<p>Deity Mask</p><img id=\"confirmPic\" src=\"https://pre00.deviantart.net/fcbf/th/pre/f/2012/032/2/6/fierce_deity__s_mask_by_blueamnesiac-d4ob1ax.png\" alt=\"Zelda Diety Mask\"><p>$49.99</p>";
                    }
                    else if ($value === "Keaton Mask") {
                        echo "<p>Keaton Mask</p><img id=\"confirmPic\" src=\"https://orig00.deviantart.net/2de5/f/2012/020/8/6/keaton_mask_by_blueamnesiac-d4n04xk.png\" alt=\"Zelda Keaton Mask\"><p>$49.99</p>";
                    }
                    else if ($value === "Kafei Mask") {
                        echo "<p>Kafei Mask</p><img id=\"confirmPic\" src=\"https://pre00.deviantart.net/80e5/th/pre/f/2012/025/d/7/kafei__s_mask_by_blueamnesiac-d4nlgmh.png\" alt=\"Zelda Kafei Mask\"><p>$49.99</p>";
                    }
                    else if ($value === "Goron Mask") {
                        echo "<p>Goron Mask</p><img id=\"confirmPic\" src=\"https://pre00.deviantart.net/4b94/th/pre/f/2012/031/3/5/goron_mask_by_blueamnesiac-d4o7875.png\" alt=\"Zelda Goron Mask\"><p>$49.99</p>";
                    }
                    else if ($value === "Majora's Mask") {
                        echo "<p>Majora's Mask</p><img id=\"confirmPic\" src=\"https://pre00.deviantart.net/b9bb/th/pre/f/2012/036/0/1/majora__s_mask_by_blueamnesiac-d4osuud.png\" alt=\"Zelda Majora's Mask\"><p>$49.99</p>";
                    }
                echo "</td></tr>";
                }
                echo "</table>";
                $total = (49.99 * count($_SESSION['cart']));
                echo "<p id='total'>";
                echo "Amount: $" . $total;
                echo "</p>";
                echo "<p id='ship'>Shipping to: " . "<br/>" . 
                    $fname . " " . $lname . "<br/>" . 
                    $street. "<br/>" .
                    $city . ", " . zip . "</p>";
            ?>
        </div>
        
        <?php require "bottom.php"?>
    </body>
</html>