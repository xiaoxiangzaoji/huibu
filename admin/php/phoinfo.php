<?php
/**
 * @Author: Marte
 * @Date:   2017-08-09 13:51:43
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-08-09 13:55:27
 */
require("./index2.php");
if(!empty($_POST['newsid']) ){
   $id=trim($_POST['newsid']);
   require('/Code/JXMySQL.php');
   JXMySQL_Execute("select info from `shop_upload` where id = ? ",array($id));
   $sqls= JXMySQL_Result();
   $count= $sqls['0']['info'];
   echo json_encode($count);
}else{
    echo 2;
}