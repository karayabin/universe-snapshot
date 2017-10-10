<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Log\ExceptionLogger\Listener;

use BeeFramework\Component\Log\FileRotator\BySizeFileRotator;
use Komin\Component\Log\ExceptionLogger\Listener\Tool\ExceptionTagsFormatterTool;


/**
 * BySizeFileRotatorExceptionListener
 * @author Lingtalfi
 * 2015-05-27
 *
 */
class BySizeFileRotatorExceptionListener extends BySizeFileRotator implements ExceptionListenerInterface
{

    private $format;

    public function __construct()
    {
        parent::__construct();
        $this->format = "{dateTime}: exception thrown {name}: {message}{eol}{trace}";
    }



    //------------------------------------------------------------------------------/
    // IMPLEMENTS ExceptionListenerInterface
    //------------------------------------------------------------------------------/
    public function listen(\Exception $e, &$stopPropagation = false)
    {
        $message = ExceptionTagsFormatterTool::formatString($this->format, $e);
        $this->addMessage($message, true);
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setFormat($format)
    {
        $this->format = $format;
        return $this;
    }


}
