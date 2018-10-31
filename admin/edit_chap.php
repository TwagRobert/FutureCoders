<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include("config.php");
    $error = "";
    $ch_id = "";
    session_start();
    if (!isset($_SESSION['log']) || empty($_SESSION['log'])) {
        header("location: index.php?ero=2");
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['chap_name']) && isset($_POST['chap_cont']) && isset($_POST['id'])) {
            $chap_name = mysqli_real_escape_string($db,$_POST['chap_name']);
            $chap_cont = $_POST['chap_cont'];
            $c_id = mysqli_real_escape_string($db, $_POST['c_id']);
            $ch_id = mysqli_real_escape_string($db, $_POST['id']);
            $sql = "update chapter set chap_name = '$chap_name' where id = $ch_id";
            $result = mysqli_query($db, $sql);
            if ($result == True) {
                $myfile = fopen("../uploads/chapters/$c_id"."chap".$ch_id.".txt", "w");
                $txt = $chap_cont;
                fwrite($myfile, $txt);
                fclose($myfile);
                header("location: loadcourse.php?id=$c_id");
            }else {
                $error = "Sorry, we encountered an error. Please try again later.";
            }
        } else {
            $error = "Please fill all the information";
        }
        
    }
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && !isset($_GET["id"]))
        header("location: course.php");
    if (isset($_GET["id"]))
        $ch_id = $_GET["id"];
    $sql = "select * from chapter where id = $ch_id";
    $result = mysqli_query($db,$sql);
    $row_chap = mysqli_fetch_array($result,MYSQLI_ASSOC);
    
    $text = file_get_contents("../uploads/chapters/".$row_chap['course_id']."chap".$row_chap['id'].".txt");
    
    
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
                <h2>Edit Chapter Information</h2>
                <p><a class="btn btn-link" href="delete.php?course=<?=$row_chap['course_id'];?>&chap=<?=$ch_id;?>">Delete Chapter</a></p>
                <form method="POST" action="edit_chap.php">
                    <div class="form-group">
                        <label>Chapter Name</label><br/>
                        <input class="form-control" type="text" placeholder="Chapter name must be unique" name="chap_name" value="<?=$row_chap['chap_name'];?>" required>
                    </div>
                    <div class="form-group">
                        <label>Contents</label><br/>
                        <textarea class="form-control" placeholder="Use Markdown" name="chap_cont" rows="10" cols="30" required><?=$text;?></textarea>
                    </div>
                    <div>
                        <input type="hidden" value="<?=$ch_id;?>" name="id">
                        <input type="hidden" value="<?=$row_chap['course_id'];?>" name="c_id">
                        <input type="submit" class="btn btn-default" value="Save Chapter">
                    </div>
                </form>
            </div>
        </div>
        </div> 
    </body>
</html>