<?php
/**
 * @Author: Marte
 * @Date:   2017-08-09 14:46:20
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-08-09 14:52:10
 */
require("./index2.php");
if (!empty($_GET['categroyname'])) {
    $categroy = $_GET['categroyname'];
     require('/Code/JXMySQL.php');
     $sql=JXMySQL_Execute("insert into `news_categroy` values('','$categroy')");
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
}else{
    $result=array(
          "code"=>2,
          "msg" =>"提交失败",
        );
       echo json_encode($result);exit();
}
