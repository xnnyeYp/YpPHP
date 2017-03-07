<?php
/**
 * Created by PhpStorm.
 * User: yueping
 * Date: 2017/3/5
 * Time: 15:32
 * email:596169733@qq.com
 */
namespace Model;


use Core\Model;

class UserModel extends Model  {

    public function getUser($id)
    {

    }

    public function getUserAll()
    {
        $sql = "select * from yp_user";
        return $this->query($sql);
    }
}