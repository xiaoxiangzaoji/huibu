<?php
require("./index2.php");
 if(!$_GET["Id"]){
    exit();
 }
  $Id =$_GET["Id"];
 // var_dump($_GET["Id"]);
 require('Code/JXMySQL.php');
 $sql=JXMySQL_Execute("delete from `news` where id='$Id'");
 //执行
 $results =JXMySQL_Result($sql);
 if(!$results){
       $result=array(
             "code"=>2,
        );
    echo json_encode($result);
 }else{
       $result=array(
             "code"=>1,
        );
    echo json_encode($result);
 }
