<?php include_once "bd_connect.php";
       include_once "include/kyrs.php";
      include_once "check.php";

$id=$_GET['id_order']; 
//условия на тип жилья 
if($_GET['property_Type']==1){
  $property_Type_1='квартиру';
  $property_Type_2='Квартира';
  $kvartira='';
}
elseif($_GET['property_Type']==2){
  $property_Type_1='Дом';
  $property_Type_2='Дом';}

//условия на тип операции
if ($_GET['order_view'] == 1) {
    $order_view='Продажа';
} elseif ($_GET['order_view'] == 2) {
    $order_view='Аренда';
} elseif ($_GET['order_view'] == 3) {
    $order_view='Посуточная аренда';
}
//переменная курса 
$kursUAH = (float)getKurs();
if (isset($kursUAH) > 0)  {
$kyrs=$kursUAH;
};
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
 <script type="text/javascript">
(function ($) {
var hwSlideSpeed = 700;
var hwTimeOut = 300000;
var hwNeedLinks = true;

$(document).ready(function(e) {
  $('.slide').css(
    {"position" : "absolute",
     "top":'0', "left": '0'}).hide().eq(0).show();
  var slideNum = 0;
  var slideTime;
  slideCount = $("#slider .slide").size();
  var animSlide = function(arrow){
    clearTimeout(slideTime);
    $('.slide').eq(slideNum).fadeOut(hwSlideSpeed);
    if(arrow == "next"){
      if(slideNum == (slideCount-1)){slideNum=0;}
      else{slideNum++}
      }
    else if(arrow == "prew")
    {
      if(slideNum == 0){slideNum=slideCount-1;}
      else{slideNum-=1}
    }
    else{
      slideNum = arrow;
      }
    $('.slide').eq(slideNum).fadeIn(hwSlideSpeed, rotator);
    $(".control-slide.active").removeClass("active");
    $('.control-slide').eq(slideNum).addClass('active');
    }
if(hwNeedLinks){
var $linkArrow = $('<a id="prewbutton" href="#">&lt;</a><a id="nextbutton" href="#">&gt;</a>')
  .prependTo('#slider');    
  $('#nextbutton').click(function(){
    animSlide("next");
    return false;
    })
  $('#prewbutton').click(function(){
    animSlide("prew");
    return false;
    })
}
  var $adderSpan = '';
  $('.slide').each(function(index) {
      $adderSpan += '<span class = "control-slide">' + index + '</span>';
    });
  $('<div class ="sli-links">' + $adderSpan +'</div>').appendTo('#slider-wrap');
  $(".control-slide:first").addClass("active");
  $('.control-slide').click(function(){
  var goToNum = parseFloat($(this).text());
  animSlide(goToNum);
  });
  var pause = false;
  var rotator = function(){
      if(!pause){slideTime = setTimeout(function(){animSlide('next')}, hwTimeOut);}
      }
  $('#slider-wrap').hover(  
    function(){clearTimeout(slideTime); pause = true;},
    function(){pause = false; rotator();
    });
  rotator();
});
})(jQuery);

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
       <div style="padding:10px">
              <script type="text/javascript" src="//vk.com/js/api/openapi.js?120"></script>

        <!-- VK Widget -->
        <div id="vk_groups"></div>
        <script type="text/javascript">
        VK.Widgets.Group("vk_groups", {mode: 0, width: "200", height: "400", color1: 'FFFFFF', color2: '2B587A', color3: '5B7FA6'}, 20003922);
        </script> 

     </div>

    </div>

     <div class="demo_block_right">
    <?php $query = "SELECT * FROM `order` WHERE id_order='$id'" ;
    $result = mysqli_query($connect, $query);
    $res_pokaz = mysqli_fetch_array($result);?>

    <div class="name_pokaz"> Продам <?php echo $property_Type_1; ?> в городе <?php echo $res_pokaz['city']; ?>, район <?php echo $res_pokaz['district']; ?>, улица <?php echo $res_pokaz['street']; ?>
    </div>
    
          <div id="slider-wrap">
              <div id="slider">
                <?php  
          
        $quer1 ="SELECT image FROM `img` WHERE img_order='$id' " ;
        $result1 = mysqli_query($connect, $quer1);
          
        while($res1 = mysqli_fetch_array($result1)){
          if($res1['image']==true){
            
      ?>

                <div class="slide"><img src="/gallery/<?php echo $res1['image'];?>" width="600" height="400"></div>
             <?php ; } 
                
                else{ ?>
                  <div class="slide"><img src="/gallery/no-image.png" width="600" height="400"></div>
                <?php ;
              } }
             ?> 
                
              </div>
        </div>
    

    <div>
       <dl> 
       <dt> Характеристики</dt>
        
         	<dd><span class="label"> Тип недвижимости: </span>  <span class="argument"><?php echo $property_Type_2; ?> </span> </dd>
         	<dd><span class="label"> Тип операции: </span>  <span class="argument"> <?php echo $order_view; ?>   </span> </dd>
         	<dd><span class="label"> Комнат: </span>  <span class="argument"><?php echo $res_pokaz['rooms']; ?>  </span> </dd>  
  <?php if(isset($kvartira)){ ?> 
           <dd><span class="label"> Этаж: </span>  <span class="argument"> <?php echo $res_pokaz['floor']; ?>   </span> </dd> <?php } 
else { ?> 
           <dd><span class="label"> Участок: </span>  <span class="argument"> продажа  </span> </dd>
  <?php } ?>
         	 <dd><span class="label"> Жилых этажей: </span>  <span class="argument"> <?php echo $res_pokaz['all_floor']; ?>   </span> </dd>
         	 <dd><span class="label">Общая пл.: </span>  <span class="argument"><?php echo $res_pokaz['general']; ?> м<sup>2</sup> </span> </dd>
         <dd><span class="label">Цена:</span>  <span class="argument"><b> <?php echo $res_pokaz['price']; ?></b> ГРН. </span> </dd>
         
        

  <?php  if(isset($kyrs)) { ?><dd><span class="label"> Цена по курсу: </span>  <span class="argument"> <b><?php  $uah=$res_pokaz['price']; $priceusd=$uah/$kyrs ; echo  (int) $priceusd; ?> </b> USD </span> </dd> <?php } ?>
     <dt>Описание</dt>
        

      <dd> <span class="argument"><?php echo $res_pokaz['description']; ?> </span> </dd>
      <dt>Продавец</dt>
      <dd><span class="label">Имя:</span>  <span class="argument"><b> <?php echo $res_pokaz['Username']; ?></b>  </span> </dd>
      <dd><span class="label">Телефон:</span>  <span class="argument"><b> <?php echo $res_pokaz['phone']; ?></b>  </span> </dd>
    </dl> 
</div>
  </div>
    <div style="clear: both; height: 1px"></div> 
    </div>


        </div>




 
                 </body>

                     </html>
