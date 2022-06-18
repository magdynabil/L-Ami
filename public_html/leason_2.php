<?php
session_start();
if (!isset($_SESSION["user_id"]))
{
    echo'<meta http-equiv="refresh" content="0;\'index.php\'"/>';
}
include_once("include/connect.php");
$num=1;
$msg_l='';
$msg='';
$leson_num=$_GET['id'];
$codee=$_GET['code'];

?>
<!doctype html>
<html lang="ar" class="first">
<head>
    <!-- Required meta tags -->
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

    <style>
        body{
            background: #eee;
        }
        span{
            font-size:15px;
        }
        .box{
            padding:60px 0px;
        }

        .box-part{
            background:#FFF;
            border-radius:0;
            padding:60px 10px;
            margin:30px 0px;
        }
        .text{
            margin:20px 0px;
        }

        .fa{
            color:#4183D7;
        }
    </style>
    <title>peter magdy</title>
</head>
<body class="text-center">
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
<?php
include_once("include/header.php");
?>
<div class="home">
    <div class="breadcrumbs_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul class="breadcrumbs_list d-flex flex-row align-items-center justify-content-start">
                        <li><a href="index.php">الرئيسيه</a></li>
                        <li><a href="#">دروس الفرقه الاولي </a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$get_code=mysqli_query($connect,"SELECT * FROM `lesson_code` WHERE 	codee='$codee'");
$code_data=mysqli_fetch_assoc($get_code);
if (mysqli_num_rows($get_code) < 1){
    $msg='<div class="alert alert-warning" role="alert"> برجاء ادخال كود صحيح  </div>';
}
elseif ($code_data['code_status']=='disable'){
    $msg='<div class="alert alert-warning" role="alert"> هذا الكود مستخدم من قبل  </div>';
}
else{
    $update_code=mysqli_query($connect,"UPDATE `lesson_code` SET `code_status`='disable' WHERE codee='$codee' ");

    $posts=mysqli_query( $connect ,"SELECT * FROM `lesson` WHERE `level`='2'and`lesson_number`='$leson_num'");
    while ( $post=mysqli_fetch_assoc($posts)){
        $leson_st=$post['lesson_name'];
        $std_leson=mysqli_query( $connect ,"SELECT * FROM `user_leson` where user_id ='$_SESSION[user_id]' and leson_num='$leson_num'");
        $update_std_leson=mysqli_fetch_assoc($std_leson);
        if($update_std_leson==true){
            $msg_l='<div class="alert alert-danger font-weight-bold" role="alert"> برجاء العلم انك قد حضرت هذا الدرس من سوف تجد قائمة الدروس التي حضرتها من قبل في الصفحة الشخصيه   </div>';
        }
        else{
            $insert=mysqli_query( $connect ,"INSERT INTO `user_leson`(`user_id`, `leson_num`, `leson_name`) VALUES ('$_SESSION[user_id]','$leson_num','$leson_st')");
        }

        echo '
   
    <div class="language  ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="language_title text-center">'. $post['lesson_name'].'</div>
                    <div class="font-weight-bold text-center "> <h3 class="text-info">'. $post['lesson_content'].'</h3></div>
                    </div>

                </div>
<div class="col-sm-12 text-center">'. $msg_l.'</div>

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
} ?>



<div class="col-sm-12 text-center"><?php echo $msg;?></div>
</div>
</div>

</div>
<!--end regestration form-->
<?php
include_once("include/footer.php");
?>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/courses.js"></script>

</body>
</html>