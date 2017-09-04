<?php 
require("./index2.php");
if (!empty($_GET['ids'])) {
    $id = $_GET['ids'];
     require('/Code/JXMySQL.php');
     $sql=JXMySQL_Execute("delete from `news_categroy` WHERE id IN(".$id.")");
     $insert_id = JXMySQL_Insert($sql);
     if($insert_id){
         $result=array(
          "code"=>2,
          "msg" =>"删除失败1",
          );
         echo json_encode($result);
     }else{
          $result=array(
          "code"=>1,
          "msg" =>"删除成功",
          );
          echo json_encode($result);
     }
}else{
	$result=array(
      "code"=>2,
      "msg" =>"删除失败2",
      );
     echo json_encode($result);
}








 ?>