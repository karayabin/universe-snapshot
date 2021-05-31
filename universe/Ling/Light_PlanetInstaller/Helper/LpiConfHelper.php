<?php


namespace Ling\Light_PlanetInstaller\Helper;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Light_PlanetInstaller\Exception\LightPlanetInstallerException;

/**
 * The LpiConfHelper class.
 */
class LpiConfHelper
{


    /**
     * This property holds the conf for this instance.
     * @var array
     */
    private static $conf = null;


    /**
     * Returns the path to the machine level root dir (containing the global conf for all Light_PlanetInstaller instances).
     * @return string
     */
    public static function getRootDir(): string
    {
        return '/usr/local/share/universe/Ling/Light_PlanetInstaller';
    }


    /**
     * Returns the path to the global configuration file.
     *
     * @return string
     */
    public static function getConfPath(): string
    {
        return self::getRootDir() . "/conf.byml";
    }


    /**
     * Returns the handlers global conf value.
     *
     * It's an array of galaxy => handlerInfo.
     *
     * See the conception notes for more details.
     *
     *
     * @return array
     * @throws \Exception
     */
    public static function getHandlers(): array
    {
        $defaultHandlers = [
            'Ling' => [
                'type' => 'github',
                'account' => 'lingtalfi',
            ],
        ];
        return LpiConfHelper::getConfValue("handlers", $defaultHandlers);
    }

    /**
     * Returns the path to the global directory.
     *
     * @return string
     */
    public static function getGlobalDirPath(): string
    {
        $default = self::getRootDir() . "/planets";
        return self::getConfValue("global_dir_path", $default);
    }

    //--------------------------------------------
    //
    //--------------------------------------------


    /**
     *
     * Returns a value from the global configuration file.
     * If not found returns the default value by default, or throws an exception if $throwEx=true.
     *
     *
     * @param string $key
     * @param null $default
     * @param bool $throwEx
     * @return mixed
     * @throws \Exception
     */
    private static function getConfValue(string $key, $default = null, bool $throwEx = false)
    {
        if (null === self::$conf) {

            $globalConfPath = self::getConfPath();

            if (true === file_exists($globalConfPath)) {
                $arr = BabyYamlUtil::readFile($globalConfPath);
                self::$conf = $arr;
            }
        }


        if (array_key_exists($key, self::$conf)) {
            return self::$conf[$key];
        }
        if (false === $throwEx) {
            return $default;
        }
        throw new LightPlanetInstallerException("Configuration value not found with key=$key.");
    }


}