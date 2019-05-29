# wxshare


实现同域名下，任意页面获取微信分享js配置文件。

## Server端使用方法

假设该文件访问地址为 http://xxxxxx/wxshare.php


```php
<?php
include __DIR__ . '/vendor/autoload.php';

use wxshare\WXShare;

$options = [
    'debug'  => true,
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
</head>
<body>

<h1>分享测试</h1>
<script type="text/javascript">

    $.ajax({
        type: 'POST',
        url: 'https://www.codeisland.cn/dev-demo/wxshare-master/wxshare.php',
        success: function($data){

            wx.config(JSON.parse($data));
        }
    });


    // 微信JSSDK开发
    wx.ready(function () {

        // 分享给朋友
        wx.onMenuShareAppMessage({
            title: '这里是标题',
            desc: '这里是描述：打个广告，学python，就来幻想编程岛',
            link: window.location.href, // 地址
            imgUrl: 'https://www.codeisland.cn/dev-demo/wxshare-master/share.png',
            fail: function (res) {
                alert(JSON.stringify(res));
            },
            success: function () {
                alert("ok");
            }
        });

        // // 分享到朋友圈
        wx.onMenuShareTimeline({
            title: '这里是标题',
            desc: '这里是描述：打个广告，学python，就来幻想编程岛',
            link: window.location.href, // 地址
            imgUrl: 'https://www.codeisland.cn/dev-demo/wxshare-master/share.png',
            fail: function (res) {
                alert(JSON.stringify(res));
            },
            success: function () {
                alert("ok");
            }
        });

        wx.onMenuShareQQ({
            title: '这里是标题',
            desc: '这里是描述：打个广告，学python，就来幻想编程岛',
            link: window.location.href, // 地址
            imgUrl: 'https://www.codeisland.cn/dev-demo/wxshare-master/share.png',
            fail: function (res) {
                alert(JSON.stringify(res));
            },
            success: function () {
                alert("ok");
            }
        });

        wx.onMenuShareWeibo({
            title: '这里是标题',
            desc: '这里是描述：打个广告，学python，就来幻想编程岛',
            link: window.location.href, // 地址
            imgUrl: 'https://www.codeisland.cn/dev-demo/wxshare-master/share.png',
            fail: function (res) {
                alert(JSON.stringify(res));
            },
            success: function () {
                alert("ok");
            }
        });



    });

</script>

</body>
</html>



```