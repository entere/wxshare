<?php
namespace wxshare;

use EasyWeChat\Factory;

class WXShare
{
    private $app;

    /**
     * 初始化应用配置文件，用了EasyWeChat
     * @param [array] $options [配置文件数组]
     */
    public function __construct($options)
    {
        $this->app  = Factory::officialAccount($options);
    }

    /**
     * [getConfig description]
     * @param  boolean $debug [description]
     * @param  string  $url   [description]
     * @return [type]         [description]
     */
    public function getConfig($url = '', $debug = false)
    {

        $apis = [
            'onMenuShareTimeline',       // 分享到朋友圈接口
            'onMenuShareAppMessage',  //  分享到朋友接口
            'onMenuShareQQ',         // 分享到QQ接口
            'onMenuShareWeibo'      // 分享到微博接口



        ];

        $result = $this->app->jssdk->buildConfig($apis, $debug = false, $beta = false, $json = true);
        return $result;


    }
}
