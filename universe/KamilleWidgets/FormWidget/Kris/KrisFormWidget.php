<?php


namespace KamilleWidgets\FormWidget\Kris;


use KamilleWidgets\FormWidget\FormWidget;
use KamilleWidgets\FormWidget\Kris\TemplateHelper\TemplateHelperInterface;


class KrisFormWidget extends FormWidget
{
    private $templateHelper;

    public function setTemplateHelper(TemplateHelperInterface $templateHelper)
    {
        $this->templateHelper = $templateHelper;
        return $this;
    }

    protected function prepareVariables(array &$variables)
    {
        if (null === $this->templateHelper) {
            throw new \RuntimeException("templateHelper not set");
        }
        $variables['templateHelper'] = $this->templateHelper;
        parent::prepareVariables($variables);
    }


}