<?php
    include("config.php");
    session_start();
    if (!isset($_SESSION['log']) || empty($_SESSION['log'])) {
        header("location: index.php?ero=2");
    }
    $error = "";
    $user = mysqli_real_escape_string($db,$_SESSION['log']);
    $sql = "SELECT * FROM course where user_id = $user";
    $result = mysqli_query($db,$sql);
    // $rows = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    
    if (isset($_GET['ero'])){
        if ($_GET['ero'] == 1)
            $error = "There was an error uploading file";
        if ($_GET['ero'] == 2)
            $error = "Invalid access";
        if ($_GET['ero'] == 3)
            $error = "Course does not exist";
    }
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Admin | Courses</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

    <body>
        <?php include("nav.php"); ?>
        <p style= "text-align: center"><?=$error;?></p>
        <p style="text-align:center"><a href="newcourse.php"  class="btn btn-primary" >Create New Course</a></p>
        <div class="courses grey lighten-5">
            <div class="container">
                <div class="row">
                    <div>
                        <?php if ($count <= 0): ?>
                        <p style="text-align:center">No Courses Found.</p>
                        
                        <?php else: 
                            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) { ?>
                            <div class="col-md-6">
                                <div class="media">
                                  <div class="media-left">
                                    <a href="loadcourse.php?id=<?=$row['id'];?>">
                                      <img class="media-object image-responsive" width="100" height="100" src="../<?=$row['image'];?>" alt="course logo">
                                    </a>
                                  </div>
                                  <div class="media-body">
                                    <a href="loadcourse.php?id=<?=$row['id'];?>" class="card-title"><h4 class="media-heading"><?=$row["name"];?></h4></a>
                                    <p><?=$row["description"];?></p>
                                  </div>
                                </div>
                            </div>
                            <?php } ?>
                        
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>