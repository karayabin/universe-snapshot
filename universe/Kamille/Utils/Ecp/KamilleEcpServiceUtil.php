<?php


namespace Kamille\Utils\Ecp;


use Ecp\EcpServiceUtil;
use Ecp\Exception\EcpUserMessageException;
use Ecp\Output\EcpOutputInterface;
use Kamille\Exception\KamilleEcpUserMessageException;
use Kamille\Services\XLog;

class KamilleEcpServiceUtil extends EcpServiceUtil
{


    protected static function onErrorAfter(\Exception $e)
    {
        $moduleName = self::getModuleName();
        XLog::error("[$moduleName module] - ecp - $e");
    }

    protected static function doExecuteProcess($process, $action, $intent, EcpOutputInterface $ecpOutput)
    {
        try {
            return parent::doExecuteProcess($process, $action, $intent, $ecpOutput);
        } catch (KamilleEcpUserMessageException $e) {
            $type = $e->getType();
            if ('success' === $type) {
                $ecpOutput->success($e->getMessage());
            } else {
                throw new EcpUserMessageException($e->getMessage(), $e->getCode(), $e);
            }
        }
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    protected static function getModuleName(): string // override me
    {
        return "ThisApp";
    }
}