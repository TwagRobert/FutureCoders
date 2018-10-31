<?php
    $error = "";
    include("config.php");
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email']) && isset($_POST["password"]) && isset($_POST["confirmation"]) && isset($_POST['code'])) {

        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $confirmation = mysqli_real_escape_string($db, $_POST['confirmation']);
        $code = mysqli_real_escape_string($db, $_POST['code']);
        if ($password == $confirmation &&  strlen($password) > 6 ) {
            $password = sha1($password);
            $sql = "SELECT * FROM confirm WHERE mail = '$email' AND code = '$code' AND active = 1";
            $result = mysqli_query($db,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);
            if ($count == 1) {
                $sql = "update confirm set active = 0 where mail = '$email' AND code = '$code'";
                $result = mysqli_query($db,$sql);
                $sql = "update mentors set password = $password WHERE email = '$email'";
                $result = mysqli_query($db,$sql);
                header("location: index.php");
            }else {
                $error = "invalid access";
            }
        } else {
            $error = "Incorrect Password";
        }
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
        <div class="container">
        <div class="row">
        <div class="col-sm-8 col-sm-offset-2"
        <p><?=$error;?></p>
        <form method="POST" action="passwordreset.php">
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Please enter your current email address" class="form-control">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Type Password" class="form-control">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmation" placeholder="Confirm Password" class="form-control">
            </div>
            <div class="form-group">
                <label>Code:</label>
                <input type="text" placeholder="Check your email for the code" name="code" class="form-control">
            </div>
            <input type="submit" value="Reset Password" class="btn btn-primary">
        </form>
        </div>
        </div>
        </div>
    </body>
    
</html>