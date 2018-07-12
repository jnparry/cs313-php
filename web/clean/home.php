<?php 
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cleaning Schedule | Home</title>
        <link rel="stylesheet" href="home.css">
        <script src="home.js"></script>
    </head>
    
    <body>
        <?php require "user.php"?>
        <section class="content">
            <h2>Recent Cleaning Projects</h2>
            <p>insert into or pictures or something here.</p>
            <h3>This data is coming soon.</h3>
            
            <section class="bottomNav">
            <?
            if (isset($_SESSION['user']))
                echo "<button onclick='viewProjects()'>View Projects</button>";
            else {
                echo "<button onclick='redirectToSignIn()'>Sign In</button>";
                echo "<button onclick='redirectToSignUp()'>Sign Up</button>";
            }
            ?>
            </section>
        </section>
    </body>
</html>