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
            <h2>David O. McKay Library Cleaning</h2>
            
            <?php
            if (isset($_SESSION['user']))
                echo "Welcome " . $_SESSION['user'];
            else {
                echo "Weclome. Sign in or sign up below.";
            }
            ?>
            
            <img id="homepage" alt="David O. McKay Library" src="http://photo.byui.edu/img/s/v-3/p1706217686-3.jpg">
            
            <section class="bottomNav">
            <?php
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