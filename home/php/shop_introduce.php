<?php
//店铺介绍
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
require("./Code/JXMySQL.php");
JXMySQL_Execute("select name,live,dress,accuracy,photo from `shop_product` order by id DESC limit 5");
$sql = JXMySQL_Result();
echo json_encode($sql);



 ?>