if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}

$_SESSION['cart'][] = $_POST['passedVal'];