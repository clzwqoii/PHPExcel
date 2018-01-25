<?php
require_once 'import.php';
$error = $_FILES['file']['error'];
if($error){
    switch($error){
        case 1:
        case 2:
        case 3:
        case 4:
        case 6:
        case 7:
        case 8:
            echo "上传错误";
            break;
    }
    exit;
}
//接收前台文件
$ex = $_FILES['file'];
$flag = true;//检测是否为真实xls类型
$tmp_name = $ex["tmp_name"];
$allowExt = ["xlsx","xls"];
//重设置文件名
$filename = time().substr($ex['name'],stripos($ex['name'],'.'));
//检测文件类型
//取出文件扩展名
$ext = pathinfo($filename,PATHINFO_EXTENSION);
if(!in_array($ext,$allowExt)){
    exit('非法文件类型 !');
}
//检测是否为真实的图片类型
//if($flag) {
//    if(@!getimagesize($tmp_name)){
//        exit("不是正的xlsx文件类型");
//    }
//}
$pathCatalog = "./upload";
//创建目录
if(!file_exists($pathCatalog)){
    mkdir($pathCatalog);
    chmod($pathCatalog,0777);
}
$path = './upload/'.$filename;//设置移动路径
//move_uploaded_file($_FILES['file']['tmp_name'], $path); 保存到服务器

//if(move_uploaded_file($_FILES['file']['tmp_name'], $path)){
//    echo "上传成功";
//}else{
//    echo "上传失败";
//}

//转换为数据存放到mysql
//$data = importExecl($path);
$data = importExecl($_FILES['file']['tmp_name']);
if(is_array($data)){
    //正确
}else{
    //非法文件
}
var_dump($data);
