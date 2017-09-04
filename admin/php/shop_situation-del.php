<?php
//售卖情况
require("./index2.php");
if(!empty($_POST['id'])){

       $id =$_POST['id'];
       require('/Code/JXMySQL.php');
       $sql=JXMySQL_Execute("delete from  shop_situation  where id='$id'");

       $insert_id =JXMySQL_Affect($sql);
       if(!$insert_id){
                           $result=array(
                                 "code"=>2,
                                 "msg" =>"失败",
                            );
                        echo json_encode($result);
                     }else{
                        $result=array(
                            "code"=>1,
                            "msg"=>"成功",
                            );
                         echo json_encode($result);
                     }

   }else{
      $result=array(
                                 "code"=>2,
                                 "msg" =>"失败",
                            );
                        echo json_encode($result);
                        echo 2;
   }