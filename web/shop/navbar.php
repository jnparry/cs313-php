<nav>
    <?php $uri = $_SERVER['REQUEST_URI']; ?>
    <a href="home.html" <?php if ($uri == "/shop/home.html") { echo "class='active'";} ?>>Masks</a>
    <a href="cart.html" <?php if ($uri == "/shop/cart.html") { echo "class='active'";} ?>>Cart</a>
    <a href="checkout.html" <?php if ($uri == "/shop/checkout.html") { echo "class='active'";} ?>>Check Out</a>
    <a href="">About Us</a>
</nav>