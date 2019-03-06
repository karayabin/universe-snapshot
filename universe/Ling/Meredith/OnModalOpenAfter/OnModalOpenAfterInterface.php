<?php

namespace Ling\Meredith\OnModalOpenAfter;
use Ling\Meredith\MainController\MainControllerInterface;

/**
 * LingTalfi 2015-12-31
 */
interface OnModalOpenAfterInterface
{


    public function render(MainControllerInterface $mc);
}