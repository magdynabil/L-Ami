<?php
session_start();
if (!isset($_SESSION["user_id"]))
{
    echo'<meta http-equiv="refresh" content="0;\'index.php\'"/>';
}
include_once("include/connect.php");
$msg='';
if(isset($_POST['add_test_data_for_3'])){
    $level=$_POST['level'];
    $test_3_name=$_POST['test_3_name'];
    $test_3_number=$_POST['test_3_number'];
    $test_3_content=$_POST['test_3_content'];
    $test_3_time=$_POST['test_3_time'];


        $insert = "INSERT INTO `add_test_data`(`level`,
                                                `test_1_number`,
                                                    `test_1_name`,
                                                `test_1_content`,
                                                 `test_1_time`
                                                 ) 
                                                 VALUES (
                                                 '$level',
                                                 '$test_3_number',
                                                 '$test_3_name',
                                                '$test_3_content',
                                                 '$test_3_time') ";
        $insert_code = mysqli_query($connect, $insert);
        $msg = '<div class="alert alert-success" role="alert"> تم اضافة الامتحان بنجاح </div>';
        echo'<meta http-equiv="refresh" content="1;\'add_test_data_for_1.php\'"/>';
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
    <a href="d_test_data.php" type="button" class="btn btn-danger mb-5 btn-block font-weight-bold ">حذف بينات اختبار </a>

    <div class="col-md-12" style=" border: solid #000000 1px ; border-radius: 10px">
        <div class="form-area " >
            <h3>اضافة بينات اختبار  </h3>
            <div class="col-sm-12 text-center"><?php echo $msg;?></div>
            <form method="post"  class="m-2 p-2">

                <div class="form-group row">
                    <label for="text" class="col-sm-3 col-form-label">level </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control"name="level" id="level" placeholder=" level" required>
                    </div>

                </div>   <div class="form-group row">
                    <label for="text" class="col-sm-3 col-form-label">test number </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control"name="test_3_number" id="test_3_number" placeholder="test number" required>
                    </div>

                </div>
                <div class="form-group row">
                    <label for="text" class="col-sm-3 col-form-label">test titile </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control"name="test_3_name" id="test_3_name" placeholder="test titile" required>
                    </div>

                </div>
                <div class="form-group row">
                    <label for="text" class="col-sm-3 col-form-label">Test content </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control"name="test_3_content" id="test_3_content" placeholder="Test content" required>
                    </div>

                </div>
                <div class="form-group row">
                    <label for="text" class="col-sm-3 col-form-label">Time to answer </label>
                    <div class="col-sm-8">
                        <input type="tel" class="form-control"name="test_3_time" id="test_3_time" placeholder="Time to answer" required>
                    </div>

                </div>
                <hr>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <button type="submit" id="add_test_data_for_3" name="add_test_data_for_3" class="btn btn-danger w-100 ">add test data </button>
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