<?php
// 生成一个PHP数组
$data = array();
$data['servername'] = 'localhost';
$data['username'] = 'root';
$data['password'] = 'a6732064A.';
$data['mysqlname']= 'esee';
 
// 把PHP数组转成JSON字符串
$json_string = json_encode($data);
 
// 写入文件
file_put_contents('./homework.json', $json_string);
?>