<?php


namespace DocTools\Widget;


use DocTools\Exception\BadWidgetConfigurationException;

/**
 * The interface for all DocTools widgets.
 *
 * A widget is a class that displays a visual component on the screen, like a list or a menu for instance.
 * The idea behind the widgets is that we can then compose a page by displaying widgets on it,
 * rather than hardcoding everything from scratch every time we want to build a new doc style.
 *
 * All widgets return markdown code.
 * The idea is that we can later convert the markdown to html (with a one liner) if we so desire.
 *
 *
 * You will use widgets to create your own @kw(DocBuilder) object.
 *
 *
 */
interface WidgetInterface
{

    /**
     * Returns the rendered widget.
     *
     * @return string
     * @throws BadWidgetConfigurationException when the widget cannot render properly.
     */
    public function render();
}