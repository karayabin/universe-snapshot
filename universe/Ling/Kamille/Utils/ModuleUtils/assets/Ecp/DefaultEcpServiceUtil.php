<?php


namespace Module\PeiPei\Ecp;


use Core\Services\Hooks;
use Ling\Ecp\Exception\EcpInvalidArgumentException;
use Ling\Kamille\Utils\Ecp\KamilleEcpServiceUtil;

class PeiPeiEcpServiceUtil extends KamilleEcpServiceUtil
{

    protected static function getModuleName(): string // override me
    {
        return "PeiPei";
    }

    protected static function onInvalidArgumentAfter(EcpInvalidArgumentException $e)
    {
        Hooks::call("PeiPei_Ecp_logInvalidArgumentException", $e);
    }


}