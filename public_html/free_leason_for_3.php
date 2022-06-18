<?php
session_start();
if (!isset($_SESSION["user_id"]))
{
    echo'<meta http-equiv="refresh" content="0;\'index.php\'"/>';
}
$leson_num=$_GET['id'];
include_once("include/connect.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Adel Aziz</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Lingua project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="styles/courses.css">
    <link rel="stylesheet" type="text/css" href="styles/courses_responsive.css">
</head>
<body>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript">
    $(function() {
        $(this).bind("contextmenu", function(e) {
            e.preventDefault();
        });
    });
</script>
<script type="text/JavaScript">
    function killCopy(e){ return false }
    function reEnable(){ return true }
    document.onselectstart=new Function ("return false");
    if (window.sidebar)
    {
        document.onmousedown=killCopy;
        document.onclick=reEnable;
    }

</script>

<div class="super_container ">

    <!-- Header -->
    <?php include_once ('include/header.php');

    $posts=mysqli_query( $connect ,"SELECT * FROM `lesson` WHERE `level`='3'and`lesson_number`='$leson_num'");
    while ( $post=mysqli_fetch_assoc($posts)){

        echo '
   
    <div class="language  ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="language_title text-center">'. $post['lesson_name'].'</div>
                    <div class="font-weight-bold text-center "> <h3 class="text-info">'. $post['lesson_content'].'</h3></div>
                    </div>

                </div>


            </div>
        </div>
    </div>
<div class="container mb-5"style="cursor: not-allowed !important;">
    <div ></div>
    <video class="col-lg-12" controls controlsList="nodownload" controls disablePictureInPicture >
        <source src="'. $post['lesson_video'].'" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</div>';}



    ?>

    <!-- Footer -->
    <?php include_once ('include/footer.php');?>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="styles/bootstrap4/popper.js"></script>
    <script src="styles/bootstrap4/bootstrap.min.js"></script>
    <script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="plugins/easing/easing.js"></script>
    <script src="js/courses.js"></script>
</body>
</html>