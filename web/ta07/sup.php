<!--Sign up page-->

<?php

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Sign-Up</title>
        <link rel="stylesheet" href="home.css">
        <script src="home.js"></script>
    </head>
    
    <body>
        <h1>Sign-up</h1>
        
        <form action="create.php" method="post">
            <label for="username">Username: </label>
            <input type="text" id="username" name="username">
            <label for="password">Password: </label>
            <input type="password" id="password" name="password">
            <button type="submit">Sign-up</button>
        </form>
    </body>
</html>