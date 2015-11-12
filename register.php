<?php



// Страница регситрации нового пользователя





// Соединямся с БД



include_once "bd_connect.php";







if(isset($_POST['login']) and ($_POST['password']))



{



    $err = array();





    // проверям логин



    if(!preg_match("/^(([a-zA-Z0-9_\-.]+)@([a-zA-Z0-9\-]+)\.[a-zA-Z0-9\-.]+$)/",$_POST['login']))



    {



        $err[] = "Логин может состоять только из букв английского алфавита и цифр";



    }



    



    if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30)



    {



        $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";



    }



    



    // проверяем, не сущестует ли пользователя с таким именем



    $query = mysqli_query($connect,"SELECT COUNT(user_id) FROM `users` WHERE user_login=$_POST[login]");



    if(mysqli_fetch_row($query) > 0)



    {



        $err[] = "Пользователь с таким логином уже существует в базе данных";



    }



    



    // Если нет ошибок, то добавляем в БД нового пользователя



    if(count($err) == 0)



    {



        

        $login = $_POST['login'];



        



        // Убераем лишние пробелы и делаем двойное шифрование



        $password = md5(md5(trim($_POST['password'])));



        



        mysqli_query($connect,"INSERT INTO `users` SET user_login='".$login."', user_password='".$password."'");



        header("Location: shag.justdo.dp.ua/index.php"); exit();



    }



    else



    {



        print "<b>При регистрации произошли следующие ошибки:</b><br>";



        foreach($err AS $error)



        {



            print $error."<br>";



        }



    }



}



?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">

    <title>Регистрация</title>

    <link rel="stylesheet" href="css/style1.css" media="screen" type="text/css" />

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Varela+Round">

    <link rel="icon" href="http://vladmaxi.net/favicon.ico" type="image/x-icon">

    <link rel="shortcut icon" href="http://vladmaxi.net/favicon.ico" type="image/x-icon">

</head>



<body>



<!-- vladmaxi top bar -->

    

<!--/ vladmaxi top bar -->



    <div id="login">

        <h2><span class="fontawesome-lock"></span>Регистрация</h2>

        <form action="register.php" method="POST">

            <fieldset>

                <p><label for="email">Логин или Email:</label></p>

                <p><input type="email" name="login"  id="email" value="Логин" onBlur="if(this.value=='')this.value='логин'" onFocus="if(this.value=='Логин')this.value=''"></p>



                <p><label for="password">Пароль:</label></p>

                <p><input type="password" name="password" id="password" value="Пароль" onBlur="if(this.value=='')this.value='Пароль'" onFocus="if(this.value=='Пароль')this.value=''"></p> 



                <p><input type="submit" value="Зарегистрироваться"></p>

            </fieldset>

        </form>

    </div>

</body> 

</html>