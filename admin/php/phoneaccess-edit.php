<?php 
//手机端招商进度
require("./index2.php");
require('/Code/JXMySQL.php');

if(!empty($_POST)){
       $id  =$_POST['id'];
       $info = $_POST['dress'];
       $sql=JXMySQL_Execute("update `phone_access` set access= ? where id = ?",array($info,$id));
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