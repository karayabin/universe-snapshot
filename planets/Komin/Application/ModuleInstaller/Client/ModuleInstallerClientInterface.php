<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Application\ModuleInstaller\Client;


/**
 * ModuleInstallerClientInterface
 * @author Lingtalfi
 * 2015-05-04
 *
 *
 *
 */
interface ModuleInstallerClientInterface
{

    /**
     * @param $input
     *              if it's a path to an existing bundle, that bundle will be installed
     *              if it's a path to an existing directory, it's the path to a directory of bundles to install
     *              if it's another string, it's the elementId
     * 
     *              if it's an array, it's an array containing any of those elements.
     *
     *
     * @return bool, whether or not the install was completely successful.
     */
    public function install($input);
    
}
