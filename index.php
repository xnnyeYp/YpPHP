<?php
/**
 * Created by PhpStorm.
 * User: yueping
 * Date: 2017/3/4
 * Time: 16:59
 * email:596169733@qq.com
 */
//应用单一入口文件

// 应用目录为当前目录
define('APP_PATH', __DIR__.'/');

// 开启调试模式
define('APP_DEBUG', true);

// 网站根URL
define('APP_URL', 'www.ypphp.com');

// 加载框架核心文件
require './YpPHP/YpPHP.php';

