<?php 
//    if(!isset($_SESSION['cart'])){
//        $_SESSION['cart'] = array();
//    }

    $_SESSION['cart'][] = $_POST['name'];
    echo $_SESSION['cart'][0];
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
        <p>so what happened? <?php echo $_SESSION['cart'][] ?></p>
    </body>
</html>