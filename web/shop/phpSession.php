<?php 
//    if(!isset($_SESSION['cart'])){
//        $_SESSION['cart'] = array();
//    }

    $bar = isset($_POST["name"]) ? $_POST["name"] : null;

    var_dump($_SESSION);
    if (!(isset($bar))) {
        echo "Not set.";
    }
    else {
        echo $bar;
    }
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