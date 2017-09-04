<?php 
//新闻列表
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
// $index= $_POST['index'];
$id = isset($_POST['id'])?$_POST['id']:1;//分类
$num  = isset($_POST['num'])?$_POST['num']:3;//显示数值
$source = isset($_POST['source'])?$_POST['source']:1;//页数
require("./Code/JXMySQL.php");
require("./Code/JXReturn.php");

JXMySQL_Execute("select count(news.id) as val from `news` left join `news_categroy` as n on news.cate =n.id where cate = '$id' ");
$sqls = JXMySQL_Result();//总记录数
$page = ceil($sqls['0']['val']/3);//总页数
if ($source>$page) {//大于最大页数
	$source = 1;
}
if ($source<1) {//小于最小页数
	$source = 1;
}
$limit = ($source-1)*$num;//起始记录

JXMySQL_Execute("select photo,time,author,content,title,news.id,categroyname,photo from `news` 
				left join `news_categroy` as n 
				on news.cate =n.id 
				WHERE cate = $id
				order by news.id DESC limit $limit,$num ");
$result = JXMySQL_Result();
$result['page']=$page;
// $result['index'] = $index;
JXReturn_Json(0,$result);












 ?>
 
