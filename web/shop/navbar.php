<nav>
    <h1 id="title">Masked Majora</h1>
    <?php $uri = $_SERVER['REQUEST_URI']; ?>
    <a href="home.php" <?php if ($uri == "/shop/home.php") { echo "class='active'";} ?>>Masks</a>
    <a href="cart.php" <?php if ($uri == "/shop/cart.php") { echo "class='active'";} ?>>Cart</a>
    <a href="checkout.php" <?php if ($uri == "/shop/checkout.php") { echo "class='active'";} ?>>Check Out</a>
    <a href="">About Us</a>
</nav>