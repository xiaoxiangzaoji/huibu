<?php
/**
 * @Author: Marte
 * @Date:   2017-08-09 11:22:07
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-08-09 11:26:13
 */
require("./index2.php");
if(!empty($_POST['newsid']) ){
   $id=trim($_POST['newsid']);
   require('/Code/JXMySQL.php');
   JXMySQL_Execute("select content from `news` where id = ? ",array($id));
   $sqls= JXMySQL_Result();
   $count= $sqls['0']['content'];
   echo json_encode($count);
}else{
    echo 2;
}

