<?php
/**
 * wiki路由
 */

use think\Route;

$afterBehavior = [
    '\app\bi\behavior\ApiAuth',
    '\app\bi\behavior\ApiPermission',
    '\app\bi\behavior\AdminLog'
];

return [
    '[bi]' => [
        'index' => [
            'bi/index/index',
            ['method' => 'get']
        ],
        'oracle_line'=> [
            'bi/index/oracle_line',
            ['method' => 'get']
        ],
        'login'=> [
            'bi/index/login',
            ['method' => 'get']
        ],
        'line'=> [
            'bi/index/line',
            ['method' => 'get']
        ],
        'bi_login'=> [
            'bi/bi/login',
            ['method' => 'get']
        ],
        'getNxfx_1'=> [
            'bi/bi/getNxfx_1',
            ['method' => 'get']
        ],
        '5c527fc326ead'=> [
            'bi/bi/getNxfx_1',
            ['method' => 'get']
        ],

    ],
];
