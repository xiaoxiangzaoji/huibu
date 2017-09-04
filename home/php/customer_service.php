<?php 
//客服管理
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
require("./Code/JXMySQL.php");
JXMySQL_Execute("select name,phone from `shop_consumerhotline` order by id DESC limit 2");
$sql = JXMySQL_Result();
echo json_encode($sql);








 ?>