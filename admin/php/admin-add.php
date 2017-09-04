<?php
 //预约添加
require("./index2.php");
if(!empty($_POST['adminName']) || !empty($_POST['phone']) || !empty($_POST['time'])){
    $username=trim($_POST['adminName']);
   $phone=trim($_POST['phone']);
   $time=trim($_POST['time']);
   $cate= trim($_POST['cate']);
   require('/Code/JXMySQL.php');
   JXMySQL_Execute("select count(*) from `shop_appointment` where username = ? and phone = ? and time = ? and cate = ?",array($username,$phone,$time,$cate));
   $sqls= JXMySQL_Result();
   $count= $sqls['0']['count(*)'];
   if ($count >= 1) {
       $result = array("code"=>3, "msg"=>"已经存在");
       echo json_encode($result);
   }else{
       $sql=JXMySQL_Execute("insert into shop_appointment values('','$username','$phone','$time','$cate')");
       $insert_id = JXMySQL_Insert($sql);

         if(!$insert_id){
             $result=array(
              "code"=>2,
              "msg" =>"提交失败",
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
}else{
    $result=array(
      "code"=>2,
      "msg" =>"提交失败",
      );
     echo json_encode($result);exit();
}