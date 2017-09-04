<?php 
//户型图
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
// require("./Code/JXMySQL.php");
// JXMySQL_Execute("select * from `shop_huxing` order by id Desc");
// $sql = JXMySQL_Result();
// echo json_encode($sql);

$num = isset($_POST['num'])?$_POST['num']:3;//显示数值
$source = isset($_POST['source'])?$_POST['source']:1;//页数
require("./Code/JXMySQL.php");
require("./Code/JXReturn.php");

JXMySQL_Execute("select count(id) as val from `shop_huxing`");
$sqls = JXMySQL_Result();//总记录数
$page = ceil($sqls['0']['val']/$num);//总页数
//var_dump($page);die();
if ($source>$page) {//大于最大页数
	$source = 1;
}
if ($source<1) {//小于最小页数
	$source = 1;
}
$limit = ($source-1)*$num;//起始记录

JXMySQL_Execute("select * from `shop_huxing` 
				order by id DESC limit $limit,$num ");
$result = JXMySQL_Result();
$result['page']=$page;
// $result['index'] = $index;
JXReturn_Json(0,$result);
//echo "<pre>";print_r($result);echo "<pre>";








 ?>