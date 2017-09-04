<?php
//招聘电话修改
require("./index2.php");
if(!empty($_POST['adminName']) & !empty($_POST['phone']) & !empty($_POST['address']) & !empty($_POST['email'])){

       $department=trim($_POST['adminName']);
       $phone=trim($_POST['phone']);
       $email=trim($_POST['email']);
       $address=trim($_POST['address']);
       $id=$_POST['id'];

       $id =$_POST['id'];
       require('/Code/JXMySQL.php');
       JXMySQL_Execute("select count(*) from `shop_recruitmentphone`where phone = ? and e_mail = ? and address = ? and department = ? ",array($phone,$email,$address,$department));
       $sqls = JXMySQL_Result();
       $count = $sqls['0'] ['count(*)'];
             // var_dump($count);die();
       if ($count >=1) {
           $result=array('code' =>3 , "msg" =>"已经存在",);
           echo json_encode($result);
       }else{

           $sql=JXMySQL_Execute("update  shop_recruitmentphone set phone='$phone',e_mail='$email',address='$address',department='$department' where id='$id'");
           /*$sql="update  shop_recruitmentphone set phone='$phone',e_mail='$email',address='$address',department='$department' where id='$id'";
           var_dump ($sql);die;*/
           $insert_id = JXMySQL_Affect($sql);
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