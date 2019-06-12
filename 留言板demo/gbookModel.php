<?php
include "message.php";
/**
 * 留言本模型，负责管理留言本
 * $bookPath  留言本属性
 */
class gbookModel{
    private $bookPath;    //留言本文件
    private $data;        //留言数据
    public function setBookPath($bookPath){
        $this->bookPath = $bookPath;
    }
    public function getBookPath(){
        return $this->bookPath;
    }
    public function open(){}
    public function close(){}
    public function read(){
        return file_get_contents($this->bookPath);
    }
    //写入留言
    public function write($data){
        $this->data = self::safe($data)->name."&".self::safe($data)->email."\r\nsaid:\r\n".self::safe($data)->content;
        return file_put_contents($this->bookPath,$this->data,FILE_APPEND);
    }
    //模拟数据的安全处理，先拆包再打包
    public static function safe($data){
        $reflect = new ReflectionObject($data);
        $props = $reflect->getProperties();
        $messagebox = new stdClass();
        foreach($props as $prop){
            $ivar = $prop->getName();
            $messagebox->$ivar=trim($prop->getValue($data));
        }
        return $messagebox;
    }
    public function delete(){
        file_put_contents($this->bookPath,"it's empty now");
    }
}
