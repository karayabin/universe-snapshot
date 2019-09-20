<?php


namespace Ling\Bootstrap4AdminTable\RendererWidget;


/**
 * The ToolbarRendererWidgetInterface class.
 */
interface ToolbarRendererWidgetInterface
{
    /**
     * Sets the groups.
     *
     * It's an array of groupItems, as defined in the @page(list action handler conception notes).
     *
     * - 0:
     *      - text: the text of the group or item
     *      - ?icon: string, the css class of the icon (if any)
     *      - ?items: only if this is a group (i.e. containing at least two items).
     *              An array of children items (recursively).
     *      - ?attr: array of extra html attributes. Note: you need to check with the concrete implementation
     *              to see if there is some attributes conflicts (i.e. for instance the concrete implementation
     *              might already be using the "class" html attribute.
     *
     * - 1: ...
     *
     *
     * @param array $groups
     */
    public function setGroups(array $groups);
}