<?php


namespace Ling\DebugLogger;


interface DebugLoggerInterface
{

    public function log($mixed, $type = 'info', $br = false);

    public function warning($mixed, $br = false);

    public function info($mixed, $br = false);

    public function success($mixed, $br = false);

    public function error($mixed, $br = false);


}