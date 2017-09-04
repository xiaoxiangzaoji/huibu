<?php 
//新闻详情
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
$id = $_POST['id'];
require("./Code/JXMySQL.php");
JXMySQL_Execute("select  author,content,title,news.id,categroyname from `news` left join `news_categroy` as n on news.cate= n.id having news.id = '$id'");
$sqls = JXMySQL_Result();

echo json_encode($sqls);







 ?>