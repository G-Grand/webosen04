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
       <div class="tabs"> 
        <div class="news_blok">
          <h2>Приглашаем на открытие шоу-румов жилого комплекса «Традиция»!</h2><hr>
          <p class="news_info"> <img src="images/icon/text-calendar.png" width="20px" height="20px">10.11.2015 года &nbsp;&nbsp; <img src="images/icon/Comments.png" width="20px" height="20px"> Нет комментариев </p>
          <div class="news_img"><img src="images/news/1.jpg" width="344px" height="193px"></div>  
           
         <p class="text"> 3 ноября открывается новый шоу-рум на Позняках в доме, который строится по ул. Пчилки, 3.
           Здесь Вы составите полноценное впечатление о планировочных решениях квартир разной площади, по достоинству оцените качество используемых материалов в квартирах «под ключ», а также собственными глазами увидите дизайнерские решения отделки кухонь и санузлов. 
           В демонстрационных квартирах с отделкой установлены бронированные противопожарные входные двери с МДФ-накладками «под дерево», стильные межкомнатные двери, удобные кухонные гарнитуры, стены оклеены флизелиновыми обоями под покраску, представлены комплекты сантехнического оборудования ТМ Colombo со смесителями ТМ Ferro, установлена акриловая ванна, радиаторы отопления, электросчетчики и счетчики на воду. 
           В наших шоу-румах Вы почувствуете себя владельцем уютной квартиры, а Ваше решение о выборе будущего жилья, без сомнения, будет обдуманным и взвешенным!   Наши менеджеры уже сегодня готовы записать Вас на просмотр презентационных квартир. Свяжитесь с нами по телефону (044) 209-90-77.

           </p>
           <a href="#" class="news_botton"> Читать -> </a>
           
        </div>
        <div class="news_blok">
          <h2>Приглашаем на открытие шоу-румов жилого комплекса «Традиция»!</h2><hr>
          <p class="news_info"> <img src="images/icon/text-calendar.png" width="20px" height="20px">10.11.2015 года &nbsp;&nbsp; <img src="images/icon/Comments.png" width="20px" height="20px"> Нет комментариев </p>
          <div class="news_img" ><img src="images/news/1.jpg" width="344px" height="193px" ></div>  
           
         <p class="text"> 3 ноября открывается новый шоу-рум на Позняках в доме, который строится по ул. Пчилки, 3.
           Здесь Вы составите полноценное впечатление о планировочных решениях квартир разной площади, по достоинству оцените качество используемых материалов в квартирах «под ключ», а также собственными глазами увидите дизайнерские решения отделки кухонь и санузлов. 
           В демонстрационных квартирах с отделкой установлены бронированные противопожарные входные двери с МДФ-накладками «под дерево», стильные межкомнатные двери, удобные кухонные гарнитуры, стены оклеены флизелиновыми обоями под покраску, представлены комплекты сантехнического оборудования ТМ Colombo со смесителями ТМ Ferro, установлена акриловая ванна, радиаторы отопления, электросчетчики и счетчики на воду. 
           В наших шоу-румах Вы почувствуете себя владельцем уютной квартиры, а Ваше решение о выборе будущего жилья, без сомнения, будет обдуманным и взвешенным!   Наши менеджеры уже сегодня готовы записать Вас на просмотр презентационных квартир. Свяжитесь с нами по телефону (044) 209-90-77.

           </p>
           <a href="#" class="news_botton"> Читать -> </a>
           
        </div>

       <div style="clear: both; height: 1px"></div>
    </div>


  </div> <!--content -->

   </body>
 </html>








