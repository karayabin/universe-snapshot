<?php


namespace Kamille\Mvc\Layout;


use Kamille\Mvc\Layout\Exception\LayoutException;
use Kamille\Mvc\Loader\LoaderInterface;
use Kamille\Mvc\Renderer\Exception\RendererException;
use Kamille\Mvc\Renderer\LayoutRendererInterface;
use Kamille\Mvc\Renderer\RendererInterface;
use Kamille\Mvc\Widget\LayoutAwareWidgetInterface;
use Kamille\Mvc\Widget\WidgetInterface;

/**
 * In this implementation, we use the following pattern:
 * https://github.com/lingtalfi/loader-renderer-pattern/blob/master/loader-renderer.pattern.md
 */
class Layout implements LayoutInterface
{
    private $templateName;
    private $widgets;

    /**
     * @var LoaderInterface
     */
    private $loader;

    /**
     * @var RendererInterface
     */
    private $renderer;

    public function __construct()
    {
        $this->widgets = [];
    }

    /**
     * @return $this
     */
    public static function create()
    {
        return new static();
    }

    /**
     * @return $this
     */
    public function setTemplate($templateName)
    {
        $this->templateName = $templateName;
        return $this;
    }

    public function bindWidget($name, WidgetInterface $widget)
    {
        $this->widgets[$name] = $widget;
        if ($widget instanceof LayoutAwareWidgetInterface) {
            $widget->setLayout($this);
        }
        return $this;
    }

    public function getWidget($name, $default = null, $throwEx = false)
    {
        if (array_key_exists($name, $this->widgets)) {
            return $this->widgets[$name];
        }
        if (true === $throwEx) {
            throw new RendererException("Widget does bound to this instance: $name");
        }
        return $default;
    }


    public function render(array $variables = [])
    {

        if (null === $this->templateName) {
            throw new RendererException("Template not set");
        }

        $uninterpretedTemplate = $this->loader->load($this->templateName);
        if (false !== $uninterpretedTemplate) {
            $this->prepareVariables($variables);

            if ($this->renderer instanceof LayoutRendererInterface) {
                $this->renderer->setLayout($this);
            }

            $renderedTemplate = $this->renderer->render($uninterpretedTemplate, $variables);
            $this->onRenderedTemplateReady($renderedTemplate);
            return $renderedTemplate;
        }
        return $this->onLoaderFailed($this->templateName);
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @return $this
     */
    public function setLoader(LoaderInterface $loader)
    {
        $this->loader = $loader;
        return $this;
    }

    /**
     * @return $this
     */
    public function setRenderer(RendererInterface $renderer)
    {
        $this->renderer = $renderer;
        return $this;
    }
    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * This method is an opportunity to return the uninterpreted content (or do something else), in
     * case the loader failed.
     *
     * @return string, the fallback uninterpreted content
     */
    protected function onLoaderFailed($templateName)
    {
        throw new LayoutException("Failed to load template: $templateName");
    }


    /**
     * This is the opportunity to decorate the renderered template.
     * Note: this method is experimental, I did not need it concretely.
     */
    protected function onRenderedTemplateReady(&$renderedTemplate)
    {

    }


    protected function prepareVariables(array &$variables)
    {

    }


}