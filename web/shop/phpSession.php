<?php 
//    if(!isset($_SESSION['cart'])){
//        $_SESSION['cart'] = array();
//    }

    $var = $_POST["passedValue"];

    var_dump($_SESSION);
    if (!(isset($var))) {
        echo "Not set.";
    }
    echo "cart is: ";
    echo $_SESSION["cart"];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Shop | Home</title>
        <link rel="stylesheet" href="index.css">
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    </head>
    
    <body>
        <p>so what happened?</p>
    </body>
</html>