<?php
//建筑资格证书
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
require("./Code/JXMySQL.php");
JXMySQL_Execute("select pic,text from `shop_certificate` order by id DESC ");
$sql = JXMySQL_Result();
echo json_encode($sql);
 ?>