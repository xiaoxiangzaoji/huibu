<?php
  //添加客服电话
require("./index2.php");
if(!empty($_POST['adminName']) || !empty($_POST['phone'])){
       $name=trim($_POST['adminName']);
       $phone=trim($_POST['phone']);
       require('/Code/JXMySQL.php');
       JXMySQL_Execute("select count(*) from `shop_consumerhotline` where name = ? and phone = ?", array($name, $phone));
       $sqls= JXMySQL_Result();
       $count= $sqls['0']['count(*)'];
      if ($count>=1) {
          $result=array('code' =>3 ,'msg'=>"已经存在" );
          echo json_encode($result);
      }else{

         $sql=JXMySQL_Execute("insert into shop_consumerhotline values('','$phone','$name')");
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
      }
   }else{
      $result=array(
                                 "code"=>2,
                                 "msg" =>"添加失败",
                            );
                        echo json_encode($result);
   }
