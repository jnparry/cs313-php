<?php
    session_start();

    if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
            echo "<script type='text/javascript'>alert('Nothing in cart. Please select an item before checking out.');</script>";
//        header("Location: https://stormy-cove-35722.herokuapp.com/shop/home.php"); /* Redirect browser */
//        exit();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Shop | Check Out</title>
        <link rel="stylesheet" href="index.css">
    </head>
    
    <body>
        <?php require "navbar.php"?>
        <div id="header">
            <h1>Check Out</h1>
        </div>
        
        <div id="browse">
            <form id="myForm" action="confirm.php" method="post">
                <p id="invalid"></p>
                <h2>Customer Information</h2>
                <br>
                <input type="text" name="fname" id="fname" onload="setFocus()" placeholder="First Name" pattern="[a-zA-Z]*" title="First name - letters only." required>
                <br><br>
                <input type="text" name="lname" id="lname" placeholder="Last Name" pattern="[a-zA-Z]*" title="Last name - letters only." required>
                <br><br>
                <input type="text" id="street" name="street" placeholder="Street" pattern="[a-zA-Z\w\s]*" title="Street address." required>
                <br>
                <input type="text" id="city" name="city" placeholder="City, State" title="City, State - ex: Rexburg, ID" pattern="[a-zA-Z]+[ ]?[a-zA-Z]+,[ ][A-Z]{2}" required>
                <br>
                <input type="text" id="zip" name="zip" placeholder="Zipcode" pattern="[0-9]{5}" title="Zipcode - 5 numbers only." required>
                <br><br>

                <input type="button" value="Return to cart" id="cartBtn" onclick="document.location.href='https://stormy-cove-35722.herokuapp.com/shop/cart.php';">
                <button type="reset">Reset</button>
                <input type="submit" value="Complete purchase">
            </form>
        </div>
        
        <?php require "bottom.php"?>
    </body>
    <script src="checkout.js"></script>
</html>