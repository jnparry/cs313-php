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
            if (!(isset($_SESSION["count"]))) {
                $_SESSION["count"] = 0;
            }
            $_SESSION["count"]++;
        ?>
        
        <p>You have visited this page <?php echo $_SESSION["count"]; ?> time(s)</p>
    </body>
</html>
    
    