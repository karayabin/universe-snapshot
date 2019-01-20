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
 * LinkCommand
 * @author Lingtalfi
 * 2014-10-29
 *
 *
 *
 * Recreate links as specified in the params.
 * If a link already exist, it is always removed first (so that we don't have problem with the ln command
 * complaining).
 *
 * If the target is not a link, we skip (because we don't want to remove something if we're not sure of
 * what it is).
 *
 */
class LinksCommand extends BaseCommand
{

    //------------------------------------------------------------------------------/
    // IMPLEMENTS CommandInterface
    //------------------------------------------------------------------------------/
    protected function doExecute(array $params)
    {

        $ret = true;
        foreach ($params as $rule) {


            if (is_array($rule) && 2 === count($rule)) {
                $this->replaceVars($rule);


                $src = array_shift($rule);
                $linkPath = array_shift($rule);


                // our policy is to remove any link,
                if (is_link($linkPath)) {
                    if (false === @unlink($linkPath)) {
                        $this->log('unexpected.unlink', sprintf("Couldn't unlink the broken link %s", $linkPath));
                    }
                    else {
                        echo "unlink " . $linkPath . PHP_EOL;
                    }
                }

                $cmd = 'ln -s "' . trim($src, '"') . '" "' . trim($linkPath, '"') . '" 2>&1';

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
                $this->log('invalidFormat.rule', "The rule isn't an array containing exactly two entries");
            }
        }
        return $ret;
    }


    protected function log($id, $msg)
    {
        $id = 'remoteBash.link.' . $id;
        SuperLogger::getInst()->log($id, $msg);
    }

}
