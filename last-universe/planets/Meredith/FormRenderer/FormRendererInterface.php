<?php

namespace Meredith\FormRenderer;
use Meredith\MainController\MainControllerInterface;

/**
 * LingTalfi 2015-12-31
 */
interface FormRendererInterface
{
    public function render(MainControllerInterface $mc);
}