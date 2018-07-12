<?php

session_start();
$badLogin = false;

if (isset($_POST['email']) && isset($_POST['password']))
{
	// they have submitted a username and password for us to check
	$email = $_POST['email'];
	$password = $_POST['password'];
    
	// Connect to the DB
	require("dbConnect.php");
	$db = get_db();
    
	$query = 'SELECT password, name FROM users WHERE email = :email';
	$statement = $db->prepare($query);
	$statement->bindValue(':email', email);
	$result = $statement->execute();
	if ($result)
	{
		$row = $statement->fetch();
		// now check to see if the hashed password matches
		if (password_verify($password, $row['password']))
		{
            $badLogin = false;
			// password was correct, put the user on the session, and redirect to home
			$_SESSION['user'] = $row['name'];
			header("Location: home.php");
			die(); // we always include a die after redirects.
		}
		else
		{
			$badLogin = true;
            echo "1";
		}
	}
	else
	{
        echo "2";
		$badLogin = true;
	}
}
// If we get to this point without having redirected, then it means they
// should just see the login form.
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cleaning Schedule | Sign In</title>
        <link rel="stylesheet" href="home.css">
        <script src="home.js"></script>
    </head>

    <body>
        <?php require "user.php"?>
        <section class="content">
            <?php
                if ($badLogin) {
                    echo "Incorrect email or password!<br /><br />\n";
                }
            ?>

            <h1>Sign In</h1>

            <form id="signin" action="signin.php" method="post">
                <input type="text" id="email" name="email" placeholder="Email">
                <label for="email">Email</label>
                <br /><br />

                <input type="password" id="password" name="password" placeholder="Password">
                <label for="password">Password</label>
                <br /><br />

                <input type="submit" value="Sign In" />
            </form>
            <br /><br />
            Or <a href="signup.php">Sign up</a> for a new account.
        </section>
    </body>
</html>