<?php
//售卖情况 
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
$num  = isset($_POST['num'])?$_POST['num']:3;//显示数值
$source = isset($_POST['source'])?$_POST['source']:1;//页数
require("./Code/JXMySQL.php");
require("./Code/JXReturn.php");

JXMySQL_Execute("select count(id) as val from `shop_situation`");
$sqls = JXMySQL_Result();//总记录数
$page = ceil($sqls['0']['val']/3);//总页数
$limit = ($source-1)*$num;//起始记录

JXMySQL_Execute("select matchs,text,shopid,photo from `shop_situation`
				 order by id DESC limit $limit,$num ");
$result = JXMySQL_Result();
$result['page']=$page;
// $result['index'] = $index;
JXReturn_Json(0,$result);











 ?>