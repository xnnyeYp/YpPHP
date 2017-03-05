<?php
/**
 * 共有函数文件
 * Created by PhpStorm.
 * User: yueping
 * Date: 2017/3/5
 * Time: 13:30
 * email:596169733@qq.com
 */

/**
 * @param null $name
 * @param null $value
 * @return mixed|null
 */
function C($name = null, $value = null)
{
    static $_config = array();
    //name为空返回所有配置
    if(empty($name)){
        return $_config;
    }

    if(is_string($name)){
        return $_config[$name];
    }

    if(is_array($name)){
        $_config = array_merge($_config, array_change_key_case($name, CASE_UPPER));
        return null;
    }

    //避免非法参数
    return null;
}