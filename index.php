<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css'/>
 
  <link href="css/materialize.css" rel='stylesheet' type='text/css'/>
  <link rel="stylesheet" href="css/cssstyle.css">
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
  <!-- head sticky-->

  <?php include('function.php'); ?>
  <!--/sticky-->
   <?php include('top.php'); ?>
   <!--/sticky-->
<?php include('slider.php'); ?>
<!--<?php
      if (isset($_SESSION['errorcomp'])) { ?>
  <div style="position: absolute; width: 1000px;margin-left: 100px;" class="col s5">
        <div class="card hoverable ">
        
          <div class="card-action">
            <h6><?= $_SESSION['errorcomp']; ?></h6>
          </div>
        
      </div>
         <?php } ?>
      </div></div>
  Presentation  -->
  <div class="pre-section">
    <div class="container-fluid">
      <div class="row">
        <div class="col s12 m4">
          <div class="row">
            <div class="col s4">
              <img src="images/pages/website.png" class="circle responsive-img" alt="">
            </div>
            <div class="col s8">
              <h5 class="course-title">Web sites</h5>
              <p>Read these notes,take assignment and learn coding .</p>
              
               <a href="courses.php" > <button class="takecourse" style="vertical-align:middle"><span>Take the course</span></button></a>
            </div>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="row">
            <div class="col s4">
              <img src="images/pages/game.jpg" class="circle responsive-img" alt="">
            </div>
            <div class="col s8">
              <h5 class="course-title">Games</h5>
              <p>Allow your creativity to develop your own video games.</p>
              <a href="donate.php" > <button class="takecourse" style="vertical-align:middle"><span>Take the course</span></button></a>
            </div>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="row">
            <div class="col s4">
              <img src="images/pages/application.png" class="circle responsive-img" alt="">
            </div>
            <div class="col s8">
              <h5 class="course-title">Application</h5>
              <p>Join the learning boat, and create your own mobile app.</p>
              <a href="donate.php" > <button class="takecourse" style="vertical-align:middle"><span>Take the course</span></button></a>
            </div>
          </div>
        </div>

        </div>
        <!-- <div class="col s4 m4">
          <img src="/img/preskids.jpg" class="responsive-img" alt="">
        </div>
        <div class="col s8 m8 right-align">
          <h5>WHAT WE DO?</h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem sunt debitis nesciunt dolorem vero tempora, minima aut? Eius magni quam omnis nostrum facilis nam eaque harum, adipisci. Iusto odio, magnam.</p>
          <button class="btn btn-action">Learn more</button>
        </div> -->
      <!-- </div> -->
    </div>
  </div>



  <!-- Presentation, End  -->
  <!-- Service -->
  <div class="services">
    <div class="row  center-align">
      <div class="col s12 m4 ">
        <img src="images/pages/codeclubssss.png" class="responsive-img " alt="" width="350" height="200">
        <p class="stata">454,54</p>
        <h5>Code clubs</h5>
        <p>Peer to peer learning.</p>
      </div><div class="col s12 m4 ">
        <img src="images/pages/project.png" class="responsive-img " alt="" width="150" height="70">
        <p class="stata">454,54</p>
        <h5>Project</h5>
        <p>Own future coders initiative and create your own project.</p>
      </div><div class="col s12 m4 ">
        <img src="images/pages/children.png" class="responsive-img " alt="">
        <p class="stata">454,54</p>
        <h5>Children</h5>
        <p>We believe in Children creativity.</p>
      </div>
    </div>
  </div>
  <!-- Service, End  -->
  <!-- core team -->


<!--GALLERRY-->
<div id="portfolio" class="portfolio">
  <ul id="filters" class="clearfix wow bounceIn" data-wow-delay="0.4s">
      <li><span class="filter active" data-filter="app  fun">ALL</span></li>
      <li><span class="filter" data-filter="app">PHOTO</span></li>
      

      <li><span class="filter" data-filter="fun">VIDEO</span></li>
          </ul>
       <div id="portfoliolist">
          <div class="portfolio app mix_all" data-cat="app" style="display: inline-block; opacity: 1;">
            <div class="portfolio-wrapper " data-wow-delay="0.4s">    
              <a href="#" class="b-link-stripe b-animate-go  thickbox play-icon popup-with-zoom-anim">
                 <img src="images/gallery/Kimberly.jpg" class="img-responsive" alt=""/></a>
              <div class="tour-caption">
              <span> </span>
              <p>Click to see more</p>
              </div>

            </div>
          </div>        
          <div class="portfolio app mix_all" data-cat="app" style="display: inline-block; opacity: 1;">
            <div class="portfolio-wrapper " data-wow-delay="0.4s">    
              <a href="#" class="b-link-stripe b-animate-go  thickbox play-icon popup-with-zoom-anim">
                 <img src="images/gallery/Gisa.png" class="img-responsive" alt=""/></a>
               <div class="tour-caption">
               <span> </span>
               <p>Click to see more</p>
                 </div>

            </div>
          </div>    
          <div class="portfolio app mix_all" data-cat="app" style="display: inline-block; opacity: 1;">
            <div class="portfolio-wrapper " data-wow-delay="0.4s">    
              <a href="#" class="b-link-stripe b-animate-go  thickbox play-icon popup-with-zoom-anim">
                 <img src="images/gallery/Eunice.png" class="img-responsive" alt=""/></a>
               <div class="tour-caption">
               <span> </span>
               <p>Click to see more</p>
               </div>
            </div>
          </div>        
          <div class="portfolio app mix_all" data-cat="app" style="display: inline-block; opacity: 1;">
            <div class="portfolio-wrapper " data-wow-delay="0.4s">    
              <a href="#" class="b-link-stripe b-animate-go  thickbox play-icon popup-with-zoom-anim">
                 <img src="images/gallery/farley.png" class="img-responsive" alt=""/></a>
               <div class="tour-caption">
               <span> </span>
              <p>Click to see more</p>
              </div>
            </div>
          </div>  
              
          <div class="portfolio fun mix_all" data-cat="fun" style="display: inline-block; opacity: 1;">
            <div  >    
              <a href="#" class="b-link-stripe b-animate-go  thickbox play-icon popup-with-zoom-anim">
             <iframe width="423" height="241" src="https://www.youtube.com/embed/fnCi3LWA85Y" frameborder="0" allowfullscreen></iframe>
            </a>
              
            </div>
            </div>
          
          <div class="portfolio fun mix_all" data-cat="fun" style="display: inline-block; opacity: 1;">
            <div  >    
              <a href="#" class="b-link-stripe b-animate-go  thickbox play-icon popup-with-zoom-anim">
             <iframe  class="responsive-video" width="423" height="241" src="https://www.youtube.com/embed/R1BraVIIr5o" frameborder="0" allowfullscreen></iframe>
            </a>
              
            </div>
            </div>
       <div class="clearfix"></div> 
    </div>
</div>
</div> 
<!-- Work-->
<!-- Script for gallery Here-->
<script type="text/javascript" src="js/jquery.mixitup.min.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
  $(function () {
    var filterList = {
    init: function () {
// MixItUp plugin
// http://mixitup.io
        $('#portfoliolist').mixitup({
          targetSelector: '.portfolio',
          filterSelector: '.filter',
          effects: ['fade'],
          easing: 'snap',
        // call the hover effect
        onMixEnd: filterList.hoverEffect()
  });       
},
    hoverEffect: function () {
// Simple parallax effect
    $('#portfoliolist .portfolio').hover(
      function () {
      $(this).find('.label').stop().animate({bottom: 0}, 200, 'easeOutQuad');
      $(this).find('img').stop().animate({top: -30}, 500, 'easeOutQuad');       
      },
          function () {
            $(this).find('.label').stop().animate({bottom: -40}, 200, 'easeInQuad');
            $(this).find('img').stop().animate({top: 0}, 300, 'easeOutQuad');               
      }   
    );        
  }
};
// Run the show!
    filterList.init();
  }); 
</script>
<!--Gallery Script Ends-->   




<!--//GALLERY END-->

  
    
  <h3 class="title center-align">Core Team</h3>
    <div class="container-fluid">
     
      <link href="css/owl.carousel.css" rel="stylesheet">
                  <script src="js/owl.carousel.js"></script>
                      <script>
                  $(document).ready(function() {
                    $("#owl-demo").owlCarousel({
                      items : 1,
                      lazyLoad : true,
                      autoPlay : true,
                      navigation : false,
                      navigationText :  false,
                      pagination : true,
                    });
                  });
                  </script>
      <!-- //requried-jsfiles-for owl -->
      <div id="owl-demo" class="owl-carousel">
        <div class="item text-center guide-sliders">
         <div class="col-md-4 customer-grid">
          
          <div class="people-img">
            <img src="images/pages/profile.png" alt="" />
            <h5>Operational Manager</h5>
            <h5><a href="#" >Robert</a></h5>
                        
          </div>
        </div>


        <div class="col-md-4 customer-grid">
          
          <div class="people-img">
            <img src="images/pages/profile.png" alt="" />
            <h5>Community Managert</h5>
            <h5><a href="#" >Robert</a></h5>
                        
          </div>
        </div>


        <div class="col-md-4 customer-grid">
          
          <div class="people-img">
            <img src="images/pages/profile.png" alt="" />
            <h5>Public Relations Manager</h5>
            <h5><a href="#" >Robert</a></h5>
                        
          </div>
        </div>

        
        </div>
        
        <div class="item text-center guide-sliders">
         <div class="col-md-4 customer-grid">
          
          <div class="people-img">
            <img src="images/pages/profile.png" alt="" />
            <h5>Coordinator</h5>
            <h5><a href="#" >Robert</a></h5>
                        
          </div>
        </div>
        <div class="col-md-4 customer-grid">
          
          <div class="people-img">
            <img src="images/pages/profile.png" alt="" />
            <h5>Human Ressource</h5>
            <h5><a href="#" >Robert</a></h5>
                        
          </div>
        </div>
        <div class="col-md-4 customer-grid">
          
          <div class="people-img">
            <img src="images/pages/profile.png" alt="" />
            <h5>IT Manager</h5>
            <h5><a href="#" >Robert</a></h5>
                        
          </div>
        </div>
        
        </div>   
       
              
      </div>
      
    </div>
   
  

  <!-- core team, End -->
  

<!--carousel slide-->


  <div class="people">
      <div class="black lighten-2 ">
    <h3 class="title center-align">What people are saying about us?</h3>
    <div class="container-fluid">
    <!-- requried-jsfiles-for owl -->
     <div class="col-md-4 customer-grid">
          <div class="people-info">
            <p>"Everything that you want to create: websites, games, apps can be done using codes and you never know where it can take you.”.<br><br></p>
          </div>
          <div class="people-img">
            <img src="images/gallery/b.png" alt="" />
            
            <h5>Mulisa</h5>
                        
                        
          </div>
        </div>


        <div class="col-md-4 customer-grid">
          <div class="people-info">
            <p>“It’s cool, it’s fun, it teaches how to get on new things. It can help us in our daily life even in the future.
             It is better to start it early because it will help later on in your jobs.”</p>
          </div>
          <div class="people-img">
            <img src="images/gallery/c.png" alt="" />
            
            <h5>Tiara</h5>
                        
                        
          </div>
        </div>



        <div class="col-md-4 customer-grid">
          <div class="people-info">
            <p>“It’s an amazing experience. Coding let your creativity to flow, and create what you want: games, websites, apps, without limits.<br>"</p>
          </div>
          <div class="people-img">
            <img src="images/gallery/a.png" alt="" />
            
            <h5>Ishimwe</h5>
                        
                        
          </div>
        </div>

        
    </div>
  </div>
</div>

      <!-- carousel slide end -->



 <section id="partner">
    
    <div class="partners ">
      <div class="row " >
                <div class="col-md-4 ">
                  <img src="images/partners/africacode.png"  class="responsive-img">
                </div>
                <div class="col-md-4">
                  <img src="images/partners/klab1.png"  class="responsive-img">
                  </div>
                   <div class="col-md-4">
                  <img src="images/partners/africacode.png"  class="responsive-img">
                </div>
                

              </div>
            <div class="row ">
   
              <div class="col-md-4">
                <img src="images/partners/klab1.png"  class="responsive-img">
              </div>
              <div class="col-md-4">
                <img src="images/partners/africacode.png"  class="responsive-img">
              </div>
              <div class="col-md-4">
                <img src="images/partners/klab1.png"  class="responsive-img">
              </div>
            </div>         
            </div> 
             
    </section><!--/#partner-->



   



<div class="join black lighten-5 ">
  <div class="container ">
    <div class="row center-align  ">
    
       <a href="join.php" > <button class="button" style="vertical-align:middle"><span>Join The Community </span></button></a>
      
   
      
      
    </div>
  </div>
</div>

  <!-- Carousel, End -->
 
 <?php include('footer.php'); ?> 
</body>
</html>
