<?php
 //预约修改

require("./index2.php");
   if(empty($_POST['adminName']) || empty($_POST['phone'])  || empty($_POST['timea'])) {
             $result=array(
                               "code"=>2,
                               "msg" =>"失败",
                            );
                         echo json_encode($result);exit();


  }else{
       $id    =$_POST['id'];
       $username=trim($_POST['adminName']);
       $phone=trim($_POST['phone']);
       $time=trim($_POST['timea']);

                     require('Code/JXMySQL.php');
                     JXMySQL_Execute("select count(*) from `shop_appointment` where username = ? and phone = ? and time = ?",array($username,$phone,$time));
                     $sqls= JXMySQL_Result();
                     $count= $sqls['0']['count(*)'];
                     if ($count >= 1) {
                         $result = array("code"=>3, "msg"=>"已经存在");
                         echo json_encode($result);
                     }else{

                        $sql =JXMySQL_Execute("update shop_appointment set username='$username',phone='$phone',time='$time' where id='$id'");
                        $insert_id = JXMySQL_Affect($sql);
                        if(!$insert_id){
                             $result=array(
                                   "code"=>2,
                                   "msg" =>"失败",
                              );
                             echo json_encode($result);exit();
                        }else{
                             $result=array(
                                   "code"=>1,
                                   "msg" =>"成功",
                                );
                             echo json_encode($result);exit();
                       }
                   }
  }


