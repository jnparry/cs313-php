<?php
    session_start();

    if (!isset($_SESSION['user'])) {
        header("Location: /clean/signin.php");
        die();
    }

    require("dbConnect.php");
    $db = get_db();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cleaning Schedule | Project</title>
        <link rel="stylesheet" href="home.css">
        <script src="home.js"></script>
    </head>
    
    <body>
        <?php require "user.php"?>
        <section class="content">
            <h2>Current Cleaning Projects</h2>
            <?php
                if ($_SESSION["error"]) {
                    echo "<p style='color: red; text-align: center;'>*Error: " . $_SESSION["msg"] . "</p>";
                    $_SESSION["error"] = false;
                }
            ?>

            <form action="phpSession.php" method="post" name="projects">
                <ul>
                    <?php
                        $statement = $db->prepare("SELECT * FROM projects ORDER BY id");
                        $statement->execute();

                        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                            echo "<li>";
                            echo "<p class='first'><strong>" . $row['name'] . "</strong></p>";

                            if ($row['iscomplete'] && $row['date']) {
                                echo "<p class='middle'>Cleaning completed " . $row['date'] . "</p>";
                            }
                            else {
                                echo "<p class='middle'>Cleaning incomplete.</p>";
                            }

                            echo "<button class='last' type='submit' value='" . $row['id'] . "' name='projectId'>View</button>";
                            echo "<button class='last' type='button' onclick=\"showForm('hiddenForm', 'txtTitle', '" . $row['name'] . "', '" . $row['id'] . "')\">Edit</button>";
                            echo "</li>";
                        }
                    ?>
                </ul>
            </form>

            <section class="bottomNav">
                    <button onclick="viewHome()">&#10094; Back to Home</button>
                    <button type="button" onclick="showForm('hiddenForm', 'txtTitle', 'add')">Add Project</button>

                <form action="insert.php" method="post" name="add" id="hiddenForm" style="display: none;">
                    <br/><br/><br/>
                    <label id="anchor" for="txtTitle">Project Name: </label>	
                    <input type="text" id="txtTitle" name="pTitle">
                    <br/><br/>
                    <button type="submit" id="submit">Submit</button>
                    <button type="submit" id="remove" name="removeP" style="display: none;">Delete</button>
                </form>

            </section>
        </section>
    </body>
</html>