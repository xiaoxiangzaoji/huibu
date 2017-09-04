<?php
//在线客服管理修改
require("./index2.php");
if(!empty($_POST['roleName']) & !empty($_POST['content'])){
       $text=trim($_POST['roleName']);
       $url=trim($_POST['content']);//连接
       $id =$_POST['id'];
       $info = $_POST['info'];
       require('/Code/JXMySQL.php');
       JXMySQL_Execute("select count(*) from `shop_company` where text = ? and info  = ? and name = ?", array($url, $info,$text));
       $sqls=JXMySQL_Result();
       $count= $sqls['0']['count(*)'];
      if ($count>=1) {
          $result=array('code' =>3 ,'msg'=>"已经存在" );
          echo json_encode($result);
      }else{
         $sql=JXMySQL_Execute("update  shop_company set text='$url',info='$info',name='$text' where id='$id'");

        /* $sql="update  shop_onlineservice set text='$text',url='$url' where id='$id'";
         var_dump ($sql);die;*/
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
      }
   }else{
      $result=array(
                                 "code"=>2,
                                 "msg" =>"添加失败",
                            );
                        echo json_encode($result);

   }