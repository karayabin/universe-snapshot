<?php

namespace Ling\Kit_PicassoWidget\WidgetHandler;


use Ling\HtmlPageTools\Copilot\HtmlPageCopilot;
use Ling\Kit\PageRenderer\KitPageRendererAwareInterface;
use Ling\Kit\PageRenderer\KitPageRendererInterface;
use Ling\Kit\WidgetHandler\WidgetHandlerInterface;
use Ling\Kit_PicassoWidget\Exception\PicassoWidgetException;
use Ling\Kit_PicassoWidget\Widget\PicassoWidget;
use Ling\Light_Kit\ConfigurationTransformer\ConfigurationTransformerInterface;
use Ling\Light_Kit\ConfigurationTransformer\PageConfigurationTransformerInterface;


/**
 * The PicassoWidgetHandler class.
 *
 * This class can render a widget from a widgetConf array.
 * A widgetConf array has the following structure:
 *
 * ```yaml
 * - className: string, the name of the widget class. Example: Ling\Kit_PicassoWidget\Widget\ExamplePicassoWidget
 * - ?widgetDir: string, the path to the widget directory. If not set, the widget directory is a directory named "widget" found next to the file containing the widget class.
 *              If set, and the path is relative (i.e. not starting with a slash),
 *              then the path is relative to the widgetBaseDir (set using the setWidgetBaseDir method of this class)
 * - template: string, the relative path of the template to use.
 *      A picasso widget always uses a template to displays itself.
 *      The path is relative to the "$widgetDir/templates" directory.
 * - vars: an array of variables to pass to the widget template
 *     - ?attr: an array of html attributes to add on the widget's outer tag. Example:
 *          - id: my_id
 *          - class: my_class my_class2
 *          - data-example-value: 668
 * ```
 *
 *
 *
 *
 * The widget directory
 * ---------------
 *
 * With the Picasso system, we use a widget directory.
 * By default, the widget directory is next to the Picasso widget class file.
 * It can be changed using the **widgetDir** property of the widget configuration array.
 *
 * This directory has the following structure:
 *
 *
 * ```txt
 * - widget/
 * ----- templates/            # this directory contains the templates available for this widget
 * --------- prototype.php     # just an example, can be any name really...
 * --------- default.php       # just an example, can be any name really...
 * ----- js/                   # this directory contains the js nuggets
 *                             # If the js file has the same name as the template, it will be loaded automatically.
 *                             # For instance, if the selected template is default.php, and there is a
 *                             # js nugget named default.js or default.js.php (same as default.js but allows php code inside)
 *                             # in the js directory, then this nugget will be loaded automatically as a js code block.
 * --------- default.js        # an example js nugget.
 * ----- css/                  # this directory contains the css nuggets to add to the chosen template.
 * ----- css/                  # if the css nugget has the same name as the template, then it will be loaded automatically (same mechanism as the js nuggets).
 * --------- default.css       # an example css nugget.
 * ```
 *
 *
 * The files in the "templates" directory are the available templates for this widget.
 * The files in the "js" directory are automatically loaded as js code blocks via @page(the HtmlPageCopilot).
 * Those are also called js nuggets.
 *
 * Those js files are used to initialize the widget. For instance, if your widget displays a lightbox gallery,
 * it might use a jquery snippet to initialize the gallery.
 * If you need the power of php in your js file, just add the php extension (for instance default.js.php).
 *
 * The files in the "css" directory are automatically loaded as css code blocks via @page(the HtmlPageCopilot).
 * Those css files shall be compiled into one "widget-compiled.css" (or another name) file by the host application,
 * so that the css code of widgets can be nicely separated from the html code.
 * Those css blocks are sometimes called css nuggets.
 *
 *
 *
 *
 *
 */
class PicassoWidgetHandler implements WidgetHandlerInterface, KitPageRendererAwareInterface
{


    /**
     * This property holds the widgetBaseDir for this instance.
     * This is the absolute path to the widget base directory,
     * which is used when the widgetConf specifies a relative widgetDir property.
     * See more information in the class description.
     *
     *
     * @var string
     */
    protected $widgetBaseDir;

    /**
     * This property holds the showCssNuggetHeaders for this instance.
     * Whether or not to show some headers along with the css nuggets (aka css code blocks).
     * This might be useful for debugging, if you print all your nuggets in a compiled file,
     * to better spot the provenance for each nugget.
     *
     *
     * @var bool = false
     */
    protected $showCssNuggetHeaders;

    /**
     * This property holds the showJsNuggetHeaders for this instance.
     * Whether or not to show some headers along with the js nuggets (aka js init code blocks).
     *
     * This might be useful for debugging.
     * @var bool = false
     */
    protected $showJsNuggetHeaders;

    /**
     * This property holds the kitPageRenderer for this instance.
     * @var KitPageRendererInterface
     */
    protected $kitPageRenderer;


    /**
     * Builds the PicassoWidgetHandler instance.
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        $this->widgetBaseDir = "";
        $this->showCssNuggetHeaders = $options['showCssNuggetHeaders'] ?? false;
        $this->showJsNuggetHeaders = $options['showJsNuggetHeaders'] ?? false;
        $this->kitPageRenderer = null;
    }


    /**
     * @implementation
     */
    public function setKitPageRenderer(KitPageRendererInterface $renderer)
    {
        $this->kitPageRenderer = $renderer;
    }


    /**
     * Sets the widgetBaseDir.
     *
     * @param string $widgetBaseDir
     */
    public function setWidgetBaseDir(string $widgetBaseDir)
    {
        $this->widgetBaseDir = $widgetBaseDir;
    }


    /**
     * @implementation
     */
    public function process(array &$widgetConf, array $debug): void
    {
        if (array_key_exists("className", $widgetConf)) {
            $className = $widgetConf['className'];

            try {
                $class = new \ReflectionClass($className);
                $widgetDir = $this->getWidgetDir($widgetConf, $class);
                $brainFile = $widgetDir . "/brain/brain.php";
                if (true === file_exists($brainFile)) {
                    $vars = $widgetConf['vars'] ?? [];
                    $this->processBrainFile($brainFile, $vars);
                    $widgetConf['vars'] = $vars;
                }


            } catch (\ReflectionException) {
                $this->error("Cannot instantiate class $className.", $widgetConf, $debug);
            }
        } else {
            $this->error("Config error: the className is missing.", $widgetConf, $debug);
        }

    }


    /**
     * @implementation
     */
    public function render(array $widgetConf, HtmlPageCopilot $copilot, array $debug): string
    {
        if (array_key_exists("className", $widgetConf)) {
            if (array_key_exists("template", $widgetConf)) {
                $className = $widgetConf['className'];
                $template = $widgetConf['template'];

                try {
                    $class = new \ReflectionClass($className);
                    $instance = $class->newInstance();
                    if ($instance instanceof PicassoWidget) {


                        //--------------------------------------------
                        // SET THE COPILOT
                        //--------------------------------------------
                        /**
                         * In some cases, it's practical for the templates to have
                         * a direct access to a copilot instance.
                         * For instance, when a widget uses a third-party asset library.
                         */
                        $instance->setCopilot($copilot);


                        //--------------------------------------------
                        // SET THE KIT PAGE RENDERER
                        //--------------------------------------------
                        if ($instance instanceof KitPageRendererAwareInterface) {
                            $instance->setKitPageRenderer($this->kitPageRenderer);
                        }


                        //--------------------------------------------
                        // PREPARE THE WIDGET
                        //--------------------------------------------
                        $instance->prepare($widgetConf, $copilot);


                        //--------------------------------------------
                        // FINDING THE WIDGET DIR
                        //--------------------------------------------
                        $widgetDir = $this->getWidgetDir($widgetConf, $class);


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


                            $templateName = explode(".", $templateFileName)[0];


                            //--------------------------------------------
                            // REGISTERING JS NUGGET (INIT CODE BLOCKS)
                            //--------------------------------------------
                            if (array_key_exists("js", $widgetConf)) {
                                $jsNuggetName = $widgetConf['js'];
                            } else {
                                $jsNuggetName = $templateName;
                            }
                            if (null !== $jsNuggetName) {

                                $hasNugget = false;
                                $jsInitFile = $widgetDir . "/js/$jsNuggetName.js";
                                if (file_exists($jsInitFile)) {
                                    $hasNugget = true;
                                    $codeBlock = file_get_contents($jsInitFile);
                                } else {
                                    $jsInitFile .= ".php";
                                    if (file_exists($jsInitFile)) {
                                        $codeBlock = $instance->renderFile($jsInitFile, $widgetVars);
                                        $hasNugget = true;
                                    }

                                }

                                if (true === $hasNugget) {
                                    if (true === $this->showJsNuggetHeaders) {
                                        $codeBlock = "/** $className */" . PHP_EOL . $codeBlock;
                                    }
                                    $copilot->addJsCodeBlock($codeBlock);
                                }
                            }


                            //--------------------------------------------
                            // REGISTERING CSS NUGGETS (CODE BLOCKS)
                            //--------------------------------------------
                            if (array_key_exists("skin", $widgetConf) && false === empty($widgetConf['skin'])) {
                                $skin = $widgetConf['skin'];
                            } else {
                                $skin = $templateName;
                            }
                            if (null !== $skin) {
                                // static nuggets
                                $hasNugget = false;
                                $cssCodeBlockFile = $widgetDir . "/css/$skin.css";
                                if (file_exists($cssCodeBlockFile)) {
                                    $codeBlock = file_get_contents($cssCodeBlockFile);
                                    $hasNugget = true;
                                } else {
                                    // dynamic nuggets
                                    $cssCodeBlockFile .= ".php";
                                    if (file_exists($cssCodeBlockFile)) {
                                        $codeBlock = $instance->renderFile($cssCodeBlockFile, $widgetVars);
                                        $hasNugget = true;
                                    }
                                }

                                if (true === $hasNugget) {
                                    if (true === $this->showCssNuggetHeaders) {
                                        $codeBlock = "/** $className */" . PHP_EOL . $codeBlock;
                                    }
                                    $copilot->addCssCodeBlock($codeBlock);
                                }
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




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the widget dir.
     *
     *
     * @param array $widgetConf
     * @param \ReflectionClass $class
     * @return string
     */
    private function getWidgetDir(array $widgetConf, \ReflectionClass $class): string
    {
        if (array_key_exists("widgetDir", $widgetConf)) {
            $widgetDir = $widgetConf['widgetDir'];
            if ('/' !== substr($widgetDir, 0, 1)) {
                $widgetDir = $this->widgetBaseDir . "/" . $widgetDir;
            }
        } else {
            $file = $class->getFileName();
            $dir = dirname($file);
            $widgetDir = $dir . "/widget";
        }
        return $widgetDir;
    }


    /**
     * Process the brain file.
     *
     * Note: The brain file can access the widget variables via **$vars**, and the current instance via **$this**.
     *
     *
     * @param string $file
     * @param array $vars
     */
    private function processBrainFile(string $file, array &$vars)
    {
        require_once $file;
    }
}