<?php
    include("config.php");
    session_start();
    if (!isset($_SESSION['log']) || empty($_SESSION['log'])) {
        header("location: index.php?ero=2");
    }
    $error = "";
    $c_id = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['course_name']) && isset($_POST['course_description']) && isset($_POST['id'])) {
            $course_name = mysqli_real_escape_string($db,$_POST['course_name']);
            $course_desc = mysqli_real_escape_string($db,$_POST['course_description']); 
            $c_id = mysqli_real_escape_string($db,$_POST['id']); 

            $sql = "update course set name = '$course_name', description = '$course_desc' where id = $c_id";
            $result = mysqli_query($db,$sql);
            if ($result == True) {
                header("location: loadcourse.php?id=$c_id");
            }else {
                $error = "Sorry, we encountered an error. Please try again later.";
            }
        } else {
            $error = "Please fill all information";
        }
    } else {
        if (isset($_GET['id'])) {
            $c_id = $_GET['id'];
            $sql = "SELECT * FROM course WHERE id = $c_id";
            $result = mysqli_query($db,$sql);
            $row_course = mysqli_fetch_array($result,MYSQLI_ASSOC);
        } else {
            header("location: course.php");
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
            <div class="col-md-8 col-md-offset-2">
                <p><?php echo $error; ?></p>
                <h3>Update Course Information</h3>
                <p><a class="btn btn-link" href="delete.php?course=<?=$c_id;?>">Delete Course</a></p>
                <form method="POST" action="edit_course.php">
                    <div class="form-group">
                        <label>name</label><br/>
                        <input class="form-control" type="text" placeholder="Enter course name" name="course_name" value="<?=$row_course['name'];?>" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label><br/>
                        <textarea class="form-control" placeholder="<?=$row_course['description'];?>" name="course_description" cols="50" rows="7" required><?=$row_course['description'];?></textarea>
                    </div>
                    <div>
                        <input type="hidden" value="<?=$c_id;?>" name="id">
                        <input class="btn btn-default" type="submit" value="Update Course">
                    </div>
                </form>
            </div>
        </div>
        </div>
    </body>
</html>