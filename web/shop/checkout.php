<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Shop | Check Out</title>
        <link rel="stylesheet" href="index.css">
        <script src="index.css"></script>
    </head>
    
    <body>
        <?php require "navbar.php"?>
        <div id="header">
            <h1>Check Out</h1>
        </div>
        
        <div id="browse">
            <p id="invalid"></p>
            <h2>Customer Information</h2>
            <br>
            First Name:
            <input type="text" name="form-info" id="fname" onload="setFocus()">
            <br><br>
            Last Name:
            <input type="text" name="form-info" id="lname">
            <br><br>
            Address:
            <textarea id="address" rows="1" cols="50" name="address" placeholder="street, city, state, zip"></textarea>
            <br><br>
            Phone Number:
            <input type="text" name="form-info" placeholder="xxx-xxx-xxxx" id="number" onblur="blurNumber()">
            <p id="invalid-number"></p>
            <br>
            Credit Card Type: <br>
            <div id="creditcard">
              <input type="radio" name="card" value="visa"       id="visa">Visa<br>
              <input type="radio" name="mc"   value="mastercard" id="mc">MasterCard<br>
              <input type="radio" name="ae"   value="amex"       id="ae">AmericanExpress<br>
            </div>
            <br><br>
            Card Number:
            <input type="text" name="form-info" id="cardnumber" onblur="blurCard()">
            <p id="invalid-cardnumber"></p>
            <br>
            Expiration Date:
            <input type="text" name="form-info" placeholder="MM/YYYY" id="expiration" onblur="blurExp()">
            <p id="invalid-expiration"></p>
            <br>
            <button type="reset">Reset</button>
            <button type="button" onclick="return validate()">Submit</button>
        </div>
        
        <?php require "bottom.php"?>
    </body>
    <script src="checkout.js"></script>
</html>