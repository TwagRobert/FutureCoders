<?php
include 'php/uniqueTopic.php';
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap core CSS -->
    <title>Future Coders</title>

    <!-- Custom styles for this template -->
    

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
   <link href="docforum/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link href="docforum/css/blog-post.css" rel="stylesheet">
  
</head>
<body>
  <!--/sticky-->
   <?php include('top.php');?>
   <!--/sticky-->
    <!-- Page Content -->
    <div class="container">

              <!-- Title -->
           <?php  while ($article = $postaffun->fetch()) { ?>
          <div class="clearfix"><h1 class="mt-4"><?= $article['title']; ?></h1>
          <!-- Date/Time -->
          </div>
          <hr>

          <p>by <?php
                      $nameaff = $con->prepare('SELECT * FROM user WHERE uemail = ?');
                      $nameaff->execute(array($article['id_user']));
                      while ($namea = $nameaff->fetch()) {
                        echo ucwords($namea['fullname']);
                      }
                ?> &nbsp&nbsp&nbspPosted on <?= $article['date_heure_creation']; ?></p>

          <hr>
          <!-- Post Content -->
          <p class="lead"><?= $article['content']; ?></p>
          <?php } ?>
          <h3>Leave a comment</h3>
          <form method="post" >
            <div class="form-group">
              <textarea class="form-control" rows="5" name="tcontenu"></textarea>
            </div>
            <?php
              if (isset($_SESSION['username'])) {
                 echo "<button type=\"submit\" class=\"btn btn-primary\" name=\"tsubmit\">Submit</button>";
            }else{
              echo "<button type=\"button\" class=\"btn btn-primary disabled\">Submit Comment </button> <a href=\"sign.php\" style=\"color: red\"> login to comment</a>";
            } 
            ?>
          </form>
          <?php  while ($art = $comm->fetch()) { ?>
          <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0">
                  <?php
                      $nameaffi = $con->prepare('SELECT * FROM user WHERE uemail = ?');
                      $nameaffi->execute(array($art['id_user']));
                      while ($malaaime = $nameaffi->fetch()) {
                        echo ucwords($malaaime['fullname']);
                      }
                ?> 
                </h5>
                  <?= $art['content']; ?>
            </div>
          </div>
          <?php } ?>
        </div>

      </div>
      <!-- /.row -->

    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  </body>

</html>
