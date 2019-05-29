<?php
namespace wxshare;

use EasyWeChat\Factory;

class WXShare
{
    private $wxApp;

    /**
     * 初始化应用配置文件，用了EasyWeChat
     * @param [array] $options [配置文件数组]
     */
    public function __construct($options)
    {
        $this->wxApp  = Factory::officialAccount($options);
    }

    /**
     * [getConfig description]
     * @param  boolean $debug [description]
     * @param  string  $url   [description]
     * @return [type]         [description]
     */
    public function getConfig($debug = false, $url = '')
    {

        $jssdk = $this->wxApp->jssdk;

        if ($url == '') {
            $url = $_SERVER["HTTP_REFERER"];
        } else {
            if (isset($_SERVER["HTTP_REFERER"])) {
                return 'not found http referer';
            }
        }
        $jssdk->setUrl($url);
        $apis = [
            'onMenuShareAppMessage',
            'onMenuShareTimeline',
            'onMenuShareQQ',
            'onMenuShareWeibo',
            'onMenuShareQZone',
        ];

        $result = $jssdk->buildConfig($apis, $debug = false, $beta = false, $json = true);
        return $result;

        //return $jssdk->config(array(), $debug);
    }
}
