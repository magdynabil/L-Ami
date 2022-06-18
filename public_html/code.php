<?php
session_start();
if (!isset($_SESSION["user_id"]))
{
    echo'<meta http-equiv="refresh" content="0;\'index.php\'"/>';
}
include_once("include/connect.php");
$msg='';
$status='disable';
$code_status='active';
if(isset($_POST['add_code'])) {
    for ( $i=1; $i<=100; $i++){
        $rundom_1=random(14);
        $user_name_check=mysqli_query($connect,"SELECT * FROM `code` WHERE `codee`='$rundom_1'");
        if (mysqli_num_rows($user_name_check) > 0){
            continue;
        }
        else{
            $insert="INSERT INTO `code`( `codee`, `code_status`) VALUES ('$rundom_1','$code_status')";
            $insert_code=mysqli_query($connect,$insert);
            echo'<meta http-equiv="refresh" content="2;\'code.php\'"/>';
        }

    }
    $msg='<div class="alert alert-success" role="alert"> تم اضافة اكواد الاختبارات  بنجاح </div>';
}
elseif (isset($_POST['delete'])){
    $delete= "DELETE  FROM `code` WHERE code_status ='$status'";
    $delete_code=mysqli_query($connect,$delete);
    $msg='<div class="alert alert-success" role="alert"> تم حذف الاكواد الغير نشطة بنجاح  الكود بنجاح </div>';
    echo'<meta http-equiv="refresh" content="2;\'code.php\'"/>';
}
elseif (isset($_POST['ac'])){
    $up= "UPDATE `code` SET `code_status`='active'";
    $up_code=mysqli_query($connect,$up);
    $msg='<div class="alert alert-success" role="alert"> تم تفعيل الاكواد بنجاح </div>';
    echo'<meta http-equiv="refresh" content="2;\'code.php\'"/>';
}
if(isset($_POST['lesson_code'])) {
    for ( $i=1; $i<=100; $i++){
        $rundom_2=random_lesson(14);
        $user_name_check_2=mysqli_query($connect,"SELECT * FROM `code` WHERE `codee`='$rundom_2'");
        if (mysqli_num_rows($user_name_check_2) > 0){
            continue;
        }
        else{
            $insert_2="INSERT INTO `lesson_code`( `codee`, `code_status`) VALUES ('$rundom_2','$code_status')";
            $insert_code=mysqli_query($connect,$insert_2);
            echo'<meta http-equiv="refresh" content="2;\'code.php\'"/>';
        }

    }
    $msg='<div class="alert alert-success" role="alert"> تم اضافة اكواد الدروس  بنجاح </div>';
}
elseif (isset($_POST['delete_code'])){
    $delete= "DELETE  FROM `lesson_code` WHERE code_status ='$status'";
    $delete_code=mysqli_query($connect,$delete);
    $msg='<div class="alert alert-success" role="alert"> تم حذف الاكواد الغير نشطة بنجاح  الكود بنجاح </div>';
    echo'<meta http-equiv="refresh" content="2;\'code.php\'"/>';
}

?>
<!doctype html>
<html lang="en" class="first">
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

<?php
include_once("include/header.php");

?>
<div class="container "style="padding-top: 200px;padding-bottom: 140px">
    <?php echo $msg ?>
    <br/>
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
            <h4 class="m-2 table-info ">التحكم في اكواد الاختبارات  </h4>
            <form class="card card-sm " method="post">
                <div class="card-body row no-gutters align-items-center">
                    <!--end of col-->
                    <!--end of col-->
                    <div class="col-auto">
                        <button class="btn btn-lg btn-success " type="add_code" name="add_code">اضافة 100 كود  </button>
                        <a href="show_all_code.php" class="btn btn-lg btn-info"  >عرض الاكواد   </a>
                        <button class="btn btn-lg btn-danger" type="delete" name="delete" id="delete">مسح الاكواد الغير نشطة </button>
                        <button class="btn btn-lg btn-dark"  name="ac" id="ac">تفعيل الاكواد </button>

                    </div>
                    <!--end of col-->
                </div>


            </form>
            <h4 class="m-2 table-secondary ">التحكم في اكواد الشرح </h4>
            <form class="card card-sm " method="post">
                <div class="card-body row no-gutters align-items-center">
                    <!--end of col-->
                    <!--end of col-->
                    <div class="col-auto">
                        <button class="btn btn-lg btn-warning " type="lesson_code" name="lesson_code">اضافة 100 كود  </button>
                        <a href="show_all_lesson_code.php" class="btn btn-lg btn-secondary"  >عرض الاكواد   </a>
                        <button class="btn btn-lg btn-dark" type="delete" name="delete_code" id="delete_code">مسح الاكواد الغير نشطة </button>

                    </div>
                    <!--end of col-->
                </div>


            </form>
        </div>
        <form method="post">
        </form>
        <!--end of col-->
        <?php



        function random($length){
            return substr(str_shuffle('1234567890adelaziz'),0,$length);
        }
        function random_lesson($length){
            return substr(str_shuffle('1234567890minssamir'),0,$length);
        }
        echo"<div class='col-lg-6 border font-weight-bold mt-5 p-2'>";

        echo '</br>';
        echo"</div>";

        ?>
    </div>
</div>
<?php
include_once("include/footer.php");
?>
<!--end regestration form-->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/courses.js"></script>

</body>
</html>