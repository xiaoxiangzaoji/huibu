<?php
//招聘电话管理添加
require("./index2.php");
if(!empty($_POST['adminName']) || !empty($_POST['phone']) || !empty($_POST['email']) || !empty($_POST['address'])){

       $department=trim($_POST['adminName']);
       $phone=trim($_POST['phone']);
       $e_mail=trim($_POST['email']);
       $address=trim($_POST['address']);
       require('/Code/JXMySQL.php');
       JXMySQL_Execute("select count(*) from `shop_recruitmentphone` where department = ? and phone= ? and e_mail = ? and address =? ",array($department,$phone,$e_mail,$address));
       $sqls = JXMySQL_Result();
       $count= $sqls['0']['count(*)'];
       if ($count >= 1) {
         $result = array("code"=>3, "msg"=>"已经存在");
         echo json_encode($result);
       }else{
         $sql=JXMySQL_Execute("insert into shop_recruitmentphone values('','$phone','$e_mail','$address','$department')");
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
