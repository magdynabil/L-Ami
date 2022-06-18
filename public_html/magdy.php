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
</head>

<body >
        <?php
        $num=0;
        $user_name_check=mysqli_query($connect,"SELECT `codee` FROM `code` WHERE `code_status`='active'");
        while ($code=mysqli_fetch_assoc($user_name_check)){
            echo '

                <p class="card-subtitle mb-2  text-center text-dark font-weight-bold p-0 mt-2 mb-2">' .$code['codee'].'</p>
             
';   if($num==280){
    echo '<h1>'.$num.'</h1>';
            }
            if($num==500){
                echo '<h1>'.$num.'</h1>';
            }
            if($num==1000){
                echo '<h1>'.$num.'</h1>';
            }    if($num==1500){
                echo '<h1>'.$num.'</h1>';
            } if($num==2000){
                echo '<h1>'.$num.'</h1>';
            }
        $num++;}
        $x=mysqli_num_rows($user_name_check);
        echo "<h1>'.$x.'</h1> ";
        ?>



<!-- Optional JavaScript -->

</body>
</html>