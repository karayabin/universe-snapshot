<?php

namespace Meredith\FormCommunicationHelper;

/**
 * LingTalfi 2015-12-29
 */
class BootstrapFormCommunicationHelper implements FormCommunicationHelperInterface
{

    private $congratulationText;
    private $warningText;

    public function __construct()
    {
        $this->congratulationText = "Congratulations!";
        $this->warningText = "Warning!";
    }

    public static function create()
    {
        return new static();
    }

    public function render()
    {
        $f = __DIR__ . "/BootstrapFormCommunicationHelper/template.php";
        return str_replace([
            '{congratulations}',
            '{warning}',
        ], [
            $this->congratulationText,
            $this->warningText,
        ], file_get_contents($f));
    }

    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    public function setCongratulationText($congratulationText)
    {
        $this->congratulationText = $congratulationText;
        return $this;
    }

    public function setWarningText($warningText)
    {
        $this->warningText = $warningText;
        return $this;
    }


}