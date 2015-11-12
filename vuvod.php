<?php include_once "bd_connect.php";
      include_once "check.php";
     
?>

<html Doctype>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="shortcut icon" href="/image/favicon.jpg" type="image/x-icon">
  <meta name="Description" content="Описание страницы">
  <meta name="Keywords" content="Ключевые слова">
  <link href="/css/style.css" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script src="js/script.js"  ></script>

 <script type="text/javascript">
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
    <?php  if($_GET['property_Type']==1) { ?> <!--поле скрывается в зависимости от типа недвижимости -->
               <li>
                  <p class="name_poisk_filter">Этаж</p>
                  <input class="block_input" placeholder="От" value="" name="min_floor"> <input class="block_input" placeholder="До" value="" name="max_floor">
               </li>
          <?php } ?>
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
       <div style="clear: both; height: 1px"></div> 
    </div> <!--конец блока левой колонки-->

<div class="demo_block_right">

<!--Вывод-->


 <?php


    $where=!empty($_GET['property_Type']) ? '  `property_Type` = "' . $_GET['property_Type'] . '"' : ''; //тип недвижимости
    $where.=!empty($_GET['order_view'])  ? ' AND `order_view` = "' . $_GET['order_view'] . '"' : '';   //тип продажи
    $where.= !empty($_GET['area']) ? ' AND `area` = "' . $_GET['area'] . '"' : '';// область
    $where.= !empty($_GET['city']) ? ' AND `city` LIKE "' . $_GET['city'].'%"' : ''; //город
    $where.= !empty($_GET['min_rooms']) ? ' AND `rooms` >= "' . $_GET['min_rooms'] . '"' : '';//Минимальное количество комнат 
    $where.= !empty($_GET['max_rooms']) ? ' AND `rooms` <= "' . $_GET['max_rooms'] . '"' : '';//Максимальное количесво комнат
    $where.= !empty($_GET['min_floor']) ? ' AND `floor` >= "' . $_GET['min_floor'] . '"' : '';// Минимальный этаж
    $where.= !empty($_GET['max_floor']) ? ' AND `floor` <= "' . $_GET['max_floor'] . '"' : '';  //Максимальный этаж
    $where.= !empty($_GET['min_general']) ? ' AND `general` >= "' . $_GET['min_general'] . '"' : '';//Минимальная общая площадь 
    $where.= !empty($_GET['max_general']) ? ' AND `general` <= "' . $_GET['max_general'] . '"' : '';//Максимальная общая площадь
    $where.= !empty($_GET['min_price']) ? ' AND `price` >= "' . $_GET['min_price'] . '"' : '';//Минимальная цена 
    $where.= !empty($_GET['max_price']) ? ' AND `price` <= "' . $_GET['max_price'] . '"' : '';  //Максимальная цена


$where0 = ' WHERE ' . ltrim( $where);
  $num = 5;
  if (isset($_GET['page'])) {
  $page = $_GET['page'];
  }
  $str77 = "SELECT COUNT(*) FROM `order` $where0";
  $sql77 = mysqli_query($connect, $str77);
  $res77 = mysqli_fetch_array($sql77); 
  $temp=$res77["COUNT(*)"];
  $posts = $temp;
  $total = (($posts - 1) / $num) + 1;
  $total =  intval($total);
  if (isset($page)) {
  $page = intval($page);
  }
  if(empty($page) or $page < 0) $page = 1;
  if($page > $total) $page = $total;
  $start = $page * $num - $num; 
  //echo $total;
   
if(!empty($where)){
    $where1 = ' WHERE ' . ltrim( $where);
    $query = "SELECT  SUBSTRING(`description`, 1, 110) AS `description`, city, district, price, rooms, general, floor, datatime_order, phone, id_order, all_floor,property_Type,order_view FROM  `order` $where1 LIMIT $start, $num ";
    $result = mysqli_query($connect, $query);
    if(!empty($result)) { 
   while($res= mysqli_fetch_array($result)) {
    
 ?>
<!--вывод-->

<div class="vuvod_filtr_blok"> 
  <div class="result_poisk">
   <div class="img_mini">
    <?php  
          $ig=$res['id_order'];
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
       Город <?php echo $res['city']; ?>, <?php echo $res['district']; ?> р-н
     </div>
     <div class="price_result">
        Цена <b><?php echo $res['price']; ?></b>$/ <b><?php  $usdkurs=$res['price']*25; echo $usdkurs; ?></b>грн
     </div>
      <div class="info_rooms_div">
     <ul class="info_rooms">
       <li> Количество комнат <b><?php echo $res['rooms']; ?></b></li>
       <li>Площадь <b><?php echo $res['general']; ?></b> кв.м.</li>
       <li>Этаж <b><?php echo $res['floor']; ?>/<?php echo $res['all_floor']; ?></b> </li>
     </ul>

     <div class="info_opisanie">
        <?php echo   $res['description']; ?> ... 
     </div>

  </div>
   <div style="clear: both; height: 1px"></div>
   <hr>
    <div class="infvuvod_footer_div">
     <ul class="infvuvod_footer">
       <li>Дата подачи : <?php echo  date('Y-m-d', $res['datatime_order']); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
      <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Телефон: <b><?php echo $res['phone']; ?></b></li>  
     </ul>
      </div>
     <div class="podrobno"> <a href="pokaz.php?id_order=<?php echo $res['id_order'];?>&property_Type=<?php echo $res['property_Type'];?>&order_view=<?php echo $res['order_view'];?> ">Подробнее > </a></div>

    <div style="clear: both; height: 1px"></div>

</div>
</div>
  <div style="clear: both; height: 1px"></div>                  


  <?php } }

  else {
    ?><div class="er"><?php
   echo "Нет условий вывода по данному запросу, попробуйте ввести другие условия поиска";?>
   </div><?php
 }
  ?>
 
  <?php
if (!empty($_GET['property_Type'])){

	$property_Type=$_GET['property_Type'];
	$afte="property_Type=".$property_Type;
}
if (!empty($_GET['order_view'])){

	$order_view=$_GET['order_view'];
	$afte.="&order_view=".$order_view;
}
if (!empty($_GET['area'])){

  $order_view=$_GET['area'];
  $afte.="&area=".$order_view;
}
if (!empty($_GET['city'])){

  $order_view=$_GET['city'];
  $afte.="&city=".$order_view;
}
if (!empty($_GET['min_rooms'])){

  $order_view=$_GET['min_rooms'];
  $afte.="&min_rooms=".$order_view;
}
if (!empty($_GET['max_rooms'])){

  $order_view=$_GET['max_rooms'];
  $afte.="&max_rooms=".$order_view;
}
if (!empty($_GET['min_floor'])){

  $order_view=$_GET['min_floor'];
  $afte.="&min_floor=".$order_view;
}
if (!empty($_GET['max_floor'])){

  $order_view=$_GET['max_floor'];
  $afte.="&max_floor=".$order_view;
}
if (!empty($_GET['min_general'])){

  $order_view=$_GET['min_general'];
  $afte.="&min_general=".$order_view;
}
if (!empty($_GET['max_general'])){

  $order_view=$_GET['max_general'];
  $afte.="&max_general=".$order_view;
}
if (!empty($_GET['min_price'])){

  $order_view=$_GET['min_price'];
  $afte.="&min_price=".$order_view;
}
if (!empty($_GET['max_price'])){

  $order_view=$_GET['max_price'];
  $afte.="&max_price=".$order_view;
}



// Проверяем нужны ли стрелки назад
if ($page != 1) $pervpage = '<a href=vuvod.php?page=1&'.$afte.'>Первая</a> | <a href=vuvod.php?page='. ($page - 1) .'&'.$afte.'>Предыдущая</a> | ';
// Проверяем нужны ли стрелки вперед
if ($page != $total) $nextpage = ' | <a href=vuvod.php?page='.($page + 1).'&'.$afte.'>Следующая</a> | <a href=vuvod.php?page=' .$total.'&'.$afte. '>Последняя</a>';

// Находим две ближайшие станицы с обоих краев, если они есть
if($page - 5 > 0) $page5left = ' <a href=vuvod.php?page='. ($page - 5) .'&'.$afte.'>'. ($page - 5) .'</a> | ';
if($page - 4 > 0) $page4left = ' <a href=vuvod.php?page='. ($page - 4) .'&'.$afte.'>'. ($page - 4) .'</a> | ';
if($page - 3 > 0) $page3left = ' <a href=vuvod.php?page='. ($page - 3) .'&'.$afte.'>'. ($page - 3) .'</a> | ';
if($page - 2 > 0) $page2left = ' <a href=vuvod.php?page='. ($page - 2) .'&'.$afte.'>'. ($page - 2) .'</a> | ';
if($page - 1 > 0) $page1left = '<a href=vuvod.php?page='. ($page - 1) .'&'.$afte.'>'. ($page - 1) .'</a> | ';

if($page + 5 <= $total) $page5right = ' | <a href=vuvod.php?page='. ($page + 5) .'&'.$afte.'>'. ($page + 5) .'</a>';
if($page + 4 <= $total) $page4right = ' | <a href=vuvod.php?page='. ($page + 4) .'&'.$afte.'>'. ($page + 4) .'</a>';
if($page + 3 <= $total) $page3right = ' | <a href=vuvod.php?page='. ($page + 3) .'&'.$afte.'>'. ($page + 3) .'</a>';
if($page + 2 <= $total) $page2right = ' | <a href=vuvod.php?page='. ($page + 2) .'&'.$afte.'>'. ($page + 2) .'</a>';
if($page + 1 <= $total) $page1right = ' | <a href=vuvod.php?page='. ($page + 1) .'&'.$afte.'>'. ($page + 1) .'</a>';

// Вывод меню если страниц больше одной

if ($total > 1)
{
Error_Reporting(E_ALL & ~E_NOTICE);
echo "";
echo $pervpage.$page5left.$page4left.$page3left.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$page3right.$page4right.$page5right.$nextpage;

}

?>

<?php }   ?>
     <div style="clear: both; height: 1px"></div>       
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





 
                 </body>

                     </html>


