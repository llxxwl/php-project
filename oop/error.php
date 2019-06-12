<?php
/**
 * 错误处理机制set_error_handler接管PHP错误处理
 */
function customError($erron,$errstr,$errfile,$errline){
    echo "<b>error code </b> [${erron}]{$errstr}\r\n";
    echo "错误代码所在的行{$errline}文件{$errfile}\r\n";
    echo "PHP版本 ",PHP_VERSION,"(",PHP_OS,")\r\n";
    // die();
}
set_error_handler("customError",E_ALL|E_STRICT);
$a = array('o'=>2,4,6,8);
echo $a[o];
/**
 * php7异常处理
 */

 try{
     5%0;
 }catch(Throwable $e){
     echo $e->getMessage();
     echo '捕获到了吗';
 }finally{
     echo 'finally';
 }
?>