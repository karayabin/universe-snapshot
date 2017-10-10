<?php

namespace ApplicationItemManager\Installer;


use ApplicationItemManager\Exception\ApplicationItemManagerException;

class KamilleWidgetInstaller extends LingAbstractItemInstaller
{

    public function __construct()
    {
        parent::__construct();
        $this->itemType = "widget";
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    protected function getInstallerClass($itemName)
    {
        return 'Widget\\' . $itemName . '\\' . $itemName . "WidgetInstaller";
    }

    protected function getFile()
    {
        if (null === $this->applicationDirectory) {
            throw new ApplicationItemManagerException("Set applicationDirectory first");
        }
        return $this->applicationDirectory . "/widgets.txt";
    }

}