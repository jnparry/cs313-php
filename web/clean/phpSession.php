<?php 
    session_start();

    if (isset($_POST['projectId'])) {
        $_SESSION['project'] = $_POST['projectId'];

        /* Redirect browser */
        header("Location: https://stormy-cove-35722.herokuapp.com/clean/rooms.php");
        exit();
    }  else if (isset($_POST['viewRoom'])) {
        $_SESSION['room'] = $_POST['viewRoom'];
        
        /* Redirect browser */
        header("Location: https://stormy-cove-35722.herokuapp.com/clean/view.php");
        exit();
    } elseif (isset($_POST['bookshelfId'])) {
        $_SESSION['bookshelf'] = $_POST['bookshelfId'];
        // Add bookshelves later
    } elseif (isset($_POST['roomId'])) {
        $_SESSION['room'] = $_POST['roomId'];
        
        /* Redirect browser */
        header("Location: https://stormy-cove-35722.herokuapp.com/clean/bookshelves.php");
        exit();
    }
?>