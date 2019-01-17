<?php


namespace Jin\Configuration;


use BabyYaml\BabyYamlUtil;
use Bat\ArrayTool;
use Bat\FileSystemTool;

/**
 * @info The ConfFileSelector class is a helper to parse a babyyaml (.yml) configuration file.
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
 * So this class handles this mechanism for you.
 *
 */
class ConfFileSelector
{
    /**
     * @info This property holds the profile of the application (dev, prod, ...)
     * The default value is prod.
     */
    private $profile;


    /**
     * @info Constructs the ConfFileSelector instance with a default profile value.
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


    /**
     * @info Parses the configuration file (which path is given) according to the mechanism defined by the jin application
     * ( see the class description for more details).
     *
     * @param $filePath
     * @return array
     */
    public function parseFile($filePath)
    {
        $conf = [];

        $dir = dirname($filePath);
        $fileName = FileSystemTool::getFileName($filePath);
        $profilePath = $dir . "/$fileName-" . $this->profile . ".yml";


        if (file_exists($filePath)) {
            $conf = BabyYamlUtil::readFile($filePath);
        }

        if (file_exists($profilePath)) {
            $conf2 = BabyYamlUtil::readFile($profilePath);
            $conf = ArrayTool::arrayMergeReplaceRecursive([$conf, $conf2]);

            az($conf);
        }

        az($conf);



        return $conf;
    }


    private function array_merge_recursive_ex(array & $array1, array & $array2)
    {
        $merged = $array1;

        foreach ($array2 as $key => & $value)
        {
            if (is_array($value) && isset($merged[$key]) && is_array($merged[$key]))
            {
                $merged[$key] = $this->array_merge_recursive_ex($merged[$key], $value);
            } else if (is_numeric($key))
            {
                if (!in_array($value, $merged))
                    $merged[] = $value;
            } else
                $merged[$key] = $value;
        }

        return $merged;
    }
}