<?php


namespace Ling\WebWizardTools\WebWizard;


use Ling\WebWizardTools\WebWizard\Renderer\WebWizardToolsDefaultWebWizardRenderer;


/**
 * The WebWizardToolsDefaultWebWizard class.
 */
class WebWizardToolsDefaultWebWizard extends WebWizardToolsWebWizard
{


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $renderer = new WebWizardToolsDefaultWebWizardRenderer();
        $this->setRenderer($renderer);
    }


}