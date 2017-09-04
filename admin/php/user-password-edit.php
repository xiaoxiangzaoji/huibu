<?php
require("./index2.php");
  header("content-type:text/html;charset=utf8");
  session_start();
  $username=$_REQUEST['username'];
  $oldpassword=MD5($_REQUEST['oldpassword']);
  $newpassword=MD5($_REQUEST['newpassword']);
   require('Code/JXMySQL.php');
  $dbusername=null;
  $dbpassword =null;
    $result =mysql_query("select * from shop_user where  username ='$username' and password='$oldpassword' limit 1" );
   // var_dump($result);die;
    while ( $row= mysql_fetch_array($result)) {
        $dbusername = $row["username"];
        $dbpassword = $row["password"];
    }
    if(is_null($username)){

         echo "<script>alert('用户名不存在')</script>";
         echo "<script>window.location.href='../html/user-password-edit.php';</script>"; exit;

    }
    if($oldpassword!=$dbpassword){

          echo  " <script>alert('密码错误')</script> ";
          echo "<script>window.location.href='../html/user-password-edit.php';</script>"; exit;die;
       }

    mysql_query( "update  user set password='{$newpassword}' where username='{$username}'") or die ( "存入数据库失败" . mysql_error () );//如果上述用户名密码判定不错，则update进数据库中

    echo "<script>window.location.href='../html/index.php';</script>"; exit;


