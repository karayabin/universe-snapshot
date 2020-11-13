<?php


namespace Ling\Light_UploadGems\Service;


use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Nugget\Service\LightNuggetService;
use Ling\Light_UploadGems\Exception\LightUploadGemsException;
use Ling\Light_UploadGems\GemHelper\GemHelper;
use Ling\PhpFileValidator\PhpFileValidator;

/**
 * The LightUploadGemsService class.
 */
class LightUploadGemsService
{

    /**
     * Array of pluginName => gemDirPath.
     *
     * gemDirPath is an absolute path.
     *
     * @var array
     */
    protected $pluginToDir;


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * Builds the LightUploadGemsService instance.
     */
    public function __construct()
    {
        $this->pluginToDir = [];
        $this->container = null;
    }

    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }



    /**
     * Returns a GemHelperInterface associated with the given gemId, or throws an exception otherwise.
     *
     * @param string $gemId
     * @return GemHelper
     * @throws \Exception
     */
    public function getHelper(string $gemId): GemHelper
    {
        $conf = $this->getNugget($gemId);
        $helper = new GemHelper();
        $helper->setContainer($this->container);
        $helper->setConfig($conf);
        return $helper;
    }


    /**
     * Checks whether the given php file (usually from $_FILES) is erroneous, and throws an exception if it's the case.
     * @param array $phpFile
     * @throws \Exception
     *
     */
    public function checkPhpFile(array $phpFile)
    {
        PhpFileValidator::checkPhpFile($phpFile);
    }


    /**
     * Checks whether the given filename is valid (i.e. no "../" or "./" in it), and throws an exception if that's the case.
     *
     * @param string $filename
     * @throws \Exception
     */
    public function checkFilename(string $filename)
    {

        if (
            false !== strpos($filename, "../") ||
            false !== strpos($filename, "./")
        ) {
            throw new LightUploadGemsException("Invalid filename \"$filename\", the string ./ or ../ was found in it.");
        }
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the configuration nugget based on the given nuggetId.
     *
     * @param string $nuggetId
     * @return array
     */
    private function getNugget(string $nuggetId): array
    {
        /**
         * @var $nug LightNuggetService
         */
        $ng = $this->container->get("nugget");
        return $ng->getNugget($nuggetId, "Light_UploadGems/gems");
    }

}