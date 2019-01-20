<?php

namespace Meredith\FormHandler;

use Meredith\DynamicConfig\DynamicConfig;
use Meredith\DynamicConfig\DynamicConfigInterface;
use Meredith\FormCommunicationHelper\FormCommunicationHelperInterface;
use Meredith\FormRenderer\FormRendererInterface;
use Meredith\MainController\MainControllerInterface;
use Meredith\ValidationCodeHandler\ValidationCodeHandlerInterface;

/**
 * LingTalfi 2015-12-29
 */
class FormHandler implements FormHandlerInterface
{

    private $formId;
    private $formCommunicationHelper;
    private $formRenderer;
    private $dynamicConfig;
    private $validationCodeHandler;

    public function __construct()
    {
        //
        $this->dynamicConfig = DynamicConfig::create();
    }


    public static function create()
    {
        return new static();
    }

    public function render(MainControllerInterface $mc)
    {
        echo $this->getDynamicConfig()->render($mc);
        echo $this->getFormCommunicationHelper()->render();
        echo $this->getFormRenderer()->render($mc);
        echo $this->getValidationCodeHandler()->renderCode($mc);
    }


    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    public function setFormCommunicationHelper(FormCommunicationHelperInterface $h)
    {
        $this->formCommunicationHelper = $h;
        return $this;
    }

    public function setFormId($formId)
    {
        $this->formId = $formId;
        return $this;
    }


    public function setFormRenderer(FormRendererInterface $formRenderer)
    {
        $this->formRenderer = $formRenderer;
        return $this;
    }

    public function setDynamicConfig(DynamicConfigInterface $dynamicConfig)
    {
        $this->dynamicConfig = $dynamicConfig;
        return $this;
    }


    public function setValidationCodeHandler(ValidationCodeHandlerInterface $h)
    {
        $this->validationCodeHandler = $h;
        return $this;
    }


    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    /**
     * @return FormCommunicationHelperInterface
     */
    public function getFormCommunicationHelper()
    {
        return $this->formCommunicationHelper;
    }

    /**
     * @return FormRendererInterface
     */
    public function getFormRenderer()
    {
        return $this->formRenderer;
    }

    /**
     * @return string
     */
    public function getFormId()
    {
        return $this->formId;
    }

    /**
     * @return DynamicConfigInterface
     */
    public function getDynamicConfig()
    {
        return $this->dynamicConfig;
    }

    /**
     * @return ValidationCodeHandlerInterface
     */
    public function getValidationCodeHandler()
    {
        return $this->validationCodeHandler;
    }

}