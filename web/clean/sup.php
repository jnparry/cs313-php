<?

$email = $_POST['email'];
$name = $_POST['name']; // only returns if admin checked. Value is 'admin'
$password = $_POST['password'];

if ($_POST['admin'])
    $admin = 'true';
else
    $admin = 'false';

// ensure values are filled out
if (!$name || $name == "" || !$password || $password == "" || !$email || $email == "")
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

$query = 'INSERT INTO users(name, email, password, admin) VALUES(:name, :email, :password, :admin)';
$statement = $db->prepare($query);
$statement->bindValue(':name', $name);
$statement->bindValue(':email', $email);
$statement->bindValue(':password', $hashedPassword);
$statement->bindValue(':admin', $admin);
$statement->execute();

// redirect to the sign in page
header("Location: signin.php");
die();

?>