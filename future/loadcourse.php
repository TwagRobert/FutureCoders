<?php
    include("config.php");
    include("parsedown/Parsedown.php");
    session_start();
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
    <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css'/>

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
    <title>Course | <?php echo $row_course["name"]; ?></title>
    </head>

    <body>

        <?php include('top.php'); ?>
        <!-- Jumbotron -->
        <div class="row">
            <div class="col-md-2">
                <div style="padding-top: 20px">
                    <h5>Course Profile</h5>
                    <p class="text-info"><?=$error;?></p>
                    <div>
                        <div class="card-image" ><img src='<?=$row_course["image"];?>' alt="course profile photo"></div>
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
                    $text = file_get_contents("uploads/chapters/$chapcid$chapname.txt");
                    ?>
                    <div id="#<?=$chapname;?>">
                        <div><h2><?=$chapname;?></h2></div>
                        <?=$Parsedown->text($text);?>
                    </div>
                <?php } ?>
            <?php endif; ?>
            </div>
            
            <div class="col-md-2">
            <div style="padding-top: 20px">
                <?php if ($count > 0): mysqli_data_seek($result2, 0);?>
                <?php while($value = mysqli_fetch_array($result2,MYSQLI_ASSOC)){ 
                    $chapname = $value['chap_name'];?>
                    <p><a href="#<?=$chapname;?>"><?php echo $chapname; ?></a></p>
                <?php } ?>
                <?php endif;?>
            </div>
            </div>
        </div>
        <?php include('footer.php'); ?> 
    </body>
</html>