<?php include_once "bd_connect.php";
      include_once "check.php";
      $user = $userdata['user_login'];
      if (!$connect) {
                  die("Connection failed: " . mysqli_connect_error());
        
}

$num = 6;
if(isset($_GET['page']) and !empty($_GET['page'])){
  $page = $_GET['page'];
}
 else{
   $page=0;
 }
 $str77 = "SELECT COUNT(*) FROM `order` WHERE user_login = '$user'";
  $sql77 = mysqli_query($connect, $str77);
  $res77 = mysqli_fetch_array($sql77); 
  $temp=$res77["COUNT(*)"];
$posts = $temp;
$total = (($posts - 1) / $num) + 1;
$total =  intval($total);
$page = intval($page);
if(empty($page) or $page < 0) $page = 1;
if($page > $total) $page = $total;
$start = $page * $num - $num;
?>





<html Doctype>



<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="shortcut icon" href="/image/favicon.jpg" type="image/x-icon">
  <meta name="Description" content="Описание страницы">
  <meta name="Keywords" content="Ключевые слова">
  <link href="/css/style.css" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script src="js/script.js"></script>

<script>

$(document).ready(function(){

    $(".tabs").lightTabs();

});

$(function(){
    
  $('#rotator1').rotator({fx:'slide',autorun: true, nav: true});
  
})

     </script> 



</head>

<body>

   

  <div class="content">
    <div class="rotator" id="rotator1"></div>
    <div style="clear: both; height: 1px"></div>
    <div class="centr">
        <div id="fancyNav">
           <ul class="fancyNav">
           <li><a href="index.php" ><span>Главная</span></a></li>
            <li><a href="news.php"><span>Новости</span></a></li>
            <li><a href="help.php"><span>Помощь</span></a></li>
            <li><a href="about_us.php"><span>О нас</span></a></li>
                           
           </ul>
       </div> 
        <div class="fancy">
            <ul class="fancyNav2">
                <li id="login"><?php echo $msg_log; ?></li>
                <li id="regist"><?php echo $msg_reg; ?></li>
                
            </ul>
        </div>
        <div style="clear: both; height: 1px"></div>
        <div class="button"><p> <?php echo $msg_add; ?></p></div>
<div class="demo_block_left">
    <p class="poisk_nazva"> Расширенный поиск  </p>

       <form id="loginform" name="form" action="vuvod.php" accept-charset="utf-8" method="GET" >
             <ul>

               <li> 
                  <select class="" name='property_Type' > 
                    <option value="1"> Квартира  </option>
                    <option value="2">Дом </option>
                  </select>
               </li>
               <li>
                  <select class="" name='order_view' >
                    <option value="1"> Продажа </option>
                    <option value="2">Аренда </option>
                    <option value="3"> Посуточная аренда </option>
                  </select>
               </li>
               <li> 
                  <select class="" name='area' >
                    <option value="1"> Днепропетровская обл</option>
                  </select>
               </li>
               <li>
                  <input class="name_siti_input" placeholder="Введите город " value="" name="city">
               </li>
               <li>
                  <p class="name_poisk_filter">Количество комнат</p>
                  <input class="block_input" placeholder="От" value="" name="min_rooms"> <input class="block_input" placeholder="До" value="" name="max_rooms">
                  <label class="error" generated="true" for="min_rooms"></label>
                  <label class="error" generated="true" for="max_rooms"></label>
               </li>
     <!--поле скрывается в зависимости от типа недвижимости -->
               <li>
                  <p class="name_poisk_filter">Этаж</p>
                  <input class="block_input" placeholder="От" value="" name="min_floor"> <input class="block_input" placeholder="До" value="" name="max_floor">
               </li>
          
                <li>
                  <p class="name_poisk_filter">Общая площадь</p>
                  <input class="block_input" placeholder="От" value="" name="min_general"> <input class="block_input" placeholder="До" value="" name="max_general">
               </li>
                <li>
                  <p class="name_poisk_filter">Цена</p>
                  <input class="block_input" placeholder="От" value="" name="min_price"> <input class="block_input" placeholder="До" value="" name="max_price">
               </li>
               <li>
                  <input class="submit_poisk_left" type="submit" name="filter" value="Уточнить поиск " >
               </li>               
            </ul>

       </form>
    </div>




        <div class="demo_block_right">
          <?php 
          $querys = "SELECT * FROM `order` WHERE user_login = '$user' LIMIT $start, $num" ;
            $reslt = mysqli_query($connect, $querys);
            
               
              if($reslt){
                 while($res_user = mysqli_fetch_array($reslt)){ ?>
                    
           <div class="vuvod_filtr_blok"> 
  <div class="result_poisk">
   <div class="img_mini">
    <?php  
          $ig=$res_user['id_order'];
        $quer1 ="SELECT image FROM `img` WHERE img_order='$ig' LIMIT 1" ;
        $result1 = mysqli_query($connect, $quer1);
         if($res1 = mysqli_fetch_array($result1)){
                            ?>
                            <img src="/gallery/<?php echo $res1['image'];?>"width="185" height="120"  class="poisk_photo" alt="foto"/>
                            <?php ;}
                                 else{?>
                                  <img src="/gallery/no-image.png" width="185" height="120"  class="poisk_photo" alt="foto"/>
                                 <?php ;} ?>
          <div class="count_photo">
        <?php 
            $str3 = "SELECT COUNT(*) FROM `img` WHERE img_order='$ig'";
            $sql6 = mysqli_query($connect, $str3);
            $res2 = mysqli_fetch_array($sql6); 
            echo $res2["COUNT(*)"]; 
        ?> фото
      </div> 
      <div style="clear: both; height: 1px"></div>                        
     </div>
        
      <div class="region">
       Город <?php echo $res_user['city']; ?>, <?php echo $res_user['district']; ?> р-н
     </div>
     <div class="price_result">
        Цена <b><?php echo $res_user['price']; ?></b>$/ <b><?php  $usdkurs=$res_user['price']*25; echo $usdkurs; ?></b>грн
     </div>
      <div class="info_rooms_div">
     <ul class="info_rooms">
       <li> Количество комнат <b><?php echo $res_user['rooms']; ?></b></li>
       <li>Площадь <b><?php echo $res_user['general']; ?></b> кв.м.</li>
       <li>Этаж <b><?php echo $res_user['floor']; ?>/<?php echo $res_user['all_floor']; ?></b> </li>
     </ul>

     <div class="info_opisanie">
        <?php echo   $res_user['description']; ?> ... 
     </div>

  </div>
   <div style="clear: both; height: 1px"></div>
   <hr>
    <div class="infvuvod_footer_div">
     <ul class="infvuvod_footer">
       <li>Дата подачи : <?php echo  date('Y/m/d H:i', $res_user['datatime_order']); ?>&nbsp;&nbsp;&nbsp;&nbsp;</li>
      <li>&nbsp;&nbsp;&nbsp;&nbsp;Телефон: <b><?php echo $res_user['phone']; ?></b></li>  
     </ul>
      </div>
     <div class="podrobno"> <a href="pokaz.php?id_order=<?php echo $res_user['id_order'];?>&property_Type=<?php echo $res_user['property_Type'];?>&order_view=<?php echo $res_user['order_view'];?> ">Подробнее > </a></div>

    <div style="clear: both; height: 1px"></div>

</div>
</div>
  <div style="clear: both; height: 1px"></div> 

                  <?php  } 
              }
              else{
                ?>
                    <div class="vuvod_filtr_blok">
                      <p>У Вса пока нет ни одного объявления</p>
                    </div> 

             <?php }?>
                    <div class="pagination">
                      <?php
                  // Проверяем нужны ли стрелки назад
                  if ($page != 1) $pervpage = '<a href=my_office.php?page=1>Первая</a> | <a href=my_office.php?page='. ($page - 1) .'>Предыдущая</a> ';
                  // Проверяем нужны ли стрелки вперед
                  if ($page != $total) $nextpage = '<a href=my_office.php?page='.($page + 1).'>Следующая</a> | <a href=my_office.php?page=' .$total. '>Последняя</a>';

                  // Находим две ближайшие станицы с обоих краев, если они есть
                  if($page - 5 > 0) $page5left = '<a href=my_office.php?page='. ($page - 5) .'>'. ($page - 5) .'</a> |';
                  if($page - 4 > 0) $page4left = '<<a href=my_office.php?page='. ($page - 4) .'>'. ($page - 4) .'</a> |';
                  if($page - 3 > 0) $page3left = '<a href=my_office.php?page='. ($page - 3) .'>'. ($page - 3) .'</a> |';
                  if($page - 2 > 0) $page2left = '<a href=my_office.php?page='. ($page - 2) .'>'. ($page - 2) .'</a> |';
                  if($page - 1 > 0) $page1left = '<a href=my_office.php?page='. ($page - 1) .'>'. ($page - 1) .'</a> |';

                  if($page + 5 <= $total) $page5right = ' | <a href=my_office.php?page='. ($page + 5) .'>'. ($page + 5) .'</a>';
                  if($page + 4 <= $total) $page4right = ' | <a href=my_office.php?page='. ($page + 4) .'>'. ($page + 4) .'</a>';
                  if($page + 3 <= $total) $page3right = ' | <a href=my_office.php?page='. ($page + 3) .'>'. ($page + 3) .'</a>';
                  if($page + 2 <= $total) $page2right = ' | <a href=my_office.php?page='. ($page + 2) .'>'. ($page + 2) .'</a>';
                  if($page + 1 <= $total) $page1right = ' | <a href=my_office.php?page='. ($page + 1) .'>'. ($page + 1) .'</a>';

                  // Вывод меню если страниц больше одной

                  if ($total > 1)
                  {
                  Error_Reporting(E_ALL & ~E_NOTICE);
                  echo "";
                  echo $pervpage.$page5left.$page4left.$page3left.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$page3right.$page4right.$page5right.$nextpage;
                  echo "</div>";
                  }

           ?>
                  </div>
             <div style="clear: both; height: 1px"></div> 
                <footer>
            <ul class="spisok_footer">
              <li ><h3>Информация </h3></li>
              <li><a href="/news">Новости</a> </li>
              <li> <a href="">Карта сайта</a></li>
              <li> <a href="/about_us">О нас </a></li>
            </ul>
            <ul class="spisok_footer">
              <li ><h3>Партнерам  </h3></li>
              <li><a href="">Безопасность сделок</a> </li>
              <li> <a href="/help">Помощ </a></li>
              <li> <a href="">Политика конфидициальности </a></li>
            </ul>
            
            <div class="soc">
               <p>Поделиться в социальных сетях</p>
              <div class="share42init"></div>
             <script type="text/javascript" src="http://shag.justdo.dp.ua/share42/share42.js"></script> 
            </div>

            
           </footer>    
        </div>
      
    </div>

  </div> <!--content -->

   </body>
 </html>








