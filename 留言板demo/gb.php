<?php
include "leaveModel.php";
class authorControl{
    public function message(leaveModel $l,gbookModel $g,message $data){
        //在留言本留言
        $l->write($g,$data);
    }
    public function view(gbookModel $g){
        //查看留言板内容
        return $g->read();
    }

    public function delete(gbookModel $g){
        $g->delete();
        echo self::view($g);
    }
}
$message = new message;
$message->name = 'phper';
$message->email = 'phper@php.net';
$message->content = 'a crazy phper love php so much';
$gb = new authorControl();
$pen = new leaveModel(); 
$book = new gbookModel();
$book->setBookPath("F:\\a.txt");
$gb->message($pen,$book,$message);
echo $gb->view($book);
$gb->delete($book);