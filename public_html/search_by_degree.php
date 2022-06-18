<?php
session_start();
if (!isset($_SESSION["user_id"]))
{
    echo'<meta http-equiv="refresh" content="0;\'index.php\'"/>';
}
include_once("include/connect.php");
$msg='';
$title='1000';
$test_num='1000';
$level='1000';
if(isset($_POST['search'])) {
    $title=$_POST['user'];
    $test_num=$_POST['test_num'];
    $level=$_POST['level'];
    if (empty($title)) {
        $msg='<div class="alert alert-danger text-center" role="alert">برجاء ادخال درجة الطالب  !</div>';
    }
    if (empty($test_num)) {
        $msg='<div class="alert alert-danger text-center" role="alert">برجاء ادخال رقم الامتحان  !</div>';
    }
    if (empty($level)) {
        $msg='<div class="alert alert-danger text-center" role="alert">برجاء ادخال الفرقه الدراسيه     !</div>';
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
<div class="container mb-5 "style="padding-top: 250px;padding-bottom: 200px">

    <?php echo $msg ?>
    <br/>
    <div class="row " style="margin-top: 100px">
        <?php for ($i=1; $i<30; $i++){
            $std_2_count=mysqli_query( $connect ,"SELECT * FROM student_2_degree where stud_level='1' and test_number='$i' ");

            $std_2_num=mysqli_num_rows($std_2_count);
            if ($std_2_num==0){
                $i++;
                continue;
            }
            echo ' <p class="col-lg-4 table-success">'.$std_2_num.' عدد الطلاب الصف الاول  في الاختبار رقم '.$i.'هو </p>';
        }
        for ($i=1; $i<30; $i++){
            $std_2_count=mysqli_query( $connect ,"SELECT * FROM student_2_degree where stud_level='2' and test_number='$i' ");

            $std_2_num=mysqli_num_rows($std_2_count);
            if ($std_2_num==0){
                $i++;
                continue;
            }
            echo ' <p class="col-lg-4  table-primary">'.$std_2_num.' عدد الطلاب الصف الثاني في الاختبار رقم '.$i.'هو </p>';
        }
        for ($i=1; $i<50; $i++){
            $std_2_count=mysqli_query( $connect ,"SELECT * FROM student_2_degree where stud_level='3' and test_number='$i' ");

            $std_2_num=mysqli_num_rows($std_2_count);
            if ($std_2_num==0){
                $i++;
                continue;
            }
            echo ' <p class="col-lg-4 table-danger">'.$std_2_num.' عدد الطلاب الصف الثالث في الاختبار رقم '.$i.'هو </p>';
        }


        ?>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
            <form class="card card-sm " method="post">
                <div class="card-body row no-gutters align-items-center">
                    <div class="col-auto">
                    </div>
                    <!--end of col-->
                    <div class="col">
                        <input class="form-control form-control-lg  " type="number" name="test_num" id="test_num" placeholder=" رقم الامتحان  ">

                    </div>
                    <div class="col">
                        <input class="form-control form-control-lg  " type="number" name="user" id="user" placeholder="الدرجة">
                    </div>
                    <div class="col">
                        <input class="form-control form-control-lg  " type="number" name="level" id="level" placeholder="الفرقه ">
                    </div>
                    <!--end of col-->
                    <div class="col-auto">
                        <button class="btn btn-lg btn-success" type="text" name="search">بحث</button>
                    </div>
                    <!--end of col-->
                </div>
            </form>
        </div>
        <!--end of col-->
        <?php
        $degree=mysqli_query( $connect ,"SELECT * FROM student_2_degree where degree ='$title'and `test_number`='$test_num' ");
        while($s_degree=mysqli_fetch_assoc($degree)){
            $s=$s_degree['stud_id'];
            $posts=mysqli_query( $connect ,"SELECT * FROM sin_up where 	user_id ='$s' ");
            while($post=mysqli_fetch_assoc($posts)){
                echo'
        <div class="col-lg-12 col-md-4 col-sm-4 col-xs-12 mt-5">

            <div class="box-part text-center">
                <div class="title">
                    <h4>'.$post['user'].'</h4>
                </div>

                <div class="text">
                    <span>'.$post['address'].'</span>
                </div>

                <p >رقم التلفون '.$post['phone'].' </p>
                <p >رقم تلفون ولي الامر : '.$post['fphone'].' </p>
                <p >السنة الدراسية : '.$post['level'].' </p>
                <p >المجموعة : '.$post['group'].' </p>';
                $std_degree=mysqli_query( $connect ,"SELECT * FROM `student_2_degree` WHERE `stud_id` = '$post[user_id]'") ;
                while ($update_std_degree=mysqli_fetch_assoc($std_degree)){
                    echo '<p class="table-success font-weight-bold">درجة الاختبار رقم <span class="text-danger  " >'.$update_std_degree['test_number'].'</span>  هي <span class="text-danger  " >'.$update_std_degree['degree'].'</span> درجات </p>';
                }
                echo '

            </div>
        </div>';


            }
        }
        ?>
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