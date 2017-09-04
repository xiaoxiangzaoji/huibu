<?php
//地理位置管理
require("./index2.php");
if(!empty($_POST['ids'])){



       $id  =$_POST['ids'];
       require('/Code/JXMySQL.php');
       $sql=JXMySQL_Execute("DELETE FROM shop_geographic WHERE id IN(".$id.")");
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