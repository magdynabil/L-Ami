<?php
session_start();
if (!isset($_SESSION["user_id"]))
{
    echo'<meta http-equiv="refresh" content="0;\'index.php\'"/>';
}
include_once("include/connect.php");
$num=1;
$msg='';
$test_num=$_GET['id'];
$codee=$_GET['code'];
$degree=0;
for ($i=1; $i<=40 ; $i++ ){

    $insert=mysqli_query( $connect ,"SELECT * FROM std_answer_3 where std_id ='$_SESSION[user_id]' and test_number='$test_num'and question_number='$i' ");
    while ( $answer=mysqli_fetch_assoc($insert)){
        $degree=$degree + $answer['degree'];

    }
}
$std_degree=mysqli_query( $connect ,"SELECT * FROM `student_2_degree` where stud_id ='$_SESSION[user_id]' and test_number='$test_num' and stud_level='3'");
$update_std_degree=mysqli_fetch_assoc($std_degree);
if($update_std_degree==true){
    $update_degree=mysqli_query( $connect ,"UPDATE `student_2_degree` SET `degree`='$degree' WHERE  stud_id = '$_SESSION[user_id]' and test_number='$test_num' and stud_level='3'");
}
else{
    $insert=mysqli_query( $connect ,"INSERT INTO `student_2_degree`( `stud_id`,`stud_level`, `test_number`, `degree`) VALUES ('$_SESSION[user_id]','3','$test_num','$degree')");
}
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

<?php
include_once("include/header.php");
?>
<div class="container mb-5" style="padding-top: 150px">
    <div class="col-md-12" style=" border: solid #000000 1px ; border-radius: 10px">
        <div class="form-area " >
            <h3 class="font-weight-bold"><?php echo $test_num;?> اجابة اختبار الصف الثالث الثانوي رقم </h3>
            <h3 class="font-weight-bold text-danger text-center"style="dir="rtl" align="right"> درجتتك في هذا الاختبار =<?php echo $degree;?>  </h3>
            <?php
            $get_code=mysqli_query($connect,"SELECT * FROM `code` WHERE 	codee='$codee'");
            $code_data=mysqli_fetch_assoc($get_code);
            if (mysqli_num_rows($get_code) < 1){
                $msg='<div class="alert alert-warning" role="alert"> برجاء ادخال كود صحيح  </div>';
            }
            elseif ($code_data['code_status']=='disable'){
                $msg='<div class="alert alert-warning" role="alert"> هذا الكود مستخدم من قبل  </div>';
            }
            else{
                $update_code=mysqli_query($connect,"UPDATE `code` SET `code_status`='disable' WHERE codee='$codee' ");

                $posts=mysqli_query( $connect ,"SELECT * FROM test  where `level`='3'and `test_num` = '$test_num' ");
                while($post=mysqli_fetch_assoc($posts)){
                    $insert=mysqli_query( $connect ,"SELECT * FROM std_answer_3 where std_id ='$_SESSION[user_id]' and test_number='$test_num'and question_number='$num' ");
                    $answer=mysqli_fetch_assoc($insert);
                    if ($post['right_answer']==$answer['answer_1']){
                        $border_1='border: 3px  solid #1c7430 ;';
                        $Back_ground_1='background-color: #1c7430;';
                    }else{
                        $border_1='border: 3px  solid red ;';
                        $Back_ground_1='background-color: red;';
                    }

                    echo'
<div class="card" >

<form dir="ltr" align="left" method="post" class="ml-4">
<!--بداية السوال الاول -->
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-12 col-form-label text-danger font-weight-bold ">'.$post['question'].'</label>
  </div>

  <fieldset class="form-group">
    <div class="row">
      <div class="col-sm-10">
        <div class="form-check">
          <label class="form-check-label pr-5 text-dark font-weight-bold " for="gridRadios1">1-
           '.$post['a_1'].'
          </label>
        </div>
       <div class="form-check">
          <label class="form-check-label pr-5 text-dark font-weight-bold " for="gridRadios1">2-
           '.$post['a_2'].'
          </label>
        </div>
       <div class="form-check">
          <label class="form-check-label pr-5 text-dark font-weight-bold " for="gridRadios1">3-
           '.$post['a_3'].'
          </label>
        </div>
         <div class="form-check">
          <label class="form-check-label pr-5 text-dark font-weight-bold " for="gridRadios1">4-
           '.$post['a_4'].'
          </label>
        </div>
        <div class="font-weight-bold text-light " style="'.$border_1.''.$Back_ground_1.'"> الاجابه الصحيحه رقم  : 
      '.$post['right_answer'].'
      </div>
      <div class="font-weight-bold text-light " style="'.$border_1.''.$Back_ground_1.'"> اجابتك رقم : 
      '.$answer['answer_1'].'
      </div>
      </div>
    </div>
  </fieldset>
  <!--نتهاء السوال الاول -->
  <!--بداية السوال الثاني -->
 

  <!--نتهاء السوال الثاني -->
     <!--بداية السوال الثالث -->
  
   <!--نتهاء السوال الثالث -->
        <!--بداية السوال الرابع -->
   <!--نتهاء السوال الخامس -->
</form>
</div>';


                    $num=$num+1; }
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