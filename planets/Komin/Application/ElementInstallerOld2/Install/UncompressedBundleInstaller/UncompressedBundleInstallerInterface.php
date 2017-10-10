<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Application\ElementInstaller\Install\UncompressedBundleInstaller;
use Komin\Application\ElementInstaller\Install\InstallVars\InstallVarsInterface;


/**
 * UncompressedBundleInstallerInterface
 * @author Lingtalfi
 * 2015-05-21
 *
 */
interface UncompressedBundleInstallerInterface
{

    /**
     * @param $bundleDir , path to the uncompressed bundle dir
     * @return mixed
     */
    public function install($bundleDir, InstallVarsInterface $installVars);
    
}
