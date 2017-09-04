<?php
//招商引资
require("./index2.php");
if(!empty($_POST['adminName']) || !empty($_POST['phone']) || !empty($_POST['email']) || !empty($_POST['address'])){

       $dress=trim($_POST['adminName']);  //地址
       $email=trim($_POST['email']);
       $compty=trim($_POST['address']);
       $text=trim($_POST['phone']);   //联系方式

       require('/Code/JXMySQL.php');
       JXMySQL_Execute("select count(*) from `shop_investment` where dress = ? and email = ? and text = ? and compty = ?",array($dress,$email,$text,$compty));
       $sqls= JXMySQL_Result();
       $count= $sqls['0']['count(*)'];
       if ($count >= 1) {
         $result = array("code"=>3, "msg"=>"已经存在");
         echo json_encode($result);
       }else{


         $sql=JXMySQL_Execute("insert into shop_investment values('','$dress','$email','$text','$compty')");
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
