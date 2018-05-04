<nav>
    <a href="home.php" <?php if ($uri == "/ta02/home.php") { echo "class='active'";} ?>>Home</a>
    <a href="about.php" <?php if ($uri == "/ta02/about.php") { echo "class='active'";} ?>>About</a>
    <a href="assign.php" <?php if ($uri == "/ta02/assign.php") { echo "class='active'";} ?>>Assignments</a>
    <a class="active <?php if ($uri == "/ta02/contact.php") { echo "class='active'";} ?>>Contact</a>
</nav>