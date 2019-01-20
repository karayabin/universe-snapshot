<?php

namespace ApplicationItemManager\Installer;


interface InstallerInterface
{

    /**
     * @return bool
     */
    public function install($itemName);

    /**
     * @return bool
     */
    public function isInstalled($itemName);

    /**
     * @return bool
     */
    public function uninstall($itemName);

    /**
     * @return array of itemNames
     */
    public function getList();
}