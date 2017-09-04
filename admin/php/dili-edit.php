<?php 
require("./index2.php");
require('Code/JXMySQL.php');
$id = $_POST['id'];
$pic = $_POST['pic'];
$text = $_POST['text'];
if (empty($_FILES['photo']['size'])) {
	$sql=JXMySQL_Execute("update `shop_geographic` set pic = ?,text = ? where id = ?",array($pic,$text,$id));
	$insert_id = JXMySQL_Affect($sql);
	if ($insert_id) {
		header("Location:../html/localtion.php");  
		exit();
	}
}else{
	$img = $_FILES['photo'];//获取到表单过来的文件变量，uploadImg为表单id
	if(isset($img))
	{
		//上传成功$img中的属性error为0，当error>0时则上传失败有一下几种情况
		$type = strrchr($img['name'], '.');//截取文件后缀名
		$path = "../html/temp/dilitu/".$img['name'];//设置路径：当前目录下的uploads文件夹并且图片名称为$img['name'];
		if(strtolower($type)=='.png'||strtolower($type)=='.jpg'||strtolower($type)=='.bmp'||strtolower($type)=='.gif'||strtolower($type)=='.jpeg')//判断上传的文件是否为图片格式
		{
			$picname = $img['tmp_name'];

			move_uploaded_file($picname, $path);//将图片文件移到该目录下
			$url=$path;
			$sql=JXMySQL_Execute("update `shop_geographic` set pic = ?,text = ?,photo = ? where id = ?",array($pic,$text,$url,$id));
		    $insert_id = JXMySQL_Insert($sql);
		    if ($insert_id) {
		    	return false;
		        // header("Location:../html/picture-list.php"); 
		        // exit;
		    }else{
		      	header("Location:../html/localtion.php");
		    }
		}
	}
}

















 ?>