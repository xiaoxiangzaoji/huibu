<?php 
//相关购房信息法律法规
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
require("./Code/JXMySQL.php");
JXMySQL_Execute("select text,texts compty from `shop_purchase` order by id DESC");
$sqls = JXMySQL_Result();
echo json_encode($sqls);


 ?>