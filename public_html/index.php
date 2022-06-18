<?php session_start();?>
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
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/responsive.css">
</head>
<body>

<div class="super_container">

    <!-- Header -->

    <?php include_once ('include/header.php');
    include_once ('include/connect.php');

    ?>

    <!-- Menu -->



    <!-- Home -->

    <div class="home">
        <div class="home_background" style="background-image: url(images/index_background.jpg);"></div>
        <div class="home_content">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h1 class="home_title"> تركيز + ثقة + مراجعة نهائيه = درجة نهائيه </h1>
                        <?php
                        if (isset($_SESSION['user_id'])) {
                            if ($_SESSION['status']=='admin'){
                                echo '
                            <a href = "all_lesson_for_3.php" type = "button" class="btn btn-primary font-weight-bold mb-1  font-italic col-lg-3" > الصف الثالث الثانوي  </a >
                        <a href = "all_lesson_for_2.php"  type = "button" class="btn btn-info font-weight-bold mb-1 font-italic col-lg-3" >الصف الثاني الثانوي  </a >
                        <a href = "all_lesson_for_1.php"  type = "button" class="btn btn-secondary font-weight-bold mb-1 font-italic col-lg-3" >الصف الاول الثانوي </a >
                            ';}
                        elseif ($_SESSION['level']=='level1'){
                                echo '  <a href = "modify_user.php"  type = "button" class="btn btn-primary font-weight-bold mb-1 font-italic col-lg-3" > تعديل البينات الشخصيه  </a >
                                    <a href = "all_lesson_for_1.php"  type = "button" class="btn btn-secondary font-weight-bold mb-1 font-italic col-lg-3" >الصف الاول الثانوي  </a >
                                    
                                    ';
                        }
                            elseif ($_SESSION['level']=='level2'){
                                echo '                                     
                                      <a href = "modify_user.php"  type = "button" class="btn btn-primary font-weight-bold mb-1 font-italic col-lg-3" > تعديل البينات الشخصيه  </a >
                                        <a href = "all_lesson_for_2.php"  type = "button" class="btn btn-secondary font-weight-bold mb-1 font-italic col-lg-3" >  الصف الثاني الثانوي    </a >
                                    ';
                            }
                            elseif ($_SESSION['level']=='level3'){
                                echo '
                                    <a href = "modify_user.php"  type = "button" class="btn btn-primary font-weight-bold mb-1 font-italic col-lg-3" > تعديل البينات الشخصيه  </a >
                                    <a href = "all_lesson_for_3.php"  type = "button" class="btn btn-secondary font-weight-bold mb-1 font-italic col-lg-3" > الصف الثالث الثانوي  </a >
                                      
                                    ';
                            }}?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Language -->


    <!-- Courses -->

    <div class="courses">
        <div class="courses_background"></div>
        <div class="container">
            <div class="row">
                <div class="col">
                </div>
            </div>
            <div class="row courses_row">

                <!-- Course -->
                <div class="col-lg-6 course_col">
                    <div class="course">
                        <div class="course_image"><img src="images/adel1.jpg" alt=""></div>
                        <div class="course_body">
                            <div class="course_title"><a href="#">L’Ami</a></div>
                            <div class="course_text">
                                <h4 class="font-weight-bold text-dark text-center">نوفر لك افضل واحدث طرق الشرح عن طريق مجموعة من الفديوهات و ملفات الشرح النظرى نقدم لك المادة العلمية الصحيحة بطريقة سلسة بعيدا عن التعقيد و بكل الاختصار و الدقة  نقدم افضل طرق المتابعة المتميزة عن طريق حل الواجبات و تقديم الاختبارات و تقييم مستوى الطالب للوصول لافضل النتائج</h4>
                            </div>
                        </div>
                        <div class="course_footer d-flex flex-row align-items-center justify-content-start">
                            <div class="course_students"><i class="fa fa-user" aria-hidden="true"></i><span></span></div>
                            <div class="course_rating ml-auto"><i class="fa fa-star" aria-hidden="true"></i><span></span></div>
                            <?php if (isset($_SESSION['user_id'])) {
                           if ($_SESSION['level']=='level1'){
                                echo '  
                                           <div class="course_mark course_free trans_200 "><a href="all_lesson_for_3.php">الصف الاول </a></div>
                                    ';
                        }
                           elseif ($_SESSION['level']=='level2'){
                               echo '                                     
                                           <div class="course_mark course_free trans_200 "><a href="all_lesson_for_3.php">الصف الثاني </a></div>
                                    ';
                           }
                           elseif ($_SESSION['level']=='level3'){
                               echo '
                                           <div class="course_mark course_free trans_200 "><a href="all_lesson_for_3.php">الصف الثالث </a></div>
                                      
                                    ';
                           }
                            }?>
                        </div>
                    </div>
                </div>

                <!-- Course -->
                <div class="col-lg-6 course_col">
                    <div class="course">
                        <div class="course_image"><img src="images/adel2.jpg" alt=""></div>
                        <div class="course_body">
                            <div class="course_title"><a href="#">M.Adel Aziz</a></div>

                            <div class="course_text">
                                <h4 class="text-center">أول موقع متخصص فى شرح مادة اللغة الفرنسية للمرحلة الثانوية و تطبيق اعلى معايير الجودة فى التعلم عن بعد و تقديم مادة علمية مبسطة و شرح متميز للوصول لاعلى استفادة و توفير الوقت و الجهد هدفنا هو وصول الطالب لاعلى درجات الاستفادة و التميز من خلال التعلم عن بعد و تقديم افضل الخدمات التعليمية</h4>
                            </div>
                        </div>
                        <div class="course_footer d-flex flex-row align-items-center justify-content-start">
                            <div class="course_students"><i class="fa fa-user" aria-hidden="true"></i><span></span></div>
                            <div class="course_rating ml-auto"><i class="fa fa-star" aria-hidden="true"></i><span></span></div>
                            <?php if (isset($_SESSION['user_id'])) {
                                if ($_SESSION['level']=='level1'){
                                    echo '  
                                           <div class="course_mark course_free trans_200 "><a href="all_test_for_1.php">  الاختبارات </a></div>
                                    ';
                                }
                                elseif ($_SESSION['level']=='level2'){
                                    echo '                                     
                                           <div class="course_mark course_free trans_200 "><a href="all_test_for_2.php">  الاختبارات </a></div>
                                    ';
                                }
                                elseif ($_SESSION['level']=='level3'){
                                    echo '
                                           <div class="course_mark course_free trans_200 "><a href="all_test_for_3.php"> الاختبارات </a></div>
                                      
                                    ';
                                }
                            }?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <!-- Register -->

    <div class="register">
        <div class="container">
            <div class="row">

                    <div class="col-lg-12 mb-5">
                        <h2 class="section_title text-center">تنبيهات واعلانات هامه </h2>
                    </div>
                <?php

                $add_1=mysqli_query( $connect ,"SELECT * FROM adds where adds_id='1'");
                $adds_1=mysqli_fetch_assoc($add_1);
                $add_2=mysqli_query( $connect ,"SELECT * FROM adds where adds_id='2'");
                $adds_2=mysqli_fetch_assoc($add_2);
                ?>
                <!-- Register Form -->

                <div class="col-lg-6">
                    <div class="register_form_container">
                        <h2><?php echo $adds_1['adds_title']; ?></h2>
                        <p><?php echo $adds_1['adds_content']; ?></p>
                    </div>
                </div>

                <!-- Register Timer -->

                <div class="col-lg-6">
                    <div class="register_form_container">
                        <h2> <?php echo $adds_2['adds_title']; ?></h2>
                        <p><?php echo $adds_2['adds_content']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Events -->

    <div class="events">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="section_title text-center">نصايح تهمك </h2>
                </div>
            </div>
            <div class="row events_row">

                <!-- Event -->
                <div class="col-lg-4 event_col text-center">
                    <div class="event">
                        <div class="event_image"><img src="images/nsr.jpg" alt=""></div>
                        <div class="event_body d-flex flex-row align-items-center justify-content-start">
                            <div class="event_title text-center"><h4 class=" text-center"> " لا تتوقف إلى أن تصبح فخوراً بنفسك ." </h4></div>

                        </div>
                    </div>
                </div>

                <!-- Event -->
                <div class="col-lg-4 event_col">
                    <div class="event">
                        <div class="event_image"><img src="images/s.jpg" alt=""></div>
                        <div class="event_body d-flex flex-row align-items-center justify-content-start">
                            <div class="event_title"><h4 href="#">. طول ما في وقت في امل </h4></div>
                        </div>
                    </div>
                </div>

                <!-- Event -->
                <div class="col-lg-4 event_col">
                    <div class="event">
                        <div class="event_image"><img src="images/event_2.jpg" alt=""></div>
                        <div class="event_body d-flex flex-row align-items-center justify-content-start">
                            <div class="event_title"><a href="#">. كل ما تمل افتكر هدفك </a></div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Blog -->

    <div class="blog">
        <div class="container">
            <div class="row row-lg-eq-height">
                <div class="col-lg-6">
                    <div class="blog_right">
                        <div class="blog_image" style="background-image:url(images/tarik.jpg)"></div>
                        <div class="blog_title_container">
                            <div class="blog_right_title"><a  class="text-primary">افضل واحدث طرق الشرح </a href="blog_single.html"></div>
                            <div class="blog_right_text">
                                <h3 class="text-center"> نوفر لك افضل واحدث طرق الشرح عن طريق مجموعة من الفديوهات و ملفات الشرح النظرى نقدم لك المادة العلمية الصحيحة بطريقة سلسة بعيدا عن التعقيد و بكل الاختصار و الدقة  نقدم افضل طرق المتابعة المتميزة عن طريق حل الواجبات و تقديم الاختبارات و تقييم مستوى الطالب للوصول لافضل النتائج </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Blog Left -->
                <div class="col-lg-6" style="height: 500px">



                                <div class="blog_right">
                                    <div class="blog_image" style="background-image:url(images/abd.jpg)"></div>
                                    <div class="blog_title_container">

                                        <div class="blog_right_title"><a class="text-primary">اعلى معايير الجودة فى التعلم </a c></div>
                                        <div class="blog_right_text">
                                            <h3 class="text-center">أول موقع متخصص فى شرح مادة اللغة الفرنسية للمرحلة الثانوية و تطبيق اعلى معايير الجودة فى التعلم عن بعد و تقديم مادة علمية مبسطة و شرح متميز للوصول لاعلى استفادة و توفير الوقت و الجهد هدفنا هو وصول الطالب لاعلى درجات الاستفادة و التميز من خلال التعلم عن بعد و تقديم افضل الخدمات التعليمية</h3>
                                        </div>
                                    </div>
                                </div>



                </div>

                <!-- Blog Right -->


            </div>
        </div>
    </div>

    <!-- Footer -->

<?php include_once ('include/footer.php')?>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/custom.js"></script>
</body>
</html>