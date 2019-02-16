<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/2
 * Time: 9:42
 */
namespace app\bi\behavior;
class CORS
{
    public function appInit()
    {
        header('Access-Control-Allow-Origin:*');
        header("Access-Control-Allow-Headers:X-Auth-Token,Origin, X-Requested-With, Content-Type, Accept,ApiAuth");
        header('Access-Control-Allow-Methods: GET,POST,PUT,DELETE,OPTIONS');
        if (request()->isOptions()) {
            exit();
        }
    }
}