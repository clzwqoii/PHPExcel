#PHPExcel

###介绍
```
    前台提交文件, 后台接收后. 
    根据$_FILES['file']信息查看文件上传的临时文件,验证文件格式, 以及是否保存到服务器,.
    不需要保存到服务器就调用PHPExcel类的方法importExecl 传入临时文件的路径($_FILES['file']['tmp_name'])或者保存在服务器的文件路径 (move_uploaded_file($_FILES['file']['tmp_name'], $path))
```
