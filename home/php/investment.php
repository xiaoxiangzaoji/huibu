<?php 
//招商引资
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
require("./Code/JXMySQL.php");
JXMySQL_Execute("select dress,email,text,compty from `shop_investment` order by id DESC limit 1 ");
$sqls = JXMySQL_Result();
echo json_encode($sqls);








 ?>