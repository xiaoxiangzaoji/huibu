<?php
//购房信息管理
require("./index2.php");
if(!empty($_POST['text']) || !empty($_POST['texts']) ){


       $text=trim($_POST['text']);   //法规
       $texts=trim($_POST['texts']);   //法规

       require('/Code/JXMySQL.php');
       JXMySQL_Execute("select count(*) from `shop_purchase` where text = ? and texts = ? ",array($text,$texts));
       $sqls= JXMySQL_Result();
       $count= $sqls['0']['count(*)'];
       if ($count >= 1) {
         $result = array("code"=>3, "msg"=>"已经存在");
         echo json_encode($result);
       }else{

         $sql=JXMySQL_Execute("insert into shop_purchase values('','$text','$texts')");
         $insert_id = JXMySQL_Insert($sql);
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