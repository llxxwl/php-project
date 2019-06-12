<?php
//缓存实现抽象类
abstract class Cache{
    /**
     * 设置一个缓存变量
     *
     * @param String $key   缓存key
     * @param mixed $value  缓存内容
     * @param int $expire   缓存时间
     * @return boolen       是否缓存成功
     */
    public abstract function set($key,$value,$expire = 60);
    /**
     * 获取一个已经缓存的变量
     *
     * @param String $key   缓存key
     * @return mixed        缓存内容
     */
    public abstract function get($key);
    /**
     * 删除一个已经缓存的变量
     *
     * @param String $key
     * @return boolen      是否删除成功
     */
    public abstract function del($key);
    /**
     * 删除全部缓存变量
     *
     * @return boolen      是否删除成功
     */
    public abstract function delAll();
    /**
     * 监测是否存在对应的缓存
     */
    public abstract function has($key);
}

//如果要求实现缓存，只需要继承这个抽象类并实现其方法即可