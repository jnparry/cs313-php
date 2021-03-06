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
    
	$query = "SELECT * FROM users WHERE email = :email";
	$statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $result = $statement->execute();

    if ($result) {
		$row = $statement->fetch();
		$hashedPasswordFromDB = $row['password'];
        
		if (password_verify($password, $hashedPasswordFromDB))
		{
			$_SESSION['user'] = $row['name'];
            $_SESSION['userId'] = $row['id'];
            $_SESSION['admin'] = $row['admin'];
			header("Location: home.php");
			die();
		} else {
			$badLogin = true;
		}
	}
	else
	{
		$badLogin = true;
	}
}

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
                    echo "<p style='color: red;'>Incorrect email or password!</p><br /><br />\n";
                }
            ?>

            <h1>Sign In</h1>

            <form id="signin" action="signin.php" method="post">
                <input type="text" id="email" name="email" placeholder="Email" required autofocus>
                <label for="email">Email</label>
                <br /><br />

                <input type="password" id="password" name="password" placeholder="Password" required>
                <label for="password">Password</label>
                <br /><br />

                <input type="submit" value="Sign In" />
            </form>
            <br /><br />
            Don't have an account? <a href="signup.php">Sign up</a> here.
        </section>
    </body>
</html>