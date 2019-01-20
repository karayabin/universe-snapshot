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
use Komin\Application\ElementInstaller\Install\Tool\InstallTool;


/**
 * BeeFrameworkModuleUncompressedBundleInstaller
 * @author Lingtalfi
 * 2015-05-21
 *
 */
class BeeFrameworkModuleUncompressedBundleInstaller extends BaseUncompressedBundleInstaller
{


    protected function doInstall($bundleDir, InstallVarsInterface $installVars)
    {

        $this->checkRequiredVars(['rootDir'], $installVars);


        $packagesPath = $bundleDir . "/packages";
        if (file_exists($packagesPath)) {
            
            $name = $this->getMetaFile()->getName();
            $version = $this->getMetaFile()->getVersion();
            
            
            $this->getProcessLogger()->notice("Installing beeModule \"$name\" in version $version\n");
            
            $rootDir = $installVars->get('rootDir');
            $this->getProcessLogger()->notice("Copying beeModule to $rootDir...");
            InstallTool::copyDirContent($packagesPath, $rootDir);
            $this->getProcessLogger()->notice("...ok\n");
            $this->getProcessLogger()->success("The beeModule \"$name\" in version $version was successfully installed");

        }
        else {
            $this->getProcessLogger()->critical("packages dir not found in $bundleDir");
        }
    }


}
