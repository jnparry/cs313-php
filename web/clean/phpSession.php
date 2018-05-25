<?php 
    session_start();

    if (isset($_POST['projectId'])) {
        $_SESSION['project'] = $_POST['projectId'];
    } elseif (isset($_POST['roomId'])) {
        $_SESSION['room'] = $_POST['roomId'];
    }

    header("Location: https://stormy-cove-35722.herokuapp.com/clean/rooms.php"); /* Redirect browser */
    exit();
?>