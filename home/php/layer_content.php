<?php 
//相关购房信息法律法规内容
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
require("./Code/JXMySQL.php");
require("./Code/JXReturn.php");
$id= $_POST['id'];
JXMySQL_Execute("select tetx,texts compty from `shop_purchase` where id ='$id'");
$sqls = JXMySQL_Result();
JXReturn_Json(0,$sqls);

 ?>