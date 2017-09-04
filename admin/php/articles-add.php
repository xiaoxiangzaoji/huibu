<?php
//添加新闻
require("./index2.php");
// echo "<pre>";
// var_dump($_FILES);
// echo "</pre>";
// var_dump($_POST);
// die();
// var_dump($_POST);die();
$articletitle = $_POST['articletitle'];
$author = $_POST['author'];
$newscategroy = $_POST['newscategroy'];
$contents = $_POST['content'];
$time = date("Y-m-d H:i:s",time());
// var_dump($time);die();
require('Code/JXMySQL.php');
$img = $_FILES['photo'];//获取到表单过来的文件变量，uploadImg为表单id
if(isset($img))
{
//上传成功$img中的属性error为0，当error>0时则上传失败有一下几种情况
    if($img['error']>0){
        //echo "上传失败";
        $sql=JXMySQL_Execute("insert into `news` (title,content,author,times,cate,time) values('$articletitle','$contents','$author','0','$newscategroy','$time')");
            $insert_id = JXMySQL_Insert($sql);
            if ($insert_id) {
                header("Location:../html/article-list.php"); 
                exit;
            }else{
                echo false;
            }
    }else{
        
        $type = strrchr($img['name'], '.');//截取文件后缀名
        $path = "../html/temp/news/".$img['name'];//设置路径：当前目录下的uploads文件夹并且图片名称为$img['name'];
        if(strtolower($type)=='.png'||strtolower($type)=='.jpg'||strtolower($type)=='.bmp'||strtolower($type)=='.gif'||strtolower($type)=='.jpeg')//判断上传的文件是否为图片格式
        {
            $picname = $img['tmp_name'];

            move_uploaded_file($picname, $path);//将图片文件移到该目录下
            echo $path;
            $url=$path;
            $sql=JXMySQL_Execute("insert into `news` values('','$articletitle','$contents','$author','0','$newscategroy','$url','$time')");
            $insert_id = JXMySQL_Insert($sql);
            if ($insert_id) {
                header("Location:../html/article-list.php"); 
                exit;
            }else{
                echo false;
            }
        }
    }
}
 ?>