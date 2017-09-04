<?php
//证书管理
require("./index2.php");
if(!empty($_POST['']) || !empty($_POST[''])){

       $text=$_POST[''];  //路线
       $pic=$_POST[''];  //图片
         $id =$POST['id'];

       require('/Code/JXMySQL.php');
       $sql=JXMySQL_Execute("update shop_certificate set pic='$pic',text='$text'where id='$id'");
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
   }else{
      $result=array(
                                 "code"=>2,
                                 "msg" =>"添加失败",
                            );
                        echo json_encode($result);
   }

