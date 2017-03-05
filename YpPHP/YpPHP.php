<?php
/**
 * 框架核心文件
 * Created by PhpStorm.
 * User: yueping
 * Date: 2017/3/4
 * Time: 17:06
 * email:596169733@qq.com
 */

// 初始化常量
defined('FRAME_PATH') or define('FRAME_PATH', __DIR__.'/');
defined('APP_PATH') or define('APP_PATH', dirname($_SERVER['SCRIPT_FILENAME']).'/');
defined('APP_DEBUG') or define('APP_DEBUG', false);
defined('RUNTIME_PATH') or define('RUNTIME_PATH', APP_PATH.'runtime/');

//包含配置文件
require APP_PATH . 'Common/config.php';

//包含
Core\core::run();