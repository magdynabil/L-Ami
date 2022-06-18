<?php
session_start();
if (!isset($_SESSION["user_id"]))
{
    echo'<meta http-equiv="refresh" content="0;\'index.php\'"/>';
}
include_once("include/connect.php");
$msg='';
$test_num='';
$q_num='';
if(isset($_POST['delete'])) {
    $l_num=$_POST['l_num'];
    $level=$_POST['level'];
    if (empty($l_num)) {
        $msg='<div class="alert alert-danger text-center" role="alert">برجاء ادخال رقم الفديو  !</div>';
    }
    elseif (empty($level)) {
        $msg='<div class="alert alert-danger text-center" role="alert">برجاء ادخال رقم الفرقه الدراسيه  !</div>';
    }

    else{
        $delete_exam =mysqli_query($connect,"DELETE FROM `lesson` WHERE `level`='$level'AND`lesson_number`='$l_num' ");
        if (isset( $delete_exam)){
            $msg='<div class="alert alert-success" role="alert"> تم حذف الفديو بنجاح </div>';
            echo'<meta http-equiv="refresh" content="1;\'d_video.php\'"/>';

        }

    }


}
?>
<!doctype html>
<html lang="en" class="first">
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
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/responsive.css">
    <script src="ckeditor/ckeditor.js"></script>
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
<body class="text-center"  >

<?php
include_once("include/header.php");

?>
<div class="container mb-5 "style="padding-top: 400px ;padding-bottom: 140px ">
    <?php echo $msg ?>
    <br/>
    <div class="row justify-content-center">
        <div class="col-12 col-md-12 col-lg-8">
            <form method="post">
                <div class="row">
                    <div class="col">
                        <input type="number" id="level" name="level" class="form-control" placeholder="الفرقه الدراسيه ">
                    </div>
                    <div class="col">
                        <input type="number" id="l_num" name="l_num" class="form-control" placeholder="رقم الفديو ">
                    </div>
                </div>
                <button type="delete" name="delete" id="delete" class="btn btn-danger mt-2">delete</button>

            </form>
        </div>
        <!--end of col-->
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
<script src="js/custom.js"></script>
<script src="tiny/tinymce.js"></script>
<script src="js/site.js"></script>

</body>
</html>