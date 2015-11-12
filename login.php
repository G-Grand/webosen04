<?php

function generateCode($length=6) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;  
    while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];  
    }
    return $code;
}

# Соединямся с БД
include_once "bd_connect.php";
if(isset($_POST['login']) and ($_POST['password']))
{
    # Вытаскиваем из БД запись, у которой логин равняеться введенному
    $query = mysqli_query($connect,"SELECT user_id, user_password FROM `users` WHERE user_login='".$_POST['login']."' ");
echo mysql_error();
    $data = mysqli_fetch_assoc($query);
    # Соавниваем пароли
    if($data['user_password'] === md5(md5(trim($_POST['password']))))
    {
        # Генерируем случайное число и шифруем его
        $hash = md5(generateCode(10));
        # Записываем в БД новый хеш авторизации и IP
        mysqli_query($connect,"UPDATE `users` SET user_hash='".$hash."' ".$insip." WHERE user_id='".$data['user_id']."'");
        # Ставим куки



        setcookie("id", $data['user_id'], time()+60*60*24*30);
        setcookie("hash", $hash, time()+60*60*24*30);
        # Переадресовываем браузер на страницу проверки нашего скрипта
        header("Location: index.php"); exit();



    }



    else



    {



        print "Вы ввели неправильный логин/пароль";



    }



}



?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">

    <title>Авторизация</title>

    <link rel="stylesheet" href="css/style1.css" media="screen" type="text/css" />

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Varela+Round">

    <link rel="icon" href="http://vladmaxi.net/favicon.ico" type="image/x-icon">

    <link rel="shortcut icon" href="http://vladmaxi.net/favicon.ico" type="image/x-icon">

</head>



<body>



<!-- vladmaxi top bar -->

    

<!--/ vladmaxi top bar -->



    <div id="login">

        <h2><span class="fontawesome-lock"></span>Вход в личный кабинет</h2>

        <form action="" method="POST">

            <fieldset>

                <p><label for="email">Логин или Email:</label></p>

                <p><input type="email" name="login" id="email" value="Логин" onBlur="if(this.value=='')this.value='логин'" onFocus="if(this.value=='Логин')this.value=''"></p>



                <p><label for="password">Пароль:</label></p>

                <p><input type="password" name="password" id="password" value="Пароль" onBlur="if(this.value=='')this.value='Пароль'" onFocus="if(this.value=='Пароль')this.value=''"></p> 



                <p><input type="submit" value="ВОЙТИ"></p>

            </fieldset>

        </form>

    </div>

</body> 

</html>