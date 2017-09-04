<?php
require("./index2.php");
if(!empty($_GET['ids'])){
        $Id =trim($_GET['ids']);
        require('Code/JXMySQL.php');
        $sql = JXMySQL_Execute("DELETE FROM `news` WHERE Id IN(".$Id.")");
        //print_r($sql);die;
        //执行
           $results = JXMySQL_Affect($sql);
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
}else{
    $result=array(
                             "code"=>2,
                        );
                    echo json_encode($result);
}