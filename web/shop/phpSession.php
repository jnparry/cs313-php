<?php 
    session_start();
    
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }

    $item = $_POST['yourItem'];
 
    $_SESSION['cart'][] = $item;

    foreach ($_SESSION['cart'] as $value) {
        echo $value;
        echo "whatt";
        echo $value;
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
        <p>so what happened?
            <?php
                echo count($_SESSION['cart']);
                foreach ($_SESSION['cart'] as $value) {
                    echo $value;
                }
            ?>
        </p>
    </body>
</html>