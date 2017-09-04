<?php
//预约删除
require("./index2.php");
if(!empty($_GET['Id']) ){
   $id=$_GET['Id'];
   require('/Code/JXMySQL.php');
   $sql=JXMySQL_Execute("delete from `shop_appointment` where id = ?",array($id));
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
