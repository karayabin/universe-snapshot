<?php


namespace Ling\Bootstrap4AdminTable\RendererWidget;


/**
 * The ToolbarRendererWidgetInterface class.
 */
interface ToolbarRendererWidgetInterface extends RendererWidgetInterface
{
    /**
     * Sets the groups.
     *
     * It's an array of @page(toolbar items).
     *
     *
     * @param array $groups
     */
    public function setGroups(array $groups);
}