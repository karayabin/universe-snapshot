<?php


namespace Ling\WebWizardTools\WebWizard\Renderer;


use Ling\WebWizardTools\WebWizard\WebWizardToolsWebWizard;

/**
 * The WebWizardToolsWebWizardRendererInterface interface.
 */
interface WebWizardToolsWebWizardRendererInterface
{


    /**
     * Displays the web wizard gui.
     *
     * @param WebWizardToolsWebWizard $wizard
     * @return void
     */
    public function render(WebWizardToolsWebWizard $wizard);

}