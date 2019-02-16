<?php
/**
 * Api路由
 */

use think\Route;

Route::group('api', function () {
    Route::miss('api/Miss/index');
});
$afterBehavior = [
    '\app\api\behavior\ApiAuth',
    '\app\api\behavior\ApiPermission',
    '\app\api\behavior\RequestFilter'
];
Route::rule('bi/5c496dbe766dc','bi/bi/getList', 'GET', ['after_behavior' => $afterBehavior]);Route::rule('bi/5c497557c3276','bi/bi/fawefn', 'GET', ['after_behavior' => $afterBehavior]);Route::rule('bi/5c4d6dc93a515','bi/bi/getnxfx_1', 'GET', ['after_behavior' => $afterBehavior]);Route::rule('gmq/5c4964dbaa28e','gmq/gmq/getList', 'GET', ['after_behavior' => $afterBehavior]);Route::rule('gmq/5c496e260dac8','gmq/gmq/get', 'GET', ['after_behavior' => $afterBehavior]);