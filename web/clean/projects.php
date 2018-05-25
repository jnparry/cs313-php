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
                foreach ($db->query('SELECT * FROM projects') as $row)
                {
                    echo "<li>" . $row['name'] . "<input type='button' value='edit'>";
                        
                    if ($row['iscomplete'] && $row['date']) {
                        echo "<p>Cleaning completed " . $row['date'] . "</p>";
                    }
                    
                    echo "</li>";
                }
            ?>
        </ul>
    </body>
</html>