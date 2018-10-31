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
    <title>New Course</title>
    </head>

    <body>
        <?php include('top.php'); ?>
        <!-- Jumbotron -->
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form method="post" action="php/iserttopic.php">
                    <div class="form-group">
                    <center><h2>Create a Topic</h2></center>
                        <label>Subject</label><br/>
                        <input class="form-control" type="text" placeholder="Enter the subject" name="tsujet" required>
                    </div>
                    <div class="form-group">
                        <label>Content</label></br/>
                        <textarea class="form-control" placeholder="Enter  your content here" name="tcontenu" cols="50" rows="10" required></textarea>
                    </div>
                    <div>
                        <button class="btn btn-default" name="tsubmit">Create New Topic</button>
                    </div>
                </form>
            </div>
        </div>
        <?php include('footer.php'); ?> 
    </body>
</html>