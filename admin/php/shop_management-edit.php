<?php
//承建公司管理
require("./index2.php");
if(!empty($_POST)){

       $compty=trim($_POST['roleName']);  //公司

       $text=trim($_POST['contact']);   //详情

       $id =$_POST['id'];
       require('/Code/JXMySQL.php');
       $sql=JXMySQL_Execute("update shop_management set compty='$compty',text='$text' where id='$id'");
       $insert_id = JXMySQL_Affect($sql);
       if(!$insert_id){
                           $result=array(
                                 "code"=>2,
                                 "msg" =>"添加失败1",
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
                                 "msg" =>"添加失败2",
                            );
                        echo json_encode($result);
}

