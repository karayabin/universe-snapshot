<?php


namespace Kamille\Module;


use Kamille\Module\Exception\ModuleException;

interface ModuleInterface
{


    /**
     * @throws ModuleException when something wrong happens
     * @return true if the install process is successful
     */
    public function install();


    /**
     * @throws ModuleException when something wrong happens
     * @return true if the uninstall process is successful
     */
    public function uninstall();

}