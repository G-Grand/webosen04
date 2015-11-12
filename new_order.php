<?php 

header("Content-Type: text/html; charset=utf-8");
    include('masiv.php');
    $order_status = 1;
    $show = 1;
// Скрипт проверки
function clearData($data){
    return trim(strip_tags($data));
}
function clearNum($data){
    return abs(int($data));
}





# Соединямся с БД

include_once "bd_connect.php";

// Check connection

if (!$connect) {

    die("Connection failed: " . mysqli_connect_error());

}













if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))



{   

    $id = $_COOKIE['id']; 

    $query = mysqli_query($connect,"SELECT * FROM users WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");



    $userdata = mysqli_fetch_assoc($query);





    if(($userdata['user_hash'] !== $_COOKIE['hash']) or ($userdata['user_id'] !== $_COOKIE['id']))



    {



        setcookie("id", "", time() - 3600*24*30*12, "/");



        setcookie("hash", "", time() - 3600*24*30*12, "/");



        print "Хм, что-то не получилось";



    }



    else

    {

$a= $_POST['area'];
echo $a;

       if (isset($_POST['property_Type']) and isset($_POST['area']) and isset($_POST['city']) and isset($_POST['district']) and

        isset($_POST['street']) and isset($_POST['order_view']) and isset($_POST['rooms']) and isset($_POST['floor']) and isset($_POST['all_floor'])

        and isset($_POST['general']) and isset($_POST['type_wall']) and isset($_POST['price']) 

         and isset($_POST['Username']) and isset($_POST['phone']) and isset($_POST['description']) and isset($_POST['datatime_order'])) 

            {

              $property_Type = $_POST['property_Type'];

              $area = $_POST['area'];

              $city = $_POST['city'];

              $district = $_POST['district'];

              $street = $_POST['street'];

              $order_view = $_POST['order_view'];

              $rooms = $_POST['rooms'];

              $floor = $_POST['floor']; 

              $all_floor = $_POST['all_floor'];

              $general = $_POST['general'];

              $type_wall = $_POST['type_wall'];

              $price = $_POST['price'];

              $Username = $_POST['Username'];

              $phone = $_POST['phone'];

              $description = $_POST['description'];

              $dt = $_POST['datatime_order'];

              $user_login = $userdata['user_login'];

       



              $sql = "INSERT INTO `order` (`order_status`, 

                                         `order_view`, 

                                         `area`, 

                                         `property_Type`, 

                                         `show`, 

                                         `city`, 

                                         `district`, 

                                         `street`, 

                                         `rooms`, 

                                         `floor`, 

                                         `all_floor`, 

                                         `general`, 

                                         `type_wall`, 

                                         `description`, 

                                         `price`, 

                                         `Username`, 

                                         `user_login`, 

                                         `phone`, 

                                         `datatime_order`)  

                                        VALUES 

                                        ('$order_status', 

                                         '$order_view', 

                                         '$area', 

                                         '$property_Type', 

                                         '$show', 

                                         '$city', 

                                         '$district', 

                                         '$street', 

                                         '$rooms', 

                                         '$floor', 

                                         '$all_floor', 

                                         '$general', 

                                         '$type_wall', 

                                         '$description', 

                                         '$price', 

                                         '$Username', 

                                         '$user_login', 

                                         '$phone', 

                                         '$dt')";
echo "я туту";

   if (mysqli_query($connect, $sql)) {

    

    $order_numb = "SELECT `id_order` FROM `order` WHERE user_login='$user_login' AND datatime_order='".$_POST['datatime_order']."'";
 $sql4 = mysqli_query($connect, $order_numb);
 
 $n = mysqli_fetch_array($sql4);

 $id_order = ($n['id_order']);

 header("Location: add_img.php?id_order=$id_order"); 
 exit();
 

} else {

    echo "Error: " . $sql . "<br>" . mysqli_error($connect);

}

          }     



      }



}



else



{



    echo <<<EOT

    <div><a href='login.php'>Войти </a>&nbsp; &nbsp;<a href='register.php'>Регистрация</a></div>

EOT;

}



?> 












<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">

    <title>Проверка</title>

    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Varela+Round">

    <link rel="icon" href="http://vladmaxi.net/favicon.ico" type="image/x-icon">

    <link rel="shortcut icon" href="http://vladmaxi.net/favicon.ico" type="image/x-icon">

</head>



<body>






    

</body> 

</html>