<?php
//新闻中心 
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
require("./Code/JXMySQL.php");
JXMySQL_Execute("select id,title,content,photo from `news` order by id DESC");
$sqls = JXMySQL_Result();
echo json_encode($sqls);










 ?>