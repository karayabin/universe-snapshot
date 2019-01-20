<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Log\SuperLogger;

use BeeFramework\Component\Log\SuperLogger\Listener\ListenerInterface;
use BeeFramework\Component\Log\SuperLogger\Message\Message;


/**
 * SuperLogger
 *
 * Ubiquitous logger for an application.
 * Use it anywhere in your application to log developer/maintainer errors.
 *
 *
 * @author Lingtalfi
 * 2014-10-28
 *
 */
class SuperLogger
{

    private static $inst;
    protected $listeners;
    /**
     * array of rules, intended to manually override some log ids during development
     */
    protected $skippedRules;
    protected $calls;
    protected $maxMsgIdRepeat;

    private function __construct()
    {
        $this->listeners = [];
        $this->skippedRules = [];
        $this->calls = [];
        $this->maxMsgIdRepeat = 100;
    }

    public static function getInst()
    {
        if (null === self::$inst) {
            self::$inst = new static();
        }
        return self::$inst;
    }

    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    /**
     * @param $message , string|\Exception
     */
    public function log($id, $message)
    {
        $idComponents = explode('.', $id);


        /**
         * Handling infinite loop
         */
        if (array_key_exists($id, $this->calls)) {
            $this->calls[$id]++;
        }
        else {
            $this->calls[$id] = 1;
        }
        if ($this->calls[$id] > $this->maxMsgIdRepeat) {
            throw new \RuntimeException(sprintf("SuperLogger: infinite loop detected: message with id: %s occurred more than %s times", $id, $this->maxMsgIdRepeat));
        }


        /**
         * SkippedRules
         */
        foreach ($this->skippedRules as $rule) {
            $ruleComponents = explode('.', $rule);
            if (true === $this->matchId($idComponents, $ruleComponents)) {
                return;
            }
        }


        /**
         * Note: for now, we don't allow a listener to break the loop (not needed).
         * But we could do it simply by updating the code below...
         */

        $message = new Message($id, $this->prepareMessage($message));
        foreach ($this->listeners as $info) {
            list($listener, $rules) = $info;

            // let's check if this listener is willing to handle that message
            if (!is_array($rules)) {
                $rules = [$rules];
            }
            foreach ($rules as $rule) {
                $ruleComponents = explode('.', $rule);
                if (true === $this->matchId($idComponents, $ruleComponents)) {
                    $listener->parse($message);
                    break;
                }
            }
        }
    }

    public function addListener(ListenerInterface $listener, $rules)
    {
        $this->listeners[] = [$listener, $rules];
    }

    public function setSkippedRules(array $skippedRules)
    {
        $this->skippedRules = $skippedRules;
    }


    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    protected function prepareMessage($msg)
    {
        if (is_string($msg)) {
            return $msg;
        }
        if ($msg instanceof \Exception) {
            return sprintf(
                "Message: %s" . PHP_EOL .
                "File: %s" . PHP_EOL .
                "Line: %s" . PHP_EOL .
                "Code: %s" . PHP_EOL .
                "TraceAsString: %s" . PHP_EOL,
                $msg->getMessage(),
                $msg->getFile(),
                $msg->getLine(),
                $msg->getCode(),
                $msg->getTraceAsString()
            );
        }
        return $msg;
    }

    private function matchId(array $idComponents, array $ruleComponents)
    {
        $ret = true;
        foreach ($ruleComponents as $c) {
            if (null !== $cur = array_shift($idComponents)) {
                if ('*' === $c || $c === $cur) {
                    continue;
                }
                else {
                    $ret = false;
                    break;
                }
            }
            else {
                $ret = false;
                break;
            }
        }
        return $ret;
    }

}
