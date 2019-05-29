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
            'onMenuShareAppMessage',
            'onMenuShareTimeline',
            'onMenuShareQQ',
            'onMenuShareWeibo',

        ];

        $result = $this->app->jssdk->buildConfig($apis, $debug = false, $beta = false, $json = true);
        return $result;


    }
}
