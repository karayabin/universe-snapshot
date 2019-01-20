<?php

namespace Meredith\ValidationCodeHandler;
use Meredith\MainController\MainControllerInterface;

/**
 * LingTalfi 2015-12-31
 */
interface ValidationCodeHandlerInterface
{
    public function renderCode(MainControllerInterface $mc);
}