<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Log\ProcessLogger;


/**
 * ProcessLoggerInterface
 * @author Lingtalfi
 * 2015-05-21
 *
 * See doc for more info.
 * Basically,
 *      message is a string or implements __toString()
 *      message can use miniMl notation, but this is to listeners to decide what to do with it
 *      message can use tags like {foo}, as long as foo is a key of the context
 *      tags can refer to non scalar values, if an exception is passed, the stack trace will be used
 */
interface ProcessLoggerInterface
{

    public function log($level, $message, array $context = []);

    public function debug($message, array $context = []);

    public function notice($message, array $context = []);

    public function warning($message, array $context = []);

    public function error($message, array $context = []);

    public function critical($message, array $context = []);

    public function success($message, array $context = []);
}
