<?php
    include("config.php");
    $error = "";
    session_start();
    if (!isset($_SESSION['log']) || empty($_SESSION['log'])) {
        header("location: index.php?ero=2");
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['course_name']) && isset($_POST['course_description'])) {
            $course_name = mysqli_real_escape_string($db,$_POST['course_name']);
            $course_desc = mysqli_real_escape_string($db,$_POST['course_description']); 
            $user = mysqli_real_escape_string($db, $_SESSION['log']);
            $sql = "insert into course values(null, '$course_name', '$course_desc', 'uploads/profile/skype.png', $user)";
            $result = mysqli_query($db,$sql);
            if ($result == True) {
                $last_id = mysqli_insert_id($db);
                header("location: loadcourse.php?id=$last_id");
            }else {
                $error = "Sorry, we encountered an error. Please try again later.";
            }
        } else {
            $error = "Please fill all information";
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
        <!-- Jumbotron -->
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <p><?php echo $error; ?></p>
                <form method="POST" action="newcourse.php">
                    <div class="form-group">
                        <label>name</label><br/>
                        <input class="form-control" type="text" placeholder="Enter course name" name="course_name" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label></br/>
                        <textarea class="form-control" placeholder="Enter course description" name="course_description" cols="50" rows="10" required></textarea>
                    </div>
                    <div>
                        <input class="btn btn-default" type="submit" value="Create New Course">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>