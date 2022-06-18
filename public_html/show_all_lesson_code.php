<?php session_start();
if (!isset($_SESSION["user_id"]))
{
    echo'<meta http-equiv="refresh" content="0;\'index.php\'"/>';
}
include_once("include/connect.php");
?>
<!DOCTYPE html>
<html lang="en">
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
    <!-- main css -->
</head>

<body >
<div class="container">

    <div class="row">
        <?php
        $user_name_check=mysqli_query($connect,"SELECT * FROM `lesson_code` where code_status='active' ORDER BY code_id DESC LIMIT 100");
        while ($code=mysqli_fetch_assoc($user_name_check)){
            echo '
        <div class="card col-lg-3   " style="background-color: #fff196">
            <div class="card-body">
                <img style="width: 100%; height:100px" src="../img/peter_magdy.png" >
                <h4 class="card-subtitle mb-2  text-center text-dark font-weight-bold p-0 mt-2 mb-2">' .$code['codee'].'</h4>
                <h6 class="card-subtitle mb-2 text-center text-danger font-weight-bold p-0 m-0 "> يستخدم للدخول الي فديوهات الشرح  </h6>
                <h6 class="card-subtitle mb-2 text-center text-danger font-weight-bold p-0 m-0 ">www.adelaziz.com </h6>
            </div>
        </div>';}
        ?>

    </div>
</div>
<!-- Optional JavaScript -->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/courses.js"></script>

</body>
</html>