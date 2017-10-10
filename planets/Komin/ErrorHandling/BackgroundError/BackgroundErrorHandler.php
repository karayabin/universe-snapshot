<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\ErrorHandling\BackgroundError;

use BeeFramework\Component\Log\SuperLogger\SuperLogger;


/**
 * BackgroundErrorHandler
 * @author Lingtalfi
 * 2014-12-07
 *
 */
class BackgroundErrorHandler
{

    protected $errorTypes;
    protected $internalType;


    public function __construct(array $errorsPolicy)
    {

        // defining internal policy
        $allowedInternals = ['phpNotice', 'phpWarning', 'phpError', 'slog'];
        $internalPolicy = 'exception';
        if (array_key_exists('_internal', $errorsPolicy)) {
            $internalPolicy = $errorsPolicy['_internal'];
        }
        if (is_string($internalPolicy) && in_array($internalPolicy, $allowedInternals, true)) {
            $this->internalType = $internalPolicy;
        }
        else {
            $this->internalType = 'exception';
        }


        // preparing the default key
        $default = [
            'phpWarning' => null,
        ];
        if (array_key_exists('default', $errorsPolicy) && is_array($errorsPolicy['default']) && $errorsPolicy['default']) {
            $default = $errorsPolicy['default'];
        }
        $errorsPolicy['default'] = $default;


        // memorize
        $this->errorTypes = $errorsPolicy;
    }


    public function triggerError($msg, $errorType = null)
    {
        if (null === $errorType) {
            $errorType = 'default';
        }
        if (!array_key_exists($errorType, $this->errorTypes)) {
            $errorType = 'default';
        }
        $m = $this->errorTypes[$errorType];
        foreach ($m as $mId => $params) {
            switch ($mId) {
                case 'ignore':
                    break;
                case 'slog':
                    if (is_string($params)) {
                        SuperLogger::getInst()->log($params, $msg);
                    }
                    else {
                        $this->internalError('configError1', sprintf("triggerError: invalid 'slog' argument: a string was expected, %s given", gettype($params)));
                    }
                    break;
                case 'exception':
                    if (is_string($params)) {
                        if (true === class_exists($params, true)) {
                            throw new $params();
                        }
                        else {
                            $this->internalError('configError3', sprintf("triggerError: unknown exception %s", $params));
                        }
                    }
                    else {
                        $this->internalError('configError2', sprintf("triggerError: invalid 'exception' argument: a string was expected, %s given", gettype($params)));
                    }
                    break;
                case 'phpNotice':
                    trigger_error($msg, E_USER_NOTICE);
                    break;
                case 'phpWarning':
                    trigger_error($msg, E_USER_WARNING);
                    break;
                case 'phpError':
                    trigger_error($msg, E_USER_ERROR);
                    break;
                default:
                    $this->internalError('configError4', sprintf("triggerError: unknown module %s", $mId));
                    break;
            }
        }
    }


    private function internalError($id, $msg)
    {
        switch ($this->internalType) {
            case 'slog':
                SuperLogger::getInst()->log("backgroundErrorHandler.internalError." . $id, $msg);
                break;
            case 'phpNotice':
                trigger_error($msg, E_USER_NOTICE);
                break;
            case 'phpWarning':
                trigger_error($msg, E_USER_WARNING);
                break;
            case 'phpError':
                trigger_error($msg, E_USER_ERROR);
                break;
            default:
                throw new \RuntimeException($msg);
                break;
        }
    }

}
