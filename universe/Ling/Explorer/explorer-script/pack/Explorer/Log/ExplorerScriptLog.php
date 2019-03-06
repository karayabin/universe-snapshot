<?php


namespace Ling\Explorer\Log;


class ExplorerScriptLog implements ExplorerLogInterface
{
    private $proxy;

    public function __construct($proxyFunc)
    {
        $this->proxy = $proxyFunc;
    }

    public function log($msg, $level = null)
    {
        call_user_func($this->proxy, $msg, $level);
    }
}