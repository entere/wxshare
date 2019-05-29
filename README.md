# wxshare


实现同域名下，任意页面获取微信分享js配置文件。

## Server端使用方法

假设该文件访问地址为 http://xxxxxx/wxshare.php


```php
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


```



## 客户端调用方法

假设页面为 http://xxxxxx/demo.html

```html

<!DOCTYPE html>
<html>
<head>
    <title>微信分享测试</title>
    <script src="https://res.wx.qq.com/open/js/jweixin-1.0.0.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
</head>
<body>
<script type="text/javascript">

    $.ajax({
        type: 'POST',
        url: 'https:/xxx/.wxshare.php',
        success: function($data){
            wx.config(JSON.parse($data));
        }
    });


    // 微信JSSDK开发
    wx.ready(function () {

        // 分享给朋友
        wx.onMenuShareAppMessage({
            title: '这里是标题',
            desc: '这里是描述',
            link: 'http://domain.com/x.html', // 地址
            imgUrl: 'https://gss0.bdstatic.com/7Ls0a8Sm1A5BphGlnYG/sys/portrait/item/9822455368656c7065729364.jpg', // 分享的图标
            fail: function (res) {
                alert(JSON.stringify(res));
            }
        });

        // 分享到朋友圈
        wx.onMenuShareTimeline({
            title: '这里是标题', // 这里是标题
            link: 'http://domain.com/x.html', // 地址
            imgUrl: 'https://gss0.bdstatic.com/7Ls0a8Sm1A5BphGlnYG/sys/portrait/item/9822455368656c7065729364.jpg', // 分享的图标
            fail: function (res) {
                alert(JSON.stringify(res));
            }
        });

        wx.onMenuShareQQ({
            title: '这里是标题', // 这里是标题
            desc: '这里是描述', // 这里是描述
            link: 'http://domain.com/x.html', // 地址
            imgUrl: 'https://gss0.bdstatic.com/7Ls0a8Sm1A5BphGlnYG/sys/portrait/item/9822455368656c7065729364.jpg', // 分享的图标
            success: function () {
                // 用户确认分享后执行的回调函数
                alert(JSON.stringify(res));
            },
            cancel: function () {
                alert(JSON.stringify(res));
                // 用户取消分享后执行的回调函数
            }
        });

        wx.onMenuShareQZone({
            title: '', // 分享标题
            title: '这里是标题', // 这里是标题
            desc: '这里是描述', // 这里是描述
            link: 'http://xxxxxx/xxxxxxx.html', // 地址
            imgUrl: 'https://gss0.bdstatic.com/7Ls0a8Sm1A5BphGlnYG/sys/portrait/item/9822455368656c7065729364.jpg', // 分享的图标
            success: function () {
                alert(JSON.stringify(res));
                // 用户确认分享后执行的回调函数
            },
            cancel: function () {
                alert(JSON.stringify(res));
                // 用户取消分享后执行的回调函数
            }
        });
    });

</script>

</body>
</html>


```