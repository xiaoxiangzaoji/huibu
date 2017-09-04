<?php 
//点击增加浏览量
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
$id= $_POST['id'];
require("./Code/JXMySQL.php");
JXMySQL_Execute("select times from `news` where id = '$id'");
$sqls = JXMySQL_Result();
$times = $sqls['0']['times']+1;
$sql = JXMySQL_Execute(" update `news` set times ='$times' where id = '$id'");
$result = JXMySQL_Affect($sql);
if ($result) {
	echo 1;//增加成功
}else{
	echo 2;//增加失败
}



 ?>