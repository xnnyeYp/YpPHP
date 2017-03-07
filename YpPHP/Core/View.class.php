<?php
/**
 * 视图类
 * Created by PhpStorm.
 * User: yueping
 * Date: 2017/3/5
 * Time: 18:29
 * email:596169733@qq.com
 */
namespace Core;

class View {
    /**
     * 接收controller变量分配
     * @var array
     */
    protected $variables = array();

    /**
     * 控制器名
     * @var
     */
    protected $_controller;

    /**
     * 动作名（方法名）
     * @var
     */
    protected $_action;

    function __construct($controller, $action)
    {
        $this->_controller = $controller;
        $this->_action = $action;
    }

    /**
     * 分配变量
     * @param $name
     * @param $value
     */
    public function assign($name, $value)
    {
        $this->variables[$name] = $value;
    }

    public function display()
    {
        extract($this->variables);
        $view_path = APP_PATH.'application/view/'.$this->_controller.'/'.$this->_action.'.php';
        if(file_exists($view_path)){
            require $view_path;
        }else{
            exit($view_path.'：模版文件不存在！');
        }
    }
}