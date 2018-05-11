<?php 
    session_start();
    
    if(isset($_SESSION['cart'])){

        $item = $_POST['yourItem'];
        unset($_SESSION['cart'][$item]);
    }

    header("Location: https://stormy-cove-35722.herokuapp.com/shop/cart.php"); /* Redirect browser */
    exit();
?>