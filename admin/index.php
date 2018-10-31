<?php
    include("config.php");
    $error = "";
    session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email']) && isset($_POST['password'])) {
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $password = sha1($password);
        $sql = "SELECT * FROM mentors WHERE uemail = '$email' AND pwd = '$password' ";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            $_SESSION['log'] = $row['id'];
            header("location: course.php");
        }else {
            $error = "Invalid username and password";
        }
    }
    
    if (!isset($_SESSION['log']) || empty($_SESSION['log'])) {
        
    } else {
        header("location: course.php");
    }
    
    if (isset($_GET['ero'])){
        if ($_GET['ero'] == 1)
            $error = "There was an error uploading file";
        if ($_GET['ero'] == 2)
            $error = "Invalid access";
        if ($_GET['ero'] == 3)
            $error = "Course does not exist";
    }
    
?>

<!doctype html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Log In</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    
    <body>
    <div class="container">
    <div style="margin: 7% auto"> <p style="text-align: center"><?=$error;?></p> </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <form method="POST" action="index.php">
                    <div class="form-group">
                      <center><h3>ADMIN LOGIN</h3></center><br>
                        <label>Email</label>
                        <input class="form-control" type="email" name="email" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" type="password" name="password" placeholder="Enter password" required>
                    </div>

                    <input class="btn btn-primary" type="submit" value="Log In"><a href="passwordreset.html">Forgot Password</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="../index.php">Go back to home page</a>
                </form>
            </div>
        </div>
    </div>
    </body>
</html>