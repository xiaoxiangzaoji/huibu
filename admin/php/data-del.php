<?php
//在线文献删除
require("./index2.php");
if(!empty($_POST['id']) ){
      $id =$_POST['id'];
       require('/Code/JXMySQL.php');

       $sql=JXMySQL_Execute("delete from phone_data where id='$id'");
      /* $sql="update  shop_onlineservice set text='$text',url='$url' where id='$id'";
       var_dump ($sql);die;*/
       $insert_id = JXMySQL_Affect($sql);
       if(!$insert_id){
                           $result=array(
                                 "code"=>2,
                                 "msg" =>"删除失败1",
                            );
                        echo json_encode($result);
                     }else{
                        $result=array(
                            "code"=>1,
                            "msg"=>"删除成功",
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