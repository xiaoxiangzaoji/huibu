<?php
//户型图
require("./index2.php");
if(!empty($_POST['id']) ){


       $id =$_POST['id'];

       require('/Code/JXMySQL.php');
       $sql=JXMySQL_Execute("delete from shop_huxing  where id='$id'");
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
