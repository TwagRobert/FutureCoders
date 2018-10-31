<?php
    include("config.php");
    session_start();
    if (!isset($_SESSION['log']) || empty($_SESSION['log'])) {
        header("location: index.php?ero=2");
    }
    if (isset($_GET['course'])){
        if (isset($_GET['chap'])) {
            $chap = mysqli_real_escape_string($db, $_GET['chap']);
            $course = mysqli_real_escape_string($db, $_GET['course']);
            $sql = "select chap_name from chapter where id = $chap";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            
            $sql = "delete from chapter where id = $chap";
            $result = mysqli_query($db, $sql);
            if ($result == True) {
                unlink("../uploads/chapters/".$course.$row['chap_name'].".txt");
                header("location: loadcourse.php?id=$course");
            }else {
                die("Sorry, we encountered an error. Please try again later.");
            }
        } else {
            $course = mysqli_real_escape_string($db, $_GET['course']);
            $sql = "select * from chapter where course_id = $course";
            $result = mysqli_query($db, $sql);
            if (mysqli_num_rows($result) == 0) {
                $sql = "delete from course where id = $course";
                $result = mysqli_query($db, $sql);
                if ($result == True) {
                    header("location: course.php");
                }else {
                    die("Sorry, we encountered an error. Please try again later.");
                }
                
            }
            else {
                header("location: loadcourse.php?id=$course&ero=1");
            }
            
        }
    }
?>