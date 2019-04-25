<?php


namespace Ling\Kit\ConfStorage;


use Ling\BabyYaml\BabyYamlUtil;
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
        $pageFile = $this->rootDir . "/$pageName.byml";
        if (file_exists($pageFile)) {
            return BabyYamlUtil::readFile($pageFile);
        } else {
            $this->addError("Page not found: $pageName");
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