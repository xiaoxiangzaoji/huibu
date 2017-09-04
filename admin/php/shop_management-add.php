<?php
 //承建公司管理
require("./index2.php");
 if(!empty($_POST['compty']) || !empty($_POST['text']) ){

       $compty=trim($_POST['compty']);  //公司

       $text=trim($_POST['text']);   //详情

       require('/Code/JXMySQL.php');
       $sql=JXMySQL_Execute("insert into shop_management values('','$compty','$text')");
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
   }else{
      $result=array(
                                 "code"=>2,
                                 "msg" =>"添加失败",
                            );
                        echo json_encode($result);
   }