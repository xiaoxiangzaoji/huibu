<?php
//单条分类 
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
require("./Code/JXMySQL.php");
$id= $_POST['id'];
JXMySQL_Execute("select id,categroyname from `news_categroy` where id ='$id'");
$sqls = JXMySQL_Result();
// echo "<pre>";print_r($sqls);echo "<pre>";
echo json_encode($sqls);








 ?>