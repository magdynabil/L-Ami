<?php $host='162.241.217.87';
$root='mosasade_magdy';
$password='121150@sha';
$db_name='mosasade_test_system';
$connect=mysqli_connect($host,$root,$password,$db_name);
function close_DB(){ global $connect; mysqli_close($connect); }
?>