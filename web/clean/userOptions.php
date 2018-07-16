<?
    session_start();
?>

<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>    
    <?
    if (isset($_SESSION['user'])) {
        echo "<a>Welcome " . $_SESSION['user'] . "</a>";
        echo "<a href='/clean/home.php'>Home</a>";
        echo "<a href='/clean/projects.php'>View Projects</a>";
        echo "<a href='#'>Settings</a>";
        echo "<a href='/clean/signout.php'>Sign Out</a>";
    } else {
        echo "<a href='/clean/home.php'>Home</a>";
        echo "<a href='/clean/signin.php'>Sign In</a>";
    }
    ?>
</div>