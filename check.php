<?php 
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
        $msg_hellow="Привет, ".$userdata['user_login'];
      
    $msg_log="<a href='exit.php?log=$id'>Выход</a>";
    $msg_add="<a href='add_order.php'>Добавить объявление</a>";
    $msg_reg="<a href='my_office.php'>Мой кабинет</a>";
    }
}
else
{
    

    $msg_log="<a href='login.php'>Войти </a>";
    $msg_reg="<a href='register.php'>Регистрация</a>";

}
?>