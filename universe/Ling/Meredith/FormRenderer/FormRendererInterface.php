<?php

namespace Ling\Meredith\FormRenderer;
use Ling\Meredith\MainController\MainControllerInterface;

/**
 * LingTalfi 2015-12-31
 */
interface FormRendererInterface
{
    public function render(MainControllerInterface $mc);
}