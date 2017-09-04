<?php 
//手机端文献修改
require("./index2.php");
require('/Code/JXMySQL.php');

if(!empty($_POST)){
       $web=trim($_POST['web']);//作者
       $name=trim($_POST['name']);//标题
       $id  =$_POST['id'];
       $info = $_POST['info'];//内容
       $sql=JXMySQL_Execute("update `phone_data` set data= ?,title =?,author= ? where id = ?",array($info,$name,$web,$id));
       $results = JXMySQL_Affect($sql);
       if ($results) {
       		$result=array(
		      "code"=>1,
		      "msg" =>"更新成功",
		      );
		     echo json_encode($result);
       }else{
       		$result=array(
		      "code"=>2,
		      "msg" =>"更新失败1",
		      );
		     echo json_encode($result);
       }
}else{
	$result=array(
      "code"=>2,
      "msg" =>"更新失败2",
      );
     echo json_encode($result);
}












 ?>