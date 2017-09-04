<?php 
//公司地理位置地址
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
require("./Code/JXMySQL.php");
JXMySQL_Execute("select text,pic,photo from `shop_geographic` order by id DESC limit 1");
$sql = JXMySQL_Result();
echo json_encode($sql);











 ?>