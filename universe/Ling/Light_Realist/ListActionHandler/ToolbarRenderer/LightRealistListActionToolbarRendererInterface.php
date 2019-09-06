<?php


namespace Ling\Light_Realist\ListActionHandler\ToolbarRenderer;


/**
 * The LightRealistListActionToolbarRendererInterface interface.
 */
interface LightRealistListActionToolbarRendererInterface
{


    /**
     * Returns the html for the toolbar, based on the given groups.
     *
     * The structure of the groups is defined in the @page(list action handler conception notes).
     *
     *
     * @param array $groups
     * @return string
     */
    public function renderToolbar(array $groups): string;
}