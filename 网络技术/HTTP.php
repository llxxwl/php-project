<?php
$html = file_get_contents('http://www.baidu.com/');
print_r($http_response_header);
$fp = fopen('http://www.baidu.com/','r');
print_r(stream_get_meta_data($fp));//从封装协议文件指针中取得报头/元数据
fclose($fp);