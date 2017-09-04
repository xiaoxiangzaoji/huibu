<?php 
//新闻分类 
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
require("./Code/JXMySQL.php");
JXMySQL_Execute("select id,categroyname from `news_categroy` ");
$sqls = JXMySQL_Result();
// echo "<pre>";print_r($sqls);echo "<pre>";
echo json_encode($sqls);









 ?>