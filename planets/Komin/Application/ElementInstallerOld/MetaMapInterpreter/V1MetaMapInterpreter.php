<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Application\ElementInstallerOld\MetaMapInterpreter;

use BeeFramework\Bat\ArrayTool;


/**
 * V1MetaMapInterpreter
 * @author Lingtalfi
 * 2015-04-20
 *
 */
class V1MetaMapInterpreter implements MetaMapInterpreterInterface
{


    //------------------------------------------------------------------------------/
    // IMPLEMENTS MetaCheckerInterface
    //------------------------------------------------------------------------------/
    public function isValid(array $meta)
    {
        return ArrayTool::hasKeys($meta, [
            'id',
            'type',
            'version',
            'download',
        ]);
    }

    /**
     * @return array of dependency.
     *          Each dependency is a label (meant to be read) representing the dependency.
     *
     */
    public function getDependencyArray(array $meta)
    {
        $ret = [];
        if (array_key_exists('dependencies', $meta)) {
            $ret = $meta['dependencies'];
        }
        return $ret;
    }
}
