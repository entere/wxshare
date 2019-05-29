<?php
include __DIR__ . '/vendor/autoload.php';

use wxshare\WXShare;

$options = [
    'debug'  => false,
    'app_id'    => 'wx70376c954b87xxx',
    'secret'    => '5136xx10d5xxx93e9xxd0044cxxx',
    'token'     => '',
    'log' => [
        'level' => 'debug',
        'file'  => '/tmp/wxshare.log',
    ],
];

$wxshare = new WXShare($options);

echo $wxshare->getConfig();