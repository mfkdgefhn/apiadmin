<?php


namespace app\bi\controller;

use app\model\CStore;
use think\Db;
use think\Request;

class Bi extends Base
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


    public function getNxfx_1()
    {
        $vYear = $_GET['vYear'];
        $vJzdate = $_GET['vJzdate'];

        $result = Db::query('SELECT m.year_val nian,
       m.season,
       m.season_id,
                                    decode(m.C_SOTYPE_ID,1,m.season||\'季外购\',m.season||\'季本厂\') ji,
                                   m.c_sotype_id laiyuan,
                                   SUM(DECODE(B.DOCTYPE, \'FWD\', QTY)) + SUM(DECODE(B.DOCTYPE, \'INS\', QTY)) fhl,
                                   SUM(DECODE(B.DOCTYPE, \'FWD\', QTY)) qh,
                                   SUM(DECODE(B.DOCTYPE, \'INS\', QTY)) bh,
                                   round(SUM(DECODE(B.DOCTYPE, \'INS\', QTY))/(SUM(DECODE(B.DOCTYPE, \'FWD\', QTY)) + SUM(DECODE(B.DOCTYPE, \'INS\', QTY))),2)||\'%\' bdl,
                                   COUNT(DISTINCT M.PROD_CLS_NUM) KS,
                                    \'http://10.10.1.32:8018/Images/sku/\'||max(m.e_name)||\'.jpg\' kh
                              FROM B_SO B,
                                   B_SOITEM S,
                                   product_view_bi M,
                                   C_SOTYPE C
                             WHERE B.ID(+) = S.B_SO_ID
                                AND S.M_PRODUCT_ID = M.m_product_id(+)
                                AND B.C_STORE_ID IN (278, 1016)
                                AND M.dhcz_id NOT IN (580, 584,1594,1723,1727)
                                AND B.STATUS = 2
                                AND S.STATUS = 2
                                AND M.ISACTIVE = \'Y\'
                                AND M.PROD_SORT_ID = 240
                                and b.billdate BETWEEN 20170101 AND  '.$vJzdate.'
                                AND m.year_val=\''.$vYear.'\'
                             GROUP BY m.year_val,m.season,m.season_id,m.c_sotype_id
                             ORDER BY m.year_val,m.season,m.season_id,m.c_sotype_id'
                                    );

        return $this->buildSuccess($result, '登录成功');
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