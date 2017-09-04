<?php
//售卖情况
require("./index2.php");
$shopid= $_POST['shop'];//名称
$matchs=$_POST['roleName'];//已售
$text=$_POST['contact'];//总数
//var_dump($_FILES['photo']);die();
require('Code/JXMySQL.php');
$img = $_FILES['photo'];//获取到表单过来的文件变量，uploadImg为表单id
if(isset($img))
{
//上传成功$img中的属性error为0，当error>0时则上传失败有一下几种情况
    if($img['error']>0){
        //echo "上传失败";
        $sql=JXMySQL_Execute("insert into `shop_situation` (matchs,text,shopid,photo) values(?,?,?,?)",array($matchs,$text,$shopid,''));
            $insert_id = JXMySQL_Insert($sql);
            if ($insert_id) {
                header("Location:../html/admin-sale.php"); 
                exit;
            }else{
                echo false;
            }
    }else{
        
        $type = strrchr($img['name'], '.');//截取文件后缀名
        $path = "../html/temp/sale/".$img['name'];//设置路径：当前目录下的uploads文件夹并且图片名称为$img['name'];
        if(strtolower($type)=='.png'||strtolower($type)=='.jpg'||strtolower($type)=='.bmp'||strtolower($type)=='.gif'||strtolower($type)=='.jpeg')//判断上传的文件是否为图片格式
        {
            $picname = $img['tmp_name'];

            move_uploaded_file($picname, $path);//将图片文件移到该目录下
            echo $path;
            $url=$path;
            $sql=JXMySQL_Execute("insert into `shop_situation` (matchs,text,shopid,photo) values(?,?,?,?)",array($matchs,$text,$shopid,$url));
            $insert_id = JXMySQL_Insert($sql);
            if ($insert_id) {
                header("Location:../html/admin-sale.php");
                exit;
            }else{
                echo false;
                exit;
            }
        }
    }
}
?>