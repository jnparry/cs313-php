<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>My Title Page</title>
        <link rel="stylesheet" href="">
        <script src=""></script>
    </head>
    
    <body>
        <?php
            if (isset($_SESSION["count"])) {
                echo "This is cool it's set";
            }
            else {
                echo "Not set yet";
            }
        ?>
        <p>You have visited this page times</p>
    </body>
</html>
    
    