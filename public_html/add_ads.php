<?php
session_start();
if (!isset($_SESSION["user_id"]))
{
    echo'<meta http-equiv="refresh" content="0;\'index.php\'"/>';
}
include_once("include/connect.php");
$msg_1='';
$msg_2='';
if(isset($_POST['add_ads_1'])){
    $title_1=$_POST['title_1'];
    $content_1=$_POST['content_1'];

    if(empty($title_1)){
        $msg_1='<div class="alert alert-warning" role="alert"> برجاء ادخال عنوان الاعلان </div>';
    }
    elseif(empty($content_1)){
        $msg_1='<div class="alert alert-warning" role="alert"> برجاء ادخال محتوي الاعلان  </div>';
    }
    else{
        $insert = "UPDATE `adds` SET `adds_title`='$title_1',`adds_content`='$content_1' WHERE `adds_id`='1' ";
        $insert_code = mysqli_query($connect, $insert);
        $msg_1= '<div class="alert alert-success" role="alert"> تم اضافة الاعلان بنجاح </div>';
    }
}
if(isset($_POST['add_ads_2'])){
    $title_2=$_POST['title_2'];
    $content_2=$_POST['content_2'];

    if(empty($title_2)){
        $msg_2='<div class="alert alert-warning" role="alert"> برجاء ادخال عنوان الاعلان </div>';
    }
    elseif(empty($content_2)){
        $msg_2='<div class="alert alert-warning" role="alert"> برجاء ادخال محتوي الاعلان  </div>';
    }
    else{
        $insert = "UPDATE `adds` SET `adds_title`='$title_2',`adds_content`='$content_2' WHERE `adds_id`='2' ";
        $insert_code = mysqli_query($connect, $insert);
        $msg_1= '<div class="alert alert-success" role="alert"> تم اضافة الاعلان بنجاح </div>';
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
    <link rel="stylesheet" type="text/css" href="styles/courses.css">
    <link rel="stylesheet" type="text/css" href="styles/courses_responsive.css">

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
<body class="text-center">

<?php
include_once("include/header.php");
?>
<div class="container mb-5" style="padding-top: 200px ">
    <div class="col-md-12" style=" border: solid #000000 1px ; border-radius: 10px">
        <div class="form-area " >
            <h3>اضافة الاعلان الاول </h3>
            <div class="col-sm-12 text-center"><?php echo $msg_1;?></div>
            <form method="post"  class="m-2 p-2">

                <div class="form-group row">
                    <label for="text" class="col-sm-3 col-form-label">title </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control"name="title_1" id="title_1" placeholder="title">
                    </div>

                </div>
                <div class="form-group row">
                    <label for="text" class="col-sm-3 col-form-label">content</label>
                    <div class="col-sm-8">
                        <textarea type="text" class="form-control"name="content_1" id="content_1" placeholder="content"></textarea>
                        <script type="text/javascript"> CKEDITOR.replace( 'content_1');</script>
                    </div>

                </div>

                <hr>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <button type="submit" id="add_ads_1" name="add_ads_1" class="btn btn-danger w-100 ">اضافة الاعلان الاول </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end regestration form-->
<div class="container mb-5" style="padding-top: 150px ">
    <div class="col-md-12" style=" border: solid #000000 1px ; border-radius: 10px">
        <div class="form-area " >
            <h3>اضافة الاعلان الثاني </h3>
            <div class="col-sm-12 text-center"><?php echo $msg_2;?></div>
            <form method="post"  class="m-2 p-2">

                <div class="form-group row">
                    <label for="text" class="col-sm-3 col-form-label">title</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control"name="title_2" id="title_2" placeholder="title">
                    </div>

                </div>
                <div class="form-group row">
                    <label for="text" class="col-sm-3 col-form-label">content </label>
                    <div class="col-sm-8">
                        <textarea type="text" class="form-control"name="content_2" id="content_2" placeholder="content"></textarea>
                        <script type="text/javascript"> CKEDITOR.replace( 'content_2');</script>
                    </div>

                </div>

                <hr>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <button type="submit" id="add_ads_2" name="add_ads_2" class="btn btn-danger w-100 ">اضافة الاعلان الثاني  </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
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