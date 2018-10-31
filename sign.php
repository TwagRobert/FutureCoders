<?php
  include 'php/signcode.php';
  include 'php/login.php';
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
  <!-- Compiled and minified JavaScript -->
  <link rel="stylesheet" href="styles/styles.css">

  <title>Future Coders</title>
</head>
<body>



 <script src="js/sign.js"></script>


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
            <h6> <i class="material-icons">report_problem</i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= '<span style="color: red; font-size: 16px">'.$errorcomp.'</span>'; ?></a></h6>
          </div>
        
      </div>
      <?php } ?>
      </div></div>


  <div class="cotn_principal">
<div class="cont_centrar">

  <div class="cont_login">




<div class="cont_info_log_sign_up">
      <div class="col_md_login">
<div class="cont_ba_opcitiy">
        
        <h2>LOGIN</h2>  
  <p>Login here if you already have account</p> 
  <button class="btn_login" onclick="cambiar_login()">LOGIN</button>
  </div>
  </div>
<div class="col_md_sign_up">
<div class="cont_ba_opcitiy">
  <h2>SIGN UP</h2>

  
  <p>Create account  here<br><br></p>

  <button class="btn_sign_up" onclick="cambiar_sign_up()">SIGN UP</button>
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


   <h2>LOGIN</h2>
   <form method="post" action="">
     <input type="email" placeholder="Email/ username" name="usernameconnect" required />
     <input type="password" placeholder="Password" name="umdpconnect"  required/>
     <button class="btn_login" onclick="cambiar_login()" name="sub-btn-conn">LOGIN</button><br>
     <a href="passwordreset.html">Forgot Password</a>
   </form>
  </div>
  
   <div class="cont_form_sign_up">
<a href="#" onclick="ocultar_login_sign_up()"><i class="material-icons">&#xE5C4;</i></a>
     <h2>SIGN UP</h2>
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

    </div>
    
  </div>
 </div>
</div>
  
  
</body>
</html>