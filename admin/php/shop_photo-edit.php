<?php
//轮播图
require("./index2.php");
if(!empty($_POST['']) || !empty($_POST['']) || !empty($_POST[''])){

       $name=trim($_POST['']);  //编号
       $txt=trim($_POST['']);    //信息
       $pig=trim($_POST['']);   //图片
       $id  =$_POST['id'];
       require('/Code/JXMySQL.php');
       $sql=JXMySQL_Execute("update shop_photo set name='$name',txt='$txt',pig='$pig' where id='$id'");
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
