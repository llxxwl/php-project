<?php
namespace chapterOne;
class person{//定义一个person类
    public $name;
    public $gender;
    public function say(){
        echo $this->name,"is",$this->gender;
    }
}
class family{
    public $people;
    public $location;
    public function __construct($p,$loc)
    {
        $this->people = $p;
        $this->location = $loc;
    }
}
/**
 * 类实例
 */
$student = new \chapterOne\person();
$student ->name = 'Tom';
$student ->gender = 'male';
$student ->say();
$tom = new family($student,'peking');
print_r((array) $student);//对象转换为数组
var_dump($student);
print_r($tom);
echo "\n";
echo serialize($tom);
/**
 * 对象的序列化:把内存中的各种对象状态保存起来，并且在需要时可以还原。
 * 把内存中的对象当前状态保存到一个文件中
 */
/*$str = serialize($student);//序列化
echo $str;
file_put_contents('store.txt',$str);//将对象以文件形式输出
//反序列化取出
$str = file_get_contents('store.txt');
$student = unserialize($str);
$student->say();*/