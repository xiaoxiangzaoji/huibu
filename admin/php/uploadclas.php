<?php
$file = $_FILES['file'];//得到传输的数据
print_r  ($file);
//得到文件名称
$name = $file['name'];     //得到文件名称，以数组的形式
$upload_path ="../html/temp/lunbo/"; //上传文件的存放路径
//当前位置

foreach ($name as $k=>$names){
    $type = strtolower(substr($names,strrpos($names,'.')+1));//得到文件类型，并且都转化成小写
    $allow_type = array('jpg','jpeg','gif','png'); //定义允许上传的类型
    //把非法格式的图片去除
    if (!in_array($type,$allow_type)){
        unset($name[$k]);
    }
}
$str = '';
foreach ($name as $k=>$item){
    $type = strtolower(substr($item,strrpos($item,'.')+1));//得到文件类型，并且都转化成小写
    if (move_uploaded_file($file['tmp_name'][$k],$upload_path.time().$name[$k])){
        //$str .= ','.$upload_path.time().$name[$k];
        echo 'success';
        $addre = $upload_path.time().$name[$k];
        echo $addre;
    }else{
        echo 'failed';
    }
}