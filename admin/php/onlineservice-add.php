<?php
 //添加在线客服管理
require("./index2.php");
  if(!empty($_POST['roleName']) & !empty($_POST['contact'])){
       $text=trim($_POST['roleName']);
       $url=trim($_POST['contact']);
       require('/Code/JXMySQL.php');
       $sql=JXMySQL_Execute("insert into shop_onlineservice values('','$text','$url')");
      /* $sql="insert into shop_onlineservice values('','$text','$url')";
       var_dump ($sql);*/
       $insert_id = JXMySQL_Insert();
       if(!$insert_id){
                           $result=array(
                                 "code"=>2,
                                 "msg" =>"添加失败",
                            );
                        echo json_encode($result);
                     }else{
                        $result=array(
                            "code"=>1,
                            "msg"=>"添加成功",
                            );
                         echo json_encode($result);
                     }

   }else{
      $result=array(
                                 "code"=>2,
                                 "msg" =>"添加失败",
                            );
                        echo json_encode($result);
                        echo 2;
   }