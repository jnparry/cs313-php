<?php

session_start();

if (!isset($_SESSION['project'])) {
    header("Location: /clean/home.php");
    die();
}

if (!isset($_SESSION['room'])) {
    header("Location: /clean/projects.php");
    die();
}

$projectId = $_SESSION['project'];
$roomId = $_SESSION['room'];

require("dbConnect.php");
$db = get_db();
