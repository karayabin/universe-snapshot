<?php

namespace Ling\Kamille\Utils\QuickPdo;


use Ling\Kamille\Services\XLog;
use Ling\QuickPdo\QuickPdo;

class KamilleQuickPdoHelper
{


    public static function transaction(callable $transactionCallback)
    {
        return QuickPdo::transaction($transactionCallback, function ($e) {
            XLog::error("$e");
        });
    }

}