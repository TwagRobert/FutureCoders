<?php
  include 'php/goldenchampion.php';
  include 'php/signcode.php';
  include 'php/addmentor.php';
  include 'php/platinumchampion.php';
  include 'php/diamondchampion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
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
  <title>Future Coders</title>
</head>
<body>

 <!-- head sticky-->

  <?php include('function.php'); ?>
  <!--/sticky-->
   <?php include('top.php'); ?>


      <div class="  cotn_principal">
        <div class="container ">

      <?php
      if (isset($errorcomp)) { ?>
      <div class="col s5">
        <div class="card hoverable ">
        
          <div class="card-action">
            <h6> <i class="material-icons">report_problem</i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $errorcomp; ?></a></h6>
          </div>
        
      </div>
      <?php } ?>
      </div></div>
        <div class="cont_centrar">
          <div class=" cont_login">
            <div class="cont_info_log_sign_up">
              <div class="row">
              <div class=" col-md-4 geek">
                <div class="cont_ba_opcitiy">
                   <h2>MEMBER</h2>
                    <p>Register and begin writing codes.<br><br><br></p> 
                    <button class="btn_login" onclick="cambiar_login()">APPLY</button>
                    </div>
                   </div>
                   <div class="col-md-4 mentor">
                    <div class="cont_ba_opcitiy">
                      <h2>MENTOR</h2>
                      <p>Register and help us to raise the coming round of African coders.<br><br></p>
                      <button class="btn_sign_up" onclick="cambiar_sign_up()">APPLY</button>
                    </div>
                  </div>
                  <div class="col-md-4 champion">
                    <div class="cont_ba_opcitiy">
                      <h2>CHAMPION</h2>
                      <p>Register and spread this initiative to your community, Country as well as to your region</p>
                      <button class="btn_champion" onclick="cambiar_champion()">APPLY</button>
                    </div>
                  </div>
                </div>
              </div>

                <div class="cont_back_info">
                  <div class="cont_img_back_grey">
                    <img src="https://images.unsplash.com/42/U7Fc1sy5SCUDIu4tlJY3_NY_by_PhilippHenzler_philmotion.de.jpg?ixlib=rb-0.3.5&q=50&fm=jpg&crop=entropy&s=7686972873678f32efaf2cd79671673d" alt="" />
                   </div>
                 </div>


            <div class="cont_forms" >
              <div class="cont_img_back_">
                <img src="https://images.unsplash.com/42/U7Fc1sy5SCUDIu4tlJY3_NY_by_PhilippHenzler_philmotion.de.jpg?ixlib=rb-0.3.5&q=50&fm=jpg&crop=entropy&s=7686972873678f32efaf2cd79671673d" alt="" />
               </div>

               <div class="cont_form_login">
                  <a href="#" onclick="ocultar_login_sign_up()" ><i class="material-icons">&#xE5C4;</i></a>
                    <h2>MEMBER</h2>
                   <form method="post" action="">
                       <input type="text" placeholder="Full Name" maxlength="1000" name="fullname" required/>
                       <input type="text" placeholder="Username eg:jhon12" maxlength="100" name="username" required/>
                       <input type="date" placeholder="Date of Birth"  class="datepicker" name="dateob" required/> 
                       <script type="text/javascript">
                             $('.datepicker').pickadate({
                                selectMonths: true, // Creates a dropdown to control month
                                selectYears: 500, // Creates a dropdown of 15 years to control year,
                                today: 'Today',
                                clear: 'Clear',
                                close: 'Ok',
                                closeOnSelect: false // Close upon selecting a date,
                              });
                          
                         </script>
                        <div class="gender col m12 ">
                        <label>Gender</label>
                            <input class="with-gap" name="gender" value="male" type="radio" id="test1" required />
                            <label for="test1">Male</label>
                            <input class="with-gap" name="gender" value="female" type="radio" id="test2"  required />
                            <label for="test2">Female</label>      
                        </div>
                       <input type="text" placeholder="your school" maxlength="1000" name="school" />
                       <input type="text" placeholder="Parent/guardian fullname" maxlength="1000" name="parent" />
                       <input type="tel" placeholder="Phone of the Parent/Guardian" maxlength="14" name="phone" />
                       <input type="text" placeholder=" your Email" autocomplete="on" name="uemail" required/>  
                       <input type="password" placeholder="Password" name="pwd" />
                       <input type="password" placeholder="Confirm Password" name="pwd2" />
                       <button class="btn_sign_up" onclick="cambiar_sign_up()" name="sub-btn-insc">SIGN UP</button>
                     </form>
                   </div>


               <div class="cont_form_sign_up">
                <a href="#" onclick="ocultar_login_sign_up()"><i class="material-icons">&#xE5C4;</i></a>
                 <h2>MENTOR</h2>
                 <form method="post" action="">
                      <input type="text" placeholder="First Name" maxlength="64" name="first_name" required/>
                      <input type="text" placeholder="Last Name" maxlength="64" name="last_name" required/>
                      <input type="date" class="datepicker" placeholder="Date of Birth"  name="dateob" />
                      <script type="text/javascript">
                         $('.datepicker').pickadate({
                            selectMonths: true, // Creates a dropdown to control month
                            selectYears: 500, // Creates a dropdown of 15 years to control year,
                            today: 'Today',
                            clear: 'Clear',
                            close: 'Ok',
                            closeOnSelect: false // Close upon selecting a date,
                          });
                      
                     </script>
                      <input type="text" placeholder="Your Email" maxlength="75" name="uemail" required />
                      <div class="gender col m12 ">
                            <label>Gender</label>
                                <input class="with-gap" name="gender" value="male" type="radio" id="test3" required />
                                <label for="test3">Male</label>
                                <input class="with-gap" name="gender" value="female" type="radio" id="test4"  required />
                                <label for="test4">Female</label>      
                            </div>
                      <input type="text" placeholder="Country" maxlength="18" name="country" />
                      <input type="text" placeholder="City" maxlength="18" name="city" />
                    <div class="row">
                      <div class="input-field col s12">
                        <textarea rid="textarea1" data-length="500" name="language"></textarea>
                        <label for="textarea1">Languages you know eg:PHP,PYTHON</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <textarea id="textarea1" data-length="500" name="education" required></textarea>
                        <label for="textarea1">Education and experience</label>
                      </div>
                    </div>        
                <div class="row">
              <div class="input-field col s12">
                <textarea id="textarea1" data-length="500" name="professional" required></textarea>
                <label for="textarea1">professional status</label>
              </div>
                  </div>
               <label>Availability</label>
                <select name="malaika" class="browser-default" required>
                  <option value="Daily" >Daily</option>
                  <option value="A few times a week">A few times a week</option>
                  <option value="A few times a month">A few times a month</option>
                </select>
                <input type="password" placeholder="Password" name="pwd" />
                <input type="password" placeholder="Confirm Password" name="pwd2" />
                    <br> 
                    <button class="btn_sign_up" onclick="cambiar_sign_up()" name="btn-insc" >APPLY</button>
        </form>        
                  </div>





                    <div class="cont_form_championsection">
                      <a href="#" onclick="ocultar_login_sign_up()"><i class="material-icons">&#xE5C4;</i></a>
                      <h2>CHAMPION</h2>
                     <button class="btn_championgolden" onclick="cambiar_championgolden()">GOLDEN</button>
                    <p>Change makers who want to lead and start this initiative in their local communities.</p>
                      <button class="btn_championplatinum" onclick="cambiar_championplatinum()">PLATINUM</button>  
                      <p>nfluential, agent of change who want to launch and lead this initiative in their respective countries.</p>
                      <button class="btn_championdiamond" onclick="cambiar_championdiamond()">DIAMOND</button> 
                      <p>Well connected, influential people who can launch and lead the initiative on regional level and will nominate platinum champion.
</p> 
                      </div>




              <div class="cont_form_championgolden">
                  <a href="#" onclick="ocultar_login_sign_up()"><i class="material-icons">&#xE5C4;</i></a>
                  <h2>GOLDEN</h2>

              <form method="post" action="">
                  <input type="text" placeholder="First Name" maxlength="64" name="first_name" required/>
                  <input type="text" placeholder="Last Name" maxlength="64" name="last_name" required/>
                  <input type="date" class="datepicker" placeholder="Date of Birth" name="dateob" />
                    <script type="text/javascript">
                         $('.datepicker').pickadate({
                            selectMonths: true, // Creates a dropdown to control month
                            selectYears: 500, // Creates a dropdown of 15 years to control year,
                            today: 'Today',
                            clear: 'Clear',
                            close: 'Ok',
                            closeOnSelect: false // Close upon selecting a date,
                          });
                      
                     </script>
                  <input type="email" placeholder="Your Email" maxlength="75" name="uemail" required />
                  <div class="gender col m12 ">
                      <label>Gender</label>     
                        <input class="with-gap" value="male" name="gender" type="radio" id="test5" />
                        <label for="test5">Male</label>                      
                        <input class="with-gap" value="female" name="gender" type="radio" id="test6"  />
                        <label for="test6">Female</label>
                      </div><br>                 
                  <input type="text" placeholder="Country" maxlength="18" name="country"  />
                  <input type="text" placeholder="City" maxlength="18" name="city"/>
                  <div class="row">
                  <div class="input-field col s12">
                    <textarea id="textarea1" data-length="1000" name="education"></textarea>
                    <label for="textarea1">Biography and Education</label>
                  </div>
                      </div>
                      <div class="row">
                  <div class="input-field col s12">
                    <textarea id="textarea1" data-length="500" name="achievment"></textarea>
                    <label for="textarea1">Achievements </label>
                  </div>
                      </div>

                      <div class="row">
                  <div class="input-field col s12">
                    <textarea id="textarea1" data-length="500" name="professional" ></textarea>
                    <label for="textarea1">professional status  </label>
                  </div>
              </div>
              <button class="btn_champion" name="insc_golden_champion" >APPLY</button>
          </form>        
        </div>

                  <div class="cont_form_championplatinum">
                  <a href="#" onclick="ocultar_login_sign_up()"><i class="material-icons">&#xE5C4;</i></a>
                  <h2>PLATINUM</h2>
              <form method="post" action="">
                  <input type="text" placeholder="First Name" maxlength="64" name="first_name" required/>
                  <input type="text" placeholder="Last Name" maxlength="64" name="last_name" required/>
                  <input type="date" class="datepicker" placeholder="Date of Birth" name="dateob" />
                    <script type="text/javascript">
                       $('.datepicker').pickadate({
                          selectMonths: true, // Creates a dropdown to control month
                          selectYears: 500, // Creates a dropdown of 15 years to control year,
                          today: 'Today',
                          clear: 'Clear',
                          close: 'Ok',
                          closeOnSelect: false // Close upon selecting a date,
                        });
                    
                   </script>
                  <input type="email" placeholder="Your Email" maxlength="75" name="uemail" required />
                  <div class="gender col m12 ">
                  <label>Gender</label>
                    <input class="with-gap" value="male" name="gender" type="radio" id="test7" />
                    <label for="test7">Male</label>
                    <input class="with-gap" value="female" name="gender" type="radio" id="test8"  />
                    <label for="test8">Female</label>
                  </div><br>
                  <input type="text" placeholder="Country" maxlength="18" name="country"  />
                  <input type="text" placeholder="City" maxlength="18" name="city"/>
                  <div class="row">
                  <div class="input-field col s12">
                  <textarea id="textarea1" data-length="1000" name="education"></textarea>
                  <label for="textarea1">Biography and Education</label>
                  </div>
              </div>
              <div class="row">
              <div class="input-field col s12">
                <textarea id="textarea1" data-length="500" name="achievment"></textarea>
                <label for="textarea1">Achievements </label>
              </div>
              </div>

              <div class="row">
              <div class="input-field col s12">
              <textarea id="textarea1" data-length="500" name="professional"></textarea>
              <label for="textarea1">professional status  </label>
              </div>
              </div>
                   <input type="submit" value="APPLY" class="btn_champion" name="malaika" >
          </form>  
              </div>




                  <div class="cont_form_championdiamond">
                  <a href="#" onclick="ocultar_login_sign_up()"><i class="material-icons">&#xE5C4;</i></a>
                  <h2>DIAMOND</h2>
                <form method="post" action="">
                 <input type="text" placeholder="First Name" maxlength="64" name="first_name" required/>
                  <input type="text" placeholder="Last Name" maxlength="64" name="last_name" required/>
                  <input type="date" class="datepicker" placeholder="Date of Birth" name="dateob" />
                    <script type="text/javascript">
                         $('.datepicker').pickadate({
                            selectMonths: true, // Creates a dropdown to control month
                            selectYears: 500, // Creates a dropdown of 15 years to control year,
                            today: 'Today',
                            clear: 'Clear',
                            close: 'Ok',
                            closeOnSelect: false // Close upon selecting a date,
                          });
                      
                     </script>
                  <input type="email" placeholder="Your Email" maxlength="75" name="uemail" required />
                  <div class="gender col m12 ">
                  <label>Gender</label>
                  <input class="with-gap" value="male" name="gender" type="radio" id="test9" />
                  <label for="test9">Male</label>
                  <input class="with-gap" value="female" name="gender" type="radio" id="test10"  />
                  <label for="test10">Female</label>
                  </div><br>
                  <input type="text" placeholder="Country" maxlength="18" name="country"  />
                  <input type="text" placeholder="City" maxlength="18" name="city"/>
                  <div class="row">
                  <div class="input-field col s12">
                  <textarea id="textarea1" data-length="1000" name="education"></textarea>
                  <label for="textarea1">Biography and Education</label>
                </div>
                </div>
              <div class="row">
              <div class="input-field col s12">
              <textarea id="textarea1" data-length="500" name="achievment"></textarea>
              <label for="textarea1">Achievements </label>
            </div>
              </div>

              <div class="row">
            <div class="input-field col s12">
            <textarea id="textarea1" data-length="500" name="professional"></textarea>
            <label for="textarea1">professional status  </label>
          </div>
              </div>
                   <input type="submit" value="APPLY" class="btn_champion" name="aime" >
        </form>       
                  </div>




                  </div>




             </div>
           </div>
         </div>
       </div>
     

     <script src="js/index.js"></script>
 <button onclick="topFunction()" id="myBtn" title="Go to top>">Top</button>
<script type="text/javascript">

// when the user scrolls down 20px from the top of the document, show the button

window.onscroll = function(){
scrollFunction()};
function scrollFunction(){
  if (document.body.scrollTop > 20 ||document.documentElement.scrollTop > 20){ 
    document.getElementById("myBtn").style.display = "block";}else{
      document.getElementById("myBtn").style.display = "none";

    }
}
//when the user clicks on the button, scroll to the top of the document

function topFunction(){
  document.body.scrollTop = 0; //for chrome, safari and opera
  document.documentElement.scrollTop = 0; // for IE and firefox;
}



</script>



     
</body>
</html>







