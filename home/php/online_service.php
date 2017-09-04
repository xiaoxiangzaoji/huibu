<?php
//在线客服 
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
require("./Code/JXMySQL.php");
JXMySQL_Execute("select info,text,name from `shop_company` order by id DESC");
$sqls = JXMySQL_Result();
echo json_encode($sqls);











 ?>