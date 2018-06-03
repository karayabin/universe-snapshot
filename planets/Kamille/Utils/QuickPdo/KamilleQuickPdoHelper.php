<?php

namespace Kamille\Utils\QuickPdo;


use Kamille\Services\XLog;
use QuickPdo\QuickPdo;

class KamilleQuickPdoHelper
{


    public static function transaction(callable $transactionCallback)
    {
        return QuickPdo::transaction($transactionCallback, function ($e) {
            XLog::error("$e");
        });
    }

}