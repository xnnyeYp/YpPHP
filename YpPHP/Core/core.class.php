<?php

/**
 * 框架核心类
 * Created by PhpStorm.
 * User: yueping
 * Date: 2017/3/4
 * Time: 20:10
 * email:596169733@qq.com
 */
namespace Core;

class core
{
    /**
     * 运行程序
     */
    static public function run()
    {
        spl_autoload_register('self::loadClass');
        self::setReporting();//检测开发环境
        self::removeMagicQuotes();//检测敏感字符并删除
        self::unregisterGlobals();
        self::route();
    }

    /**
     * 检测开发环境
     */
    private function setReporting()
    {
        if(APP_DEBUG){
            error_reporting(E_ALL);
            ini_set('display_errors','On');
        }else{
            error_reporting(E_ALL);
            ini_set('display_errors','Off');
            ini_set('log_errors', 'On');
            ini_set('error_log', RUNTIME_PATH. 'logs/error.log');
        }
    }

    /**
     * 取出敏感字符
     * @param $value
     * @return array|string
     */
    private function stripSlashesDeep($value)
    {
        $value = is_array($value) ?
            array_map('stripSlashesDeep', $value) :
            stripslashes($value);

        return $value;
    }

    /**
     * 删除特殊字符
     */
    private function removeMagicQuotes()
    {
        if(get_magic_quotes_gpc()){
            $_GET = isset($_GET) ? $this->stripSlashesDeep($_GET) : null;
            $_POST = isset($_POST) ? $this->stripSlashesDeep($_POST) : null;
            $_COOKIE = isset($_COOKIE) ? $this->stripSlashesDeep($_COOKIE) : null;
            $_SESSION = isset($_SESSION) ? $this->stripSlashesDeep($_SESSION) : null;
        }
    }

    /**
     * 检测自定义全局变量，并移除
     */
    private function unregisterGlobals()
    {
        if (ini_get('register_globals')) {
            $array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
            foreach ($array as $value) {
                foreach ($GLOBALS[$value] as $key => $var) {
                    if ($var === $GLOBALS[$key]) {
                        unset($GLOBALS[$key]);
                    }
                }
            }
        }
    }

    /**
     * 自动加载
     * @param $class
     */
    private function loadClass($class)
    {
        $frameworks = FRAME_PATH.$class.'class.php';
        $controller = APP_PATH.'application/Controller/'.$class.'class.php';
        $model = APP_PATH.'application/Model/'.$class.'class.php';

        if (file_exists($frameworks)) {
            include $frameworks;
        } elseif (file_exists($controller)) {
            include $controller;
        } elseif (file_exists($model)) {
            include $model;
        } else {
            echo $class.'类无法自动加载,请手动加载';
        }
    }
    
    /**
     * 处理路由
     */
    private function route()
    {
        $controller_name = 'Index';
        $method = 'index';
        //TODO:URL大小写兼容
        if(!empty($_SERVER['PATH_INFO'])){
            list($controller_name, $method) = explode('/', $_SERVER['PATH_INFO'], 2);
            $paths = explode('/', $_SERVER['PATH_INFO']);
            $var = array();
            array_shift($paths);
            array_shift($paths);

            //获取get参数
            foreach ($paths as $key=>$v){
                if($key % 2 != 0){
                    continue;
                }
                $var[$v] = $paths[$key + 1];
            }
            $_GET   =  array_merge($var,$_GET);
        }
        // 实例化控制器
        $controller = $controller_name . 'Controller';
        $dispatch = new $controller($controller_name, $method);

        if(method_exists($controller, $method)){
            call_user_func_array(array($dispatch, $method), $_GET);
        }else{
            exit($controller_name.'不存在');
        }
    }

}