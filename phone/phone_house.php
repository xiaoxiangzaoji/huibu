<?php 
//店铺介绍
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
$num  = isset($_POST['num'])?$_POST['num']:5;//显示数值
$source = isset($_POST['source'])?$_POST['source']:1;//页数
require("./Code/JXMySQL.php");
require("./Code/JXReturn.php");
JXMySQL_Execute("select count(id) as val from `shop_product`");
$sqls = JXMySQL_Result();//总记录数
$page = ceil($sqls['0']['val']/5);//总页数
$limit = ($source-1)*$num;//起始记录

JXMySQL_Execute("select name,live,dress,accuracy,photo from `shop_product` order by id DESC limit $limit,$num");

$result = JXMySQL_Result();
$result['page']=$page;
echo json_encode($result);






 ?>