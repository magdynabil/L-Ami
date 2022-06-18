<?php
include_once("include/connect.php");
session_start();
if (!isset($_SESSION["user_id"]))
{
    echo'<meta http-equiv="refresh" content="0;\index.php\'"/>';
}
$get_post=mysqli_query($connect,"SELECT * FROM sin_up WHERE user_id='$_SESSION[user_id]'");
$post=mysqli_fetch_assoc( $get_post);
$msg='';
if(isset($_POST['submit'])){
    $user=$_POST['user'];
    $user_name=$_POST['user_name'];
    $address=$_POST['address'];
    $phone=$_POST['phone'];
    $fphone=$_POST['fphone'];
    $year=$_POST['year'];
    $level=$_POST['level'];
    $group=$_POST['group'];
    $status='user';
    $date=date("y-m-d");
    if(empty($user)){
        $msg='<div class="alert alert-warning" role="alert"> برجاء ادخال اسم المستخدم كامل بالغة العربية </div>';
    }
    elseif (empty($user_name)){
        $msg='<div class="alert alert-warning" role="alert"> برجاء ادخال اسم المستخدم  </div>';
    }
    elseif (empty($_POST['Password'])){
        $msg='<div class="alert alert-warning" role="alert"> برجاء ادخال كلمة المرور</div>';
    }

    elseif (empty($phone)){
        $msg='<div class="alert alert-warning" role="alert"> برجاء ادخال رقم التلفون</div>';
    }
    elseif(empty($fphone)){
        $msg='<div class="alert alert-warning" role="alert"> برجاء ادخال رقم تلفون ولي الامر </div>';
    }
    else{
        $user_name_check=mysqli_query($connect,"SELECT user_name FROM sin_up WHERE user_name='$user_name'");
        if (mysqli_num_rows($user_name_check) > 0){
            $msg='<div class="alert alert-warning" role="alert">اسم المستخدم موجود بالفعل  </div>';
        }

        else{
            $password=md5($_POST['Password']);
            $insert="UPDATE `sin_up` SET `user`='$user',`user_name`='$user_name',`Password`='$password',`address`='$address',`phone`='$phone',`fphone`='$fphone',`year`='$year',`level`='$level',`group`='$group' WHERE `user_id`='$_SESSION[user_id]' ";
            $insert_code=mysqli_query($connect,$insert);
            $msg='<div class="alert alert-success" role="alert"> تم تعديل البينات  بنجاح </div>';
            if(isset($insert_mysqli)){

                $user_info=mysqli_query($connect,"SELECT* FROM sin_up WHERE user_name='$user'");
                $student=mysqli_fetch_assoc($user_info);
                $_SESSION['user_id']=$student['user_id'];
                $_SESSION['user']=$student['user'];
                $_SESSION['user_name']=$student['user_name'];
                $_SESSION['Password']=$student['Password'];
                $_SESSION['address']=$student['address'];
                $_SESSION['phone']=$student['phone'];
                $_SESSION['fphone']=$student['fphone'];
                $_SESSION['year']=$student['year'];
                $_SESSION['level']=$student['level'];
                $_SESSION['date']=$student['date'];
                $_SESSION['status']=$student['status'];
                echo'<meta http-equiv="refresh" content="1;\'index.php\'"/>';


            }

        }

    }
}
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


    <?php include_once('include/header.php')?>


    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4 mt-5 pt-5" >
        <div class="container mt-5 pt-5">
            <div class="row align-items-end justify-content-center text-center">
                <div class="col-lg-7">
                    <h2 class="mb-0">تعديل البينات الشخصية  </h2>
                    <p>اذا كان هناك اي اخطاء في بيناتك الشخصيه يمكنك تعديلها من هذه الصفحة </p>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section">
        <div class="container">
            <div class="col-sm-12 text-center"><?php echo $msg;?></div>

            <form method="post">
                <div class="row justify-content-center">

                    <div class="col-md-5">
                        <div class="row">

                            <div class="col-md-12 form-group">
                                <label for="username">اسم المستخدم ثلاثي بالعربي </label>
                                <input type="text" id="user" name="user" class="form-control form-control-lg" value="<?php echo $post['user']; ?>" placeholder="اسم المستخدم ثلاثي بالعربي">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="email">اسم المستخدم بالانجليزي </label>
                                <input type="text" id="user_name" name="user_name" placeholder="اسم المستخدم بالانجليزي" class="form-control form-control-lg" value="<?php echo $post['user_name']; ?>">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="pword">كلمة المرور</label>
                                <input type="password" id="Password" name="Password" placeholder="كلمة المرور " class="form-control form-control-lg">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="pword2">العنوان </label>
                                <input type="text" id="address" name="address" placeholder="العنوان " class="form-control form-control-lg" value="<?php echo $post['address']; ?>">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="pword2">رقم التلفون </label>
                                <input type="text" id="phone" name="phone" placeholder="رقم التلفون " class="form-control form-control-lg" value="<?php echo $post['phone']; ?>">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="pword2">رقم تلفون ولي الامر  </label>
                                <input type="text" id="fphone" name="fphone" placeholder="رقم تلفون ولي الامر  " class="form-control form-control-lg" value="<?php echo $post['fphone']; ?>">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="input8">السنه الدراسية </label>
                                <select class="form-control form-control-lg" id="year"name="year">
                                    <option value="2021" >2020-2021</option>
                                </select>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="input5" >الفرقة الدراسية </label>
                                <select class="form-control form-control-lg" id="level"name="level" value="<?php echo $post['level']; ?>">
                                    <option value="level1" >الصف الاول الثانوي</option>
                                    <option value="level2" >الصف الثاني الثانوي</option>
                                    <option value="level3" >الصف الثالث الثانوي</option>
                                </select>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="input5">المجموعة  </label>
                                <select class="form-control form-control-lg" id="group"name="group" value="<?php echo $post['group']; ?>">
                                    <option value="0" >غير مقيد في مجموعة</option>
                                    <option value="1" >  المجموعة الاولي</option>
                                    <option value="2" >  المجموعة الثانيه</option>
                                    <option value="3" >  المجموعة الثالثة</option>
                                    <option value="4" >  المجموعة الرابعة</option>
                                    <option value="5" >  المجموعة الخامسة</option>
                                    <option value="6" >  المجموعة السادسة</option>
                                    <option value="7" >  المجموعة السابعة</option>
                                    <option value="8" >  المجموعة الثامنة</option>
                                    <option value="9" >  المجموعة التاسعة</option>
                                    <option value="10" >  المجموعة العاشرة</option>
                                </select>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12">
                                <input type="submit" name="submit" value="تعديل البينات الشخصية  " class="btn btn-primary btn-lg px-5 btn-block mb-5">
                            </div>
                        </div>
                    </div>

                </div>
            </form>



        </div>
    </div>
    <?php include_once('include/footer.php')?>
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