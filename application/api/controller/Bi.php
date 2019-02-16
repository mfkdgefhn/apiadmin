<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-01-19
 * Time: 11:19
 */

namespace app\api\controller;

use think\Controller;


class bi extends Controller
{
    public function index()
    {
        return $this->buildSuccess([
            'Product' => config('apiAdmin.APP_NAME'),
            'Version' => config('apiAdmin.APP_VERSION'),
            'Company' => config('apiAdmin.COMPANY_NAME'),
            'ToYou' => "I'm glad to meet you（终于等到你！）"
        ]);
    }
    public function  bi1(){

        $result = Db::query('select * from c_store where id=846');
        return $result;
    }
}
