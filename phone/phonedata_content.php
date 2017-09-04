<?php 
//手机端文献内容
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
$id = $_POST['id'];
require("./Code/JXMySQL.php");
require("./Code/JXReturn.php");
JXMySQL_Execute("select  * from `phone_data` where id = '$id'");
$sqls = JXMySQL_Result();
JXReturn_Json(0,$sqls);







 ?>