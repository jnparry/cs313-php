<?

$email = $_POST['email'];
$name = $_POST['name'];
$password = $_POST['password'];

// ensure values are filled out
if (!isset($name) || $name == "" || !isset($password) || $password == "" || !isset($email || $email == ""))
{
	header("Location: signup.php");
	die();
}

// no HTML in name
$name = htmlspecialchars($name);

// hashed the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

require("dbConnect.php");
$db = get_db();

$query = 'INSERT INTO users(email, password, name) VALUES(:email, :password, :name)';
$statement = $db->prepare($query);
$statement->bindValue(':email', $email);
$statement->bindValue(':password', $hashedPassword);
$statement->bindValue(':name', name);
$statement->execute();

// redirect to the sign in page
header("Location: signin.php");
die();

?>