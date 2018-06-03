<?php


namespace Kamille\Utils\ModulePacker;


interface KamilleModulePackerInterface
{


    public function setApplicationDir($appDir);

    public function pack($moduleName);
}