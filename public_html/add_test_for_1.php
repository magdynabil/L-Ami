<?php
include_once("include/connect.php");
session_start();
if (!isset($_SESSION["user_id"]))
{
   echo'<meta http-equiv="refresh" content="0;\'index.php\'"/>';
}
$msg='';

if($_SERVER['REQUEST_METHOD']=='POST'){

if(isset($_REQUEST['add_exam'])){
    $level=$_REQUEST['level'];
    $test_num=$_REQUEST['test_num'];
    $Q_number=$_REQUEST['Q_number'];
    $question=$_REQUEST['question'];
    $a1=$_REQUEST['a1'];
    $a2=$_REQUEST['a2'];
    $a3=$_REQUEST['a3'];
    $a4=$_REQUEST['a4'];
    $answer=$_REQUEST['answer'];
$std_degree=mysqli_query( $connect ,"SELECT * FROM `test` where `level` ='$level' and `test_num`='$test_num' and `question_num`='$Q_number'");
$update_std_degree=mysqli_fetch_assoc($std_degree);
if($update_std_degree==true){
    $update_degree=mysqli_query( $connect ,"UPDATE `test` SET `question`='$question',`a_1`='$a1',`a_2`='$a2',`a_3`='$a3',`a_4`='$a4',`right_answer`='$answer' WHERE  `level` = '$level' and `test_num`='$test_num' and `question_num`='$Q_number'");

}

    else {

        $insert = " INSERT INTO `test`( `level`,
                                        `test_num`, 
                                        `question_num`,
                                         `question`,
                                          `a_1`,
                                           `a_2`,
                                            `a_3`,
                                             `a_4`,
                                              `right_answer`)
                                               VALUES ('$level',
                                               '$test_num',
                                               '$Q_number',
                                               '$question',
                                               '$a1',
                                               '$a2',
                                               '$a3',
                                               '$a4',
                                               '$answer')";
        $insert_code = mysqli_query($connect, $insert);
        $msg = '<div class="alert alert-success" role="alert"> تم اضافة السؤال  بنجاح </div>';
        echo'<meta http-equiv="refresh" content="1;\'add_test_for_1.php\'"/>';


    }

}}
else{ $msg = '<div class="alert alert-danger" role="alert"> تاكد من ان جميع الخانات بالاسفل تمت اضافتها  </div>';}
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
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/responsive.css">
    <script src="ckeditor/ckeditor.js"></script>
    <style>

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
<?php
include_once("include/header.php");
?>
<body class="text-center " style="background: #eee; ">


<div class="container" style="padding-top: 150px; " >

    <div class="col-md-12 " style=" border: solid #000000 1px ; border-radius: 10px ;">
        <div class="form-area " >
            <h3>اضافة اختبار</h3>
            <div class="col-sm-12 text-center"><?php echo $msg;?></div>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post"  class="m-2 p-2">
                <div class="form-group row">
                    <label for="input5" class="col-sm-2 col-form-label">level </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"name="level" id="level" placeholder="level" required>

                    </div>
                    <label for="input5" class="col-sm-2 col-form-label mt-2">test number </label>
                    <div class="col-sm-10 mt-2">
                        <input type="text" class="form-control "name="test_num" id="test_num" placeholder="test number" required>

                    </div>

                </div>
                <div class="form-group row">
                    <label for="text" class="col-sm-3 col-form-label">Question Number </label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"name="Q_number" id="Q_number" placeholder="Question Number" required>
                    </div>

                </div>
                <hr>
                <div class="form-group row">
                    <label for="text" class="col-sm-2 col-form-label">question  </label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control"name="question" id="question" placeholder="question"></textarea>
                        <script type="text/javascript"> CKEDITOR.replace( 'question');</script>


                    </div>

                </div>
                <div class="form-group row">
                    <div class="col-md-1"></div>
                    <label for="inputPassword3" class="col-sm-1 col-form-label">1-</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="a1" id="a1" placeholder="answer_1">
                    </div>
                    <label for="inputPassword3" class="col-sm-1 col-form-label">2-</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="a2" id="a2" placeholder="answer_2">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-1"></div>
                    <label for="inputPassword3" class="col-sm-1 col-form-label">3-</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="a3" id="a3" placeholder="answer_3">
                    </div>
                    <label for="inputPassword3" class="col-sm-1 col-form-label">4-</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="a4" id="a4" placeholder="answer_4">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="input5" class="col-sm-2 col-form-label">Right answer </label>
                    <div class="col-sm-10">
                        <select class="form-control" id="answer"name="answer">
                            <option >Right answer</option>
                            <option value="1" >1</option>
                            <option value="2" >2</option>
                            <option value="3" >3</option>
                            <option value="4" >4</option>
                        </select>
                    </div>

                </div>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <button type="submit" id="add_exam" name="add_exam" class="btn btn-danger w-100 ">add question </button>
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
<script src="tiny/tinymce.js"></script>
<script src="js/site.js"></script>


</body>
</html>