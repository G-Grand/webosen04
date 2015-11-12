<?php 
header("Content-Type: text/html; charset=utf-8");

    include('masiv.php');
    if (isset($_GET["id_order"])) {
       $id_order = $_GET["id_order"];
    }
   
    $order_status = 1;
    $show = 1;
    $error = "";
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
        $msg_hellow="Привет, ".$userdata['user_login'];
        $msg_log="<a href='exit.php?log=$id'>Выход</a>";
        $msg_reg="<a href='add_order.php'>Добавить объявление</a>";

                    $user_login = $userdata['user_login'];
            $valid_types =  array("gif","jpg", "png", "jpeg", "GIF", "JPG", "PNG", "JPEG");
            // создаем главную рабочую директорию =============================================

             $dir=$_SERVER['DOCUMENT_ROOT']."/gallery/";
             if (!is_dir($dir)) {
             mkdir($dir,0755);
            // создали папку gallery в корне нашего сайта и установили права на чтение и запись
             }
            function createphoto ($input,$output) {
                     $w = 400;  // мы получим  пропорциональное изображение шириной 400px
                     $q = 100;  // качество jpeg по умолчанию
                    $f=$input;
                     $src = imagecreatefromjpeg($f);
                    // функция imagecreatefromjpeg создает изображение JPEG из файла
                     // т.е. создаём исходное изображение на основе исходного файла и определяем его размеры
                    $w_src = imagesx($src);
                     $h_src= imagesy($src);
                    // получение ширины и высоты изображения в пикселях
                    $ratio = $w_src/$w;
                     $w_dest = round($w_src/$ratio);
                     $h_dest = round($h_src/$ratio);
                    // получение координат для построения нового изображения необходимой нам ширины
                    $dest = imagecreatetruecolor($w_dest,$h_dest);
                    // функция  imagecreatetruecolor пустое полноцветное изображение размерами x_size и y_size.
                     // Созданное изображение имеет черный фон.
                    imagecopyresized($dest, $src, 0, 0, 0, 0, $w_dest, $h_dest, $w_src, $h_src);
                    // Функция imagecopyresized копирует прямоугольные области с одного изображения на другое
                    // вывод картинки и очистка памяти
                     imagejpeg($dest,$output,$q);
                     imagedestroy($dest);
                     imagedestroy($src);
            }
              $str3 = "SELECT COUNT(*) FROM `img` WHERE img_order='$id_order'";
              $sql6 = mysqli_query($connect, $str3);
              $res2 = mysqli_fetch_array($sql6);
              

              if ($res2["COUNT(*)"]<=11) {
                  # code...
              

            if (isset($_POST['pr'])) {
                // если нажата кнопка “добавить”, т.е. если форма с данными отправлена - начинаем работу
                if ($_FILES['img']['tmp_name']!="") {
                    // первая проверка на наличие загружаемого файла
                    $ext = substr($_FILES['img']['name'], 1 + strrpos($_FILES['img']['name'], "."));
                    //получаем расширение загружаемого файла
                    if (in_array ($ext, $valid_types)) {
                        // сверяемся с массивом допустимых расширений и если совпадение найдено продолжаем работать
                         // если нет - выводим сообщение об ошибке
                        $imageinfo = getimagesize($_FILES['img']['tmp_name']);
                        // получаем информацию о загруженном файле
                         // функция getimagesize позволяет получить размер изображения в пикселях, а также mime-тип загруженного файла
                        if($imageinfo['mime'] == 'image/jpeg') {
                            // проверяем действительно ли загрузенный файл является рисунком, и если все правильно продолжаем работу
                             // такая проверка необходима для того, чтобы не было скрытой загрузки вредоносного исполняемого файла
                             // т.е. банальной смены расширения php на jpg и попытке загрузки его на сервер
                            $str="SELECT max(id) FROM `img`";
                             $sql2=@mysqli_query($connect, $str);
                             $f=@mysqli_fetch_array($sql2);
                             $maxnum=($f['max(id)']);
                             $maxnum=($maxnum + 1);
                            // выбираем максимальное значение id с gallery_image и увеличиваем его на единицу
                             // это число и будет служить именем файла
                            $output=$maxnum.".".$ext;
                            // новое полное имя файла (добавили расширение к имени)
                            $input=$_FILES['img']['tmp_name'];
                            // временный файл который создается автоматически при загрузке изображения
                            createphoto($input,$dir.$output);
                            if (file_exists($dir.$output)) {
                                // вызов функции по работе с изображением.
                                 // передаем два параметра: имя исходного изображения и то, которое нужно получить
                                 
                                  $insert="INSERT INTO `img` (`image`, `img_order`, `user_login`) VALUES ('".$output."', '$id_order', '$user_login');";
                                 $sql3=mysqli_query($connect, $insert);
                                //добавление в базу
                            }

                             else {
                             $error="файл не был загружен";
                             }

                        }
                         else $error="Неверный тип загружаемого файла";
                    }
                     else $error="Данное расширение недопустимо для загрузки";
                }
                 else $error="Следует загрузить файл";
        }

    }
        else  $error="Максимальное количество фотографий не больше 12 шт";
    }
}
else
{
     header("Location: index.php"); exit();
}
?> 
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="shortcut icon" href="/image/favicon.jpg" type="image/x-icon">
  <meta name="Description" content="Описание страницы">
  <meta name="Keywords" content="Ключевые слова">
  <link href="/css/style.css" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
  <script src="js/script.js"></script>
  <script src="js/myscripts.js"></script>
  <script src="js/jquery.inputmask.js"></script>
    <script>

(function($){       

    jQuery.fn.lightTabs = function(options){

        

        var createTabs = function(){

            tabs = this;

            i = 0;

            

            showPage = function(i){

                $(tabs).children("div").children("div").hide();

                $(tabs).children("div").children("div").eq(i).show();

                $(tabs).children("ul").children("li").removeClass("active");

                $(tabs).children("ul").children("li").eq(i).addClass("active");

            }

            

            showPage(0);        

            

            $(tabs).children("ul").children("li").each(function(index, element){

                $(element).attr("data-page", i);

                i++;                        

            });

            

            $(tabs).children("ul").children("li").click(function(){

                showPage(parseInt($(this).attr("data-page")));

            });       

        };    

        return this.each(createTabs);

    };  

})(jQuery);

$(document).ready(function(){

    $(".tabs").lightTabs();

});

$(function(){
    
  $('#rotator1').rotator({fx:'slide',autorun: true, nav: true});
  
});


     </script> 
</head>
<body>  
    <div class="content">
    <div class="rotator" id="rotator1"></div>
    <div style="clear: both; height: 1px"></div>
    <div class="centr">
        <div id="fancyNav">
           <ul class="fancyNav">
            <li><a href="/index.php" ><span>Главная</span></a></li>
            <li><a href="#"><span>Новости</span></a></li>
            <li><a href="#"><span>Помощь</span></a></li>
            <li><a href="#"><span>О нас</span></a></li>
                           
           </ul>
       </div> 
        <div class="fancy">
            <ul class="fancyNav2">
                <li id="login"><?php echo $msg_log; ?></li>
                <li id="regist"><?php echo $msg_reg; ?></li>
                
            </ul>
        </div>
        <div style="clear: both; height: 1px"></div>
         <div class="opisanie_blok">
            <h3>Важно</h3>
            <p>Первая добавленная фотография будет вашей миниатюрой объявления</p>
            <p>Максимальное количество фотографий не больше 12 шт</p>
            <h3>Внимание</h3>
            <p>Загружаемое изображение должно быть в формате <b>JPEG</b> или <b>PNG</b></p>
         </div>
         <div class="add_img_blok">
            <FORM class="add_image" METHOD="POST" ENCTYPE="multipart/form-data">
                 <input type='file' class='file' name='img' size='100'> 
                 <input type='submit' class='filebtn submit' name='pr' value='Добавить'>
            </FORM>
            <div class="new_img_add">
                <p>
                    <?php if(isset($error) and !empty($error)) {
                        echo $error;
                    }  ?>
                </p>

                    <?php 

                    $str2 = "SELECT `image` FROM `img` WHERE img_order='$id_order'";
                    $sql5 = mysqli_query($connect, $str2);

                    while($res = mysqli_fetch_array($sql5)) : ?>
                         <div>
                            <img src="gallery/<?php echo $res['image']?>" width="203" height="130"  alt="foto">
                            <p> <a class="button4" href="#">Удалить</a></p>
                         </div>
                    <?php  endwhile;  ?> 
            </div>
        </div>
        <div style="clear: both; height: 1px"></div>
    </div>
  </div> 
</body> 
</html>