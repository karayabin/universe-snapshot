<?php


namespace Ling\Kit_PrototypeWidget\WidgetHandler;


use Ling\HtmlPageTools\Copilot\HtmlPageCopilot;
use Ling\Kit\PageRenderer\KitPageRendererAwareInterface;
use Ling\Kit\PageRenderer\KitPageRendererInterface;
use Ling\Kit\WidgetHandler\WidgetHandlerInterface;
use Ling\Kit_PrototypeWidget\Exception\PrototypeWidgetException;


/**
 * The PrototypeWidgetHandler class.
 *
 * This class will render a widget from a file called template (i.e. it will just render the file content as is).
 *
 * First, you need to configure the handler by defining the base directory containing all templates.
 * You do so by calling the setRootDir method. Generally you would use the application directory as the base for all templates.
 *
 * Then, from your @page(widget configuration array), simply add the template property with the value representing the
 * relative template file to include (relative to the base dir).
 *
 * So for instance here is a widget configuration array (assuming that you have registered the widget with type=prototype):
 *
 * ```yaml
 * type: prototype
 * template: templates/test/widget_one.html
 * ```
 *
 *
 *
 */
class PrototypeWidgetHandler implements WidgetHandlerInterface, KitPageRendererAwareInterface
{


    /**
     * This property holds the rootDir for this instance.
     * The root dir containing all templates.
     * @var string
     */
    protected $rootDir;

    /**
     * This property holds the kitPageRenderer for this instance.
     * @var KitPageRendererInterface
     */
    protected $kitPageRenderer;


    /**
     * This property holds the _copilot for this instance.
     * @var HtmlPageCopilot
     *
     */
    private HtmlPageCopilot $_copilot;


    /**
     * Builds the PrototypeWidgetHandler instance.
     */
    public function __construct()
    {
        $this->rootDir = null;
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
     * Sets the rootDir.
     *
     * @param string $rootDir
     * @return $this
     */
    public function setRootDir(string $rootDir)
    {
        $this->rootDir = $rootDir;
        return $this;
    }


    /**
     * @implementation
     */
    public function process(array &$widgetConf, array $debug): void
    {
        // we do nothing here
    }


    /**
     * @implementation
     */
    public function render(array $widgetConf, HtmlPageCopilot $copilot, array $debug): string
    {
        $this->_copilot = $copilot; // make the copilot accessible to the template


        if (null !== $this->rootDir) {
            if (array_key_exists("template", $widgetConf)) {

                $template = $this->rootDir . "/" . $widgetConf['template'];
                if (file_exists($template)) {
                    ob_start();
                    $z = $widgetConf['vars'] ?? [];
                    include $template;
                    return ob_get_clean();
                } else {
                    $this->error("Template file not found: $template.", $widgetConf, $debug);
                }
            } else {
                $this->error("The template key is missing from the widget configuration array.", $widgetConf, $debug);
            }
        } else {
            $this->error("The rootDir property is not set. Use the setRootDir method.", $widgetConf, $debug);
        }
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the instance of the copilot.
     * This is designed to be used from inside the prototype template file.
     *
     * @return HtmlPageCopilot
     */
    protected function getCopilot(): HtmlPageCopilot
    {
        return $this->_copilot;
    }


    /**
     * Throws an useful error message.
     *
     * @param string $msg
     * @param array $widgetConf
     * @param array $debug
     * @throws PrototypeWidgetException
     */
    protected function error(string $msg, array $widgetConf, array $debug)
    {
        $name = $widgetConf['name'];
        $zone = $debug['zone'];
        $page = $debug['page'];
        throw new PrototypeWidgetException($msg . " Widget \"$name\", zone \"$zone\", page \"$page\".");
    }

}