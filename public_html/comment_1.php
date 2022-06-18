<?php
session_start();
if (!isset($_SESSION["user_id"]))
{
    echo'<meta http-equiv="refresh" content="0;\'index.php\'"/>';
}
include_once ('include/connect.php');

if(isset($_POST['add_comment'])){
    $comment=$_POST['comment'];
    $date=date("Y-m-d H:i:s");
    if(empty($comment)){
        $msg='<div class="alert alert-warning" role="alert"> برجاء كتابة التعليق </div>';
    }

    else{
        $add_comment = "INSERT INTO `comment_for_1`( `comment_writer`,`writer_id`, `comment`, `date`) VALUES ('$_SESSION[user]','$_SESSION[user_id]','$comment','$date')";
        $insert_code = mysqli_query($connect, $add_comment);
        if (isset( $insert_code)){
            $msg = '<div class="alert alert-success" role="alert"> تم اضافة التعليق بنجاح  </div>';
            echo'<meta http-equiv="refresh" content="2;\'comment_1.php\'"/>';
        }
    }
}
if (isset($_POST['all_replay'])){
    $replay=$_POST['replay_1'];
    $replay_cod=$_POST['replay_cod'];
    if(empty($replay)){
        $msg='<div class="alert alert-warning" role="alert"> برجاء كتابة الرد </div>';
    }
    if(empty($replay_cod)){
        $msg='<div class="alert alert-warning" role="alert"> برجاء كتابة كود التعليق  </div>';
    }
    else{
        $add_replay = "INSERT INTO `replay_for_1`(`replay_CODE`, `replay`) VALUES ('$replay_cod','$replay')";
        $insert_replay = mysqli_query($connect, $add_replay);
        if (isset( $insert_replay)){
            $msg = '<div class="alert alert-success" role="alert"> تم اضافة الرد بنجاح  </div>';
            echo'<meta http-equiv="refresh" content="2;\'comment_1.php\'"/>';
        }
    }
}
if (isset($_POST['add_comm'])){
    $replay_1=$_POST['replay'];
    $replay_cod_1=$_POST['add_comm'];
    if(empty($replay_1)){
        $msg='<div class="alert alert-warning" role="alert"> برجاء كتابة الرد </div>';
    }
    else{
        $add_replay_1 = "INSERT INTO `replay_for_1`(`replay_CODE`, `replay`) VALUES ('$replay_cod_1','$replay_1')";
        $insert_replay_1 = mysqli_query($connect, $add_replay_1);
        if (isset( $insert_replay_1)){
            $msg = '<div class="alert alert-success" role="alert"> تم اضافة الرد بنجاح  </div>';
            echo'<meta http-equiv="refresh" content="2;\'comment_1.php\'"/>';
        }
    }
}
if (isset($_POST['delete'])){
    $replay_cod_2=$_POST['delete'];
    $add_replay = "DELETE FROM `comment_for_1` WHERE comment_id ='$replay_cod_2'";
    $insert_replay = mysqli_query($connect, $add_replay);
    if (isset( $insert_replay)){
        $msg = '<div class="alert alert-success" role="alert"> تم حذف التعليق بنجاح  </div>';
        echo'<meta http-equiv="refresh" content="2;\'comment_1.php\'"/>';

    }
}
?>

<!doctype html>
<html lang="en" class="first" >
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
<?php include_once ('include/header.php');?>
<body class=" p-0 m-0" style="padding-top: 0px ;margin-top: 0px">
<?php
if ($_SESSION['status']=='admin'){
                  echo '
            <div class="col-lg-12" style="margin-top: 200px" dir="rtl">
            <form method="post">
                <div class="form-row align-items-center">
                    <div class="col-lg-8">
                        <textarea type="text" class="form-control mb-2 " id="replay_1" name="replay_1" placeholder="اضافة رد "></textarea>
                        <script type="text/javascript"> CKEDITOR.replace( replay_1)</script>
                    </div>
                    <div class="col-lg-2">
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" id="replay_cod" name="replay_cod" placeholder="كود التعليق ">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <button type="submit" id="all_replay" name="all_replay" class="btn btn-success mb-2">ارسال الرد </button>
                    </div>
                </div>
            </form>
            <div class="text-center font-weight-bold">'.$msg.'</div>
            </div>';

$comm=mysqli_query( $connect ,"SELECT * FROM comment_for_1 ");
while($comm_2=mysqli_fetch_assoc($comm)){
$re=mysqli_query( $connect ,"SELECT * FROM `replay_for_1`where replay_CODE='$comm_2[comment_id]'");
echo '
<div class="card col-lg-12 m-2 p-2 bg-light" dir="rtl" align="right">
  <div class="card-body">
    <h4 class="card-title text-danger">'.$comm_2['comment_writer'].'</h4>
    <h5 class="card-text">'.$comm_2['comment'].'</p>
    <p class=" text-dark table-info col-lg-2">date : '.$comm_2['date'].' id='.$comm_2['comment_id'].' </p>';
while($rep_2=mysqli_fetch_assoc($re)){
    echo '
    <div class="card col-lg-12" >
  <div class="card-body">
    <div class="text-danger font-weight-bold">Mr/ Adel Aziz :<span class="text-dark"> '.$rep_2['replay'].'</span> </div>
  </div>
</div>';}
echo '
    <form class="form-inline mt-2" method="post">
  <div class="form-group  mb-2 col-lg-8 ">
    <label for="inputPassword2" class="sr-only">اكتب الرد </label>
    <textarea type="text" class="form-control col-lg-12" rows="5" id="replay" name="replay" placeholder="اكتب الرد"></textarea>
  </div>
  <button type="submit" name="add_comm" id="add_comm" value="'.$comm_2['comment_id'].'" class="btn btn-success mb-2">ارسال الرد</button>
  <button type="delete" name="delete" id="delete" value="'.$comm_2['comment_id'].'" class="btn btn-danger mb-2 mr-2">ارسال الرد</button>
</form>';

echo '
  </div>
</div>';}}
if ($_SESSION['status']=='user'){

    echo '
            <div class="col-lg-12 text-center" style="margin-top: 200px" dir="rtl">

            <div class="text-center font-weight-bold">'.$msg.'</div>
            </div>';
    $comm=mysqli_query( $connect ,"SELECT * FROM comment_for_1 where writer_id='$_SESSION[user_id]'");
    while($comm_2=mysqli_fetch_assoc($comm)){
        $re=mysqli_query( $connect ,"SELECT * FROM `replay_for_1`where replay_CODE='$comm_2[comment_id]'");
        echo '
<div class="card col-lg-12 m-2 p-2 bg-light" dir="rtl" align="right" style="margin-top: 300px ;padding-top: 200px">
  <div class="card-body">
    <h4 class="card-title text-danger">'.$comm_2['comment_writer'].'</h4>
    <h5 class="card-text">'.$comm_2['comment'].'</p>
    <p class=" text-dark table-info col-lg-3">date : '.$comm_2['date'].' id='.$comm_2['comment_id'].' </p>';
        while($rep_2=mysqli_fetch_assoc($re)){
            echo '
    <div class="card col-lg-12" >
  <div class="card-body">
    <div class="text-danger font-weight-bold">Mr/ Adel Aziz :<span class="text-dark"> '.$rep_2['replay'].'</span> </div>
  </div>
</div>';}

        echo '
  </div>
</div>';}}?>
                <div class="col-lg-12 p-4" style="border-top: 2px darkslategray dashed ; margin-top: 300px"></div>
                <div class="col-lg-12">
                    <form  class="row contact_form" method="post" dir="rtl">
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea class="form-control" name="comment" id="comment" rows="5" placeholder = "اكتب تعليق او سؤال"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 text-right mb-5 ">
                            <button type="submit" name="add_comment" id="add_comment" class="btn btn-primary btn-lg px-5 ">
                                ارسال التعليق
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</section>

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