<?php
 //添加在线客服管理
require("./index2.php");
  if(!empty($_POST['roleName']) || !empty($_POST['contact'])){
       $text=trim($_POST['roleName']);
       $url=trim($_POST['contact']);
       $info = trim($_POST['info']);
       require('/Code/JXMySQL.php');
       JXMySQL_Execute("select count(*) from `shop_company` where name = ? and text = ? and info =?", array($text, $url,$info));
       $sql=JXMySQL_Result();

       $count= $sql['0']['count(*)'];
       if ($count>=1) {
            $result=array('code' =>3 ,'msg'=>"已经存在" );
            echo json_encode($result);
       }else{
          $sql=JXMySQL_Execute("insert into shop_company values('','$url','$info','$text')");
          /* $sql="insert into shop_onlineservice values('','$text','$url')";
           var_dump ($sql);*/
           $insert_id = JXMySQL_Insert($sql);
           if(!$insert_id){
                               $result=array(
                                     "code"=>2,
                                     "msg" =>"失败",
                                );
                            echo json_encode($result);
                         }else{
                            $result=array(
                                "code"=>1,
                                "msg"=>"成功",
                                );
                             echo json_encode($result);
                         }

       }


      //  $sql=JXMySQL_Execute("insert into shop_onlineservice values('','$text','$url')");
      // /* $sql="insert into shop_onlineservice values('','$text','$url')";
      //  var_dump ($sql);*/
      //  $insert_id = JXMySQL_Insert($sql);
      //  if(!$insert_id){
      //                      $result=array(
      //                            "code"=>2,
      //                            "msg" =>"失败",
      //                       );
      //                   echo json_encode($result);
      //                }else{
      //                   $result=array(
      //                       "code"=>1,
      //                       "msg"=>"成功",
      //                       );
      //                    echo json_encode($result);
      //                }

   }else{
      $result=array(
                                 "code"=>2,
                                 "msg" =>"失败",
                            );
                        echo json_encode($result);
                        echo 2;
   }