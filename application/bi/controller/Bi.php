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
        $hash = $_GET['hash'];
        $sql = Db::connect('mysql://root:123456@127.0.0.1:3306/apiadmin#utf8')
            ->table('admin_list')
            ->where('hash', $hash)
            ->column('sql');
        $sql = implode($sql);
//        print_r($sql);
//        exit();
        $sql = str_replace('.$vYear.', $vYear, $sql);
        $sql = str_replace('.$vJzdate.', $vJzdate, $sql);
//        print_r($sql);
//        exit();
//        $sql = 'SELECT YEAR_VAL nian,
//       SEASON,
//       SEASON_id,
//       season || \'季\' || C_SOTYPE_NAME ji,
//       C_SOTYPE_NAME laiyuan,
//       SUM(fhl) fhl,
//       SUM(QH) qh,
//       SUM(BH) bh,
//       round(decode(sum(fhl), 0, 0, SUM(BH) / SUM(fhl)) * 100, 2) || \'%\' bdl,
//       SUM(ks) ks,
//       \'http://10.10.1.32:8018/Images/sku/\' || max(e_name) || \'.jpg\' kh
//  FROM (SELECT YEAR_VAL,
//               SEASON,
//               SEASON_id,
//               C_SOTYPE_NAME,
//               SUM(FHL) fhl,
//               SUM(QH) QH,
//               SUM(BH) BH,
//               COUNT(DISTINCT E_NAME) KS,
//               \'0\' e_name
//          FROM (SELECT YEAR_VAL,
//                       SEASON,
//                       SEASON_ID,
//                       C_SOTYPE_NAME,
//                       E_NAME,
//                       sum(NVL(FHL, 0)) FHL,
//                       sum(NVL(QH, 0)) QH,
//                       sum(NVL(BH, 0)) BH
//                  FROM (SELECT B.M_PRODUCT_ID,
//                               SUM(NVL(DECODE(A.DOCTYPE, \'FWD\', B.QTY), 0)) +
//                               SUM(NVL(DECODE(A.DOCTYPE, \'INS\', B.QTY), 0)) FHL,
//                               SUM(NVL(DECODE(A.DOCTYPE, \'FWD\', B.QTY), 0)) QH,
//                               SUM(NVL(DECODE(A.DOCTYPE, \'INS\', B.QTY), 0)) BH
//                          FROM B_SO A, B_SOITEM B
//                         WHERE A.ID = B.B_SO_ID
//                           AND A.C_STORE_ID IN (278, 1016)
//                           AND A.BILLDATE BETWEEN 20170101 AND ' . $vJzdate . '
//                           AND A.STATUS = 2
//                           AND B.STATUS = 2
//                         GROUP BY B.M_PRODUCT_ID) D
//                 RIGHT OUTER JOIN (SELECT M.M_PRODUCT_ID,
//                                         M.YEAR_ID,
//                                         M.YEAR_VAL,
//                                         M.SEASON_ID,
//                                         m.SEASON,
//                                         M.C_SOTYPE_ID,
//                                         m.C_SOTYPE_NAME,
//                                         M.E_NAME
//                                    FROM product_view_bi M
//                                   WHERE M.ISACTIVE = \'Y\'
//                                     AND m.YEAR_VAL =\'' . $vYear . '\'
//                                     AND M.dhcz_ID NOT IN
//                                         (580, 584, 1594, 1723, 1727)
//                                     AND M.PROD_SORT_ID = 240) E
//                    ON (D.M_PRODUCT_ID = E.M_PRODUCT_ID)
//                 GROUP BY YEAR_VAL, SEASON, SEASON_id, C_SOTYPE_NAME, e_name
//                 ORDER BY YEAR_VAL,
//                          SEASON,
//                          SEASON_id,
//                          C_SOTYPE_NAME,
//                          FHL DESC)
//         GROUP BY YEAR_VAL, SEASON, SEASON_id, C_SOTYPE_NAME
//        UNION ALL
//        SELECT YEAR_VAL,
//               SEASON,
//               SEASON_id,
//               C_SOTYPE_NAME,
//               0             fhl,
//               0             qh,
//               0             bh,
//               0             ks,
//               e_name
//          FROM (SELECT YEAR_VAL,
//                       SEASON,
//                       SEASON_id,
//                       C_SOTYPE_NAME,
//                       E_NAME,
//                       SUM(NVL(FHL, 0)) FHL,
//                       RANK() OVER(partition by YEAR_VAL, SEASON, C_SOTYPE_NAME order by SUM(NVL(FHL, 0)) desc) pm
//                  FROM (SELECT B.M_PRODUCT_ID,
//                               SUM(NVL(DECODE(A.DOCTYPE, \'FWD\', B.QTY), 0)) +
//                               SUM(NVL(DECODE(A.DOCTYPE, \'INS\', B.QTY), 0)) FHL,
//                               SUM(NVL(DECODE(A.DOCTYPE, \'FWD\', B.QTY), 0)) QH,
//                               SUM(NVL(DECODE(A.DOCTYPE, \'INS\', B.QTY), 0)) BH
//                          FROM B_SO A, B_SOITEM B
//                         WHERE A.ID = B.B_SO_ID
//                           AND A.C_STORE_ID IN (278, 1016)
//                           AND A.BILLDATE BETWEEN 20170101 AND ' . $vJzdate . '
//                           AND A.STATUS = 2
//                           AND B.STATUS = 2
//                         GROUP BY B.M_PRODUCT_ID) D
//                 RIGHT OUTER JOIN (SELECT M.M_PRODUCT_ID,
//                                         M.YEAR_ID,
//                                         M.YEAR_VAL,
//                                         M.SEASON_ID,
//                                         m.SEASON,
//                                         M.C_SOTYPE_ID,
//                                         m.C_SOTYPE_NAME,
//                                         M.E_NAME
//                                    FROM product_view_bi M
//                                   WHERE M.ISACTIVE = \'Y\'
//                                     AND m.YEAR_VAL =\'' . $vYear . '\'
//                                     AND M.dhcz_ID NOT IN
//                                         (580, 584, 1594, 1723, 1727)
//                                     AND M.PROD_SORT_ID = 240) E
//                    ON (D.M_PRODUCT_ID = E.M_PRODUCT_ID)
//                 GROUP BY YEAR_VAL, SEASON, SEASON_id, C_SOTYPE_NAME, E_NAME)
//         WHERE pm = 1)
// GROUP BY YEAR_VAL, SEASON, SEASON_id, C_SOTYPE_NAME
// ORDER BY nian, season, laiyuan';

        $result = Db::query($sql);

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