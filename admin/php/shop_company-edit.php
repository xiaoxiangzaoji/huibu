<?php
//公司简介管理
require("./index2.php");
if(!empty($_POST)){

   $id =$_POST['id'];
   $history =trim($_POST['dress']);
   require('/Code/JXMySQL.php');
   $sql=JXMySQL_Execute("update `shop_onlineservice` set history = ? where id = 1",array($history));
   $insert_id = JXMySQL_Affect($sql);
   if(!$insert_id){
               $result=array(
                     "code"=>2,
                     "msg" =>"添加失败1",
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
                                 "msg" =>"添加失败2",
                            );
                        echo json_encode($result);
   }


