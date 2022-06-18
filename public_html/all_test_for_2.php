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
                            <li><a href="all_test_for_2.php">اختبارات الصف الثاني </a></li>

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
                    <div class="language_title text-center">اختبارات الصف الثاني الثانوي </br>2020/2021</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Courses -->

    <div class="courses">
        <div class="container">
            <div class="row courses_row">

                <!-- Course -->
                <?php
                $posts=mysqli_query( $connect ,"SELECT * FROM add_test_data where `level`='2'");
                while($post=mysqli_fetch_assoc($posts)) {
                    echo '
                <div class="col-lg-4 course_col">
                    <div class="course">
                        <div class="course_image"><img src="images/course_4.jpg" alt=""></div>
                        <div class="course_body">
                            <div class="course_title"><a href="#">'.$post['test_1_name'].'</a></div>
                            <div class="course_info">
                                <ul>
                                    <li><a href="#" class="font-weight-bold">'.$post['test_1_time'].'</a></li>
                                </ul>
                            </div>
                            <div class="course_text">
                                <p class="font-weight-bold text-dark">'.$post['test_1_content'].'</p>
                            </div>
                             <form method="get" action="test_2.php">
                            <input type="text" class=" col-lg-12 mb-4 form-control-lg" id="code" name="code"  placeholder="ادخل كود الامتحان  ">
                            <button name="id" id="id" class="col-lg-5 btn btn-primary   float-right  mb-2 font-weight-bold" value="'.$post['test_1_number'].'">الدخول للاختبار </button>
                            </form>
                             <form method="get" action="view_last_answer_2.php">
                             <button name="id" id="id" class=" col-lg-6 btn btn-warning font-weight-bold text-light " value="'.$post['test_1_number'].'"> اجابتك السابقة</button>
                        </form>
                        </div>
                        <div class="course_footer d-flex flex-row align-items-center justify-content-start">
                            <div class="course_students"><i class="fa fa-user" aria-hidden="true"></i><span></span></div>
                            <div class="course_rating ml-auto"><i class="fa fa-star" aria-hidden="true"></i><span></span></div>
                            <div class="course_mark course_free trans_200"><a href="#">*****</a></div>
                        </div>
                    </div>
                </div>';}?>

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
<?php include_once ('include/footer.php');?>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/courses.js"></script>
</body>
</html>