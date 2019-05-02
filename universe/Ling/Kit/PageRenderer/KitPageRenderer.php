<?php


namespace Ling\Kit\PageRenderer;


use Ling\HtmlPageTools\Copilot\HtmlPageCopilot;
use Ling\Kit\Exception\KitException;
use Ling\Kit\WidgetConfDecorator\WidgetConfDecoratorInterface;
use Ling\Kit\WidgetHandler\WidgetHandlerInterface;

/**
 * The KitPageRenderer class.
 *
 *
 * The configuration for a given page looks like this:
 *
 * ```yaml
 *
 * label: $pageLabel               # The human name for the page. It is used in error messages.
 * layout: $layoutRelPath          # The relative path to the layout file for this page. The path is relative to a root which shall be defined in the general configuration of kit.
 * layout_vars: []                 # an array of layout vars that will be accessible to the layout (a layout might be configured to some degree by such variables, depending on the layout)
 * zones:
 * $zoneName:                  # note: the zone name is called from the layout file
 * -
 * name: $widgetName       # the widget name
 * type: $widgetType       # the widget type
 * ?active: $bool          # whether to use the widget, defaults to true
 * ...                     # any other configuration value that you want
 *
 * ```
 *
 *
 * See more details in the @page(page configuration array) document.
 *
 *
 *
 *
 */
class KitPageRenderer
{

    /**
     *
     * This property holds the widgetHandlers for this instance.
     * It's an array of type => WidgetHandlerInterface
     * @var WidgetHandlerInterface[]
     */
    protected $widgetHandlers;

    /**
     * This property holds the pageConf for this instance.
     * See more about the array structure in the @page(page configuration array) section.
     * @var array
     */
    protected $pageConf;


    /**
     * This property holds the copilot for this instance.
     * @var HtmlPageCopilot
     */
    protected $copilot;

    /**
     * This property holds the strictMode for this instance.
     *
     * If true, a widget exception is not caught.
     * If false, a widget exception is caught and the errorHandler is called (use the setErrorHandler method
     * to define the errorHandler).
     *
     *
     * @var bool = true
     */
    protected $strictMode;

    /**
     * This property holds the errorHandler for this instance.
     *
     * The error handler will receive the widget exception and return an error message to display
     * instead of the widget html code.
     *
     * The errorHandler is only called if the strictMode is set to false.
     *
     * The signature of the errorHandler is the following:
     *
     *
     *
     * errorHandler ( \Exception $e, array widgetConf, array debug  ): string
     *
     * - The debug array contains the following:
     *      - page: the label of the page containing the widget
     *      - zone: the name of the zone containing the widget
     *
     *
     * Note: if no error handler is defined, this class will use a default handling mechanism instead.
     *
     * @var callable
     */
    protected $errorHandler;

    /**
     * This property holds the zones for this instance.
     * It's an array of zoneName => zone html code.
     *
     * @var array
     */
    protected $zones;

    /**
     * This property holds the layoutRootDir for this instance.
     * The path to the directory containing all layouts used by this instance.
     * Generally, you can set this to your app directory.
     *
     *
     * @var string
     */
    protected $layoutRootDir;

    /**
     * This property holds the widgetConfDecorators for this instance.
     * It's an array of WidgetConfDecoratorInterface instances.
     *
     * @var WidgetConfDecoratorInterface[]
     */
    protected $widgetConfDecorators;


    /**
     * Builds the KitPageRenderer instance.
     */
    public function __construct()
    {
        $this->widgetHandlers = [];
        $this->copilot = new HtmlPageCopilot();
        $this->pageConf = null;
        $this->strictMode = true;
        $this->errorHandler = null;
        $this->zones = [];
        $this->layoutRootDir = null;
        $this->widgetConfDecorators = [];
    }

    /**
     * Sets the pageConf.
     *
     * @param array $pageConf
     */
    public function setPageConf(array $pageConf)
    {
        $this->pageConf = $pageConf;
    }

    /**
     * Sets the strictMode.
     *
     * @param bool $strictMode
     * @return $this
     */
    public function setStrictMode(bool $strictMode)
    {
        $this->strictMode = $strictMode;
        return $this;
    }

    /**
     * Sets the errorHandler.
     *
     * @param callable $errorHandler
     */
    public function setErrorHandler(callable $errorHandler)
    {
        $this->errorHandler = $errorHandler;
    }


    /**
     * Registers a widget handler for the given (widget) type.
     *
     * @param string $type
     * @param WidgetHandlerInterface $handler
     */
    public function registerWidgetHandler(string $type, WidgetHandlerInterface $handler)
    {
        $this->widgetHandlers[$type] = $handler;
    }

    /**
     * Sets the layoutRootDir.
     *
     * @param string $layoutRootDir
     * @return $this
     */
    public function setLayoutRootDir(string $layoutRootDir)
    {
        $this->layoutRootDir = $layoutRootDir;
        return $this;
    }


    /**
     * Adds a widget configuration decorator to this instance.
     *
     * @param WidgetConfDecoratorInterface $decorator
     */
    public function addWidgetConfDecorator(WidgetConfDecoratorInterface $decorator)
    {
        $this->widgetConfDecorators[] = $decorator;
    }


    /**
     *
     * Prints the page.
     *
     *
     * @throws KitException
     */
    public function printPage()
    {
        if (null !== $this->pageConf) {
            if (null !== $this->layoutRootDir) {

                $pageLabel = $this->pageConf['label'];
                $layout = $this->layoutRootDir . "/" . $this->pageConf['layout'];
                $layoutVars = $this->pageConf['layout_vars'] ?? [];

                if (file_exists($layout)) {


                    /**
                     * Basic page configuration.
                     * Note: the user shall also be able to define the robots meta tag in the same
                     * way that she defined the title and/or the description.
                     *
                     */
                    if (array_key_exists("title", $this->pageConf)) {
                        $this->copilot->setTitle($this->pageConf['title']);
                    }
                    if (array_key_exists("description", $this->pageConf)) {
                        $this->copilot->setDescription($this->pageConf['description']);
                    }


                    // let the widgets configure the copilot
                    $this->captureZones();


                    /**
                     * Now that the copilot is configured, we can call the layout, which will in turn
                     * call the [top and bottom parts](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Renderer/HtmlPageRenderer.md#the-top-and-bottom-concept) of
                     * the html page (amongst other things).
                     */
                    include $layout;


                } else {
                    throw new KitException("The layout file doesn't exist: $layout in page $pageLabel.");
                }
            } else {
                throw new KitException("Bad configuration: the layoutRootDir is not set. Use the setLayoutRootDir method.");
            }
        } else {
            throw new KitException("Bad configuration: the configuration is not set. Use the setConf method.");
        }
    }


    /**
     * Prints a zone.
     *
     * @param string $zoneName
     * @throws KitException
     */
    public function printZone(string $zoneName)
    {
        if (null !== $this->pageConf) {
            $pageLabel = $this->pageConf['label'];
            if (array_key_exists($zoneName, $this->zones)) {
                echo $this->zones[$zoneName];
            } else {
                throw new KitException("You called an undefined zone: $zoneName in page $pageLabel.");
            }
        } else {
            throw new KitException("Bad configuration: the configuration is not set. Use the setConf method.");
        }
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Captures the zones defined in the configuration and stores them temporarily.
     *
     * The goal being:
     *
     * - to let widgets of the zones configure the Copilot object (so that the layout, which contains the top and bottom, can be displayed properly).
     * - then inject the captured zones' html into the layout
     *
     *
     * @throws \Exception
     */
    protected function captureZones()
    {
        $zones = $this->pageConf['zones'] ?? [];
        $pageLabel = $this->pageConf['label'];

        foreach ($zones as $zoneName => $widgets) {


            // capture the zone html code in s
            $s = '';

            foreach ($widgets as $widgetConf) {


                //--------------------------------------------
                // DECORATE THE WIDGET CONFIGURATION
                //--------------------------------------------
                /**
                 * Not implemented yet, because judged too dangerous for design:
                 * by letting external tools update the widget configuration,
                 * your stored widget configuration become less readable: because what you see is NOT what you get.
                 * Before using this feature, be absolutely sure that you can't decorate the widget configuration manually.
                 *
                 */
//                foreach ($this->widgetConfDecorators as $decorator) {
//                    $decorator->decorate($widgetConf);
//                }


                //--------------------------------------------
                // PROCESS THE WIDGET CONFIGURATION
                //--------------------------------------------
                $active = $widgetConf['active'] ?? true;
                if (true === $active) {
                    $type = $widgetConf['type'];
                    if (array_key_exists($type, $this->widgetHandlers)) {
                        $handler = $this->widgetHandlers[$type];


                        $debugArray = [
                            "page" => $pageLabel,
                            "zone" => $zoneName,
                        ];


                        if (true === $this->strictMode) {
                            $htmlCode = $handler->handle($widgetConf, $this->copilot, $debugArray);
                        } else {
                            try {
                                $htmlCode = $handler->handle($widgetConf, $this->copilot, $debugArray);
                            } catch (\Exception $e) {
                                if (null !== $this->errorHandler) {
                                    $htmlCode = call_user_func($this->errorHandler, $e, $widgetConf, $debugArray);
                                } else {
                                    $widgetName = $widgetConf['name'];
                                    $htmlCode = '<span class="widget-error">An error occurred with widget ' . $widgetName . '.</span>';
                                }
                            }
                        }


                        $s .= $htmlCode;


                    } else {
                        $widgetName = $widgetConf['name'];
                        throw new KitException("This widget type is not handled: $type, for widget $widgetName in page $pageLabel.");
                    }

                }
            }


            $this->zones[$zoneName] = $s;


        }
    }
}