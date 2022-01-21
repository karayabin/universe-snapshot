<?php


namespace Ling\Light_It4Tools\Service;


use Ling\Bat\BDotTool;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_It4Tools\Database\It4DbParserTool;
use Ling\Light_It4Tools\Exception\LightIt4ToolsException;
use Ling\Light_It4Tools\Light_DatabaseInfo\It42021LightDatabaseInfoService;


/**
 * The LightIt4ToolsService class.
 */
class LightIt4ToolsService
{

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected LightServiceContainerInterface $container;

    /**
     * This property holds the options for this instance.
     *
     * Available options are:
     *
     *
     *
     * See the @page(Light_It4Tools conception notes) for more details.
     *
     *
     * @var array
     */
    protected array $options;


    /**
     * Builds the LightIt4ToolsService instance.
     */
    public function __construct()
    {
        $this->options = [];
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
     * Sets the options.
     *
     * @param array $options
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
    }

    /**
     * Returns the options of this instance.
     *
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * Returns the option value corresponding to the given key.
     *
     * If the option is not found, the return depends on the throwEx flag:
     *
     * - if set to true, an exception is thrown
     * - if set to false, the default value is returned
     *
     * The key uses the bdot format (https://github.com/karayabin/universe-snapshot/blob/master/universe/Ling/Bat/doc/bdot-notation.md).
     *
     *
     * @param string $key
     * @param null $default
     * @param bool $throwEx
     * @throws \Exception
     */
    public function getOption(string $key, $default = null, bool $throwEx = false)
    {
        $found = false;
        $value = BDotTool::getDotValue($key, $this->options, $default, $found);

        if (false !== $found) {
            return $value;
        }
        if (true === $throwEx) {
            $this->error("Undefined option: $key.");
        }
        return $default;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the parser tool.
     * @return It4DbParserTool
     */
    public function getDatabaseParser(): It4DbParserTool
    {
        $parser = new It4DbParserTool();
        $parser->setContainer($this->container);
        return $parser;
    }


    /**
     * Returns a database info service, prepared for it4 2021 structure (db schema without foreign keys).
     *
     * Available options are:
     * - dbKeysRootDir: string, the root dir of the dbKeys system.
     *
     *
     * @param array $options
     * @return It42021LightDatabaseInfoService
     * @throws \Exception
     */
    public function getDatabaseInfoService(array $options = []): It42021LightDatabaseInfoService
    {

        $dbKeysRootDir = $options['dbKeysRootDir'] ?? null;

        $o = new It42021LightDatabaseInfoService();
        $o->setContainer($this->container);

        if(null !== $dbKeysRootDir){
            $o->setDbKeysRootDir($dbKeysRootDir);
        }

        $cacheDir = $this->getOption("dbInfoCacheDir");
        if (null !== $cacheDir) {
            $o->setCacheDir($cacheDir);
        }
        return $o;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Throws an exception.
     *
     * @param string $msg
     * @throws \Exception
     */
    private function error(string $msg)
    {
        throw new LightIt4ToolsException($msg);
    }

}