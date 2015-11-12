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

<style>
.spoiler-title{cursor:pointer; margin: 10px;}
.spoiler-body{display:none;background: #F8FBEF;
    margin: 10px;}
</style>
<script>

$(document).ready(function(){

    $(".tabs").lightTabs();

});

$(function(){
    
  $('#rotator1').rotator({fx:'slide',autorun: true, nav: true});
  
})

$(document).ready(function(){
$('.spoiler-body').hide();
$('.spoiler-title').click(function(){
    $(this).next().toggle()});
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
     
    <div class="content_str">    
      <h2> Категории вопросов: </h2>
        <p class="spoiler-title">1.Как добавить объявление ?</p>
         <div class="spoiler-body">Ответ </div>
   
       <p class="spoiler-title">2.Как отредактировать объявление?</p>
       <div class="spoiler-body">Ответ </div>
    
       <p class="spoiler-title">3.Как поднять объявление с помощью уровней ТОП?</p>
       <div class="spoiler-body">Ответ </div>
       
       <p class="spoiler-title">4.Как подтвердить номер телефона?</p>
       <div class="spoiler-body">Ответ </div>
    
       <p class="spoiler-title">5.Куда пропали мои объявления?</p>
       <div class="spoiler-body">Ответ </div>
        
       <p class="spoiler-title">6.Личная страница. Как добавить/изменить данные.</p>
       <div class="spoiler-body">Ответ </div>
    
       <p class="spoiler-title">7.Условия публикации объявлений</p>
       <div class="spoiler-body">Ответ </div>



   
       </div>
    </div>
    
  </div> <!--content -->

   </body>
 </html>








