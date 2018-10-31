<?php
    include("config.php");
    session_start();
    $error = "";
    $sql = "SELECT * FROM event";
    $result = mysqli_query($db,$sql);
    $count = mysqli_num_rows($result);
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css'/>
  <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css'/>
  <link href="css/materialize.min.css" rel='stylesheet' type='text/css'/>
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
  <title>Future Coders</title>
</head>
<body>
   <?php include('top.php'); ?>
  
<div class="container">
    <div>
        <div class="row">
            <?php if ($count == 0):?>
            <p>No Events</p>
            <?php else: 
                while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                    
            ?>
            <div class = "col-md-10 col-sm-10 col-lg-10">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title"><?=$row['name'];?></h3>
                  </div>
                  <div class="panel-body">
                    <p><strong>Venue: </strong><?=$row['venue'];?></p>
                    <p><strong>Date: </strong><?=$row['date'];?></p>
                    <p><strong>Time: </strong><?=$row['time'];?></p>
                    <p><h6>Description: </h6><?=$row['description'];?></p>
                  </div>
                </div>
            </div>
                <?php } ?>
            <?php endif; ?>
        </div>
    </div>
</div>

 <?php include('footer.php'); ?> 
</body>
</html>

         