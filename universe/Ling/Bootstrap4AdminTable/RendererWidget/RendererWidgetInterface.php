<?php


namespace Ling\Bootstrap4AdminTable\RendererWidget;


/**
 * The RendererWidgetInterface interface.
 */
interface RendererWidgetInterface
{




    /**
     * Prints the widget html.
     * The prepare method should be called before hand (if necessary).
     *
     *
     * @return void
     */
    public function render();
}