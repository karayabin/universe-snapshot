<?php


namespace Kamille\Mvc\Widget;

use Kamille\Mvc\Loader\LoaderInterface;
use Kamille\Mvc\Renderer\Exception\RendererException;
use Kamille\Mvc\Renderer\RendererInterface;
use Kamille\Mvc\Widget\Exception\WidgetException;


/**
 * In this implementation, we use the following pattern:
 * https://github.com/lingtalfi/loader-renderer-pattern/blob/master/loader-renderer.pattern.md
 */
class Widget implements WidgetInterface
{
    private $templateName;
    protected $variables;


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
        $this->variables = [];
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

    public function render()
    {
        $variables = $this->variables;
        if (null === $this->templateName) {
            throw new RendererException("Template not set");
        }

        $uninterpretedTemplate = $this->loader->load($this->templateName);
        if (false !== $uninterpretedTemplate) {
            $this->prepareVariables($variables);

            $renderedTemplate = $this->renderer->render($uninterpretedTemplate, $variables);
            $this->onRenderedTemplateReady($renderedTemplate);
            return $renderedTemplate;
        }
        return $this->onLoaderFailed($this->templateName);
    }

    public function setVariables(array $variables)
    {
        $this->variables = $variables;
        return $this;
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
        throw new WidgetException("Failed to load template: $templateName");
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