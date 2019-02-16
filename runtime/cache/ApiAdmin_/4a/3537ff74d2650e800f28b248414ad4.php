<?php
//000000000000
 exit();?>
a:12:{s:2:"id";i:8;s:8:"apiClass";s:12:"bi/getnxfx_1";s:4:"hash";s:13:"5c4d6dc93a515";s:11:"accessToken";i:0;s:9:"needLogin";i:0;s:6:"status";i:1;s:6:"method";i:2;s:4:"info";s:14:"女鞋分析-1";s:6:"isTest";i:1;s:9:"returnStr";s:756:"{"code":1,"msg":"\u767b\u5f55\u6210\u529f","data":[{"NIAN":"2019","SEASON":"\u6625","SEASON_ID":"37","JI":"\u6625\u5b63\u672c\u5382","LAIYUAN":"\u672c\u5382","FHL":"605790","QH":"477804","BH":"127986","BDL":"21.13%","KS":"77","KH":"http:\/\/10.10.1.32:8018\/Images\/sku\/177110072.jpg"},{"NIAN":"2019","SEASON":"\u6625","SEASON_ID":"37","JI":"\u6625\u5b63\u5916\u8d2d","LAIYUAN":"\u5916\u8d2d","FHL":"202048","QH":"68214","BH":"133834","BDL":"66.24%","KS":"49","KH":"http:\/\/10.10.1.32:8018\/Images\/sku\/177510713.jpg"},{"NIAN":"2019","SEASON":"\u590f","SEASON_ID":"38","JI":"\u590f\u5b63\u672c\u5382","LAIYUAN":"\u672c\u5382","FHL":"200040","QH":"196500","BH":"3540","BDL":"1.77%","KS":"23","KH":"http:\/\/10.10.1.32:8018\/Images\/sku\/177130065.jpg"}]}";s:9:"groupHash";s:13:"5c429515856ce";s:3:"sql";s:5221:"SELECT YEAR_VAL nian,
       SEASON,
       SEASON_id,
       season || '季' || C_SOTYPE_NAME ji,
       C_SOTYPE_NAME laiyuan,
       SUM(fhl) fhl,
       SUM(QH) qh,
       SUM(BH) bh,
       round(decode(sum(fhl), 0, 0, SUM(BH) / SUM(fhl)) * 100, 2) || '%' bdl,
       SUM(ks) ks,
       'http://10.10.1.32:8018/Images/sku/' || max(e_name) || '.jpg' kh
  FROM (SELECT YEAR_VAL,
               SEASON,
               SEASON_id,
               C_SOTYPE_NAME,
               SUM(FHL) fhl,
               SUM(QH) QH,
               SUM(BH) BH,
               COUNT(DISTINCT E_NAME) KS,
               '0' e_name
          FROM (SELECT YEAR_VAL,
                       SEASON,
                       SEASON_ID,
                       C_SOTYPE_NAME,
                       E_NAME,
                       sum(NVL(FHL, 0)) FHL,
                       sum(NVL(QH, 0)) QH,
                       sum(NVL(BH, 0)) BH
                  FROM (SELECT B.M_PRODUCT_ID,
                               SUM(NVL(DECODE(A.DOCTYPE, 'FWD', B.QTY), 0)) +
                               SUM(NVL(DECODE(A.DOCTYPE, 'INS', B.QTY), 0)) FHL,
                               SUM(NVL(DECODE(A.DOCTYPE, 'FWD', B.QTY), 0)) QH,
                               SUM(NVL(DECODE(A.DOCTYPE, 'INS', B.QTY), 0)) BH
                          FROM B_SO A, B_SOITEM B
                         WHERE A.ID = B.B_SO_ID
                           AND A.C_STORE_ID IN (278, 1016)
                           AND A.BILLDATE BETWEEN 20170101 AND .$vJzdate.
                           AND A.STATUS = 2
                           AND B.STATUS = 2
                         GROUP BY B.M_PRODUCT_ID) D
                 RIGHT OUTER JOIN (SELECT M.M_PRODUCT_ID,
                                         M.YEAR_ID,
                                         M.YEAR_VAL,
                                         M.SEASON_ID,
                                         m.SEASON,
                                         M.C_SOTYPE_ID,
                                         m.C_SOTYPE_NAME,
                                         M.E_NAME
                                    FROM product_view_bi M
                                   WHERE M.ISACTIVE = 'Y'
                                     AND m.YEAR_VAL = '.$vYear.'
                                     AND M.dhcz_ID NOT IN
                                         (580, 584, 1594, 1723, 1727)
                                     AND M.PROD_SORT_ID = 240) E
                    ON (D.M_PRODUCT_ID = E.M_PRODUCT_ID)
                 GROUP BY YEAR_VAL, SEASON, SEASON_id, C_SOTYPE_NAME, e_name
                 ORDER BY YEAR_VAL,
                          SEASON,
                          SEASON_id,
                          C_SOTYPE_NAME,
                          FHL DESC)
         GROUP BY YEAR_VAL, SEASON, SEASON_id, C_SOTYPE_NAME
        UNION ALL
        SELECT YEAR_VAL,
               SEASON,
               SEASON_id,
               C_SOTYPE_NAME,
               0             fhl,
               0             qh,
               0             bh,
               0             ks,
               e_name
          FROM (SELECT YEAR_VAL,
                       SEASON,
                       SEASON_id,
                       C_SOTYPE_NAME,
                       E_NAME,
                       SUM(NVL(FHL, 0)) FHL,
                       RANK() OVER(partition by YEAR_VAL, SEASON, C_SOTYPE_NAME order by SUM(NVL(FHL, 0)) desc) pm
                  FROM (SELECT B.M_PRODUCT_ID,
                               SUM(NVL(DECODE(A.DOCTYPE, 'FWD', B.QTY), 0)) +
                               SUM(NVL(DECODE(A.DOCTYPE, 'INS', B.QTY), 0)) FHL,
                               SUM(NVL(DECODE(A.DOCTYPE, 'FWD', B.QTY), 0)) QH,
                               SUM(NVL(DECODE(A.DOCTYPE, 'INS', B.QTY), 0)) BH
                          FROM B_SO A, B_SOITEM B
                         WHERE A.ID = B.B_SO_ID
                           AND A.C_STORE_ID IN (278, 1016)
                           AND A.BILLDATE BETWEEN 20170101 AND .$vJzdate.
                           AND A.STATUS = 2
                           AND B.STATUS = 2
                         GROUP BY B.M_PRODUCT_ID) D
                 RIGHT OUTER JOIN (SELECT M.M_PRODUCT_ID,
                                         M.YEAR_ID,
                                         M.YEAR_VAL,
                                         M.SEASON_ID,
                                         m.SEASON,
                                         M.C_SOTYPE_ID,
                                         m.C_SOTYPE_NAME,
                                         M.E_NAME
                                    FROM product_view_bi M
                                   WHERE M.ISACTIVE = 'Y'
                                     AND m.YEAR_VAL = '.$vYear.'
                                     AND M.dhcz_ID NOT IN
                                         (580, 584, 1594, 1723, 1727)
                                     AND M.PROD_SORT_ID = 240) E
                    ON (D.M_PRODUCT_ID = E.M_PRODUCT_ID)
                 GROUP BY YEAR_VAL, SEASON, SEASON_id, C_SOTYPE_NAME, E_NAME)
         WHERE pm = 1)
 GROUP BY YEAR_VAL, SEASON, SEASON_id, C_SOTYPE_NAME
 ORDER BY nian, season, laiyuan
";}