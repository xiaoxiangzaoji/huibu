<?php
//商铺介绍修改
 require("./index2.php");
 //var_dump($_POST);die();
 $id = $_POST['id'];
 $name =$_POST['adminName'];
 $live =$_POST['details'];//地址
 $dress =$_POST['load'];//电话
 $accuracy =$_POST['contents'];//内容
 require('Code/JXMySQL.php');
$img = $_FILES['photo'];//获取到表单过来的文件变量，uploadImg为表单id
if(isset($img))
{
//上传成功$img中的属性error为0，当error>0时则上传失败有一下几种情况
    if($img['error']>0){
        //echo "上传失败";
        $sql=JXMySQL_Execute("update `shop_product` set name=?,live=?,dress=?,accuracy=? where id = ?",array($name,$live,$dress,$accuracy,$id));
            $insert_id = JXMySQL_Insert($sql);
            if ($insert_id) {
                echo false;
            }else{
                header("Location:../html/admin-Introduction.php"); 
                exit;
            }
    }else{
        
        $type = strrchr($img['name'], '.');//截取文件后缀名
        $path = "../html/temp/store/".$img['name'];//设置路径：当前目录下的uploads文件夹并且图片名称为$img['name'];
        if(strtolower($type)=='.png'||strtolower($type)=='.jpg'||strtolower($type)=='.bmp'||strtolower($type)=='.gif'||strtolower($type)=='.jpeg')//判断上传的文件是否为图片格式
        {
            $picname = $img['tmp_name'];

            move_uploaded_file($picname, $path);//将图片文件移到该目录下
            echo $path;
            $url=$path;
            $sql=JXMySQL_Execute("update `shop_product` set name=?,live=?,dress=?,accuracy=?,photo=? where id = ?",array($name,$live,$dress,$accuracy,$url,$id));
            $insert_id = JXMySQL_Insert($sql);
            if ($insert_id) {
                echo false;
                exit;
            }else{
                header("Location:../html/admin-Introduction.php"); 
                exit;
            }
        }
    }
}
?>