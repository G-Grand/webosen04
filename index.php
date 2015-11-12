<?php include_once "bd_connect.php";
      include_once "check.php";

?>




<!doctype html>
<html>



<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="shortcut icon" href="/image/favicon.jpg" type="image/x-icon">
  <meta name="Description" content="Описание страницы">
  <meta name="Keywords" content="Ключевые слова">
  <link href="/css/style.css" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script src="js/script.js"></script>

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
        $.ajax({
                url: "myajax.php",
                dataType: "json",
                method: "POST",
                success: function(data) {
                    console.log(data);
                    var div = document.getElementById("five");
                    var lis = "";
                    for(var i=0; i<data.length; ++i) {
                        lis += "<div style=\"background-image: url('/gallery/"+data[i].image+"')\"><a href=\"#\">"+data[i].order_status+" "+data[i].property_Type+", "+data[i].city+"  "+data[i].district+" <br/>"+data[i].floor+"-эт "+data[i].general+"кв.м.  "+data[i].price+"грн.</a> </div>";
                    }
                    lis +="<div style=\"clear: both; height: 1px; width:100%\"></div>";
                    div.innerHTML = lis;
                }
            });
    
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
            <li><a href="/" ><span>Главная</span></a></li>
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

<!--начало формы поиска-->
  <div class="demo_block">
     <div class="tabs">
        <ul>
         <li class="tabs_li">Квартиры </li>
         <li class="tabs_li">Дома </li>
        </ul>
         <div>
          <div>

<div class="block_search">
 <div class="block_search_body">
    <div class="name_poisk"> Поиск </div>
     <form name="form" action="vuvod.php" method="GET" >
     <input type="hidden" name="property_Type" value="1"> <!--Скрытое значение квартира -->

      <ul class="spisok_index">

         <li>
             <p>   
                <select  name='order_view' >
                  <option value="1"> Продажа </option>
                    <option value="2">Аренда </option>
                      <option value="3"> Посуточная аренда </option>
                </select>
              </p>
         </li>
         <li>
              <p> 
                  <select  name='area' >
                  <option value="1"> Днепропетровская область</option>
                  </select>
              </p>         
         </li>
          <li>
              <p> 
                <p> <input class="input_siti" placeholder="город" value="" name="city"> </p>  
              </p>         
         </li>
      </ul>

       <ul class="spisok_index">
      <table>
         <li>
           <tr>
           <td><p class="vvod_p">Количество комнат </p></td><td><input class="vvod" placeholder="От" value="" name="min_rooms"> <input class="vvod" placeholder="До" value="" name="max_rooms"></td>
         </tr>
          </li>  
        <li>
          <tr>
            <td><p class="vvod_p">Этаж</td> </p><td><input class="vvod" placeholder="От" value="" name="min_ floor"> <input class="vvod" placeholder="До" value="" name="max_ floor"><td>
            </tr>
          </li>
        <li>
          <tr>
            <td><p class="vvod_p">Общая площадь, кв.м </p></td><td> <input class="vvod" placeholder="От" value="" name="min_general"> <input class="vvod" placeholder="До" value="" name="max_general"></td>
          </tr>
           </li>
        <li>
          <tr>
            <td><p class="vvod_p">Цена, грн </p></td><td> <input class="vvod" placeholder="От" value="" name="min_price"> <input class="vvod" placeholder="До" value="" name="max_price"></td>
           </tr>                
          </li>
        </table>   
      </ul>
     <input class="index_submit2"type="submit" name="filter" value="Поиск" >
    </form>

                 </div> 
              </div> 
           </div> 

        <div>  <!--Блок дома -->

<div class="block_search">

  <div class="name_poisk"> Поиск </div>
     <form name="form" action="vuvod.php" method="GET" >
     <input type="hidden" name="property_Type" value="2"> <!--Скрытое значение дом -->
      <ul class="spisok_index">
         <li>
             <p>   
                <select  name='order_view' >
                  <option value="1"> Продажа </option>
                    <option value="2">Аренда </option>
                      <option value="3"> Посуточная аренда </option>
                </select>
              </p>
         </li>
         <li>
              <p> 
                  <select  name='area' >
                  <option value="1"> Днепропетровская область</option>
                  </select>
              </p>         
         </li>
          <li>
              <p> 
                <p> <input class="input_siti" placeholder="город" value="" name="city"> </p>  
              </p>         
         </li>
      </ul>
       <ul class="spisok_index">
      <table>
         <li>
           <tr>
           <td><p class="vvod_p">Количество комнат </p></td><td><input class="vvod" placeholder="От" value="" name="min_rooms"> <input class="vvod" placeholder="До" value="" name="max_rooms"></td>
         </tr>
          </li>  
        <li>
          <tr>
            <td><p class="vvod_p">Общая площадь, кв.м </p></td><td> <input class="vvod" placeholder="От" value="" name="min_general"> <input class="vvod" placeholder="До" value="" name="max_general"></td>
          </tr>
           </li>
        <li>
          <tr>
            <td><p class="vvod_p">Цена, грн </p></td><td> <input class="vvod" placeholder="От" value="" name="min_price"> <input class="vvod" placeholder="До" value="" name="max_price"></td>
           </tr>                
          </li>
        </table>   
      </ul>
     <input class="index_submit"type="submit" name="filter" value="Поиск" >
    </form>

          </div> 
      
      
      
      
         </div><!--конец формы поиска-->



      </div> </div></div>
      <div class="fresh">
          <div class="new_fresh"> <h3>Новые обьявления на сайте</h3><hr/></div>
          <div class="last_five" id="five">
              
          </div>
          <div style="clear: both; height: 1px"></div>
      </div>
       <div class="fresh">
          <div class="new_fresh"> <h3>Новости</h3><hr/></div>
          
          <div style="clear: both; height: 1px"></div>
      </div>


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
       

 </div> <!--content --> 
     
   </body>
 </html>








