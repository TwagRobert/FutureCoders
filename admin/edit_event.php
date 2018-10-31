<?php
    include("config.php");
    session_start();
    if (!isset($_SESSION['log']) || empty($_SESSION['log'])) {
        header("location: index.php?ero=2");
    }
    $error = "";
    $user = mysqli_real_escape_string($db,$_SESSION['log']);
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['title']) && isset($_POST['venue']) && isset($_POST['date']) && isset($_POST['time']) && isset($_POST['description'])) {
        $title = mysqli_real_escape_string($db,$_POST['title']);
        $venue = mysqli_real_escape_string($db,$_POST['venue']);
        $date = mysqli_real_escape_string($db,$_POST['date']);
        $time = mysqli_real_escape_string($db,$_POST['time']);
        $description = mysqli_real_escape_string($db,$_POST['description']);
        $id = mysqli_real_escape_string($db, $_POST['id']);
        $sql = "update event set name = '$title', venue = '$venue', date = '$date', time = '$time', description = '$description' where id = $id";
        $result = mysqli_query($db,$sql);
        if ($result == True) {
            header("location: event.php");
        } else {
            $error = "There was an error trying to create the event.";
        }
    } else if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
        $id = mysqli_real_escape_string($db, $_GET['id']);
        $sql = "SELECT * FROM event where id = $id and user_id = $user ";
        $result = mysqli_query($db,$sql);
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        }
        else {
            header("location: event.php");
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
        <p style="text-align: center"><?=$error;?></p>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-sm-offset-3 col-md-offset-3">
                    <p style="text-align: center"><a href="delete_event.php?id=<?=$row['id'];?>">Delete Event</a></p>
                    <form action="edit_event.php" method="POST">
                        <div class="form-group">
                            <label>Event Title</label>
                            <input type="text" placeholder="Enter event title" name="title" class="form-control" value="<?=$row['name'];?>" required>
                        </div>
                        <div class="form-group">
                            <label>Event Venue</label>
                            <input type="text" placeholder="Enter Event venue" name="venue" class="form-control" value="<?=$row['venue'];?>" required>
                        </div>
                        <div class="form-group">
                            <label>Date</label>
                            <input type="text" placeholder="dd/mm/yyyy" name="date" class="form-control" value="<?=$row['date'];?>" required>
                        </div>
                        <div class="form-group">
                            <label>Time</label>
                            <input type="time" placeholder="hh/mm" name="time" class="form-control" value="<?=$row['time'];?>" required>
                        </div>
                        <div class="form-group">
                            <label></label>
                            <textarea class="form-control" name="description" placeholder="Give a little details about the event" rows="4" required><?=$row['description'];?></textarea>
                        </div>
                        <input type="hidden" name="id" value="<?=$row['id'];?>">
                        <input type="submit" class="btn btn-default" value="Submit Event">
                    </form>
                </div>
            </div>
        </div>
        
    </body>
</html>