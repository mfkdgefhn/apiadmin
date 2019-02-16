<?php
/**
 * gmq路由
 */

use think\Route;

$afterBehavior = [
    '\app\admin\behavior\ApiAuth',
    '\app\admin\behavior\ApiPermission',
    '\app\admin\behavior\AdminLog'
];

return [
    '[gmq]' => [
'index' => [
'gmq/index/index',
['method' => 'get']
],
'gmq' => 'gmq/index/index',
'login' => 'gmq/index/login',
'line' => 'gmq/index/line',
'line_oracle' => 'gmq/index/line_oracle',
'oracle_line' => 'gmq/index/oracle_line',
'oracle_line1' => 'gmq/index/oracle_line1'

],
];
