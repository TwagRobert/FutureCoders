<?php
    include("config.php");
    $error = "";
    session_start();
    if (!isset($_SESSION['log']) || empty($_SESSION['log'])) {
        header("location: index.php?ero=2");
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['chap_name']) && isset($_POST['chap_cont']) && isset($_POST['id'])) {
            $chap_name = mysqli_real_escape_string($db,$_POST['chap_name']);
            $chap_cont = $_POST['chap_cont'];
            $c_id = mysqli_real_escape_string($db, $_POST['id']);
            $sql = "insert into chapter values(null, $c_id, '$chap_name')";
            $result = mysqli_query($db,$sql);
            if ($result == True) {
                $last_id = mysqli_insert_id($db);
                $myfile = fopen("../uploads/chapters/$c_id"."chap".$last_id.".txt", "w");
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
        $c_id = $_GET["id"];
    
    
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
            <div class="col-md-8 col-md-offset-2"
                <p><?php echo $error; ?></p>
                <form method="POST" action="newchap.php">
                    <div class="form-group">
                        <label>Chapter Name</label><br/>
                        <input class="form-control" type="text" placeholder="Chapter name must be unique" name="chap_name" required>
                    </div>
                    <div class="form-group">
                        <label>Contents</label><br/>
                        <textarea class="form-control" placeholder="Use Markdown" name="chap_cont" rows="20" cols="100" required></textarea>
                    </div>
                    <div>
                        <input type="hidden" value="<?=$c_id;?>" name="id">
                        <input class="btn btn-default" type="submit" value="Save Chapter">
                    </div>
                </form>
            </div>
        </div>
        </div>
    </body>
</html>