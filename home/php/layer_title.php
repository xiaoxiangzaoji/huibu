<?php 
//相关购房信息法律法规标题
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
$num  = isset($_POST['num'])?$_POST['num']:5;//显示数值
$source = isset($_POST['source'])?$_POST['source']:1;//页数
require("./Code/JXMySQL.php");
require("./Code/JXReturn.php");

JXMySQL_Execute("select count(id) as val from `shop_purchase`");
$sqls = JXMySQL_Result();//总记录数
$page = ceil($sqls['0']['val']/5);//总页数
if ($source>$page) {//大于最大页数
	$source = 1;
}
if ($source<1) {//小于最小页数
	$source = 1;
}
$limit = ($source-1)*$num;//起始记录

JXMySQL_Execute("select id,text from `shop_purchase` order by id DESC limit $limit,$num ");
$result = JXMySQL_Result();
$result['page']=$page;
JXReturn_Json(0,$result);
 ?>