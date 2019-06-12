<?php
/**
 * ORM从效果上说，实际上就是创建了一个虚拟对象数据库
 * 用__callStatic进行方法的动态创建和延迟绑定
 */
abstract class ActiveRecord{
    protected static $table;
    protected $filedvalues;
    public $select;

    static function findById($id){
        $query = "select * from ".static::$table."where id = $id";
        return self::createDomain($query);
    }
    function __get($fieldname)
    {
        return $this->fieldvalues[$fieldname];
    }

    static function __callStatic($method, $args)
    {
        $field = preg_replace('/^findBy(\w*)$/','${1}',$method);
        $query = "select * from".static::$table."where $field = '$args[0]'";
        return self::createDomain($query);
    }
    private static function createDomain($query){
        $klass = get_called_class();
        $domain = new $klass;
        $domain->fieldvalues = array();
        $domain->select = $query;
        foreach($klass::$fields as $field=>$type){
            $domian->fieldvalues[$field] = 'TODO:set from sql result';
        }
        return $domain;
    }
}
class Customer extends ActiveRecord{
    protected static $table = 'custdb';
    protected static $fields = array(
        'id' => 'int',
        'email' => 'varchar',
        'lastname' => 'varchar'
    );
}
class Sales extends ActiveRecord{
    protected static $table = 'salesdb';
    protected static $fileds = array(
        'id' => 'int',
        'item' => 'varchar',
        'qty' => 'int'
    );
}
assert ("select * from custdb where id=123" == Customer::findById(123)->select);//检查一个断言是否为false
assert ('TODO:set from sql result' == Customer::findById(123)->select);
assert ("select * from salesdb where id=321" == Customer::findById(321)->select);
assert ("select * from custdb where Lastname='hhh'" == Customer::findByLastname('hhh')->select);
