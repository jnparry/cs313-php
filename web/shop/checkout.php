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
                <input type="text" name="form-info" id="fname" onload="setFocus()" placeholder="First Name" pattern="[a-zA-Z]*" title="First name - letters only." required>
                <br><br>
                <input type="text" name="form-info" id="lname" placeholder="Last Name" pattern="[a-zA-Z]*" title="Last name - letters only." required>
                <br><br>
                <input type="text" id="street" name="address" placeholder="Street" pattern="\d+\w*\s*(?:[\-\/]?\s*)?\d*\s*\d+\/?\s*\d*\s*" title="Street address." required>
                <br>
                <input type="text" id="city" name="address" placeholder="City, State" title="City, State - ex: Rexburg, ID" pattern="[a-zA-Z]+[]?[a-zA-Z]+,[ ][A-Z]{2}" required>
                <br>
                <input type="text" id="zip" name="address" placeholder="Zipcode" pattern="[0-9]{5}" title="Zipcode - 5 numbers only." required>
                <br><br>

                <button type="reset">Reset</button>
                <input type="submit">Submit
            </form>
        </div>
        
        <?php require "bottom.php"?>
    </body>
    <script src="checkout.js"></script>
</html>