<?php
include 'php/display.php';
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Future coders</title>
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

    <!-- Bootstrap core CSS -->
    <link href="docforum/blog/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="docforum/blog/css/blog-home.css" rel="stylesheet">

  </head>

  <body>

    <?php include('top.php'); ?>
    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <h1 style="float: inherit;" >List of topics</h1>
          <h3>Welcome to the forum <small>here you can ask any question or help</small></h3>
            <br>
          <!-- Blog Post -->
          <div class="">
            <?php  while ($arti = $postaff->fetch()) { ?>
            <div class="">
              <h2 style="justify-content: justify" class=""><?= $arti['title']; ?></h2>
              <?php $arti['content'] = strip_tags($arti['content']);

                  if (strlen($arti['content']) > 300) {

                      $stringCut = substr($arti['content'], 0, 500);

                      $arti['content'] = substr($stringCut, 0, strrpos($stringCut, ' ')); 
                  } ?>
              <p style="justify-content: justify" class=""><?= $arti['content'];?> .  .  .</p>
              <div class="">
              Posted on <span class=" backspace date sub-text"><?= $arti['date_heure_creation']; ?></span> by <?php
                      $nameaf = $con->prepare('SELECT * FROM user WHERE uemail = ?');
                      $nameaf->execute(array($arti['id_user']));
                      while ($nameafi = $nameaf->fetch()) {
                        echo ucwords($nameafi['fullname']);
                      }
                ?>
            </div>
              <a href="one.php?id=<?= $arti['id']; ?>" class="btn btn-primary">Read More &rarr;</a>
            </div>
            
            <hr>
          <?php } ?>
          </div>
          
                  <?php
                    $totalpage = ceil($topictotal / $topicperpage);
                    if ($pagecourante < $totalpage) { ?>
                    <ul class="pagination justify-content-center mb-4">
                        <li class="page-item">
                            <a class="page-link" href="muliti.php?page=<?= $pagecourante - 1;?>">&larr; Older</a>
                        </li>
                        <li class="page-item ">
                            <a class="page-link" href="muliti.php?page=<?= $pagecourante + 1;?>">Newer &rarr;</a>
                        </li>
                    </ul>

                  <?php }else{ ?>
                       <ul class="pagination justify-content-center mb-4">
                        <li class="page-item">
                            <a class="page-link" href="muliti.php?page=<?= $pagecourante - 1;?>">&larr; Older</a>
                        </li> 
                        </ul>
                 <?php }
                  ?>
                  
        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Search Widget -->
          <div class="card my-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              <div class="input-group">
              <form method="GET">
                <input type="search" name="aimemala" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <input type="submit" class="btn btn-secondary" value="search"/>
              </form>
                </span>
              </div>
            </div>
          </div>
          <div class="my-4">
          <?php
              if (isset($_SESSION['username'])) {
                 echo "<center><a style=\"font-size: 30px\" href=\"createTopic.php\">Create a new post <i class=\"material-icons\" style=\"color:blue\">forum</i></a></center>";
            }else{
              echo "<center><a style=\"font-size: 25px;color: red\" href=\"sign.php\">login to create a post post<i class=\"material-icons\" style=\"color:blue\">forum</i></a></center>";
            } ?>

        </div>
      </div>
      <!-- /.row -->

    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  </body>

</html>
