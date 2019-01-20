<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Server\RemoteShell\Command;

use BeeFramework\Component\Log\SuperLogger\SuperLogger;


/**
 * ChmodCommand
 * @author Lingtalfi
 * 2014-10-29
 *
 */
class ChmodCommand extends BaseCommand
{

    //------------------------------------------------------------------------------/
    // IMPLEMENTS CommandInterface
    //------------------------------------------------------------------------------/
    protected function doExecute(array $params)
    {

        $ret = true;
        foreach ($params as $rule) {
            $this->replaceVars($rule);


            $p = explode(':', $rule, 2);
            if (count($p) > 1) {
                list($target, $mode) = $p;
                // note -R doesn't harm on a file, so...
                $cmd = 'chmod -R ' . $mode . ' "' . trim($target, '"') . '" 2>&1';
                echo $cmd . PHP_EOL;
                ob_start();
                passthru($cmd);
                $r = ob_get_clean();

                if (strlen($r) > 0) {
                    $ret = false;
                    echo $r;
                }
            }
            else {
                $this->log('invalidFormat.colon', sprintf("This rule does not contain a colon to separate the target from the mode to apply to it: %s", $rule));
                $ret = false;
            }
        }
        return $ret;
    }


    protected function log($id, $msg)
    {
        $id = 'remoteBash.chmod.' . $id;
        SuperLogger::getInst()->log($id, $msg);
    }

}
