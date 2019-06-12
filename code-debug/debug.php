<?php
/**
 * 调试函数有很多，除了下面的函数，还有debug_zval_dump函数
 * debug_print_backtrace函数，在遇到一些递归引用或者函数嵌套时，此函数能帮助我们查看程序的调用栈，方便清理函数执行的上下文环境
 */
function debug(){
    $numargs = func_num_args();
    $arg_lists = func_get_args();
    for($i = 0; $i < $numargs; $i++){
        echo "第${i}个变量名的值为:",$arg_lists[$i],PHP_EOL;
    }
    echo '当前所处的文件名为:',__FILE__,PHP_EOL;
}
function factor1($n){
    $factor = 1;
    for ($i = 1; $i <= $n; $i++){
        $factor *= $i;
        debug($factor,$i);
    }
    return $factor;
}
$result = factor1(4);
