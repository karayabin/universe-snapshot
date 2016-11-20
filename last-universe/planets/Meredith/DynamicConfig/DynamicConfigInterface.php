<?php

namespace Meredith\DynamicConfig;
use Meredith\MainController\MainControllerInterface;

/**
 * LingTalfi 2015-12-31
 */
interface DynamicConfigInterface
{

    public function render(MainControllerInterface $mc);
}