<?php


namespace Ling\Light_PlanetInstaller\Helper;


use Ling\Bat\ClassTool;
use Ling\Light_PlanetInstaller\Exception\LightPlanetInstallerException;
use Ling\Light_PlanetInstaller\Importer\LpiImporterInterface;

/**
 * The LpiImporterHelper class.
 */
class LpiImporterHelper
{


    /**
     * Returns the lpi importer instance corresponding to the given $importerInfo.
     * Or throws an exception if something went wrong.
     *
     * The importerInfo is an array containing at least the following:
     *
     * - galaxy: the galaxy name
     *
     *
     * @param string $galaxy
     * @return LpiImporterInterface
     * @throws \Exception
     */
    public static function getImporterByGalaxy(string $galaxy): LpiImporterInterface
    {

        $handlers = LpiConfHelper::getHandlers();
        if (array_key_exists($galaxy, $handlers)) {
            $importerConf = $handlers[$galaxy];
            $type = $importerConf['type'];
            $ucfType = ucfirst($type);


            $class = "Ling\\Light_PlanetInstaller\\Importer\\Lpi${ucfType}Importer";
            if (true === ClassTool::isLoaded($class)) {
                $o = new $class();
                if ($o instanceof LpiImporterInterface) {
                    $o->configure($importerConf);
                }
                return $o;

            } else {
                self::error("Class \"$class\" doesn't exist: cannot instantiate the importer.");
            }


        } else {
            self::error("No handler defined for galaxy $galaxy.");
        }
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Throws an exception.
     * @param string $msg
     * @param int|null $code
     * @throws \Exception
     */
    private static function error(string $msg, int $code = null)
    {
        throw new LightPlanetInstallerException($msg, $code);
    }
}