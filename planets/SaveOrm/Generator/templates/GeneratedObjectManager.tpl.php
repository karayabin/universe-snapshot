<?php


namespace SaveOrm\TEST;

use SaveOrm\ObjectManager\ObjectManager;

class ChoumGeneratedObjectManager extends ObjectManager
{

    protected function getGeneralConfig()
    {
        return [
            'tablePrefixes' => [],
        ];
    }
}