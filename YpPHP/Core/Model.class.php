<?php
/**
 * 基础模型类
 * Created by PhpStorm.
 * User: yueping
 * Date: 2017/3/5
 * Time: 14:11
 * email:596169733@qq.com
 */
namespace Core;

class Model {
    /**
     * 连接句柄
     * @var
     */
    private $_connect;

    /**
     * @var string
     */
    private $_filter = '';

    /**
     * @var
     */
    private $_table;

    /**
     * @var
     */
    private $_prefix;

    function __construct($config = null) {
        try{
            if(empty($config)){
                $config = C('DB_DEFAULT');
            }
            $dsn="{$config['TYPE']}:host={$config['HOST']};dbname={$config['NAME']}";
            $this->_connect = new \PDO($dsn, $config['USER'], $config['PWD'], array(\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC));
            //设置编码为UTF-8
            $sth = $this->_connect->prepare("set character set 'utf8'");
            $sth->execute();
            $this->_prefix = !empty($config['PREFIX']) ? $config['PREFIX'] : null;
            $model_name = get_class($this);
            list($namespace, $model) = explode('\\', $model_name);
            $model = substr($model, 0, -5);
            $this->_table = $this->_prefix.strtolower($model);

        }catch (\PDOException $e ){
            exit('数据库连接错误：'.$e->getMessage());
        }
    }

    /**
     * 执行一条SQL，返回所有结果
     * @param $sql
     * @return array
     */
    protected function query($sql)
    {
        $sth = $this->_connect->prepare($sql);
        $sth->execute();

        return $sth->fetchAll();
    }
}