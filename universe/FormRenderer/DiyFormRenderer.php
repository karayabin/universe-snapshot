<?php


namespace FormRenderer;


class DiyFormRenderer extends FormRenderer
{

    private $controlsId2Html;

    public function __construct()
    {
        parent::__construct();
        $this->controlsId2Html = [];
    }


    public function render()
    {
        echo $this->controls;
    }

    public function getCentralizedFormErrors()
    {
        return $this->centralizedFormErrors;
    }

    public function renderControl($identifier)
    {
        if (array_key_exists($identifier, $this->controlsId2Html)) {
            return $this->controlsId2Html[$identifier];
        }
        return "";
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    protected function onControlsReady(array $controls)
    {
        $this->controlsId2Html = $controls;
    }
}
