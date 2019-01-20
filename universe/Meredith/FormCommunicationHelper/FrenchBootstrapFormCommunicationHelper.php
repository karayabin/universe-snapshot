<?php

namespace Meredith\FormCommunicationHelper;

/**
 * LingTalfi 2015-12-29
 */
class FrenchBootstrapFormCommunicationHelper extends BootstrapFormCommunicationHelper
{
    public function __construct()
    {
        parent::__construct();
        $this->setCongratulationText("Félicitations !");
        $this->setWarningText("Attention !");
    }


}