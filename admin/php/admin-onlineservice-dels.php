<?php
require("./index2.php");
if(!empty($_POST['ids']) ){
    $id=trim($_POST['ids']);

       /* $result=array(
                                 "code"=>1,
                                 "msg" =>"删除成功",
                            );
                        echo json_encode($result);

       die;*/
       require('/Code/JXMySQL.php');

       $sql=JXMySQL_Execute("DELETE FROM   shop_company  WHERE id IN(".$id.")");
    /* $sql="DELETE FROM   shop_onlineservice where WHERE id IN(".$id.")";
     var_dump ($sql);die;*/
       $results=JXMySQL_Affect($sql);
       if(!$results){
                           $result=array(
                                 "code"=>2,
                                 "msg" =>"删除失败",
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
                                 "msg" =>"删除失败",
                            );
                        echo json_encode($result);

   }
