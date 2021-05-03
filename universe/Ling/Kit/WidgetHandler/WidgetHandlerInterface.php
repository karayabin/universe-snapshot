<?php


namespace Ling\Kit\WidgetHandler;


use Ling\HtmlPageTools\Copilot\HtmlPageCopilot;

/**
 * The WidgetHandlerInterface interface.
 */
interface WidgetHandlerInterface
{


    /**
     * Process the widget.
     *
     * This means:
     *
     * - update the widget conf to make it more suitable for the rendering (optional)
     * - process the user input if necessary
     *
     * The debug array can help creating useful error messages.
     * It's an array containing the following entries:
     *
     * - page: the page label of the page containing the widget
     * - zone: the name of the zone containing the widget
     *
     *
     *
     * @param array $widgetConf
     * @param array $debug
     * @return void
     */
    public function process(array &$widgetConf, array $debug): void;


    /**
     * Returns the html code of the widget, according to the widget configuration.
     * If the widget uses some assets, or use some js code block, it also registers them to the given copilot.
     *
     * For more info about the copilot, see the @page(HtmlPageCopilot documentation).
     *
     * If something goes wrong, the widget should throw an exception.
     *
     * The debug array can help creating useful error messages.
     * It's an array containing the following entries:
     *
     * - page: the page label of the page containing the widget
     * - zone: the name of the zone containing the widget
     *
     *
     *
     * @param array $widgetConf
     * @param HtmlPageCopilot $copilot
     * @param array $debug
     * @return string
     * @throws \Exception
     *
     */
    public function render(array $widgetConf, HtmlPageCopilot $copilot, array $debug): string;

}