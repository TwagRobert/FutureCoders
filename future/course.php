<?php
    include("config.php");
    $error = "";
    $sql = "SELECT * FROM course";
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
    <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css'/>

    <link href="css/materialize.css" rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <script src="js/jquery.min.js"></script>
    <!--animated-css-->
    <link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
    <script src="js/wow.min.js"></script>
    <script>
    new WOW().init();
    </script>
    <!--/animated-css-->
    <title>Courses</title>
    </head>

    <body>
        <?php include('top.php'); ?>
        <!-- Jumbotron -->

        <p><?=$error;?></p>
        <div class="courses grey lighten-5">
            <div class="container">
                <div class="row">
                    <div>
                        <?php if ($count <= 0): ?>
                        <p>No Courses Found.</p>
                        
                        <?php else: 
                            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) { ?>
                        
                            <div class="col-md-6">
                                <div class="card horizontal">
                                    <div class="card-image">
                                        <a href="loadcourse.php?id=<?=$row['id'];?>"><img src="<?=$row['image'];?>" alt="course logo"></a>
                                    </div>
                                    <div class="card-stacked">
                                 
                                    <div class="card-content">
                                    <a href="loadcourse.php?id=<?=$row['id'];?>" class="card-title"><h4><?=$row["name"];?></h4></a>
                                    <p><?=$row["description"];?></p>
                                    </div>
                                    <div class="card-action ">
                                        <ul class="col-md-4">
                                                <li><h6>Learners</h6></li>
                                                <li class="stata">454,54</li>
                                                </ul>
                                                <ul class="col-md-4">
                                                <li><h6>Lessons</h6></li>
                                                <li class="stata">454,54</li>
                                                </ul>
                                                <ul class="col-md-4">
                                                <li><h6>Quizzes</h6></li>
                                                <li class="stata">454,54</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php include('footer.php'); ?> 
    </body>
</html>