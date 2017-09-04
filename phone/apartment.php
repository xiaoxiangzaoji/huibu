<?php 
//手机banner图
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
require("./Code/JXMySQL.php");
require("./Code/JXReturn.php");
JXMySQL_Execute("select * from `phone_banner`");
$sql = JXMySQL_Result();
// echo "<pre>";print_r($sql);echo "<pre>";
JXReturn_Json(0,$sql);








 ?>