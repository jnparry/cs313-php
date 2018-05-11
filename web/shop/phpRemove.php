<?php 
    session_start();
    
    if(isset($_SESSION['cart'])){

        $item = $_POST['yourItem'];

//foreach($_SESSION as $key => $value) {
//    unset($_SESSION[$key]);
//}

        $key = array_search($_GET[$item],$_SESSION['cart']);
        if ($key!==false) {
            echo "key";
            echo $key;
            echo "item";
            echo $item;

            unset($_SESSION['cart'][$key]);
            $_SESSION["name"] = array_values($_SESSION["name"]);
        }

        
//        foreach ($_SESSION['cart'] as $value) {
//            if ($value === $item) {
//                unset($_SESSION['cart'][$value]);
//                $_SESSION["cart"] = array_values($_SESSION["cart"]);
//                echo "unset";
//                echo $value;
//                echo $item;
//            }
//            else {
//                echo "not th same?";
//                echo $value;
//                echo $item;
//            }
//        }

        foreach ($_SESSION['cart'] as $value) {
            echo "Items are: ";
            echo $value;
        }
    }

//    header("Location: https://stormy-cove-35722.herokuapp.com/shop/cart.php"); /* Redirect browser */
//    exit();
?>