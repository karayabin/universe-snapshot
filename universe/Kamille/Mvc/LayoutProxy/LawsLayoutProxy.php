<?php


namespace Kamille\Mvc\LayoutProxy;

use Kamille\Architecture\ApplicationParameters\ApplicationParameters;
use Kamille\Mvc\Renderer\RendererInterface;
use Kamille\Mvc\WidgetDecorator\WidgetDecoratorInterface;
use Kamille\Services\XLog;


/**
 *
 * Using laws conventions:
 *
 * widgetId (when widget is rendered via position): <positionName> <.> <className> (<-> <index>)
 * widgetId (when widget is called alone): <className> (<-> <index>)
 *
 *
 * See laws documentation for more info.
 */
class LawsLayoutProxy extends LayoutProxy implements LawsLayoutProxyInterface, VariablesAwareLayoutProxyInterface, RendererAwareLayoutProxyInterface, ConfigAwareLayoutProxyInterface
{

    private $positions;
    private $includesDir;
    private $config; // the laws configuration from the viewId

    /**
     * @var RendererInterface
     * Used as a proxy to render includes.
     */
    private $renderer;
    private $variables;

    /**
     * @var WidgetDecoratorInterface[]
     */
    private $decorators;


    public function __construct()
    {
        parent::__construct();
        $this->positions = [];
        $this->decorators = [];
        $this->config = [];
        $this->includesDir = ApplicationParameters::get("app_dir") . "/theme/" . ApplicationParameters::get("theme") . "/includes";
    }

    public function setRenderer(RendererInterface $renderer)
    {
        $this->renderer = $renderer;
        return $this;
    }

    public function setVariables(array $variables)
    {
        $this->variables = $variables;
        return $this;
    }

    public function setConfig(array $config)
    {
        $this->config = $config;
        return $this;
    }

    public function setDecorators(array $decorators)
    {
        $this->decorators = $decorators;
        return $this;
    }

    public function addDecorator(WidgetDecoratorInterface $decorator)
    {
        $this->decorators[] = $decorator;
        return $this;
    }


    public function position($positionName)
    {

        // filter the widgets bound to that position only
        $allWidgets = $this->layout->getWidgets();
        $widgets = [];
        foreach ($allWidgets as $widgetId => $widget) {
            if (0 === strpos($widgetId, $positionName . ".")) {
                $widgets[$widgetId] = $widget;
            }
        }

        $config = $this->config;


        $i = 0;
        foreach ($widgets as $widgetId => $widget) {
            $s = $widget->render();
            foreach ($this->decorators as $decorator) {
                $decorator->decorate($s, $positionName, $widgetId, $i, $widget, $config);
            }
            echo $s;
            $i++;
        }
    }

    public function includes($includePath)
    {
        $f = $this->includesDir . "/$includePath";
        if (file_exists($f)) {
            echo $this->renderer->render(file_get_contents($f), $this->variables);
        } else {
            $msg = "Include not found: $includePath ($f)";
            if (true === ApplicationParameters::get("debug")) {
                echo "debug: " . $msg;
            }
            XLog::error($msg);
        }
    }
}


