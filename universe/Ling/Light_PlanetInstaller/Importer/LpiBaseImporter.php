<?php


namespace Ling\Light_PlanetInstaller\Importer;


use Ling\Light_PlanetInstaller\Exception\LightPlanetInstallerException;

/**
 * The LpiBaseImporter class.
 */
abstract class LpiBaseImporter implements LpiImporterInterface
{


    /**
     * This property holds the conf for this instance.
     * @var array
     */
    protected $conf;


    /**
     * Builds the LpiGithubImporter instance.
     */
    public function __construct()
    {
        $this->conf = [];
    }


    /**
     * @implementation
     */
    public function configure(array $importerConf)
    {
        $this->conf = $importerConf;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Fetches the $key property from the importer configuration and returns the result.
     *
     * If the key doesn't exist, either $throwEx is true, in which case we throw an error.
     * Otherwise (i.e. $throwEx=false) we return the default value.
     *
     * @param string $key
     * @param bool $throwEx
     * @param null $default
     */
    protected function getConfigValue(string $key, bool $throwEx = true, $default = null)
    {
        if (array_key_exists($key, $this->conf)) {
            return $this->conf[$key];
        }
        if (true === $throwEx) {
            throw new LightPlanetInstallerException("Config key not found: $key.");
        }
        return $default;
    }


    /**
     * Throws an exception.
     * @param string $msg
     * @param int|null $code
     * @throws \Exception
     */
    protected function error(string $msg, int $code = null)
    {
        throw new LightPlanetInstallerException($msg, $code);
    }
}