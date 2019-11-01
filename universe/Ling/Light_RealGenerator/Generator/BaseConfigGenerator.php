<?php


namespace Ling\Light_RealGenerator\Generator;


use Ling\Bat\BDotTool;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_DatabaseInfo\Service\LightDatabaseInfoService;
use Ling\Light_RealGenerator\Exception\LightRealGeneratorException;

/**
 * The BaseConfigGenerator class.
 */
class BaseConfigGenerator
{
    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;

    /**
     * This property holds the config for this instance.
     * The @page(config block).
     *
     * @var array
     */
    protected $config;

    /**
     * Builds the ListConfigGenerator instance.
     */
    public function __construct()
    {
        $this->container = null;
        $this->config = [];
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the tables to generate a config file for.
     * @return array
     * @throws \Exception
     */
    protected function getTables(): array
    {
        $database = $this->config['database_name'] ?? null;
        $tables = [];
        $tableAdd = $this->getKeyValue('tables.add');
        $tableRemove = $this->getKeyValue('tables.remove', false, []);


        if (false === is_array($tableAdd)) {
            $tableAdd = [$tableAdd];
        }
        if (false === is_array($tableRemove)) {
            $tableRemove = [$tableRemove];
        }


        foreach ($tableAdd as $tableToAdd) {
            if ('*' === $tableToAdd) {
                /**
                 * @var $dbInfo LightDatabaseInfoService
                 */
                $dbInfo = $this->container->get('database_info');
                $tables = array_merge($tables, $dbInfo->getTables($database));
            } else {
                $tables[] = $tableToAdd;
            }
        }

        foreach ($tableRemove as $tableToRemove) {
            $key = array_search($tableToRemove, $tables, true);
            if (false !== $key) {
                unset($tables[$key]);
            }
        }
        return $tables;
    }


    /**
     * Returns the value associated with the given keyPath.
     * If it doesn't exist, this method either:
     * - throws an exception (if the throwEx flag is set to false)
     * - returns the given default value (is the throwEx flag is set to true)
     *
     * @param string $keyPath
     * @param bool=true $throwEx
     * @param null $default
     * @return array|mixed|null
     * @throws LightRealGeneratorException
     */
    protected function getKeyValue(string $keyPath, bool $throwEx = true, $default = null)
    {
        $found = false;
        $val = BDotTool::getDotValue($keyPath, $this->config, $default, $found);
        if (true === $found) {
            return $val;
        }
        if (true === $throwEx) {
            throw new LightRealGeneratorException("Key not found: $keyPath.");
        }
        return $default;
    }

    /**
     * Sets the @page(configuration block).
     * @param array $config
     */
    protected function setConfig(array $config)
    {
        $this->config = $config;
    }

}