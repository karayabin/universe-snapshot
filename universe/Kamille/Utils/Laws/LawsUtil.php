<?php


namespace Kamille\Utils\Laws;


use Kamille\Architecture\ApplicationParameters\ApplicationParameters;
use Kamille\Ling\Z;
use Kamille\Mvc\BodyEndSnippetsCollector\BodyEndSnippetsCollectorInterface;
use Kamille\Mvc\HtmlPageHelper\HtmlPageHelper;
use Kamille\Mvc\Layout\Layout;
use Kamille\Mvc\Layout\LayoutInterface;
use Kamille\Mvc\LayoutProxy\ConfigAwareLayoutProxyInterface;
use Kamille\Mvc\LayoutProxy\LawsLayoutProxy;
use Kamille\Mvc\LayoutProxy\LawsLayoutProxyInterface;
use Kamille\Mvc\LayoutProxy\LayoutProxyInterface;
use Kamille\Mvc\LayoutProxy\RendererAwareLayoutProxyInterface;
use Kamille\Mvc\WidgetDecorator\WidgetDecoratorInterface;
use Kamille\Mvc\WidgetInstanceDecorator\WidgetInstanceDecoratorInterface;
use Kamille\Utils\Laws\Config\LawsConfig;
use Kamille\Utils\ShortCodeProvider\ShortCodeProviderInterface;
use Loader\FileLoader;
use Loader\PublicFileLoaderInterface;
use Kamille\Mvc\Renderer\PhpLayoutRenderer;
use Kamille\Mvc\Widget\Widget;
use Kamille\Services\XLog;
use Kamille\Utils\Laws\Exception\LawsUtilException;


class LawsUtil implements LawsUtilInterface
{

    private $_file; // passed as a debug info
    private $_viewId; // passed as a debug info
    /**
     * @var LayoutProxyInterface
     */
    private $layoutProxy;

    /**
     * @var ShortCodeProviderInterface[]
     */
    private $shortCodeProviders;


    public static function create()
    {
        return new static();
    }

    public function addShortCodeProvider(ShortCodeProviderInterface $shortCodeProvider)
    {
        $this->shortCodeProviders[$shortCodeProvider->getName()] = $shortCodeProvider;
        return $this;
    }


    public function renderLawsViewById($viewId, LawsConfig $config = null, array $options = [])
    {

        //--------------------------------------------
        // compute config files
        //--------------------------------------------
        $theme = ApplicationParameters::get("theme");
        $appDir = ApplicationParameters::get("app_dir");
        $file = $appDir . "/config/laws/themes/$theme/$viewId.conf.php";
        if (!file_exists($file)) {
            $file = $appDir . "/config/laws/$viewId.conf.php";
        }

        if (file_exists($file)) {
            $this->_file = $file;
            $this->_viewId = $viewId;


            $conf = [];
            include $file;
            $zeConf = $conf;

            // allow user override
            $f = $appDir . "/config/laws/themes/$theme/$viewId.conf.user.php";
            if (file_exists($f)) {
                include $f;
                $zeConf = array_replace_recursive($zeConf, $conf);
            } else {
                $f = $appDir . "/config/laws/$viewId.conf.user.php";
                if (file_exists($f)) {
                    include $f;
                    $zeConf = array_replace_recursive($zeConf, $conf);
                }
            }
            $conf = $zeConf;


            //--------------------------------------------
            // let the controller override
            //--------------------------------------------
            if (null !== $config) {
                $config->apply($conf);
            }

            //--------------------------------------------
            // render
            //--------------------------------------------
            return $this->renderLawsView($conf, $options);
        }
        throw new LawsUtilException("laws config file not found with viewId $viewId ($file)");
    }

    public function setLawsLayoutProxy(LawsLayoutProxyInterface $layoutProxy)
    {
        $this->layoutProxy = $layoutProxy;
        return $this;
    }


    public function renderLawsView(array $config, array $options = [])
    {
        $file = $this->_file;
        $viewId = $this->_viewId;
        $appDir = ApplicationParameters::get("app_dir");

        $options = array_merge([
            'autoloadCss' => true,
            'widgetClass' => 'Kamille\Mvc\Widget\Widget',
            'layout' => 'Kamille\Mvc\Layout\HtmlLayout',
            'bodyEndSnippetsCollector' => null, // a BodyEndSnippetsCollectorInterface instance
            'widgetInstanceDecorator' => null, // a WidgetDecorator instance
        ], $options);
        $widgetInstanceDecorator = $options['widgetInstanceDecorator'];
        $autoloadCss = $options['autoloadCss'];
        $widgetClass = $options['widgetClass'];


        // todo: remove autoloadCss, it's deprecated, isn't it?
//        $autoloadCss = false;


        $layoutTemplate = $config['layout']['tpl'];
//        $positions = (array_key_exists('positions', $config)) ? $config['positions'] : [];
        $widgets = (array_key_exists('widgets', $config)) ? $config['widgets'] : [];

        $layoutConf = (array_key_exists('conf', $config['layout'])) ? $config['layout']['conf'] : [];

        $theme = ApplicationParameters::get("theme");
        $wloader = FileLoader::create()->addDir($appDir . "/theme/$theme/widgets");

//        $ploader = FileLoader::create()->addDir(Z::appDir() . "/theme/$theme/positions");


        $commonRenderer = PhpLayoutRenderer::create();
        $proxy = $this->getLayoutProxy();
        if ($proxy instanceof RendererAwareLayoutProxyInterface) {
            $proxy->setRenderer($commonRenderer);
        }
        if ($proxy instanceof ConfigAwareLayoutProxyInterface) {
            $proxy->setConfig($config);
        }


        if (true === ApplicationParameters::get('debug')) {

            $sWidgets = "";
            foreach ($widgets as $id => $widgetInfo) {
                $name = "unknown";
                if (true === array_key_exists('tpl', $widgetInfo)) {
                    $name = $widgetInfo["tpl"];
                }
                $sWidgets .= PHP_EOL . "----- id: $id; tplName: $name";
            }

            $viewIdFile = $file;
            if (null !== $viewIdFile) {
                $viewIdFile = str_replace($appDir, '', $viewIdFile);
                $viewIdFile = ' (' . $viewIdFile . ')';
            }

//            $sPos = "";
//            $c = 0;
//            foreach ($positions as $name => $info) {
//                if (0 !== $c) {
//                    $sPos .= ", ";
//                }
//                $sPos .= "name: $name; tplName: " . $info['tpl'];
//                $c++;
//            }


            $trace = [];
            $theTheme = ApplicationParameters::get("theme", "no theme");
            $trace[] = "[Kamille.LawsUtil] - trace with theme: $theTheme, viewId: $viewId" . $viewIdFile . ":";
            $trace[] = "- layout: $layoutTemplate";
//            $trace[] = "- positions: " . $sPos;
            $trace[] = "- widgets: " . $sWidgets;


            XLog::trace(implode(PHP_EOL, $trace));
        }


        //--------------------------------------------
        // LAYOUT
        //--------------------------------------------
        $layoutLoader = FileLoader::create()->addDir(Z::appDir() . "/theme/$theme/layouts");


        $layout = new $options['layout'];
        if ($layout instanceof LayoutInterface) {

            /**
             * @var $layout LayoutInterface
             */
            if ($layout instanceof Layout) {

                $layout->setOnPrepareVariablesCallback(function (array &$variables) use ($layoutLoader) {
                    if ($layoutLoader instanceof PublicFileLoaderInterface) {
                        $variables["__FILE__"] = $layoutLoader->getFile();
                        $variables["__DIR__"] = dirname($variables["__FILE__"]);
                    }
                })
                    ->setOnRenderedTemplateReadyCallback(function (&$content) use ($options) {

                        $collector = $options['bodyEndSnippetsCollector'];
                        if ($collector instanceof BodyEndSnippetsCollectorInterface) {
                            $snippets = $collector->getSnippets();
                            foreach ($snippets as $snippet) {
                                HtmlPageHelper::addBodyEndSnippet($snippet);
                            }
                        }
                    });
            }

            $layout->setTemplate($layoutTemplate)
                ->setLoader($layoutLoader)
                ->setRenderer($commonRenderer);
        } else {
            XLog::error(sprintf("Given layout must implement LayoutInterface. %s given", get_class($layout)));
        }

        if (true === $autoloadCss) {
            $p = explode("/", $layoutTemplate);
            $css = "theme/$theme/layouts/" . $p[0] . "/" . $p[0] . '.' . $p[1] . ".css";
            if (file_exists(Z::appDir() . "/www/$css")) {
                HtmlPageHelper::css("/$css");
            }
        }

        //--------------------------------------------
        // POSITIONS
        //--------------------------------------------
//        foreach ($positions as $positionName => $pInfo) {
//            $tplName = $pInfo['tpl'];
//            $pVars = (array_key_exists('conf', $pInfo)) ? $pInfo['conf'] : [];
//
//            $proxy->bindPosition($positionName, Position::create()
//                ->setTemplate($tplName)
//                ->setLoader($ploader)
//                ->setVariables($pVars)
//                ->setRenderer($commonRenderer));
//
//
//            if (true === $autoloadCss) {
//                $p = explode("/", $tplName);
//                $css = "theme/$theme/positions/" . $p[0] . "/" . $p[0] . '.' . $p[1] . ".css";
//                if (file_exists(Z::appDir() . "/www/$css")) {
//                    HtmlPageHelper::css("/$css");
//                }
//            }
//        }
        $commonRenderer->setLayoutProxy($proxy);

        //--------------------------------------------
        // WIDGETS
        //--------------------------------------------
        foreach ($widgets as $id => $widgetInfo) {
            if (true === array_key_exists('tpl', $widgetInfo)) {

                $name = $widgetInfo['tpl'];
                $conf = (array_key_exists('conf', $widgetInfo)) ? $widgetInfo['conf'] : [];
                if (null !== $this->shortCodeProviders) {
                    $conf = $this->processConfWithShortCodes($conf);
                }


                $widget = new $widgetClass;
                if ($widget instanceof Widget) {
                    $widget->setOnPrepareVariablesCallback(function (array &$variables) use ($wloader) {
                        if ($wloader instanceof PublicFileLoaderInterface) {
                            $variables["__FILE__"] = $wloader->getFile();
                            $variables["__DIR__"] = dirname($variables["__FILE__"]);
                        }
                    });

                    $widget->setTemplate($name)
                        ->setVariables($conf)
                        ->setLoader($wloader)
                        ->setRenderer($commonRenderer);


                    if ($widgetInstanceDecorator instanceof WidgetInstanceDecoratorInterface) {
                        /**
                         * Todo: check if it's not too late to decorate the widget;
                         * maybe because the template name is already set it already impacts the widget structure?
                         * (it shouldn't anyway because that would be a bad design...)
                         */
                        $widgetInstanceDecorator->decorate($widget, $conf);
                    }


                    $layout->bindWidget($id, $widget);


                    if (true === $autoloadCss) {
                        $p = explode("/", $name);
                        $css = "theme/$theme/widgets/" . $p[0] . "/" . $p[0] . '.' . $p[1] . ".css";
                        if (file_exists(Z::appDir() . "/www/$css")) {
                            HtmlPageHelper::css("/$css");
                        }
                    }
                } else {
                    /**
                     * We want the widget to be instance of Kamille\Mvc\Widget\Widget, so that we can
                     * provide the __FILE__ variable for all laws templates.
                     */
                    XLog::error('LawsUtil: widget with id must be an instance of the Kamille\Mvc\Widget\Widget class');
                }

            } else {
                $end = (null !== $viewId) ? " (viewId=$viewId)" : "";
                XLog::error("LawsUtil: tpl property not found in widget configuration: widgetId=$id" . $end);
            }
        }

        return $layout->render($layoutConf);

    }


    //--------------------------------------------
    //
    //--------------------------------------------
    private function getLayoutProxy()
    {
        if (null === $this->layoutProxy) {
            $this->layoutProxy = LawsLayoutProxy::create();
        }
        return $this->layoutProxy;
    }

    private function processConfWithShortCodes($conf)
    {
        if (is_array($conf)) {
            $ret = $conf;
            foreach ($conf as $k => $v) {
                if (is_string($v) && false !== ($pos = strpos($v, ':'))) {
                    $providerName = substr($v, 0, $pos);
                    if (array_key_exists($providerName, $this->shortCodeProviders)) {
                        $shortCode = substr($v, $pos + 1);
                        $shortCodeProvider = $this->shortCodeProviders[$providerName];
                        $wasProcessed = false;
                        $rett = $shortCodeProvider->process($shortCode, $wasProcessed);
                        if (true === $wasProcessed) {
                            $ret[$k] = $rett;
                        }
                    }
                }
            }
            return $ret;
        } else {
            $ret = $this->processShortCode($conf, $wasProcessed);
            if (true === $wasProcessed) {
                return $ret;
            }
        }
    }

    private function processShortCode($mixed, &$wasProcessed = false)
    {
        if ((is_string($mixed) && false !== ($pos = strpos($mixed, ':')))) {
            $providerName = substr($mixed, 0, $pos);
            if (array_key_exists($providerName, $this->shortCodeProviders)) {
                $shortCode = substr($mixed, $pos + 1);
                $shortCodeProvider = $this->shortCodeProviders[$providerName];
                $ret = $shortCodeProvider->process($shortCode, $wasProcessed);
                if (true === $wasProcessed) {
                    return $ret;
                }
            }
        }
        return false;
    }
}