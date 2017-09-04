<?php
//地理位置管理
require("./index2.php");
if(!empty($_POST['text']) || !empty($_POST['pic'])){

       $text=$_POST['text'];  //路线
       $pic=$_POST['pic'];  //图片


       require('/Code/JXMySQL.php');
       $sql=JXMySQL_Execute("insert into shop_geographic values('','$text','$pic')");
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
   }else{
      $result=array(
                                 "code"=>2,
                                 "msg" =>"添加失败",
                            );
                        echo json_encode($result);
   }
