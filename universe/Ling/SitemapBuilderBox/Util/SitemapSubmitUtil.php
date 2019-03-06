<?php

namespace Ling\SitemapBuilderBox\Util;

/*
 * LingTalfi 2015-10-09
 * 
 * urls:
 * https://github.com/lingtalfi/SearchEngineSitemapUrls
 */

class SitemapSubmitUtil
{


    public $searchEngineSymbolicUrls;

    public function __construct()
    {
        $this->searchEngineSymbolicUrls = [
            'google' => 'http://www.google.com/webmasters/sitemaps/ping?sitemap={url}',
            'bing' => 'http://www.bing.com/webmaster/ping.aspx?siteMap={url}',
//            'ask' => 'http://submissions.ask.com/ping?sitemap={url}', // doesn't work anymore
        ];
    }

    public static function create()
    {
        return new static();
    }
    

    /**
     * callable $onResponse ( int httpCode, string message )
     *              httpCode should be 200 in case of success, 0 (or other?) in case of error
     *
     */
    public function submit($sitemapUrl, $onResponse = null)
    {
        foreach ($this->searchEngineSymbolicUrls as $se) {
            $url = str_replace('{url}', $sitemapUrl, $se);
            list($code, $msg) = $this->tryHttpQuery($url);
            if (is_callable($onResponse)) {
                call_user_func($onResponse, $code, $msg);
            }
        }
    }




    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function tryHttpQuery($url)
    {
        if (extension_loaded("curl")) {

            ob_start();
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            $output = ob_get_clean();
            return [$httpCode, $output];
        }
        else {
            $this->fatal("curl library is not loaded");
        }
    }


    private function fatal($m)
    {
        throw new \Exception($m);
    }

}
