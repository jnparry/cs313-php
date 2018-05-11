<?php 
    session_start();
    
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }

    $item = $_POST['yourItem'];

    if (count($_SESSION['cart']) == 0) {
        $_SESSION['cart'][] = $item;
    }
    else {
        $add = true;
        foreach ($_SESSION['cart'] as $value) {
            if ($value === $item) {
                $add = false;
            }
        }
        if ($add) {
            $_SESSION['cart'][] = $item;
        }
    }

    header("Location: https://stormy-cove-35722.herokuapp.com/shop/home.php"); /* Redirect browser */
    exit();
?>