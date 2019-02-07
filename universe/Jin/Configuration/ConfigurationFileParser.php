<?php


namespace Jin\Configuration;


use ArrayRefResolver\ArrayRefResolverInterface;
use ArrayRefResolver\ArrayTagResolver;
use BabyYaml\BabyYamlUtil;
use Bat\ArrayTool;
use Bat\FileSystemTool;
use DirScanner\YorgDirScannerTool;
use Jin\Registry\Access;

/**
 * @info The ConfigurationFileParser class is a utility class providing tools to parse and interpret configuration
 * files in a jin application.
 *
 */
class ConfigurationFileParser
{
    /**
     * @info This property holds the profile of the application (dev, prod, ...)
     * The default value is prod.
     */
    private $profile;


    /**
     * @info Constructs the ConfigurationFileParser instance with a default profile value.
     */
    public function __construct()
    {
        $this->profile = "prod";
    }


    /**
     * @info Sets the application profile.
     * @param $profile
     */
    public function setProfile($profile)
    {
        $this->profile = $profile;
    }




    public function parseDir($dirPath, array $options = [])
    {

        $parseFileWithSameName = $options['parseFileWithSameName'] ?? true;

        $conf = [];
        if (true === $parseFileWithSameName) {
            /**
             * This file with the same name as the dir is the configuration
             * file reserved for the jin app maintainer.
             */
            $fileName = $dirPath . ".byml";
            if (file_exists($fileName)) {
                $conf = $this->parseFileRaw($fileName);
            }
        }
        if (is_dir($dirPath)) {
            $files = YorgDirScannerTool::getFilesWithExtension($dirPath, "byml", false, true, true);


            //--------------------------------------------
            // NOW MERGE ALL FILES
            //--------------------------------------------
            foreach ($files as $file) {
                /**
                 * Ignoring variations here, because the parseFileRaw method will get them.
                 */
                if (false === strpos($file, '-')) {
                    $realFile = $dirPath . "/" . $file;
                    $pluginConf = $this->parseFileRaw($realFile);
                    $conf = ArrayTool::arrayMergeReplaceRecursive([$conf, $pluginConf]);
                }
            }
        }
        return $conf;
    }

    /**
     * @info Parses and the configuration file (which path is given) according to the mechanism explained below
     * and return the resulting configuration.
     * This method does not resolve configuration variable.
     * See parseFile method for resolving configuration variable.
     *
     *
     *
     * Parsing the configuration file
     * ----------------------------
     * About parsing a babyyaml (.yml) configuration file.
     *
     * In a jin app, a configuration file is always dependent on the application profile (dev, prod, ...).
     *
     * When you parse a configuration file, you also need to parse its profile variation if it exist.
     * The naming convention of the profile variation is the following:
     *
     * - $file-$profile.yml
     *
     * So for instance if you want to parse the logger.yml file, and your application profile is dev, then
     * you actually need to parse two files:
     *
     * - logger.yml
     * - logger-dev.yml
     *
     * Note that both files might not exist, which would result in an empty configuration (empty array).
     *
     * So this method handles this mechanism for you.
     *
     *
     *
     *
     *
     *
     *
     * @param $filePath
     * @seeMethod parseFile
     * @return array
     */
    public function parseFileRaw($filePath)
    {

        $conf = [];

        $dir = dirname($filePath);
        $fileName = FileSystemTool::getFileName($filePath);
        $profilePath = $dir . "/$fileName-" . $this->profile . ".byml";


        if (file_exists($filePath)) {
            $conf = BabyYamlUtil::readFile($filePath);
        }

        if (file_exists($profilePath)) {
            $conf2 = BabyYamlUtil::readFile($profilePath);
            $conf = ArrayTool::arrayMergeReplaceRecursive([$conf, $conf2]);
        }


        return $conf;
    }


}