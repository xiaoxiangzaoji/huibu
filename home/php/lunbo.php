<?php
//轮播图
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
require("./Code/JXMySQL.php");
JXMySQL_Execute("select url from `shop_upload` order by id DESC limit 3");
$sql = JXMySQL_Result();
//$arr = array('img1' =>substr($sql['0']['url'],2 ) ,'img2' =>substr($sql['1']['url'], 2) ,'img3' =>substr($sql['2']['url'], 2));
//echo "<pre>";print_r($sql);echo "<pre>";
echo json_encode($sql);

 ?>