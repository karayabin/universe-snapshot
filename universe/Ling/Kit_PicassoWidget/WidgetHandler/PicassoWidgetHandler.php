<?php

namespace Ling\Kit_PicassoWidget\WidgetHandler;


use Ling\HtmlPageTools\Copilot\HtmlPageCopilot;
use Ling\Kit\WidgetHandler\WidgetHandlerInterface;
use Ling\Kit_PicassoWidget\Exception\PicassoWidgetException;
use Ling\Kit_PicassoWidget\Widget\PicassoWidget;


/**
 * The PicassoWidgetHandler class.
 *
 * This class can render a widget from a widgetConf array.
 * A widgetConf array has the following structure:
 *
 * - className: string, the name of the widget class. Example: Ling\Kit_PicassoWidget\Widget\ExamplePicassoWidget
 * - template: string, the relative path of the template to use.
 *      A picasso widget always uses a template to displays itself.
 *      The path is relative to the "widget/templates" directory next to the widget instance
 * vars: array, an array of variables for the front widget to use
 *
 *
 *
 * The widget directory
 * ---------------
 *
 * With the Picasso system, there is always a widget directory next to the Picasso widget class.
 * This directory has the following structure:
 *
 *
 * ```txt
 * - widget/
 * ----- templates/            # this directory contains the templates available for this widget
 * --------- prototype.php     # just an example, can be any name really...
 * --------- default.php       # just an example, can be any name really...
 * ----- js-init/
 * --------- default.js        # can be any name, but it's the same name as a template
 * ----- css/                  # this directory contains the css code blocks to add to the chosen template
 * --------- default.css       # can be any name, but it's the same name as a template
 * ```
 *
 *
 * The files in the "templates" directory are the available templates for this widget.
 * The files in the "js-init" directory are automatically loaded as js code blocks via @page(the HtmlPageCopilot).
 * Those js files are used to initialize the widget. For instance, if your widget displays a lightbox gallery,
 * it might use a jquery snippet to initialize the gallery.
 *
 * The files in the "css" directory are automatically loaded as css code blocks via @page(the HtmlPageCopilot).
 * Those css files shall be compiled into one "widget-compiled.css" (or another name) file by the host application,
 * so that the css code of widgets can be nicely separated from the html code.
 *
 *
 *
 *
 *
 */
class PicassoWidgetHandler implements WidgetHandlerInterface
{


    /**
     * @implementation
     */
    public function handle(array $widgetConf, HtmlPageCopilot $copilot, array $debug): string
    {
        if (array_key_exists("className", $widgetConf)) {
            if (array_key_exists("template", $widgetConf)) {

                $className = $widgetConf['className'];
                $template = $widgetConf['template'];


                try {
                    $class = new \ReflectionClass($className);
                    $instance = $class->newInstance();
                    if ($instance instanceof PicassoWidget) {

                        $file = $class->getFileName();
                        $dir = dirname($file);
                        $widgetDir = $dir . "/widget";
                        $templateFileName = str_replace('..', '', $template); // preventing escalating the filesystem
                        $templateDir = $widgetDir . '/templates';
                        $templateFile = $templateDir . '/' . $templateFileName;
                        if (is_file($templateFile)) {


                            //--------------------------------------------
                            // CAPTURING THE CONTENT
                            //--------------------------------------------
                            $widgetVars = $widgetConf['vars'] ?? [];
                            $content = $instance->renderFile($templateFile, $widgetVars);
                            if (false === $content) {
                                $error = $instance->getErrors()[0];
                                $this->error($error, $widgetConf, $debug);
                            }


                            //--------------------------------------------
                            // REGISTERING ASSETS
                            //--------------------------------------------
                            $libs = $instance->getLibraries();
                            foreach ($libs as $libName => $assets) {
                                if (false === $copilot->hasLibrary($libName)) {
                                    foreach ($assets['css'] as $url) {
                                        $copilot->addCssLibrary($libName, $url);
                                    }
                                    foreach ($assets['js'] as $url) {
                                        $copilot->addJsLibrary($libName, $url);
                                    }
                                }
                            }


                            //--------------------------------------------
                            // REGISTERING JS INIT CODE BLOCKS
                            //--------------------------------------------
                            $templateName = explode(".", $templateFileName)[0];
                            $jsInitFile = $widgetDir . "/js-init/$templateName.js";
                            if (file_exists($jsInitFile)) {
                                $codeBlock = file_get_contents($jsInitFile);
                                $copilot->addJsCodeBlock($codeBlock);
                            }


                            //--------------------------------------------
                            // REGISTERING CSS CODE BLOCKS
                            //--------------------------------------------
                            $cssCodeBlockFile = $widgetDir . "/css/$templateName.css";
                            if (file_exists($cssCodeBlockFile)) {
                                $codeBlock = file_get_contents($cssCodeBlockFile);
                                $copilot->addCssCodeBlock($codeBlock);
                            }




                            return $content;

                        } else {
                            $this->error("Template file not found: $templateFile.", $widgetConf, $debug);
                        }
                    } else {
                        $type = gettype($instance);
                        $this->error("This widget instance \"$className\" must be an instance of PicassoWidget, $type given.", $widgetConf, $debug);
                    }
                } catch (\ReflectionException $e) {
                    $this->error("Cannot instantiate class $className.", $widgetConf, $debug);
                }
            } else {
                $this->error("Config error: the template is not defined.", $widgetConf, $debug);
            }

        } else {
            $this->error("Config error: the className is missing.", $widgetConf, $debug);
        }
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Throws an useful error message.
     *
     * @param string $msg
     * @param array $widgetConf
     * @param array $debug
     * @throws PicassoWidgetException
     */
    protected function error(string $msg, array $widgetConf, array $debug)
    {
        $name = $widgetConf['name'];
        $zone = $debug['zone'];
        $page = $debug['page'];
        throw new PicassoWidgetException($msg . " Widget \"$name\", zone \"$zone\", page \"$page\".");
    }
}