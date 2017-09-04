<?php 
require("./index2.php");
if(!empty($_POST['newsid']) ){
   $id=trim($_POST['newsid']);
   require('/Code/JXMySQL.php');
   JXMySQL_Execute("select data from `phone_data` where id = ? ",array($id));
   $sqls= JXMySQL_Result();
   $count= $sqls['0']['data'];
   echo json_encode($count);
}else{
    echo 2;
}




 ?>