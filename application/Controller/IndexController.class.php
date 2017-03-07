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
use Model\UserModel;

class IndexController extends Controller {

    public function index()
    {
        $User = new UserModel();
        $users = $User->getUserAll();

        $this->assign('user', $users);
        $this->display();
    }
}