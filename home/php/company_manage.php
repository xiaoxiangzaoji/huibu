<?php
//承建公司管理
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
require("./Code/JXMySQL.php");
JXMySQL_Execute("select compty,text from `shop_management`");
$sql = JXMySQL_Result();
echo json_encode($sql);












 ?>