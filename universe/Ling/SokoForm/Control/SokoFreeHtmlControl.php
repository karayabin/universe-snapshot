<?php


namespace Ling\SokoForm\Control;


class SokoFreeHtmlControl extends SokoControl
{

    protected $html;

    public function setHtml($html)
    {
        $this->html = $html;
        return $this;
    }

    protected function getSpecificModel() // override me
    {
        $this->properties['html'] = $this->html;
        return parent::getSpecificModel();
    }


}