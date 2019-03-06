<?php


namespace Ling\SaveOrm\TEST;

use Ling\SaveOrm\ObjectManager\ObjectManager;

class ChoumGeneratedObjectManager extends ObjectManager
{

    protected function getGeneralConfig()
    {
        return [
            'tablePrefixes' => [],
        ];
    }
}