<?php 
    session_start();

    if (isset($_POST['projectId'])) {
        $_SESSION['project'] = $_POST['projectId'];
        
        echo "ProjectId set";
        /* Redirect browser */
        header("Location: https://stormy-cove-35722.herokuapp.com/clean/rooms.php");
        exit();
    } elseif (isset($_POST['roomId'])) {
        $_SESSION['room'] = $_POST['roomId'];
        
        echo "RoomId set";
        /* Redirect browser */
        header("Location: https://stormy-cove-35722.herokuapp.com/clean/bookshelves.php");
        exit();
    } elseif (isset($_POST['bookshelfId'])) {
        $_SESSION['bookshelf'] = $_POST['bookshelfId'];
        
        echo "BookshelfId set";
    }
?>