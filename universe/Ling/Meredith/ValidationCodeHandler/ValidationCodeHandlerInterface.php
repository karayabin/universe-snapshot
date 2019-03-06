<?php

namespace Ling\Meredith\ValidationCodeHandler;
use Ling\Meredith\MainController\MainControllerInterface;

/**
 * LingTalfi 2015-12-31
 */
interface ValidationCodeHandlerInterface
{
    public function renderCode(MainControllerInterface $mc);
}