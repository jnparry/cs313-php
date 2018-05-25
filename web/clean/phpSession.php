<?php 
    session_start();

    $_SESSION['project'] = $_POST['yourItem'];

    header("Location: https://stormy-cove-35722.herokuapp.com/clean/rooms.php"); /* Redirect browser */
    exit();
?>