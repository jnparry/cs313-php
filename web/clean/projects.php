<?php

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
        <title>Cleaning Schedule | Project</title>
        <link rel="stylesheet" href="home.css">
        <script src="home.js"></script>
    </head>
    
    <body>
        <?php require "user.php"?>
        <h2>Current Cleaning Projects</h2>
        <ul>
            <?php
//                $query = "SELECT name FROM projects";
//        
//                $statement = $db->prepare($query);
//                $statement->bindValue("")
                foreach ($db->query('SELECT name FROM projects') as $row)
                {
                  echo 'Project: ' . $row['name'];
                }
            ?>
            <li>Spring Semester <button>edit</button></li>
            <li>Summer Semester <button>edit</button></li>
            <li>Fall Semester <button>edit</button></li>
        </ul>
    </body>
</html>