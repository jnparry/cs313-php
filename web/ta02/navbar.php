<link rel="stylesheet" href="index.css">

<?php 
    $uri = $_SERVER['REQUEST_URI']; 
?>

<h1>PurchasePlanets.com</h1>

<nav>
    <a href="home.php" <?php if ($uri == "/ta02/home.php") { echo "class='active'";} ?>>Home</a>
    <a href="about-us.php">About Us</a>
    <a href="login.php">Login</a>
</nav>
