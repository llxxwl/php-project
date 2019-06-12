<?php
//在curl中用post方法发送数据
$url = "http://localhost/PHP核心技术与最佳实践/output.php";
$post_data = array(
    "foo" => "bar",
    "query" => "php",
    "action" => "submit"
);
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
//设置为post
curl_setopt($ch,CURLOPT_POST,1);
//把post变量加上
curl_setopt($ch,CURLOPT_POSTFIELDS,$post_data);
$output = curl_exec($ch);
curl_close($ch);
echo $output;
