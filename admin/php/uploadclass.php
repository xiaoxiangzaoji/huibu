<?php
//添加图片到数据库
require("./index2.php");
header("content-type:text/html;charset=utf-8");
$uploaddir = "../html/temp/upload/";//设置文件保存目录 注意包含/
$type=array("jpg","gif","bmp","jpeg","png");//设置允许上传文件的类型
$file = $_FILES['file'];//得到传输的数据

//获取文件后缀名函数
function fileext($filename)
{
return substr(strrchr($filename, '.'), 1);
}
//生成随机文件名函数
function random($length)
{
$hash = 'CR-';
$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
$max = strlen($chars) - 1;
mt_srand((double)microtime() * 1000000);
for($i = 0; $i < $length; $i++)
{
$hash .= $chars[mt_rand(0, $max)];
}
return $hash;
}

$a=strtolower(fileext($_FILES['file']['name'])); //后缀
 //print_r ($a);
//判断文件类型
if(!in_array(strtolower(fileext($_FILES['file']['name'])),$type))
{
$text=implode(",",$type);
echo "您只能上传以下类型文件: ",$text,"<br>";
}else{
//生成目标文件的文件名

      $filename=explode(".",$_FILES['file']['name']);

      {
      $filename[0]=random(10); //设置随机数长度
      $name=implode(".",$filename);
      $uploadfile=($uploaddir.$name);
       }

      while(file_exists($uploadfile));

      if (move_uploaded_file($_FILES['file']['tmp_name'],$uploadfile))
      {
                if(is_uploaded_file($_FILES['file']['tmp_name'])){

                    //上传失败
                       $result=array(
                             "code"=>2,
                             "msg" =>"上传失败",
                        );
                    echo json_encode($result);
                }else{

                     echo $uploadfile;

                     echo $arr;
                      print_r ($arr);
                      require('/Code/JXMySQL.php');
                    $sql = JXMySQL_Execute("insert into `shop_huxing` values('','$uploadfile')");
                    $insert_id = JXMySQL_Insert($sql);
                    if ($insert_id) {
                         $result=array(
                                  "code"=>1,
                                  "msg"=>"添加成功",
                         );
                          echo json_encode($result);
                    }else{
                        $result=array(
                                  "code"=>2,
                                  "msg"=>"添加失败",
                         );
                          echo json_encode($result);
                    }
               }
      }


}
