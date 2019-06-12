<?php

/**
 * Class SmoothWarningup
 * 垃圾信息防御措施之令牌桶与桶漏限流算法
 * token法，做一些简单的重复阻止,造成HTTP请求困难，使其难以通用
 * 限流的思想，让请求可控，避免宽带和存储资源的浪费
 */
class SmoothWarningup{
    private $timestamp;
    public $capacity;    //桶的总容量维持不变
    public $rate;        //token流出的速度
    public $token;       //当前容量（当前累积请求数）

    public function __construct()
    {
        $this->timestamp = time();
        $this->capacity = 30;
        $this->rate = 5;
    }
    public function grant(){
        $now = time();
        $this->token = max(0,$this->token - ($now - $this->timestamp) * $this->rate);
        $this->timestamp = $now;
        if(($this->token+1) < $this->capacity){
            //尝试加入token，并且容量还未满
            $this->token += 1;
            return true;
        }else {
            //容器已满，拒绝加入
            return false;
        }
    }
}
$bucket = new SmoothWarningup();

//  突发请求，瞬间请求50次，前30次请求瞬间把整个漏桶用完，后面请求被丢弃
for ($i=0;$i<50;$i++){
    echo $i,"\t",var_dump($bucket->grant());
}
//每次执行后间隔1s，请求的速率能够跟上漏桶加水的速率，每次请求都能获得token并执行
for ($i=0;$i<50;$i++){
    echo $i,"\t",var_dump($bucket->grant());
    sleep(1);
}
