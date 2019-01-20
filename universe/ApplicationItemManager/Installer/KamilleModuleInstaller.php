<?php

namespace ApplicationItemManager\Installer;


use ApplicationItemManager\Exception\ApplicationItemManagerException;
use ApplicationItemManager\Helper\KamilleApplicationItemManagerHelper;

class KamilleModuleInstaller extends LingAbstractItemInstaller
{

    public function __construct()
    {
        parent::__construct();
        $this->itemType = "module";
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    protected function getInstallerClass($itemName)
    {
        return KamilleApplicationItemManagerHelper::getInstallerClass($itemName);
    }

    protected function getFile()
    {
        if (null === $this->applicationDirectory) {
            throw new ApplicationItemManagerException("Set applicationDirectory first");
        }
        return $this->applicationDirectory . "/modules.txt";
    }

}