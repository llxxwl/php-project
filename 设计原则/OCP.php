<?php
//利用开放-封闭原则，实现一个播放器
interface process{
    public function process();
}
//实现播放器的编码功能
class playerencode implements process{
    public function process(){
        echo "encode\r\n";
    }
}
class playeroutput implements process{
    public function process(){
        echo "output\r\n";
    }
}
//定义播放器的线程调度管理器
class playProcess{
    private $message = null;
    public function __construct(){
    }
    public function callback(event $event){
        $this->message = $event->click();
        if($this->message instanceof process){  //确定message是否属于process类
            $this->message->process();
        }
    }
}
//播放器的事件处理逻辑
class mp4{
    public function work(){
        $playProcess = new playProcess();
        $playProcess->callback(new event('encode'));
        $playProcess->callback(new event('output'));
    }
}
//播放器的事件处理类
class event{
    private $m;
    public function __construct($me){
        $this->m = $me;
    }
    public function click(){
        switch($this->m){
                case 'encode':
                return new playerencode();
                break;
                case 'output':
                return new playeroutput();
                break;
        }
    }
}
$mp4 = new mp4;
$mp4->work();
