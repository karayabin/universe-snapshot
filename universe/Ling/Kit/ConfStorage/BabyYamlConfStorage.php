<?php


namespace Ling\Kit\ConfStorage;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\ArrayTool;
use Ling\DirScanner\YorgDirScannerTool;
use Ling\Kit\Exception\KitException;

/**
 * The BabyYamlConfStorage interface.
 * With this storage, the data is organized in pages configuration files.
 *
 * There is a root directory containing all page configuration files.
 *
 * You can set this root directory to whatever using the setRootDir method.
 * Actually, you MUST set the directory, otherwise this class won't know where to search for pages.
 *
 *
 * Then in the root dir, you put all your configuration files.
 * They must have the @page(babyYaml) format (the .byml extension).
 * The file name (without the file extension) is actually the page name.
 *
 * So when the user calls the getPageConf like this:
 *
 * ```php
 * getPageConf( page_one )
 * ```
 *
 * then this class will search for the following file:
 *
 * - $rootDir/page_one.byml
 *
 * The content of a page configuration file is defined in the kit documentation
 * (see the @page(page configuration array) for more info).
 *
 *
 * Also, if a directory with the same name is found, all the .byml files found in it will be merged
 * to the page configuration file. This allows third-party plugins to participate to the construction
 * of the page.
 *
 * So for instance, we can have this kind of structure:
 *
 * - $rootDir/page_one.byml
 * - $rootDir/page_one/MyPlugin_One.byml
 * - $rootDir/page_one/MyPlugin_Two.byml
 * - $rootDir/page_one/...
 *
 *
 *
 *
 */
class BabyYamlConfStorage implements ConfStorageInterface
{


    /**
     * This property holds the errors for this instance.
     * @var array
     */
    protected $errors;

    /**
     * This property holds the rootDir for this instance.
     * @var string
     */
    protected $rootDir;


    /**
     * Builds the BabyYamlConfStorage instance.
     */
    public function __construct()
    {
        $this->errors = [];
        $this->rootDir = null;
    }


    /**
     * @implementation
     * @throws \Exception
     */
    public function getPageConf(string $pageName)
    {
        $this->init();
        $dir = $this->rootDir . "/$pageName";
        $pageFile = $dir . ".byml";
        if (file_exists($pageFile)) {
            $conf = BabyYamlUtil::readFile($pageFile);

            //--------------------------------------------
            // PARENT TRICK
            //--------------------------------------------
            /**
             * This is a trick that applies only to babyYaml storage.
             * It improves readability of the configuration files, at the cost of more processing.
             * I don't recommend to use this in production.
             * But if you can read this, you know that you can use that if you want.
             * It basically allows you to re-use another .byml file as the base for another, thus saving
             * you from retyping all the widgets again and again every time you create a new page.
             */
            if (array_key_exists("_parent", $conf)) {
                $parentFile = $this->rootDir . "/" . $conf['_parent'] . ".byml";
                if (file_exists($parentFile)) {
                    $parentConf = BabyYamlUtil::readFile($parentFile);
                    $conf = ArrayTool::arrayMergeReplaceRecursive([$parentConf, $conf]);
                }
            }


            if (is_dir($dir)) {
                /**
                 * Allowing third-party plugins to tap into the page configuration.
                 * This include:
                 * - adding widgets to a zone
                 * - replacing the widget template with a fancier one
                 *
                 *
                 *
                 *
                 * We use the arrayMergeReplaceRecursive algorithm which fits our needs perfectly.
                 *
                 */
                $additions = YorgDirScannerTool::getFilesWithExtension($dir, ".byml", false, true, false);
                $allConf = [$conf];
                foreach ($additions as $file) {
                    $additionConf = BabyYamlUtil::readFile($file);
                    $allConf[] = $additionConf;
                }
                $conf = ArrayTool::arrayMergeReplaceRecursive($allConf);
            }
            return $conf;
        } else {
            $this->addError("Page not found: $pageName ($pageFile).");
        }
        return false;
    }


    /**
     * @implementation
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
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


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Resets the errors array, and check that the rootDir is set.
     * If the root dir is not set, it throws an exception.
     *
     * @throws \Exception
     */
    protected function init()
    {
        $this->errors = [];
        if (null === $this->rootDir) {
            throw new KitException("BabyYamlConfStorage: root dir not set. Use the setRootDir method.");
        }
    }

    /**
     * Adds a nice error message.
     *
     * @param string $msg
     */
    protected function addError(string $msg)
    {
        $this->errors[] = "BabyYamlConfStorage error: " . $msg;
    }

}