
    <!--scripts-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>

       <!--end of scripts-->






  <!-- Navbar  -->
  <div class="navbar-fixed ">
    <ul id="dropdown1" class="dropdown-content">
  <li><a href="about.php">About</a></li>
  <li ><a href="donate.php">Donate</a></li>
  <li class="divider"></li>
  <li><a href="join.php">Join For Free</a></li>
</ul>

  <script type="text/javascript">

$( document ).ready(function(){


 $('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrainWidth: false, // Does not change width of dropdown to that of the activator
      hover: true, // Activate on hover
      gutter:0, // Spacing from edge
      belowOrigin: false, // Displays dropdown below the button
      alignment: 'right', // Displays dropdown with edge aligned to the left of button
      stopPropagation: false // Stops event propagation
    }
  );
 })
        
  </script>



    <nav>
    <div class="nav-wrapper ">
      <a style="margin-left:40px" href="index.php" class="brand-logo">Fkoder</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>      
        <ul  class="right hide-on-med-and-down">
            <li ><a href="index.php">Home</a></li>
            <li><a href="courses.php">Courses</a></li>
            <li><a href="muliti.php">Forum</a></li>
            
            <li><a href="events.php">Events</a></li>
            <?php
            if(!isset($_SESSION)) {
                session_start();
                if (isset($_SESSION['username'])) {
                 echo "<li><a href=\"php/logout.php\">".$_SESSION['username']." | Logout</a></li>";
                }else{
                  echo "<li><a href=\"sign.php\">sign in</a></li>";
                } 
            }else{
               if (isset($_SESSION['username'])) {
                 echo "<li><a href=\"php/logout.php\">".$_SESSION['username']." | Logout</a></li>";
                }else{
                  echo "<li><a href=\"sign.php\">sign in</a></li>";
                } 
            }
            ?>
            
            <li><a class="dropdown-button" href="#!" data-activates="dropdown1">More<i class="material-icons right">arrow_drop_down</i></a></li>
            
          </ul>

          
      <ul class="side-nav" id="mobile-demo">
            <li><a href="courses.html">Courses</a></li>
            <li><a href="muliti.php">Forum</a></li>
           
            <li><a href="events.php">Events</a></li>
            <li><a href="about us.html">About</a></li>
            <li ><a href="#">Donate</a></li>
            <li><a href="sign.php">Sign In</a></li>
            <li><a href="join.php">Join for Free</a></li>
          </ul>
      </div>
    </nav>
  </div>
  <!-- Navbar, End  -->


  <script type="text/javascript">

$( document ).ready(function(){




    $(".button-collapse").sideNav();
}) 
  </script>