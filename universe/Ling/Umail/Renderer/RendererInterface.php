<?php

namespace Ling\Umail\Renderer;

interface RendererInterface
{
    public function render(array $vars);

    public function setTemplateContent($content);
}