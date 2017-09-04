<?php 
//手机端新闻详情
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
// $index= $_POST['index'];

$id = $_POST['id'];
require("./Code/JXMySQL.php");
require("./Code/JXReturn.php");

JXMySQL_Execute("select * from `news` where id = ?",array($id));
$sqls = JXMySQL_Result();//总记录数
JXReturn_Json(0,$sqls);







 ?>