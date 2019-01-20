<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Application\ElementInstallerOld\Tool;


/**
 * ElementInstallerTool
 * @author Lingtalfi
 * 2015-04-23
 *
 */
class ElementInstallerTool
{


    /**
     * @param $elementId
     * @return array with the following entries:
     *              
     *              0: type
     *              1: name
     *              2: version
     */
    public static function extractElementId($elementId)
    {
        if (is_string($elementId)) {
            $p = explode(':', $elementId, 3);
            $n = count($p);
            if ($n >= 2) {
                if (2 === $n) {
                    $p[2] = '';
                }
                return $p;
            }
            else {
                throw new \InvalidArgumentException("invalid elementId");
            }
        }
        else {
            throw new \InvalidArgumentException("elementId argument must be of type string");
        }
    }
}
