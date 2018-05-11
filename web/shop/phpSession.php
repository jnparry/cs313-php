<?php 
//    if(!isset($_SESSION['cart'])){
//        $_SESSION['cart'] = array();
//    }

    $_SESSION['cart'][] = $_POST['name'];
    echo "heyheyhey";
    echo count($_SESSION['cart']);
    for ($i = 0; $i < count($_SESSION['cart'])) {
        echo $_SESSION['cart'][$i];
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