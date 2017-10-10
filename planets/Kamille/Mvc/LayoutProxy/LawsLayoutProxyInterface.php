<?php


namespace Kamille\Mvc\LayoutProxy;


/**
 * A laws layout proxy can display positions, and includes other files.
 *
 */
interface LawsLayoutProxyInterface extends LayoutProxyInterface
{
    /**
     * Displays the widgets bound to the given position
     */
    public function position($positionName);


    /**
     * Includes a file as part of the thing (layout, widget or position)
     * being rendered.
     */
    public function includes($includePath);
}