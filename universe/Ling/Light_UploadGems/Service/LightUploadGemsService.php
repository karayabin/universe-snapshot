<?php


namespace Ling\Light_UploadGems\Service;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\FileSystemTool;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_UploadGems\Exception\LightUploadGemsException;
use Ling\Light_UploadGems\GemHelper\GemHelper;
use Ling\Light_UploadGems\GemHelper\GemHelperInterface;
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
     * Registers the pluginName.
     *
     * If gemDirPath is provided, it's an absolute path.
     *
     * @param string $pluginName
     * @param string|null $gemDirPath = null
     * @throws \Exception
     */
    public function register(string $pluginName, string $gemDirPath = null)
    {
        if (null === $gemDirPath) {
            $gemDirPath = $this->container->getApplicationDir() . "/config/data/$pluginName/Light_UploadGems";
        }

        $realPath = realpath($gemDirPath);
        if (false === $realPath) {
            throw new LightUploadGemsException("Directory not found: \"$gemDirPath\".");
        }
        $this->pluginToDir[$pluginName] = $realPath;
    }


    /**
     * Returns a GemHelperInterface associated with the given gemId, or throws an exception otherwise.
     *
     * @param string $gemId
     * @return GemHelperInterface
     * @throws \Exception
     */
    public function getHelper(string $gemId): GemHelperInterface
    {
        if (false !== strpos($gemId, ".")) {
            list($pluginName, $gemName) = explode(".", $gemId, 2);

            if (array_key_exists($pluginName, $this->pluginToDir)) {
                $dir = $this->pluginToDir[$pluginName];
                $file = $dir . "/" . $gemName . ".byml";
                if (true === FileSystemTool::isDirectoryTraversalSafe($file, $dir, true)) {
                    $helper = new GemHelper();
                    $helper->setContainer($this->container);
                    $helper->setConfig(BabyYamlUtil::readFile($file));
                    return $helper;
                }
                throw new LightUploadGemsException("File not found or invalid: \"$file\", with gemId \"$gemId\".");

            }
            throw new LightUploadGemsException("Gem helper not found with id \"$gemId\".");

        }
        throw new LightUploadGemsException("Wrong gemId notation, it doesn't contain a dot: \"$gemId\".");
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
}