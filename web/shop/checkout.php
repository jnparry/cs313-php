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
            <form id="myForm">
                <p id="invalid"></p>
                <h2>Customer Information</h2>
                <br>
                <input type="text" name="form-info" id="fname" onload="setFocus()" placeholder="First Name" pattern="[a-zA-Z]*" required>
                <br><br>
                <input type="text" name="form-info" id="lname" placeholder="Last Name" pattern="[a-zA-Z]*" required>
                <br><br>
                <textarea id="street" rows="1" cols="50" name="address" placeholder="Street" required></textarea>
                <br>
                <textarea id="city" rows="1" cols="50" name="address" placeholder="City, State" pattern="[A-Za-z]+,[ ]?[A-Za-z]+{2,}" required></textarea>
                <br>
                <textarea id="zip" rows="1" cols="50" name="address" placeholder="Zipcode" pattern="\d\d\d\d\d" required></textarea>
                <br><br>

                <button type="reset">Reset</button>
                <input type="submit">Submit</button>
            </form>
        </div>
        
        <?php require "bottom.php"?>
    </body>
    <script src="checkout.js"></script>
</html>