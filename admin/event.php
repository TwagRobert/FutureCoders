<?php
    include("config.php");
    session_start();
    if (!isset($_SESSION['log']) || empty($_SESSION['log'])) {
        header("location: index.php?ero=2");
    }
    $error = "";
    $user = mysqli_real_escape_string($db,$_SESSION['log']);
    $sql = "SELECT * FROM event where user_id = $user";
    $result = mysqli_query($db,$sql);
    $count = mysqli_num_rows($result);
    
    
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
        <p style="text-align:center"><a href="newevent.php"  class="btn btn-success" >Create New Event</a></p>
        <div class="container">
            <div>
                <div class="row">
                    <?php if ($count == 0):?>
                    <p>No Events</p>
                    <?php else: 
                        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                            
                    ?>
                    <div class = "col-md-6 col-sm-6 col-lg-6">
                        <div class="panel panel-primary">
                          <div class="panel-heading">
                            <h3 class="panel-title"><?=$row['name'];?> <a style="float: right" href="edit_event.php?id=<?=$row['id'];?>">Edit</a></h3>
                          </div>
                          <div class="panel-body">
                            <div><strong>Venue: </strong><?=$row['venue'];?></div>
                            <div><strong>Date: </strong><?=$row['date'];?></div>
                            <div><strong>Time: </strong><?=$row['time'];?></div>
                            <div><strong>Description: </strong><?=$row['description'];?></div>
                          </div>
                        </div>
                    </div>
                        <?php } ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </body>
</html>