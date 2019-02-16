<?php


namespace app\bi\controller;

use app\bi\controller\database;
use app\model\CStore;
use think\Db;

class Index extends Base
{
    public function index()
    {
        $this->debug([
            'TpVersion' => THINK_VERSION
        ]);
        return $this->buildSuccess([
            'Product' => config('apiAdmin.APP_NAME'),
            'Version' => config('apiAdmin.APP_VERSION'),
            'Company' => config('apiAdmin.COMPANY_NAME'),
            'ToYou' => "I'm glad to meet you（终于等到你！）"
        ]);


    }

    public function login()
    {

        return '你已经登陆成功';
    }

    public function line()
    {
        print_r("wq vb ");
        $oracle_data = Db::id('1')->select();

        print_r($oracle_data);
    }


    public function oracle_line()
    {
        $result = Db::query('select * from c_store where id=846');
        return $result;
    }

    public function oracle_line1()
    {
        $result = Db::table('think_data')
            ->where('id', 846)
            ->select();
        return $result;
    }

    public function oracle_line2()
    {
        $result = CStore::all(['id' => 846]);
        return $result;
    }
}