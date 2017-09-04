<?php 
//预约看房
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
require("./Code/JXMySQL.php");
 if (!empty($_POST)) {

	$name = trim($_POST['name']);
	$phone = trim($_POST['phone']);
	$time = trim($_POST['time']);
	$sql=JXMySQL_Execute("insert into shop_appointment values('','$name','$phone','$time','预约看房')");
	$sqls = JXMySQL_Insert($sql);
	if ($sqls) {
		echo 1;
	}else{
		echo 2;
	}
}else{
	echo 2;
}










 ?>