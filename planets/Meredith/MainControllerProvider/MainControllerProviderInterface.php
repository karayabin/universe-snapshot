<?php

namespace Meredith\MainControllerProvider;

/*
 * LingTalfi 2016-01-01
 */
use Meredith\MainController\MainControllerInterface;

interface MainControllerProviderInterface
{


    /**
     * @return MainControllerInterface
     */
    public function getMainController($formId);
}
