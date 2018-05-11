<?php 
    session_start();
    
    if(isset($_SESSION['cart'])){

        $item = $_POST['yourItem'];

        $key = array_search($item,$_SESSION['cart']);
        if ($key!==false) {
            unset($_SESSION['cart'][$key]);
            $_SESSION["name"] = array_values($_SESSION["name"]);
        }
        else {
            echo "Error?";
        }

        foreach ($_SESSION['cart'] as $value) {
            echo "Items are: ";
            echo $value;
        }
    }

//    header("Location: https://stormy-cove-35722.herokuapp.com/shop/cart.php"); /* Redirect browser */
//    exit();
?>