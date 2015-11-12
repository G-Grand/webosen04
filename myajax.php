<?php
     include_once "bd_connect.php";
        // Check connection
        if (!$connect) {
            die("Connection failed: " . mysqli_connect_error());
        }

     $str = "SELECT `order_status`, `id_order`, `city`, `property_Type`, `district`, `general`, `price`, `floor` FROM `order` ORDER BY `id_order` DESC LIMIT 5";
       $sql = mysqli_query($connect, $str);
       $arrall = array();
          while($res = mysqli_fetch_array($sql,MYSQL_ASSOC)){
              $arr = array();
              $id = $res['id_order'];

                 foreach ($res as $key => $value) {

                  $arr[$key]=$value; 
                   $str_img ="SELECT image FROM `img` WHERE img_order='$id' LIMIT 1";
                  $sql_img = mysqli_query($connect, $str_img);
                  $res_img = mysqli_fetch_array($sql_img,MYSQL_ASSOC);
                       foreach ($res_img  as $k => $v) {
                         $arr[$k]=$v;
                       }
                  }
$arrall[]=$arr;
                // $id = $res['id_order'];
                 // $str_img ="SELECT image FROM `img` WHERE img_order='$id' LIMIT 1";
                 // $sql_img = mysqli_query($connect, $str_img);
                  //$res_img = mysqli_fetch_array($sql_img,MYSQL_ASSOC);
                  //$res.=$res_img;

                 
                  //$arr[]=$res;
               }
               
 // var_dump($arr);
  //$json = file_get_contents("php://input");
  //var_dump($json);
  //$arrayName = array(array('ggg' => 123456,'email' => "kfjsdl@fsdfjkl;.com" ), array('ggg' => 11,'email' => "jhon@fsdfjkl;.com" ),array('ggg' => 654,'email' => "tolya@fsdfjkl;.com" ));
  echo json_encode($arrall);