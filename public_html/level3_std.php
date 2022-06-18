<?php
session_start();
if (!isset($_SESSION["user_id"]))
{
  //  echo'<meta http-equiv="refresh" content="0;\'index.php\'"/>';
}
include_once("include/connect.php");
$posts=mysqli_query($connect,"SELECT * from sin_up where `level` ='level3'");
$post=mysqli_num_rows($posts);

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
<body class="text-center" data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
</script>

<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <?php
    include_once("include/header.php");


    ?>


    <div class="container mb-5" style="padding-top: 200px">
        <div class="row">
            <div class="col-lg-12 col-md-4 col-sm-4 col-xs-12 table-success p-3 text-center text-warning mt-5" ><span class="text-danger font-weight-bold"  "><?php echo  $post;?></span>  عدد طلاب الصف الثاني علي الموقع  </div>
            <?php
            $posts=mysqli_query( $connect ,"SELECT * FROM sin_up where level='level3' ");
            while($post=mysqli_fetch_assoc($posts)){
                echo'
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

            <div class="box-part text-center">
                <div class="title">
                    <h4>'.$post['user'].'</h4>
                </div>

                <div class="text">
                    <span>'.$post['address'].'</span>
                </div>

                <p >رقم التلفون '.$post['phone'].' </p>
                <p >رقم تلفون ولي الامر : '.$post['fphone'].' </p>
                <p >المجموعة : '.$post['group'].' </p>';
                $std_degree=mysqli_query( $connect ,"SELECT * FROM `student_2_degree` WHERE `stud_id` = '$post[user_id]'") ;
                while ($update_std_degree=mysqli_fetch_assoc($std_degree)){
                    echo '<p class="table-success font-weight-bold">درجة الاختبار رقم <span class="text-danger  " >'.$update_std_degree['test_number'].'</span>  هي <span class="text-danger  " >'.$update_std_degree['degree'].'</span> درجات </p>';
                }


                echo '
            </div>
        </div>
';}?>

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