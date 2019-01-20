<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Log\ExceptionLogger\Controller;

use BeeFramework\Abstractive\CallableProvider\CallableProviderInterface;
use BeeFramework\Bat\BglobTool;
use BeeFramework\Bat\NumberTool;
use Komin\Component\Log\ExceptionLogger\Listener\ExceptionListenerInterface;


/**
 * ExceptionLoggerController
 * @author Lingtalfi
 * 2015-05-25
 *
 * In this implementation, the bindure is an array with the following keys:
 *
 *          - conds: conditions
 *          - listeners: listeners
 *
 *
 *
 * Conditions
 * ---------------
 *
 * The conditions are used to match an exception,
 * while the listeners are responsible for executing certain actions if
 * the conditions are met.
 *
 * conds is an array which properties are named after the exception properties.
 * It can contain the following keys:
 *
 * - name: string, to match against the exception class name,
 *              it uses bglob notation.
 * - file: string, to match against the exception file (getFile),
 *              it uses bglob notation
 * - line: string, to match against the exception line (getLine),
 *              it can be preceded by an operator amongst the default
 *              arithmetical operators: <, >, =, >=, <=.
 *              If omitted, the operator is = by default.
 *              For instance:   < 45
 * - code: string, same as line, but applies to the exception code.
 * - nbTraces: string, same as line, but applies to the number of traces of the exception.
 * - message: string, same as name, but applies to the exception message.
 * - hasPrevious: bool, matches whether or not the exception has a previous exception set.
 *
 * - callable: callable|CallableProviderInterface,
 *                          If the other properties are not sufficient,
 *                          one can use a custom callback.
 *                          The callable will receive the exception as its sole
 *                          argument and return a boolean: whether or not
 *                          the exception matches the user criterion.
 *
 * Note: if the callable property is being used,
 * the others are ignored.
 *
 *
 * Listeners
 * ---------------
 *
 * the listeners argument can be either the * special string, which means all available listeners,
 * or an array of listeners name to execute.
 *
 *
 *
 */
class ExceptionLoggerController extends BaseExceptionLoggerController
{
    public function __construct(array $bindures, array $listeners = [])
    {
        parent::__construct();


        // adapting special bindures format
        foreach ($bindures as $k => $bindure) {
            if (array_key_exists('conds', $bindure) && array_key_exists('listeners', $bindure)) {
                $this->setBindure($bindure['conds'], $bindure['listeners'], $k);
            }
            else {
                throw new \RuntimeException("Invalid bindure, you must defined the conds and listeners keys");
            }
        }

        $this->setListeners($listeners);
    }


    protected function filterListeners(&$listeners, \Exception $e)
    {

        foreach ($this->getBindures() as $info) {
            list($conds, $userListeners) = $info;

            $condMatch = true;
            // does the exception match the conditions
            if (is_array($conds) && $conds) {

                $condMatch = false;
                if (array_key_exists('callable', $conds)) {
                    $callable = $conds['callable'];
                    if ($callable instanceof CallableProviderInterface) {
                        $callable = $callable->getCallable();
                    }
                    if (is_callable($callable)) {
                        $condMatch = call_user_func($callable, $e);
                    }
                    else {
                        throw new \RuntimeException(sprintf("Invalid callable property, a callable was expected, %s given", gettype($callable)));
                    }
                }
                else {
                    if ($conds) {
                        $condMatch = true;
                        if (array_key_exists('name', $conds)) {
                            $name = $conds['name'];
                            if (false === BglobTool::match($name, get_class($e))) {
                                continue;
                            }
                        }
                        if (array_key_exists('message', $conds)) {
                            $message = $conds['message'];
                            if (false === BglobTool::match($message, $e->getMessage())) {
                                continue;
                            }
                        }
                        if (array_key_exists('file', $conds)) {
                            $file = $conds['file'];
                            if (false === BglobTool::match($file, $e->getFile())) {
                                continue;
                            }
                        }
                        if (array_key_exists('code', $conds)) {
                            $code = $conds['code'];
                            if (false === NumberTool::compare($code, $e->getCode())) {
                                continue;
                            }
                        }
                        if (array_key_exists('line', $conds)) {
                            $line = $conds['line'];
                            if (false === NumberTool::compare($line, $e->getLine())) {
                                continue;
                            }
                        }
                        if (array_key_exists('nbTraces', $conds)) {
                            $nbTraces = $conds['nbTraces'];
                            if (false === NumberTool::compare($nbTraces, count($e->getTrace()))) {
                                continue;
                            }
                        }
                    }
                }
            }
            elseif (null === $conds) {
                $condMatch = true;
            }

            if (true === $condMatch) {
                // first set of matching conditions are used
                if ('*' === $userListeners) {
                    // all listeners are used
                    return;
                }
                elseif (is_array($userListeners)) {
                    $listeners = [];
                    foreach ($userListeners as $name) {
                        $listeners[$name] = $this->getListener($name);
                    }
                    return;
                }
                break;
            }

        }


        $listeners = [];
    }


}
