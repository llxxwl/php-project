<?php
//这个代码主要是为了试验phpdbg的各个命令，phpdbg的用法在https://llxxwl.github.io/2019/06/10/phpdbg/里
function test($a,$b){
    $c = $a + $b;
    return $c;
}
$i = 1;
$j = 2;
echo test($i,$j),PHP_EOL;
$name = '白菜';
class TestClass{
    public function printSth($a){
        echo $a.'----';
    }
}
$test = new TestClass();
$test->printSth('123');