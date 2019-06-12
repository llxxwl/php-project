<?php
/**
 * 反射可以探知类的内部结构
 * 反射可以用于生成文档
 * 此例用反射做动态代理
 */
class mysql{
    function connect($db){
        echo "连接到数据库${db[0]}\r\n";
    }
}
class sqlproxy{
    private $target;
    function __construct($tar)
    {
        $this->target[] = $tar;
    }
    function __call($name, $arguments)
    {
        foreach($this->target as $obj){
            $r = new ReflectionClass($obj);
            if($method = $r->getMethod($name)){
                if($method->isPublic() && !$method->isAbstract()){
                    echo "方法拦截前记录\r\n";
                    $method->invoke($obj,$arguments);
                    echo "方法后拦截\r\n";
                }
            }
        }
    }
}
$obj = new sqlproxy('mysql');
$obj->connect('member');