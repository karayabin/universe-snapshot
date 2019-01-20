<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Application\ModuleInstaller\UserStream;

use Komin\Component\Console\Util\Interactive\Dialog\DialogInterface;
use Komin\Component\Console\Util\Interactive\Dialog\ListDialog;
use Komin\Component\Console\Util\Interactive\InteractiveLine\InteractiveLineInterface;


/**
 * DebugUserStream
 * @author Lingtalfi
 * 2015-05-04
 *
 */
class DebugUserStream implements UserStreamInterface
{

    protected $cr;

    public function __construct($cr = "\n")
    {
        $this->cr = $cr;
    }




    //------------------------------------------------------------------------------/
    // IMPLEMENTS UserStreamInterface
    //------------------------------------------------------------------------------/
    public function log($msg)
    {
        echo "LOG::> " . $msg . $this->cr;
    }

    public function display($msg)
    {
        echo "MSG::> " . $msg . $this->cr;

    }

    /**
     * @param array $choices ,
     *                  choice => callback
     */
    public function ask($question, array $choices)
    {
        if ('cli' === strtolower(PHP_SAPI)) {
            $d = new ListDialog($question, [
                'list' => array_keys($choices),
                'useKeys' => true,
            ]);
            $d->execute(function ($lineContent, $questionIndex, DialogInterface $dialog, $keyCode, InteractiveLineInterface $iLine, $rawCode) use ($choices) {

                $n = 0;
                foreach ($choices as $callback) {
                    if ((int)$lineContent === $n) {
                        call_user_func($callback);
                        break;
                    }
                    $n++;
                }
            });
        }
        else {
            $sChoices = '';
            $n = 0;
            foreach ($choices as $k => $callback) {
                $sChoices .= "- $n: $k" . $this->cr;
                $n++;
            }
            echo "ASK::> " . $question . $this->cr;
            echo $sChoices;
        }
    }
}
