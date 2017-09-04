<?php
//公司简介
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
require("./Code/JXMySQL.php");
require("./Code/JXReturn.php");
JXMySQL_Execute("select * from `shop_onlineservice`");
$sql = JXMySQL_Result();

JXReturn_Json(0,$sql);












 ?>