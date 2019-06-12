<?php
@ header('Content-type:image/png');
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,'http://img7.ph.126.net/kPkFLv6R2Xm668gpad47nA==/6597926286214990477.png');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
$output = curl_exec($ch);
$info = curl_getinfo($ch);
curl_close($ch);
file_put_contents("d:/a.png",$output);
$size = filesize("d:/a.png");
if($size != $info['size_download']){
    echo '下载数据不完整';
    //尝试再次下载，最多三次不成功则放弃，或加入失败队列
}else{
    echo '下载完成';
}