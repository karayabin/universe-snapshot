<?php


namespace Ling\ModelRenderers\ActionLink;


use Ling\Bat\StringTool;
use Ling\ModelRenderers\Renderer\AbstractRenderer;

class ActionLinkRenderer extends AbstractRenderer
{

    private $attr;


    public function __construct()
    {
        $this->attr = [];
    }


    public static function create()
    {
        return new static();
    }

    public function render()
    {
        $m = $this->model;
        $label = (array_key_exists('label', $m)) ? $m['label'] : '';
        unset($m['label']);
        return '<a ' . StringTool::htmlAttributes($this->attr) . '
         href="#" ' . StringTool::htmlAttributes($m, 'data-') . '>' . $label . '</a>';
    }


    public function setAttr(array $attr)
    {
        $this->attr = $attr;
        return $this;
    }
}