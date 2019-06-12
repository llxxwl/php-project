<?php
//依赖倒置原则
interface employee{
    public function working();
}
class teacher implements employee{
    public function working(){
        echo 'teaching...';
    }
}
class coder implements employee{
    public function working(){
        echo 'codeing...';
    }
}
class workA{
    public function work(){
        $teacher = new teacher;
        $teacher->working();
    }
}
class workB{
    private $e;
    public function set(employee $e){
        $this->e = $e;
    }
    public function work(){
        $this->e->working();
    }
}
$worka = new workA;
$worka->work();
$workb = new workB;
$workb->set(new teacher());
$workb->work();