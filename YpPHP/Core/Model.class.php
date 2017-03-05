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

class Model extends Controller {
    /**
     * 连接句柄
     * @var
     */
    private $_connect;

    /**
     * @var string
     */
    private $_filter = '';

    function __construct($config = null) {
        try{

        }catch (\PDOException $e ){
            exit('数据库连接错误：'.$e->getMessage());
        }
    }
}