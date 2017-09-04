<?php
  //修改新闻
//var_dump($_POST);
// echo "<pre>";print_r($_POST);echo "<pre>";
// var_dump($_FILES);die();
require("./index2.php");

$id = $_POST['id'];
$articletitle = $_POST['articletitle'];
$author = $_POST['author'];
$newscategroy = $_POST['newscategroy'];
$contents = $_POST['content'];


if ($_FILES['photo']['size'] == 0) {//不选图片
  //echo 1;die();
  require('Code/JXMySQL.php');
  $sql=JXMySQL_Execute("update `news` set title = ?,content = ?,author = ?,cate = ? where id = ?",array($articletitle,$contents,$author,$newscategroy,$id));
  $insert_id = JXMySQL_Affect($sql);
  if ($insert_id) {
    header("Location:../html/article-list.php");  
    exit();
  }
}else{//选择图片
  //echo 2;die();
  $img = $_FILES['photo'];//获取到表单过来的文件变量，uploadImg为表单id
  if(isset($img))
  {
    //上传成功$img中的属性error为0，当error>0时则上传失败有一下几种情况
    $type = strrchr($img['name'], '.');//截取文件后缀名
    $path = "../html/temp/news/".$img['name'];//设置路径：当前目录下的uploads文件夹并且图片名称为$img['name'];
    if(strtolower($type)=='.png'||strtolower($type)=='.jpg'||strtolower($type)=='.bmp'||strtolower($type)=='.gif'||strtolower($type)=='.jpeg')//判断上传的文件是否为图片格式
    {
      $picname = $img['tmp_name'];

      move_uploaded_file($picname, $path);//将图片文件移到该目录下
      $url=$path;
      //echo $url;die();
      require('Code/JXMySQL.php');
      $sql = JXMySQL_Execute("update `news` set title ='$articletitle',content='$contents',author= '$author',cate = '$newscategroy',photo = '$url' where id= '$id' ");
      //$sql=JXMySQL_Execute("update `news` set title = ?,content = ?,author = ?,cate = ?,photo = ? where id = ?",array($articletitle,$contents,$author,$newscategroy,$url));
      $insert_id = JXMySQL_Insert($sql);
        if ($insert_id) {
          return false;
            // header("Location:../html/picture-list.php"); 
            // exit;
        }else{
            header("Location:../html/article-list.php");
        }
    }
  }
}
?>