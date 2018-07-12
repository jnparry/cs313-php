<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cleaning Schedule | Sign Up</title>
        <link rel="stylesheet" href="home.css">
        <script src="home.js"></script>
    </head>
    
    <body>
        <?php require "user.php"?>
        <section class="content">
            <h2>Sign Up</h2>
            <form id="signup" action="sup.php" method="post">
                <input type="text" id="name" name="name" placeholder="Name">
                <label for="user">Name</label>
                <br /><br />

                <input type="text" id="email" name="email" placeholder="Email">
                <label for="user">Email</label>
                <br /><br />
                
                <input type="password" id="password" name="password" placeholder="password">
                <label for="password">Password</label>
                <br /><br />

                <input type="submit" value="Sign Up" />
            </form>
            
            Already have an account? <a href="signin.php">Sign in</a> here.
        </section>
    </body>
</html>