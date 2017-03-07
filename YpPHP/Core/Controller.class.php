<?php
/**
 * Created by PhpStorm.
 * User: yueping
 * Date: 2017/3/5
 * Time: 10:17
 * email:596169733@qq.com
 */
namespace Core;


abstract class Controller {
    /**
     * 视图实例对象
     */
    protected $View = null;

    /**
     * Controller constructor.
     * @param $controller
     * @param $action
     */
    function __construct($controller, $action) {
        $this->View = new View($controller, $action);
    }

    /**
     * 分配变量
     * @param $name
     * @param $value
     */
    public function assign($name, $value)
    {
        $this->View->assign($name, $value);
    }

    /**
     * 显示模版
     */
    public function display()
    {
        $this->View->display();
    }
}