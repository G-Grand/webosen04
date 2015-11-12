<?php  include('masiv.php'); ?>
  
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
 <?php
// Скрипт проверки
# Соединямся с БД
include_once "bd_connect.php";
$dt = time();
include_once "check.php";
?>
<!-- vladmaxi top bar -->
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
        <div class="ah">
              <h3 style="float:right"><?php echo $msg_hellow; ?></h3>
              <h3>Добавление нового объявления</h3>
        </div>
         <div class="add_order">
         
        <form  action="new_order.php" method="post" name="form1" id="addorder">
           <div class="add_order_left">
                   <p class="enjoy-css"> Вид недвижемости <sup>&#10034;</sup><br/><select size="1" name="property_Type">
                <?php
                  foreach ($nedvizhemost as $key => $value) {
                    ?>
                  <option value="<?php echo "$key";?>"><?php echo "$value";?></option>
                    <?php
                 } 
                 ?>
              </select>
            </p> 
          <p> Выберете область<sup>&#10034;</sup><br/>
              <select size="1" name="area">
                <?php
                  foreach ($oblast as $key => $value) {
                    ?>
                  <option value="<?php echo "$key";?>"><?php echo "$value";?></option>
                    <?php
                 } 
                 ?>
              </select></p>
          <p> Город<sup>&#10034;</sup><br/><input class="enjoy-input" name="city" type="text" id="city" size="30"></p> 
          <p> Раен<sup>&#10034;</sup><br/><input class="enjoy-input" name="district" type="text" id="district" size="30"></p> 
          <p> Улица<sup>&#10034;</sup><br/><input class="enjoy-input" name="street" type="text" id="street" size="30"></p> 
          <p> Вид сделки<sup>&#10034;</sup><br/>
                <select size="1" name="order_view">
                <?php
                  foreach ($deal as $key => $value) {
                    ?>
                  <option value="<?php echo "$key";?>"><?php echo "$value";?></option>
                    <?php
                 } 
                 ?>
              </select></p> 
          <p> Количество комнат<sup>&#10034;</sup><br/><input class="enjoy-input" name="rooms" type="text" id="rooms" size="30"></p> 
          </div>
          <div class="add_order_right">
          <p> Этаж<sup>&#10034;</sup><br/><input class="enjoy-input" name="floor" type="text" id="floor" size="30"></p>
          <p> Этажность<sup>&#10034;</sup><br/><input class="enjoy-input" name="all_floor" type="text" id="all_ floor" size="30"></p>
          <p> Общая площадь<sup>&#10034;</sup><br/><input class="enjoy-input" name="general" type="text" id=" general" size="30"></p>
          <p> Тип стен<br/><input class="enjoy-input" name="type_wall" type="text" id="type_wall" size="30"></p>
          <p> Цена<sup>&#10034;</sup><br/><input class="enjoy-input" name="price" type="text" id="price" size="30"></p>
          <p> Ваше имя<br/><input class="enjoy-input" name="Username" type="text" id="Username" size="30"></p>
          <p> Телефон<sup>&#10034;</sup><br/><input id="phone" class="enjoy-input" name="phone" type="text" id="phone" size="30"></p>
           </div>
           <div style="clear: both; height: 1px"></div> 
          <p>Подробное описание<br/><textarea class="enjoy-input" rows="10" cols="60" name="description" id="description" ></textarea>
                 <input type="hidden" name="datatime_order" value="<?php echo $dt;?>">
          </p>
    <p><input  type="submit" class="submit" value="Далее"></p>
</form>
 </div>
        
    </div>
  </div> 
<!--/ vladmaxi top bar -->

     

      
       
</body> 
</html>