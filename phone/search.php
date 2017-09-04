<?php 
//搜索
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
require("./Code/JXMySQL.php");
require("./Code/JXReturn.php");
$word = $_POST['word'];
if (!empty($_POST)) {
	
JXMySQL_Execute("select * from `shop_onlineservice` 
				where history like '%$word%' 
				");
$sql = JXMySQL_Result();
JXMySQL_Execute("select news.id,title,content,author,times,photo,time,categroyname from `news`
				left join `news_categroy` as n 
				on news.cate =n.id 
				having title like '%$word%' 
				or content like '%$word%' 
				or author like '%$word%'
				or photo like '%$word%'
				or categroyname like '%$word%'");
$sqls = JXMySQL_Result();
$result['introduce']= $sql;
$result['news']= $sqls;
//echo "<pre>";print_r($result);echo "<pre>";
JXReturn_Json(0,$result);
}else{
	echo 2;
}









 ?>