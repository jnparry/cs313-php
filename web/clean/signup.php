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
            <h1>Sign Up</h1>
            <form id="signup" action="sup.php" method="post">
                <input type="text" id="name" name="name" placeholder="Name" required autofocus>
                <label for="user">Name</label>
                <br /><br />

                <input type="text" id="email" name="email" placeholder="Email" required>
                <label for="user">Email</label>
                <br /><br />
                
                <input type="password" id="password" name="password" placeholder="Password" required>
                <label for="password">Password</label>
                <br /><br />
                
                <input type="checkbox" name="admin" value="admin">
                <label for="admin">Request admin privileges</label>
                <br /><br />

                <input type="submit" value="Sign Up" />
            </form>
            
            <br /><br />
            Already have an account? <a href="signin.php">Sign in</a> here.
        </section>
    </body>
</html>