<?php
include __DIR__ . '/vendor/autoload.php'; // 引入 composer 入口文件

use wxshare\WXShare;

$options = [
    'debug'  => false,
    'app_id'    => 'wx3cf0f39249eb0exxx',
    'secret'    => 'f1c242f4f28f735d4687abb469072xxx',
    'token'     => 'easywechat',
    'log' => [
        'level' => 'debug',
        'file'  => '/tmp/easywechat.log',
    ],
    // ...
];

$wxshare = new WXShare($options);

echo $wxshare->getConfig();