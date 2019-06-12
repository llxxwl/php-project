<?php
//1.初始化
$ch = curl_init();
//2.设置选项，包括URL
curl_setopt($ch,CURLOPT_URL,"https://www.php.net/ Expires");
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);//将curl_exec获取的信息以文件流的形式返回，而不是直接输出
curl_setopt($ch,CURLOPT_HEADER,1);//启用时会将头文件的信息作为数据流输出
//3. 执行并获取HTML文档内容
$output = curl_exec($ch);
if($output === false){//检查错误
    echo "cURL error:".curl_error($ch);
}
$info = curl_getinfo($ch);
echo '获取'.$info['url'].'耗时'.$info['total_time'].'秒';
//4.释放curl句柄
curl_close($ch);
echo $output;