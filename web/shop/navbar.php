<nav>
    <?php $uri = $_SERVER['REQUEST_URI']; ?>
    <a href="home.html" <?php if ($uri == "/shop/home.html") { echo "class='active'";} ?>>Home</a>
    <a href="cart.html" <?php if ($uri == "/shop/cart.html") { echo "class='active'";} ?>>Cart</a>
    <a href="" <?php if ($uri == "") { echo "class='active'";} ?>>New Tab</a>
    <a href="" <?php if ($uri == "") { echo "class='active'";} ?>>New Tab</a>
</nav>