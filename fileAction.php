<html lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
var_dump($_FILES);

echo $_SERVER['DOCUMENT_ROOT'];//D:/phpStudy/WWW
echo dirname(__FILE__);//D:\phpStudy\WWW\file
if($_FILES['file']['error']>0){
	echo "错误信息：".$_FILES['file']['error']."<br/>";
}else{
	echo 'Upload:'.$_FILES['file']['name'].'<br/>';
	echo '类型:'.$_FILES['file']['type'].'<br/>';
	echo '大小:'.$_FILES['file']['size'].'<br/>';
	echo '存储在:'.$_FILES['file']['tmp_name'].'<br/>';
	}
	if(file_exists('upload/'.$_FILES['file']['name'])){
		echo $_FILES['file']['name'].'早就存在啦！';
	}else{
		move_uploaded_file($_FILES['file']['tmp_name'], 'upload/'.iconv("UTF-8", "gbk",$_FILES['file']['name']));		
		echo "文件存储在：upload/".$_FILES['file']['name'];
	}
 
 ?>
</html>
