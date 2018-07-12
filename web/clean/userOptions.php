<?
    session_start();
?>

<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="/clean/home.php">Home</a>
    
    <?
    if (isset($_SESSION['user'])) {
        echo "<a href='/clean/projects.php'>View Projects</a>";
        echo "<a href='#'>Settings</a>";
        echo "<a href='#'>Logout</a>";
    } else {
        echo "<a href='#'>Login</a>";
    }
    ?>
</div>