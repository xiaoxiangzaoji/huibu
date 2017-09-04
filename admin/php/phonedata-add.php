<?php
 //添加在线客服管理
require("./index2.php");
  if(!empty($_POST)){
       $text=trim($_POST['title']);
       $url=trim($_POST['author']);
       $info = trim($_POST['info']);
       require('/Code/JXMySQL.php');
          $sql=JXMySQL_Execute("insert into phone_data values('','$info','$text','$url')");
           $insert_id = JXMySQL_Insert($sql);
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
   }