<?php
    include("config.php");
    session_start();
    if (!isset($_SESSION['log']) || empty($_SESSION['log'])) {
        header("location: index.php?ero=2");
    }
    $user = mysqli_real_escape_string($db,$_SESSION['log']);
    $error = "";
    if (isset($_GET['id'])) {
        $id = mysqli_real_escape_string($db,$_GET['id']);
        $sql = "delete from event where id = $id and user_id = $user";
        $result = mysqli_query($db,$sql);
        if ($result == True) {
            header("location: event.php");
        } else {
            $error = "There was an error trying to delete the event.";
        }
    } else {
        header("location: event.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Admin | Event</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

    <body>
        <?php include("nav.php"); ?>
        <p><?=$error;?></p>
       
    </body>
</html>