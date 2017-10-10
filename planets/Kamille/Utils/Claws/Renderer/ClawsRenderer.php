<?php


namespace Kamille\Utils\Claws\Renderer;


use Kamille\Architecture\ApplicationParameters\ApplicationParameters;
use Kamille\Ling\Z;
use Kamille\Mvc\Layout\HtmlLayout;
use Kamille\Mvc\Layout\Layout;
use Kamille\Mvc\Layout\LayoutInterface;
use Kamille\Mvc\LayoutProxy\ConfigAwareLayoutProxyInterface;
use Kamille\Mvc\LayoutProxy\LawsLayoutProxy;
use Kamille\Mvc\LayoutProxy\LayoutProxyInterface;
use Kamille\Mvc\LayoutProxy\RendererAwareLayoutProxyInterface;
use Kamille\Mvc\Renderer\PhpLayoutRenderer;
use Kamille\Mvc\Widget\Widget;
use Kamille\Services\XLog;
use Kamille\Utils\Claws\Claws;
use Kamille\Utils\Claws\ClawsInterface;
use Loader\FileLoader;
use Loader\LoaderInterface;
use Loader\PublicFileLoaderInterface;

class ClawsRenderer
{
    /**
     * @var Claws
     */
    private $claws;
    private $widgetDefaultLoader;
    private $layoutDefaultLoader;
    private $commonRenderer;
    private $layoutProxy;
    private $layout;

    public function setClaws(ClawsInterface $claws)
    {
        $this->claws = $claws;
        return $this;
    }

    public function setLayoutDefaultLoader(LoaderInterface $layoutDefaultLoader)
    {
        $this->layoutDefaultLoader = $layoutDefaultLoader;
        return $this;
    }

    public function setLayoutProxy(LayoutProxyInterface $layoutProxy)
    {
        $this->layoutProxy = $layoutProxy;
        return $this;
    }

    public function setLayout(LayoutInterface $layout)
    {
        $this->layout = $layout;
        return $this;
    }


    public function render()
    {
        $errMessage = null;
        if (null !== $this->claws) {


            $appDir = ApplicationParameters::get("app_dir");
            $theme = ApplicationParameters::get("theme");
            $wloader = $this->getWidgetDefaultLoader($appDir, $theme);
            $layoutLoader = $this->getLayoutDefaultLoader($appDir, $theme);
            $proxy = $this->getLayoutProxy();
            $commonRenderer = $this->getCommonRenderer();
            $commonRenderer->setLayoutProxy($proxy);
            $layout = $this->getLayout();

            /**
             * This comes from a port from LawsUtil,
             * it's supposed to be the full laws config array.
             * Todo: watch if this is going to be a problem
             */
            $config = [];


            if ($proxy instanceof RendererAwareLayoutProxyInterface) {
                $proxy->setRenderer($commonRenderer);
            }
            if ($proxy instanceof ConfigAwareLayoutProxyInterface) {
                $proxy->setConfig($config);
            }


            $this->debug();


            //--------------------------------------------
            // RENDERING
            //--------------------------------------------
            if ($layout instanceof LayoutInterface) {
                if ($layout instanceof Layout) {
                    $layout->setOnPrepareVariablesCallback(function (array &$variables) use ($layoutLoader) {
                        if ($layoutLoader instanceof PublicFileLoaderInterface) {
                            $variables["__FILE__"] = $layoutLoader->getFile();
                            $variables["__DIR__"] = dirname($variables["__FILE__"]);
                        }
                    })
                        /**
                         * The code below is part of LawsUtil.
                         * I believe we don't need it anymore.
                         * Uncomment if you think I'm wrong.
                         */
//                        ->setOnRenderedTemplateReadyCallback(function (&$content) use ($options) {
//
//                            $collector = $options['bodyEndSnippetsCollector'];
//                            if ($collector instanceof BodyEndSnippetsCollectorInterface) {
//                                $snippets = $collector->getSnippets();
//                                foreach ($snippets as $snippet) {
//                                    HtmlPageHelper::addBodyEndSnippet($snippet);
//                                }
//                            }
//                        })
                    ;
                }


                //--------------------------------------------
                // LAYOUT
                //--------------------------------------------
                $clawsLayout = $this->claws->getLayout();
                if (null !== $clawsLayout) {

                    $layoutTemplate = $clawsLayout->getTemplate();
                    $layout->setTemplate($layoutTemplate)
                        ->setLoader($layoutLoader)
                        ->setRenderer($commonRenderer);


                    //--------------------------------------------
                    // WIDGETS
                    //--------------------------------------------
                    $widgets = $this->claws->getWidgets();
                    foreach ($widgets as $id => $clawsWidget) {


                        $templateName = $clawsWidget->getTemplate();
                        $conf = $clawsWidget->getConf();
                        $widgetClass = $clawsWidget->getClass();


                        /**
                         * old code from LawsUtil, I keep it just in case
                         */
//                    if (null !== $this->shortCodeProviders) {
//                        $conf = $this->processConfWithShortCodes($conf);
//                    }


                        $widget = new $widgetClass;
                        if ($widget instanceof Widget) {
                            $widget->setOnPrepareVariablesCallback(function (array &$variables) use ($wloader) {
                                if ($wloader instanceof PublicFileLoaderInterface) {
                                    $variables["__FILE__"] = $wloader->getFile();
                                    $variables["__DIR__"] = dirname($variables["__FILE__"]);
                                }
                            });

                            $widget->setTemplate($templateName)
                                ->setVariables($conf)
                                ->setLoader($wloader)
                                ->setRenderer($commonRenderer);


                            /**
                             * Old code from LawsUtil,
                             * I believe it's not useful anymore,
                             * experience may prove me wrong, I don't know...
                             * Keep the code until you are 100% sure you don't need it.
                             */
//                        if ($widgetInstanceDecorator instanceof WidgetInstanceDecoratorInterface) {
//                            /**
//                             * Todo: check if it's not too late to decorate the widget;
//                             * maybe because the template name is already set it already impacts the widget structure?
//                             * (it shouldn't anyway because that would be a bad design...)
//                             */
//                            $widgetInstanceDecorator->decorate($widget, $conf);
//                        }


                            $layout->bindWidget($id, $widget);

                        } else {
                            /**
                             * We want the widget to be instance of Kamille\Mvc\Widget\Widget, so that we can
                             * provide the __FILE__ variable for all laws templates.
                             */
                            XLog::error('LawsUtil: widget with id must be an instance of the Kamille\Mvc\Widget\Widget class');
                        }


                    }

                    $layoutConf = $this->claws->toArray();
                    return $layout->render($layoutConf);
                } else {
                    $debugInfo = "";
                    if (array_key_exists("REQUEST_URI", $_SERVER)) {
                        $uri = $_SERVER['REQUEST_URI'];
                        $debugInfo .= "uri was $uri";
                    }
                    $errMessage = "layout template not set. $debugInfo";
                }

            } else {
                $errMessage = sprintf("Given layout must implement LayoutInterface. %s given", get_class($layout));

            }

        } else {
            $errMessage = "claws instance not set";
        }

        if (null !== $errMessage) {
            XLog::error("[Kamille] - ClawsRenderer: $errMessage");
//            throw new \Exception($errMessage);
        }
        return "";
    }


    public function setWidgetDefaultLoader(LoaderInterface $widgetDefaultLoader)
    {
        $this->widgetDefaultLoader = $widgetDefaultLoader;
        return $this;
    }

    public function setCommonRenderer(PhpLayoutRenderer $renderer)
    {
        $this->commonRenderer = $renderer;
        return $this;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    protected function debug()
    {
        if (true === ApplicationParameters::get('debug')) {

            $widgets = $this->claws->getWidgets();
            $layout = $this->claws->getLayout();
            if (null !== $layout) {


                $sWidgets = "";
                foreach ($widgets as $id => $widget) {
                    $name = $widget->getTemplate();
                    if (null === $name) {
                        $name = 'not set';
                    }
                    $sWidgets .= PHP_EOL . "----- id: $id; tplName: $name";
                }

                $trace = [];
                $theTheme = ApplicationParameters::get("theme", "not set");
                $trace[] = "[Kamille] - ClawsRenderer: trace with theme: $theTheme";
                $trace[] = "- layout: " . $layout->getTemplate();
                $trace[] = "- widgets: " . $sWidgets;
                XLog::trace(implode(PHP_EOL, $trace));
            } else {
                XLog::error("[Kamille] - ClawsRenderer: Layout not set");
            }
        }
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    private function getLayoutDefaultLoader($appDir, $theme)
    {
        if (null === $this->layoutDefaultLoader) {
            $this->layoutDefaultLoader = FileLoader::create()->addDir($appDir . "/theme/$theme/layouts");
        }
        return $this->layoutDefaultLoader;
    }

    private function getWidgetDefaultLoader($appDir, $theme)
    {
        if (null === $this->widgetDefaultLoader) {
            $this->widgetDefaultLoader = FileLoader::create()->addDir($appDir . "/theme/$theme/widgets");
        }
        return $this->widgetDefaultLoader;
    }

    private function getCommonRenderer()
    {
        if (null === $this->commonRenderer) {
            $this->commonRenderer = PhpLayoutRenderer::create();
        }
        return $this->commonRenderer;
    }

    private function getLayoutProxy()
    {
        if (null === $this->layoutProxy) {
            $this->layoutProxy = LawsLayoutProxy::create();
        }
        return $this->layoutProxy;
    }

    private function getLayout()
    {
        if (null === $this->layout) {
            $this->layout = new HtmlLayout();
        }
        return $this->layout;
    }

}