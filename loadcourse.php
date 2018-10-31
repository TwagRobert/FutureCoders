<?php
    include("config.php");
    include("parsedown/Parsedown.php");
    session_start();

    if (!isset($_SESSION['username'])) {
        header("location: sign.php");
    }
    $error = "";
    $error = (isset($_GET['ero']) && $_GET['ero'] == 1) ? "Please first delete all the chapters then proceed to delete the course." : "";
    $course_id = "";
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
                    $text = file_get_contents("uploads/chapters/$chapcid"."chap"."$chapid.txt");
                    ?>
                    <div id="<?=$chapcid."chap".$chapid;?>">
                        <div><h2><?=$chapname;?></h2></div>
                        <div id="mi_mark"><?=$Parsedown->text($text);?></div>
                    </div>
                <?php } ?>
            <?php endif; ?>
            </div>
            
            <div class="col-md-2">
            <div style="padding-top: 20px">
                <?php if ($count > 0): mysqli_data_seek($result2, 0);?>
                <?php while($value = mysqli_fetch_array($result2,MYSQLI_ASSOC)){ 
                    $chapname = $value['chap_name'];
                    $chapid = $value['id'];
                    $chapcid = $value['course_id'];
                    ?>
                    <p><a href="#<?=$chapcid."chap".$chapid;?>"><?php echo $chapname; ?></a></p>
                <?php } ?>
                <?php endif;?>
            </div>
            </div>
        </div>
        <?php include('footer.php'); ?> 
    </body>
</html>