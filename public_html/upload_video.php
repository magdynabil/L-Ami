<?php
session_start();
if (!isset($_SESSION["user_id"]))
{
    echo'<meta http-equiv="refresh" content="0;\'index.php\'"/>';
}
include_once ('include/connect.php');
$msg='';
if (isset($_POST['add_lesson'])){
    $level=$_POST['level'];
    $lesson_number=$_POST['lesson_number'];
    $lesson_name1=$_POST['lesson_name'];
    $lesson_content=$_POST['lesson_content'];
    $lesson_img=$_POST['lesson_img'];
if (isset($_FILES['lesson_video'])){
    $lesson_video=$_FILES['lesson_video'];
    $lesson_name= $lesson_video['name'];
    $lesson_tmp_name= $lesson_video['tmp_name'];
    $lesson_error= $lesson_video['error'];
    $lesson_size= $lesson_video['size'];
    $lesson_type_u=explode('.',$lesson_name);
    $lesson_type=strtolower(end($lesson_type_u));
    $allow=array('flv','mp4','mov','wmv');
    if(in_array($lesson_type,$allow)){
        if( $lesson_error==0){
            if($lesson_size<=8589934592){
                $lesson_new_name=uniqid('user',false).".".$lesson_type;
                $lesson_dir='images/video/'.$lesson_new_name;
                $lesson_DB_dir='images/video/'.$lesson_new_name;
                if(move_uploaded_file($lesson_tmp_name,$lesson_dir)){
                    $insert="INSERT INTO `lesson`(
                                                    `level`,
                                                     `lesson_number`, 
                                                     `lesson_name`, 
                                                     `lesson_content`, 
                                                     `lesson_video`,
                                                     `lesson_img`)
                                                      VALUES ('$level',
                                                      '$lesson_number',
                                                      '$lesson_name1',
                                                      '$lesson_content',
                                                      '$lesson_DB_dir',
                                                      '$lesson_img')";
                    $insert_mysqli=mysqli_query($connect,$insert);
                    if(isset($insert_mysqli)){
                        $msg='<div class="alert alert-success" role="alert"> connected </div>';
                        echo'<meta http-equiv="refresh" content="2;\'upload_video.php\'"/>';
                    }



            }else{$msg='<div class="alert alert-warning" role="alert">حدث خطااء اثناء نقل الدرس   </div>';}

            }else{$msg='<div class="alert alert-warning" role="alert">حجم الفديو اكبر من المتوقع </div>';}
        }else{$msg='<div class="alert alert-warning" role="alert">خطأ غير متوقع ! </div>';}
}else{$msg='<div class="alert alert-warning" role="alert">صيغة الملف غير مدعمه ! </div>';}
}else{$msg='<div class="alert alert-warning" role="alert">لم تقم بتحميل الصوره  ! </div>';}
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
<div class="container mb-5" style="padding-top: 200px">
    <a href="d_video.php" type="button" class="btn btn-danger mb-5 btn-block font-weight-bold ">حذف فديو شرح</a>
    <div class="col-md-12" style=" border: solid #000000 1px ; border-radius: 10px">
        <div class="form-area " >
            <h3>اضافة فديو شرح   </h3>
            <div class="col-sm-12 text-center"><?php echo $msg;?></div>
            <form method="post"  class="m-2 p-2" enctype="multipart/form-data">

                <div class="form-group row">
                    <label for="text" class="col-sm-3 col-form-label">level </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control"name="level" id="level" placeholder=" level" required>
                    </div>

                </div>   <div class="form-group row">
                    <label for="text" class="col-sm-3 col-form-label">lesson number </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control"name="lesson_number" id="lesson_number" placeholder="test number" required>
                    </div>

                </div>
                <div class="form-group row">
                    <label for="text" class="col-sm-3 col-form-label">lesson titile </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control"name="lesson_name" id="lesson_name" placeholder="test titile" required>
                    </div>

                </div>
                <div class="form-group row">
                    <label for="text" class="col-sm-3 col-form-label">lesson content </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control"name="lesson_content" id="lesson_content" placeholder="Test content" required>
                    </div>

                </div>
                <div class="form-group row">
                    <label for="FILE" class="col-sm-3 col-form-label">lesson </label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control"name="lesson_video" id="lesson_video" placeholder="Time to answer" required>
                    </div>

                </div>
                <div class=" form-group row">
                    <label for="text" class="col-sm-3 col-form-label">cover image  </label>
                    <select class="form-control col-sm-3"name="lesson_img" id="lesson_img">
                        <option value="leeson_1.jpg" >صوره 1</option>
                        <option value="leeson_2.jpg" >صوره 2</option>
                        <option value="leeson_3.jpg" >صوره 3</option>
                        <option value="leeson_4.jpg" >   صوره 4</option>
                        <option value="leeson_5.jpg" >   صوره 5</option>
                        <option value="leeson_6.jpg" >   صوره 6</option>
                        <option value="leeson_7.jpg" >   صوره 7</option>
                        <option value="leeson_8.jpg" >   صوره 8</option>
                        <option value="leeson_9.jpg" >   صوره 9</option>
                        <option value="leeson_10.jpg" >   صوره 10</option>
                    </select>
                </div>
                <hr>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <button type="submit" id="add_lesson" name="add_lesson" class="btn btn-danger w-100 ">add test data </button>
                    </div>
                </div>
            </form>
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
<script src="js/custom.js"></script>
</body>
</html>