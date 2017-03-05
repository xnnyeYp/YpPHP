<?php
/**
 * Created by PhpStorm.
 * User: yueping
 * Date: 2017/3/5
 * Time: 10:28
 * email:596169733@qq.com
 */
namespace Controller;

use Core\Controller;

class IndexController extends Controller {

    public function index()
    {
        var_dump(C());
        echo 'hello world;';
    }
}