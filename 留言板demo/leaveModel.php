<?php
include "gbookModel.php";
//留言板业务逻辑处理
class leaveModel{
    public function write(gbookModel $gb,$data){
    $book = $gb->getBookPath();
    $gb->write($data);
    //日志记录
    }
}
