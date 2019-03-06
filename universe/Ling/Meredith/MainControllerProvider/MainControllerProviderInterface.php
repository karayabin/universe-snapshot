<?php

namespace Ling\Meredith\MainControllerProvider;

/*
 * LingTalfi 2016-01-01
 */
use Ling\Meredith\MainController\MainControllerInterface;

interface MainControllerProviderInterface
{


    /**
     * @return MainControllerInterface
     */
    public function getMainController($formId);
}
