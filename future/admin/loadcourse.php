<?php
    include("config.php");
    include("../parsedown/Parsedown.php");
    session_start();
    if (!isset($_SESSION['log']) || empty($_SESSION['log'])) {
        header("location: index.php?ero=2");
    }
    $error = "";
    $error = (isset($_GET['ero']) && $_GET['ero'] == 1) ? "Please first delete all the chapters then proceed to delete the course." : "";
    $course_id = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST["id"])){
            $c_id = $_POST['id'];
            $course_id = $c_id;
            if ($_FILES['userfile']['size'] > 0) {
                if (file_exists($_FILES['userfile']['tmp_name'])){
                    $imagesizedata = getimagesize($_FILES['userfile']['tmp_name']);
                    if ($imagesizedata == False) {
                        $error = "Please enter a valid image.";
                    } else {
                        $uploaddir = 'uploads/profile/';
                        $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
                        $sql = "update course set image = '$uploadfile' where id = $c_id";
                        $result = mysqli_query($db,$sql);
                        if ($result == True){
                            if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
                                $error =  "Image is valid, and was successfully uploaded.";
                            } else {
                                $error =  "Possible file upload attack!";
                                mysqli_rollback($db);
                            }
                        } else {
                            $error = "image was not uploaded due to database error.";
                        }
                    }
                } else {
                    $error = "Please select a valid image.";
                }
            } else {
                $error = "Please select an image to upload.";
            }
        } else {
            header("location: course.php?ero=1");
        }
    }
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && !isset($_GET["id"]))
        header("location: course.php?ero=2");
    if (isset($_GET["id"]))
        $course_id = $_GET["id"];
    $sql = "SELECT * FROM course WHERE id = $course_id";
    $result = mysqli_query($db,$sql);
    if (mysqli_num_rows($result) <= 0) {
        header("location: course.php?ero=3");
    }
    $row_course = mysqli_fetch_array($result,MYSQLI_ASSOC);
    if ($_SESSION['log'] != $row_course['user_id'])
        header("location: course.php?ero=2");
    $sql = "SELECT * FROM chapter WHERE course_id = $course_id";
    $result2 = mysqli_query($db,$sql);
    // $row_chap = mysqli_fetch_array($result2,MYSQLI_ASSOC);
    $count = mysqli_num_rows($result2);
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
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <div>
                    <h3>Course Profile</h3>
                    <p class="text-info"><?=$error;?></p>
                    <p><a href="edit_course.php?id=<?=$row_course['id'];?>">Edit Course Info</a></p>
                    <div>
                    
                        <div class="card-image" ><img class="media-object image-responsive" width="100" height="100" src='../<?=$row_course["image"];?>' alt="course profile photo"></div>
                        <form method="POST" action="loadcourse.php" enctype="multipart/form-data">
                            <!-- <input type="hidden" name="MAX_FILE_SIZE" value="30000"> -->
                            <input type="hidden" name="id" value="<?=$row_course['id'];?>">
                            <div class="form-group"><label>Change Profile Photo </label><br/><input class="form-control" name="userfile" type="file"><br/></div>
                            <input type="submit" class="btn btn-default" value="Upload Photo">
                        </form>
                    </div> 
                    <div>
                        <p> <?php echo $row_course["name"] ?></p>
                    </div>
                    <div>
                        <p> <?php echo $row_course["description"] ?> </p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-8" style="text-align: left">
            <?php if ($count <= 0): ?>
            <p>No chapters created for this course yet.</p>
            <?php else:
                while ($value = mysqli_fetch_array($result2,MYSQLI_ASSOC)) {
                    $chapname = $value['chap_name'];
                    $chapid = $value['id'];
                    $chapcid = $value['course_id'];
                    $Parsedown = new Parsedown();
                    $text = file_get_contents("../uploads/chapters/$chapcid$chapname.txt");
                    ?>
                    <div id="#<?=$chapname;?>">
                        <div><h2><?=$chapname;?> <a style="float: right; font-size: 14px" href="edit_chap.php?id=<?=$chapid;?>">Edit Chapter</a></h2></div>
                        <?=$Parsedown->text($text);?>
                    </div>
                <?php } ?>
            <?php endif; ?>
            </div>
            
            <div class="col-md-2">
                <p><a href="newchap.php?id=<?=$course_id;?>">Add new chapter</a></p>
                <?php if ($count > 0): mysqli_data_seek($result2, 0);?>
                <?php while($value = mysqli_fetch_array($result2,MYSQLI_ASSOC)){ 
                    $chapname = $value['chap_name'];?>
                    <p><a href="#<?=$chapname;?>"><?php echo $chapname; ?></a></p>
                <?php } ?>
                <?php endif;?>
            </div>
        </div>
        </div>
    </body>
</html>