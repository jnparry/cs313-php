<link rel="stylesheet" href="index.css">

<?php 
    $uri = $_SERVER['REQUEST_URI']; 
?>

<h1>PurchasePlanets.com</h1>

<nav>
    <a href="home.php" <?php if ($uri == "/ta02/home.php") { echo "class='active'";} ?>>Home</a>
    <a href="about-us.php" <?php if ($uri == "/ta02/about-us.php") { echo "class='active'";} ?>>About Us</a>
    <a href="login.php" <?php if ($uri == "/ta02/login.php") { echo "class='active'";} ?>>Login</a>
</nav>
