<?php
    include("config.php");
    session_start();
    if (!isset($_SESSION['log']) || empty($_SESSION['log'])) {
        header("location: index.php?ero=2");
    }
    $error = "";
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['title']) && isset($_POST['venue']) && isset($_POST['date']) && isset($_POST['time']) && isset($_POST['description'])) {
        $title = mysqli_real_escape_string($db,$_POST['title']);
        $venue = mysqli_real_escape_string($db,$_POST['venue']);
        $date = mysqli_real_escape_string($db,$_POST['date']);
        $time = mysqli_real_escape_string($db,$_POST['time']);
        $description = mysqli_real_escape_string($db,$_POST['description']);
        $user = mysqli_real_escape_string($db, $_SESSION['log']);
        $sql = "insert into event values(null, '$title', '$venue', '$date', '$time', '$description', $user)";
        $result = mysqli_query($db,$sql);
        if ($result == True) {
            header("location: event.php");
        } else {
            $error = "There was an error trying to create the event.";
        }
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
        <p style="text-align: center"><?=$error;?></p>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-sm-offset-3 col-md-offset-3">
                    <form action="newevent.php" method="POST">
                        <div class="form-group">
                            <label>Event Title</label>
                            <input type="text" placeholder="Enter event title" name="title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Event Venue</label>
                            <input type="text" placeholder="Enter Event venue" name="venue" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Date</label>
                            <input type="text" placeholder="dd/mm/yyyy" name="date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Time</label>
                            <input type="time" placeholder="hh/mm" name="time" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label></label>
                            <textarea class="form-control" name="description" placeholder="Give a little details about the event" rows="4" required></textarea>
                        </div>
                        <input type="submit" class="btn btn-default" value="Submit Event">
                    </form>
                </div>
            </div>
        </div>
        
    </body>
</html>