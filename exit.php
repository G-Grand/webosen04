<?php



// Страница авторизации







# Функция для генерации случайной строки



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





if(isset($_GET['log']))



{



    # Вытаскиваем из БД запись, у которой логин равняеться введенному



    $query = mysqli_query($connect,"SELECT user_id, user_hash FROM users WHERE user_id='".mysql_real_escape_string($_GET['log'])."' LIMIT 1");



    $data = mysqli_fetch_assoc($query);



    



    # Соавниваем пароли



   



        



        # удаляем  куки



        setcookie("id", $data['user_id'], time()-999);



        setcookie("hash", $data['user_hash'], time()-999);



        



        # Переадресовываем браузер на страницу проверки нашего скрипта



        header("Location: index.php"); exit();



   



}



?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">

    <title>Авторизация</title>

    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Varela+Round">

    <link rel="icon" href="http://vladmaxi.net/favicon.ico" type="image/x-icon">

    <link rel="shortcut icon" href="http://vladmaxi.net/favicon.ico" type="image/x-icon">

</head>



<body>



<!-- vladmaxi top bar -->

    

<!--/ vladmaxi top bar -->



    <div id="login">

        <h2><span class="fontawesome-lock"></span>Вход в личный кабинет</h2>

        <form action="login.php" method="POST">

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