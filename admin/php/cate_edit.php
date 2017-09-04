<?php 
require("./index2.php");
if(!empty($_POST['categroyname'])){

       $categroyname=trim($_POST['categroyname']);
       $id =$_POST['id'];
       require('/Code/JXMySQL.php');
       $sql=JXMySQL_Execute("update `news_categroy` set categroyname='$categroyname' where id='$id'");
       $insert_id = JXMySQL_Affect($sql);
       if($insert_id){
         $result=array(
          "code"=>2,
          "msg" =>"更新失败1",
          );
         echo json_encode($result);
       }else{
            $result=array(
            "code"=>1,
            "msg" =>"更新成功",
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