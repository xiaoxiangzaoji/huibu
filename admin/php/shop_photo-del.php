<?php
//轮播图
require("./index2.php");
if(!empty($_POST['id'])){


       $id=$_POST['id'];   //联系方式

       require('/Code/JXMySQL.php');
       $sql=JXMySQL_Execute("delete from shop_upload where id='$id'");
       $insert_id = JXMySQL_Affect($sql);
       if(!$insert_id){
                           $result=array(
                                 "code"=>2,
                                 "msg" =>"删除失败1",
                            );
                        echo json_encode($result);
                     }else{
                        $result=array(
                            "code"=>1,
                            "msg"=>"删除成功",
                            );
                         echo json_encode($result);
                     }
   }else{
      $result=array(
                                 "code"=>2,
                                 "msg" =>"删除失败2",
                            );
                        echo json_encode($result);
   }
