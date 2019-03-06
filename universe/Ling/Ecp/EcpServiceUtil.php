<?php


namespace Ling\Ecp;


use Ling\Ecp\Exception\EcpInvalidArgumentException;
use Ling\Ecp\Exception\EcpUserMessageException;
use Ling\Ecp\Output\EcpOutput;
use Ling\Ecp\Output\EcpOutputInterface;

class EcpServiceUtil
{


    public static function executeProcess(callable $process)
    {
        if (array_key_exists("action", $_GET)) {
            $action = $_GET['action'];
            $intent = (array_key_exists("intent", $_POST)) ? $_POST['intent'] : [];

            try {
                $ecpOutput = EcpOutput::create();
                $out = static::doExecuteProcess($process, $action, $intent, $ecpOutput);

                if (null !== ($successMsg = $ecpOutput->getSuccess())) {
                    $out['$$success$$'] = $successMsg;
                } elseif (null !== ($errorMsg = $ecpOutput->getError())) {
                    $out['$$error$$'] = $errorMsg;
                }

            } catch (\Exception $e) {

                if ($e instanceof EcpInvalidArgumentException) {
                    $missing = $e->getMissingKey();
                    $out = [
                        '$$invalid$$' => "the $missing argument was not passed",
                    ];
                    static::onInvalidArgumentAfter($e);
                } elseif ($e instanceof EcpUserMessageException) {
                    $out = [
                        '$$error$$' => $e->getMessage(),
                    ];
                } else {
                    $out = [
                        '$$error$$' => "An unexpected error occurred. It has been logged and we're working on it!",
                    ];
                    static::onErrorAfter($e);

                }
            }
        } else {
            $out = [
                '$$invalid$$' => "the action identifier was not passed",
            ];
        }

        return $out;

    }


    public static function get($key, $throwEx = true, $default = null, array $pool = null)
    {
        /**
         * ecp recommends that all params are passed via $_POST, except the action param.
         */
        if (null === $pool) {
            $pool = $_POST;
        }
        if (array_key_exists($key, $pool)) {
            $ret = $pool[$key];
            if ('true' === $ret) {
                $ret = true;
            }
            if ('false' === $ret) {
                $ret = false;
            }
            return $ret;
        }
        if (true === $throwEx) {
            throw EcpInvalidArgumentException::create()->setMissingKey($key);
        }
        return $default;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    protected static function onInvalidArgumentAfter(EcpInvalidArgumentException $e)
    {

    }

    protected static function onErrorAfter(\Exception $e)
    {

    }

    protected static function doExecuteProcess($process, $action, $intent, EcpOutputInterface $ecpOutput)
    {
        return call_user_func($process, $action, $intent, $ecpOutput);
    }
}