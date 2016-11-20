<?php

namespace Meredith\FormCommunicationHelper;

/**
* LingTalfi 2015-12-29
*/
interface FormCommunicationHelperInterface {


    /**
     * Render the js code for three (js) functions:
     *
     *
     * - meredithFunctions.writeSuccessMessage(msg, jForm)
     * - meredithFunctions.writeErrorMessage(msg, jForm)
     * - meredithFunctions.devError(msg)
     *
     */
    public function render();
}