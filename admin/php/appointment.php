<?php
 //预约服务
 /*if(!isset($_POST['submit'])){
    exit;
 }*/
  //是否空
 require("./index2.php");
 if(empty($_POST['username'])){
    exit();
  }
 if(empty($_POST['tel'])){
    exit();
  }
 if(empty($_POST['time'])){
   exit();
 }
       $username=$_POST['username'];
       $phone=$_POST['tel'];
       $times   =$_POST['time'];

       if(preg_match("/^<\x{4e00}-\x{9fa5}>+$/u",$username)){
           /* exit('用户名不合规矩,只能中文');*/
            $result=array(
              "code"=>1,
              "msg" =>"提交失败",
              );
          echo json_encode($result);exit();


       }else if(!preg_match("/^1[34578]{1}\d{9}$/",$phone)){

             $result=array(
              "code"=>2,
              "msg" =>"提交失败",
              );
          echo json_encode($result);exit();



      }else if(!preg_match("/^\d{4}-\d{1,2}-\d{1,2}/",$times)){

            // exit('时间不合规矩');
       }else{

       require('Code/JXMySQL.php');

            //防止重复
             $sql =JXMySQL_Execute("select * from shop_appointment where  username='$username' and phone='$phone' limit 1");
             $results=JXMySQL_Result($sql);
             if($results){
                $result=array("code"=>2,
                    "message"=>'提交失败',
                );
                echo json_encode($result);
             }else{
               $sql =JXMySQL_Execute("insert into shop_appointment values('','$username','$phone','$times')");
               //$sql ="insert into shop_appointment values('','$username','$phone','$time')";
               //var_dump($sql);die;
                 $insert_id = JXMySQL_Insert();
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
             }







