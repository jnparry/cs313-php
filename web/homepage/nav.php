<nav>
    <a href="home.php" <?php if ($uri == "/homepage/home.php") { echo "class='active'";} ?>>Home</a>
    <a href="about.php" <?php if ($uri == "/homepage/about.php") { echo "class='active'";} ?>>About</a>
    <a href="assign.php" <?php if ($uri == "/homepage/assign.php") { echo "class='active'";} ?>>Assignments</a>
    <a class="active" <?php if ($uri == "/homepage/contact.php") { echo "class='active'";} ?>>Contact</a>
</nav>