<?php

session_start();

$projectId = $_SESSION['project'];

try {
    $dbUrl = getenv('HEROKU_POSTGRESQL_CRIMSON_URL');
    $dbopts = parse_url($dbUrl);
    
    $dbHost = $dbopts["host"];
    $dbPort = $dbopts["port"];
    $dbUser = $dbopts["user"];
    $dbPassword = $dbopts["pass"];
    $dbName = ltrim($dbopts["path"],'/');
    
    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
}
catch (PDOException $ex){
  echo 'Error!: ' . $ex->getMessage();
  die();
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cleaning Schedule | Room</title>
        <link rel="stylesheet" href="home.css">
        <script src="home.js"></script>
    </head>
    
    <body>
        <?php require "user.php"?>
        <h2>
            <?php
                foreach ($db->query("SELECT name FROM projects WHERE id = '$projectId'") as $row) {
                    echo $row['name'];
                }
            ?>
        </h2>
        
        <button onclick="viewProjects()">Back to Projects</button>
        <button type="button" onclick="soon()">Add Room</button>
        
        <form action="phpSession.php" method="post" name="rooms">
            <ul>
                <?php
                foreach ($db->query("SELECT * FROM rooms WHERE projectsid = '$projectId'") as $row) {
                    echo "<li>";

                    echo "<p class='first'><strong>" . $row['name'] . "</strong></p>";

                    echo "<p class='middle'></p>";
                    
                    echo "<button class='last' type='submit' value='" . $row['id'] . "' name='viewRoom'>View</button>";
                    
                    echo "<button class='last' type='submit' value='" . $row['id'] . "' name='roomId'>Edit</button>";

                    echo "</li>";
                }
                ?>
            </ul>
        </form>
    </body>
</html>