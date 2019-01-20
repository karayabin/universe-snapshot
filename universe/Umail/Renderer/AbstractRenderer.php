<?php

namespace Umail\Renderer;

abstract class AbstractRenderer implements RendererInterface
{

    protected $tplContent;


    public function __construct()
    {
        $this->tplContent = null;
    }

    public static function create()
    {
        return new static();
    }

    public function setTemplateContent($content)
    {
        $this->tplContent = $content;
        return $this;
    }
}