<?php


namespace Ling\Bootstrap4AdminTable\RendererWidget;


/**
 * The ListGeneralActionRendererWidgetInterface class.
 */
interface ListGeneralActionRendererWidgetInterface extends RendererWidgetInterface
{
    /**
     * Sets the groups.
     *
     * It's an array of list general action items. See the @page(list general actions) page for more details.
     *
     *
     * @param array $generalActions
     */
    public function setGeneralActions(array $generalActions);
}