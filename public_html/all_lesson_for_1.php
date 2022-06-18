<?php
session_start();
if (!isset($_SESSION["user_id"]))
{
    echo'<meta http-equiv="refresh" content="0;\'index.php\'"/>';
}
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

<div class="super_container">

    <!-- Header -->
    <?php include_once ('include/header.php')?>

    <!-- Menu -->

    <!-- Home -->

    <div class="home">
        <div class="breadcrumbs_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <ul class="breadcrumbs_list d-flex flex-row align-items-center justify-content-start">
                            <li><a href="index.php">الرئيسيه</a></li>
                            <li><a href="all_lesson_for_1.php">الصف الاول  </a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Language -->

    <div class="language">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="language_title text-center">الصف الاول  الثانوي </br>2020/2021</div>
                    <div class="language_title text-center"> <a href = "all_test_for_1.php" type = "button" class="btn btn-primary font-weight-bold mb-1  font-italic col-lg-3" > اختبارات الصف الاول الثانوي </a >
                    </div>

                </div>


            </div>
        </div>
    </div>

    <!-- Courses -->

    <div class="courses">
        <div class="container">
            <div class="row courses_row">
                <div class="col-lg-4 course_col">
                    <div class="course">
                        <div class="course_image"><img src="images/course_4.jpg" alt=""></div>
                        <div class="course_body">
                            <div class="course_title"><a href="#">مراجعه وحل اختبارات  </a></div>

                            <div class="course_text">
                                <p class="font-weight-bold text-dark">حل اسئلة الاختبارات واسئلة الكومنتات  </p>
                            </div>
                            <form method="get" action="free_leason_for_1.php">
                                <p class="desc mb-4 table-primary font-weight-bold form-control-lg">هذا الدرس متاح بشكل مجاني </p>
                                <button name="id" id="id" class="col-lg-12 btn btn-primary   float-right  mb-2 font-weight-bold" value="1">مشاهدة </button>
                            </form>
                        </div>
                        <div class="course_footer d-flex flex-row align-items-center justify-content-start">
                            <div class="course_students"><i class="fa fa-user" aria-hidden="true"></i><span></span></div>
                            <div class="course_rating ml-auto"><i class="fa fa-star" aria-hidden="true"></i><span></span></div>
                            <div class="course_mark course_free trans_200"><a href="#">*****</a></div>
                        </div>
                    </div>
                </div>
                <!-- Course -->
                <?php
                $posts=mysqli_query( $connect ,"SELECT * FROM lesson WHERE `level`='1'");
                while($post=mysqli_fetch_assoc($posts)) {
                    if ($post['lesson_number'] > 1){
                    echo '
                <div class="col-lg-4 course_col">
                    <div class="course">
                        <div class="course_image"><img src="images/lesson_img/'.$post['lesson_img'].'" alt=""></div>
                        <div class="course_body">
                            <div class="course_title"><a href="#">'.$post['lesson_name'].'</a></div>
                     
                            <div class="course_text">
                                <p class="font-weight-bold text-dark">'.$post['lesson_content'].'</p>
                            </div>
                             <form method="get" action="leason_1.php">
                            <input type="text" class=" col-lg-12 mb-4 form-control-lg" id="code" name="code"  placeholder="ادخل كود الامتحان  ">
                            <button name="id" id="id" class="col-lg-12 btn btn-primary   float-right  mb-2 font-weight-bold" value="'.$post['lesson_number'].'">الدخول للاختبار </button>
                        </div>
                        <div class="course_footer d-flex flex-row align-items-center justify-content-start">
                            <div class="course_students"><i class="fa fa-user" aria-hidden="true"></i><span></span></div>
                            <div class="course_rating ml-auto"><i class="fa fa-star" aria-hidden="true"></i><span></span></div>
                            <div class="course_mark course_free trans_200"><a href="#">*****</a></div>
                        </div>
                    </div>
                </div>';}}?>

                <!-- Course -->


                <!-- Course -->


                <!-- Course -->

                <!-- Course -->


                <!-- Course -->


                <!-- Course -->


                <!-- Course -->


                <!-- Course -->


            </div>
        </div>
    </div>

    <!-- Footer -->


</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/courses.js"></script>
</body>
</html>