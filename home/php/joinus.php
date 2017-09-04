<?php 
//加入我们（招聘电话）
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
require("./Code/JXMySQL.php");
JXMySQL_Execute("select phone,e_mail from `shop_recruitmentphone` order by id DESC limit 1");
$sqls = JXMySQL_Result();
echo json_encode($sqls);







 ?>