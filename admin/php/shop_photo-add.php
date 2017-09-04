<?php
//轮播图
// $uploaddir = "../html/temp/lunbo/";//设置文件保存目录 注意包含/
// require("./uploadclass.php");
// echo $uploadfile;
// echo 111;
// die();
require("./index2.php");
if(!empty($_POST['']) || !empty($_POST['']) || !empty($_POST[''])){


       $name=trim($_POST['']);  //编号
       $txt=trim($_POST['']);    //信息
       $pig=trim($_POST['']);   //图片

       require('/Code/JXMySQL.php');
       $sql=JXMySQL_Execute("insert into shop_photo values('','$name','$txt','$pig')");
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