<?php
include_once('include/connect.php');
session_start();

$msg='';
if (isset($_POST['log_in'])){
    $user=$_POST['user'];

    $password=md5($_POST['pass']);
    if(empty($user)){
        $msg='<div class="alert alert-warning" role="alert">برجاء ادخال اسم المستخدم </div>';
    }
    elseif(empty($_POST['pass'])){
        $msg='<div class="alert alert-warning" role="alert"> برجاء ادخال كلمة المرور </div>';

    }else{
        $sql=mysqli_query($connect,"SELECT * FROM `sin_up` WHERE password ='$password'and user_name='$user'");
        if(mysqli_num_rows($sql) !=1){

            $msg='<div class="alert alert-warning" role="alert"> اسم المستخدم او كلمة المرور غير صحيح </div>';
        }
        else{
            $user_info=mysqli_query($connect,"SELECT* FROM sin_up WHERE user_name='$user'");
            $student=mysqli_fetch_assoc($user_info);
            $_SESSION['user_id']=$student['user_id'];
            $_SESSION['user']=$student['user'];
            $_SESSION['user_name']=$student['user_name'];
            $_SESSION['Password']=$student['Password'];
            $_SESSION['address']=$student['address'];
            $_SESSION['phone']=$student['phone'];
            $_SESSION['fphone']=$student['fphone'];
            $_SESSION['group']=$student['group'];
            $_SESSION['year']=$student['year'];
            $_SESSION['level']=$student['level'];
            $_SESSION['date']=$student['date'];
            $_SESSION['status']=$student['status'];
            $msg='<div class="alert alert-success" role="alert"> جاري تسجيل الدخول  </div>';
            echo'<meta http-equiv="refresh" content="1;\'index.php\'"/>';
        }

    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Courses</title>
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
    <script src="ckeditor/ckeditor.js"></script>



</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>



    <?php include_once ('include/header.php')?>


    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4 mt-5 pt-5" >
        <div class="container">
            <div class="row align-items-end justify-content-center text-center mt-5 pt-5">
                <div class="col-lg-7">
                    <h2 class="mb-0"><?php if (isset($_SESSION['user_id'])){echo 'الصفحة الشخصية ';} else{echo 'تسجيل الدخول ';} ?></h2>
                    <p><?php if (isset($_SESSION['user_id'])){echo 'تابع مستواك هنا يمكنك معرفة درجاتك في الامتحانات السابقة طوال العام  ';} else{echo 'قم بتسجيل الدخول للتتمكن من الدخول الي الاختبارات';} ?> </p>
                </div>
            </div>
        </div>
    </div>
    <?php
    if(isset($_SESSION['user_id'])){
        echo '
    <section class="login-block m-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 login-sec ">
                    <h3 class="text-center"dir="rtl" align="right" style="margin-top:20px">مرحبا <span class="font-weight-bold text-center text-warning">'.ucfirst( $_SESSION['user']).'</span> </h3>
                    <p class="font-weight-bold text-center text-dark">'.substr($_SESSION['phone'],0,50).'  : رقم التلفون </p>
                    <p class="font-weight-bold text-center text-dark">'.$_SESSION['fphone'].' : رقم تلفون ولي الامر </p>
                    <p class="font-weight-bold text-center text-dark">'.$_SESSION['year'].' : السنة الدراسية </p>
                    <p class="font-weight-bold text-center text-dark">'.$_SESSION['group'].' : المجموعة رقم  </p>
                    <p class="font-weight-bold text-center text-dark">'.$_SESSION['level'].' : الفرقة الدراسية </p> ';
        echo '
        <h3 class=" font-weight-bold text-center text-dark"> الدروس الي قمت بمشاهدتها من قبل </h3>';
        $std_l=mysqli_query( $connect ,"SELECT * FROM `user_leson` WHERE `user_id` = '$_SESSION[user_id]'") ;
        while ($update_std_l=mysqli_fetch_assoc($std_l)){
            echo '<h4 class="table-success font-weight-bold text-center text-danger">'.$update_std_l['leson_name'].'</h4>';
        }
        echo '
        <h3 class=" font-weight-bold text-center text-dark"> درجاتك في  الامتحنات السابقة  </h3>';
        $std_degree=mysqli_query( $connect ,"SELECT * FROM `student_2_degree` WHERE `stud_id` = '$_SESSION[user_id]'") ;
        while ($update_std_degree=mysqli_fetch_assoc($std_degree)){
            echo '<p class="table-success font-weight-bold text-center">درجة الاختبار رقم <span class="text-danger  " >'.$update_std_degree['test_number'].'</span>  هي <span class="text-danger  " >'.$update_std_degree['degree'].'</span> درجات </p>';
        }

        echo'
                    <div class="form-group text-center ">
                        <a style="margin-bottom: -10px;" href="include/logout.php?id='.$_SESSION['user_id'].'" class="btn float-right login_btn btn-danger ">تسجيل الخروج </a>
                        <a style="margin-bottom: -10px;" href="index.php" class="btn float-left login_btn btn-success">عودة للتصفح </a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    ';

    } else{ echo ' <div class="site-section">
        <div class="container">
<div class="col-lg-12 text-center" >'.$msg.'</div>

            <div class="row justify-content-center" style="margin-bottom: 200px">
                <form class="col-md-5" method="post">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="username">اسم المستخدم </label>
                            <input type="text" id="user" name="user" placeholder="User Name" class="form-control form-control-lg">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="pword">كلمة المرور </label>
                            <input type="password" id="pass" name="pass" placeholder="password" class="form-control form-control-lg">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="submit" value="تسجيل الدخول  " id="log_in" name="log_in" class="btn btn-primary btn-lg px-5">
                        </div>
                    </div>
                </form>
            </div>



        </div>
    </div>';}?>




    <?php include_once ('include/footer.php')?>


</div>
<!-- .site-wrap -->

<!-- loader -->

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/courses.js"></script>

</body>

</html>