<?php 
header('Content-Type:text/html;charset=utf-8');
DownFile('UniWigs品牌技术部周报.xlsx');
		// $file_path='UniWigs品牌技术部周报.xlsx';
		 function DownFile($file_name){
			$file_name = iconv("utf-8", "gb2312", $file_name);
		$file_sub_path = dirname(__FILE__).'/upload/';
		echo $file_sub_path;//D:\phpStudy\WWW\file/upload/
		$file_path = $file_sub_path.$file_name;
		if(!file_exists($file_path)){
			echo '没有该文件';
			return;
		}
		$fp = fopen($file_path, "r");
		$file_size=filesize($file_path);

		//下载文件需要使用到的头文件
		Header('Content-Type:application/octet-stream');
		Header('Accept-Ranges:bytes');
		Header('Accept-Length:'.$filesize);
 		Header('Content-Disposition:attachement;filename='.$file_path);
		 
		$buffer = 1024;
		$file_count=0;
		//向浏览器返回数据
		while (!feof($fp) && $file_count<$file_size) {
			$file_con = fread($fp, $buffer);
			$file_count+=$buffer;
			echo $file_con;
		}
		fclose($fp);
		}

 ?>