<?php


namespace Ling\Kit_PicassoWidget\Util;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\CaseTool;
use Ling\Bat\FileSystemTool;
use Ling\DirScanner\YorgDirScannerTool;
use Ling\Kit_PicassoWidget\Exception\PicassoWidgetException;

/**
 * The VariableDescriptionDocWriterUtil class.
 *
 * This class will produce a documentation file for the widgets of a directory.
 * The documentation file has the md extension, and includes screenshots of the widgets.
 *
 * This class works with the following set of rules:
 *
 * - first, you need to write all your description files with the **.vars_descr.byml** extension. For instance,
 *      my_widget.vars_descr.byml. If you don't remember the variables description syntax, please refer to the
 * @page(widget variables description page).
 *
 * - then, you need to set the name of the base dir containing all those files (that base dir will be parsed recursively
 *      and will collect every file with the **.vars_descr.byml** extension.
 *
 * - if you have images, those must be put in a directory with the same name as the widget (the name directive inside
 *      the widget variables description array). Anu image file (jpg, png) in this directory will be parsed as a screenshot.
 *      All screenshots must be put inside a base directory, which contains one directory per widget.
 *      For instance:
 *      ```txt
 *          - my_img_base_dir/
 *              - WidgetOne/
 *                  - widget_one.png
 *              - WidgetTwo/
 *                  - widget_two_a.png
 *                  - widget_two_b.jpg
 *      ```
 *
 * That's basically it.
 *
 *
 * Note: the philosophy behind this tool is that we display the same structure for every widget: screenhosts, variables description and example,
 * even if some of those widgets actually don't have all three features (so that the user has understands the page structure better, and be more
 * efficient at browsing it). In other words, we don't care of empty zones as long as the pattern of the page is clear to the user.
 *
 *
 *
 */
class VariableDescriptionDocWriterUtil
{


    /**
     * This property holds the variablesDescriptionDir for this instance.
     * The path to the directory containing all widget variables description files.
     *
     * @var string
     */
    protected $variablesDescriptionDir;

    /**
     * This property holds the imgBaseDir for this instance.
     * The path to the directory containing all widget screenshots.
     * @var string
     */
    protected $imgBaseDir;

    /**
     * This property holds the imgBaseUrl for this instance.
     * The base url to use for the image screenshots.
     * @var string
     */
    protected $imgBaseUrl;

    /**
     * This property holds the document date in yyyy-mm-dd format.
     *
     * @var string
     */
    protected $documentDate;


    /**
     * This property holds the title of the document.
     * @var string
     */
    protected $documentTitle;


    /**
     * This property holds the path to the widget template used by this instance.
     * @var string
     */
    protected $widgetTpl;

    /**
     * This property holds the path to the page template used by this instance.
     * @var string
     */
    protected $pageTpl;

    /**
     * This property holds the widgetsBaseDir for this instance.
     * The path to the directory containing all @page(widget directories).
     * @var string
     */
    protected $widgetsBaseDir;

    /**
     * Builds the VariableDescriptionDocWriterUtil instance.
     */
    public function __construct()
    {
        $this->variablesDescriptionDir = null;
        $this->imgBaseDir = null;
        $this->imgBaseUrl = null;
        $this->documentDate = null;
        $this->documentTitle = null;
        $this->widgetTpl = __DIR__ . "/tpl/widget-doc-widget.tpl.php";
        $this->pageTpl = __DIR__ . "/tpl/widget-doc-page.tpl.php";
        $this->widgetsBaseDir = null;
    }

    /**
     * Sets the variablesDescriptionDir.
     *
     * @param string $variablesDescriptionDir
     */
    public function setVariablesDescriptionDir(string $variablesDescriptionDir)
    {
        $this->variablesDescriptionDir = $variablesDescriptionDir;
    }

    /**
     * Sets the imgBaseDir.
     *
     * @param string $imgBaseDir
     */
    public function setImgBaseDir(string $imgBaseDir)
    {
        $this->imgBaseDir = $imgBaseDir;
    }

    /**
     * Sets the imgBaseUrl.
     *
     * @param string $imgBaseUrl
     */
    public function setImgBaseUrl(string $imgBaseUrl)
    {
        $this->imgBaseUrl = $imgBaseUrl;
    }

    /**
     * Sets the widgetsBaseDir.
     *
     * @param string $widgetsBaseDir
     */
    public function setWidgetsBaseDir(string $widgetsBaseDir)
    {
        $this->widgetsBaseDir = $widgetsBaseDir;
    }


    /**
     * Sets the documentDate.
     *
     * @param string $documentDate
     */
    public function setDocumentDate(string $documentDate)
    {
        $this->documentDate = $documentDate;
    }

    /**
     * Sets the documentTitle.
     *
     * @param string $documentTitle
     */
    public function setDocumentTitle(string $documentTitle)
    {
        $this->documentTitle = $documentTitle;
    }


    /**
     * Writes the widget documentation to the given file, and returns whether the writing of the file was successful.
     * Throws errors if something goes wrong.
     *
     * @param string $file
     * @return bool
     * @throws PicassoWidgetException
     */
    public function writeDoc(string $file)
    {
        if (null !== $this->variablesDescriptionDir) {
            if (null !== $this->imgBaseDir) {
                if (null !== $this->imgBaseUrl) {
                    if (null !== $this->documentDate) {
                        if (null !== $this->documentTitle) {
                            if (null !== $this->widgetsBaseDir) {


                                if (is_dir($this->variablesDescriptionDir)) {
                                    if (is_dir($this->imgBaseDir)) {
                                        if (is_dir($this->widgetsBaseDir)) {

                                            $content = file_get_contents($this->pageTpl);
                                            $sWidgets = "";
                                            $summary = '';


                                            $rpaths = YorgDirScannerTool::getFilesWithExtension($this->variablesDescriptionDir, "vars_descr.byml", false, true, true);
                                            foreach ($rpaths as $rpath) {

                                                $apath = $this->variablesDescriptionDir . "/" . $rpath;
                                                $arr = BabyYamlUtil::readFile($apath);
                                                $widgetName = $arr['name'];
                                                $sWidgets .= $this->renderWidget($arr);


                                                //--------------------------------------------
                                                // SUMMARY
                                                //--------------------------------------------
                                                $anchor = CaseTool::toDash($widgetName);
                                                $summary .= "- [$widgetName](#$anchor)" . PHP_EOL;
                                            }


                                            $content = str_replace([
                                                '${title}',
                                                '${date}',
                                                '${summary}',
                                                '${widgets}',
                                            ], [
                                                $this->documentTitle,
                                                $this->documentDate,
                                                $summary,
                                                $sWidgets,
                                            ], $content);

                                            return FileSystemTool::mkfile($file, $content);


                                        } else {
                                            $this->error("The widgetsBaseDir is not a directory: $this->widgetsBaseDir.");
                                        }
                                    } else {
                                        $this->error("The imgBaseDir is not a directory: $this->imgBaseDir.");
                                    }
                                } else {
                                    $this->error("The variablesDescriptionDir is not a directory: $this->variablesDescriptionDir.");
                                }
                            } else {
                                $this->error("The widgetsBaseDir is not set.");
                            }
                        } else {
                            $this->error("The documentTitle is not set.");
                        }
                    } else {
                        $this->error("The documentDate is not set.");
                    }
                } else {
                    $this->error("The imgBaseUrl is not set.");
                }
            } else {
                $this->error("The imgBaseDir is not set.");
            }
        } else {
            $this->error("The variablesDescriptionDir is not set.");
        }
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the widget snippet, based on the given widget variables description array.
     *
     * @param array $arr
     * @return string
     */
    protected function renderWidget(array $arr)
    {
        $content = file_get_contents($this->widgetTpl);
        $widgetName = $arr['name'];
        $dashWidgetName = CaseTool::toDash($widgetName);
        $widgetDescription = $arr['description'];
        $screenShotList = $this->renderScreenshotList($widgetName);
        $widgetVarsDescriptionList = $this->renderWidgetVariablesDescriptionList($arr['vars']);


        $widgetExample = $arr['example'] ?? "";
        if (is_array($widgetExample)) {
            $widgetExample = implode(', ', $widgetExample);
        }
        $templates = [];
        $skins = [];
        $presets = [];
        //--------------------------------------------
        // WIDGET DIR
        //--------------------------------------------
        $widgetDir = $this->widgetsBaseDir . "/" . $widgetName;
        if (is_dir($widgetDir)) {
            $cssDir = $widgetDir . '/css';
            $templatesDir = $widgetDir . '/templates';
            $presetsDir = $widgetDir . '/presets';

            if (is_dir($cssDir)) {
                $skins = YorgDirScannerTool::getFilesWithExtension($cssDir, ["css", "css.php"], false, true, true);
            }

            if (is_dir($templatesDir)) {
                $templates = YorgDirScannerTool::getFilesWithExtension($templatesDir, "php", false, true, true);
            }

            if (is_dir($presetsDir)) {
                $presets = YorgDirScannerTool::getFilesWithExtension($presetsDir, "byml", false, true, true);
            }
        }
        $sTemplates = implode(', ', $templates);
        $sSkins = implode(', ', $skins);
        $sPresets = implode(', ', $presets);


        $widgetVars = $arr['vars'];
        return str_replace([
            '${dashWidgetName}',
            '${widgetName}',
            '${widgetDescription}',
            '${screenshotList}',
            '${widgetVarsDescriptionList}',
            '${widgetExample}',
            '${templates}',
            '${skins}',
            '${presets}',
        ], [
            $dashWidgetName,
            $widgetName,
            $widgetDescription,
            $screenShotList,
            $widgetVarsDescriptionList,
            $widgetExample,
            $sTemplates,
            $sSkins,
            $sPresets,
        ], $content);
    }


    /**
     * Returns the screenshot list snippet, based on the given widget name.
     *
     * @param string $widgetName
     * @return string
     */
    protected function renderScreenshotList(string $widgetName)
    {
        $s = "";
        $dirs = YorgDirScannerTool::getDirs($this->imgBaseDir, true, false);
        $imgPaths = [];
        foreach ($dirs as $dir) {
            $baseName = basename($dir);
            if ($widgetName === $baseName) {
                $imgPaths = YorgDirScannerTool::getFilesWithExtension($dir, [
                    "jpg",
                    "jpeg",
                    "png",
                    "gif",
                ], false, true, true);
                break;
            }
        }

        if ($imgPaths) {
            foreach ($imgPaths as $imgPath) {
                $name = basename($imgPath);
                $url = $this->imgBaseUrl . "/$widgetName/" . $imgPath;
                $s .= "![Screenshot $name]($url)" . PHP_EOL . PHP_EOL;
            }
        }
        return $s;
    }


    /**
     * Returns the widget variables description list snippet.
     *
     *
     * @param array $vars
     * The vars property of @page(the widget variables description array).
     *
     * @return string
     */
    protected function renderWidgetVariablesDescriptionList(array $vars)
    {
        $s = '';
        foreach ($vars as $key => $item) {
            if (array_key_exists("alias_of", $item)) {
                $s .= '- **' . $key . '**: same as ' . $item['alias_of'] . PHP_EOL;
            } else {
                $s .= $this->renderListItem($key, $item, 1);
            }
        }
        return $s;
    }


    /**
     * Renders a widget variables description list item recursively.
     *
     *
     * @param string $key
     * @param array $item
     * @param int $indentBase
     * @return string
     */
    protected function renderListItem(string $key, array $item, int $indentBase = 1)
    {

        $s = '- **' . $key . '**' . PHP_EOL;
        foreach ($item as $k => $it) {
            // choices
            if (is_numeric($k)) {
                $s .= str_repeat(" ", 4 * $indentBase) . "- " . $it . PHP_EOL;
            } else {
                if (is_array($it)) {
                    $s .= str_repeat(" ", 4 * $indentBase);
                    $s .= $this->renderListItem($k, $it, $indentBase + 1);
                } else {
                    $v = $it;
                    if (null === $v) {
                        $v = "null";
                    } elseif (true === $v) {
                        $v = "true";
                    } elseif (false === $v) {
                        $v = "false";
                    }
                    $s .= str_repeat(" ", 4 * $indentBase) . "- **$k**: " . $v . PHP_EOL;
                }
            }
        }

        return $s;
    }


    /**
     * Throws a formatted error message.
     *
     * @param string $msg
     * @throws PicassoWidgetException
     */
    protected function error(string $msg)
    {
        throw new PicassoWidgetException("VariableDescriptionDocWriterUtil: " . $msg);
    }
}