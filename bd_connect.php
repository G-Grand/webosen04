<?php  


$host='s10.thehost.com.ua';
$db_name='shag_rabota';
$db_pass='wert852789';
$db_nane_table='shag_rabota';
$connect=mysqli_connect($host,$db_name,$db_pass,$db_nane_table); 
mysqli_select_db($connect, 'utf8');
mysqli_query($connect, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
mysqli_query($connect, "SET CHARACTER SET 'utf8'");


if (!$connect) {

echo mysqli_errno($connect).mysqli_error($connect);
  die();
}
?>