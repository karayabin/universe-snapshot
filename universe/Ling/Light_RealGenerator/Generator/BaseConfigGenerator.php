<?php


namespace Ling\Light_RealGenerator\Generator;


use Ling\Bat\BDotTool;
use Ling\Bat\CaseTool;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_DatabaseInfo\Service\LightDatabaseInfoService;
use Ling\Light_RealGenerator\Exception\LightRealGeneratorException;
use Ling\SqlWizard\Util\MysqlStructureReader;

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
     * This function to call for debugging log messages.
     *
     *
     * @var callable = null
     */
    protected $debugCallable;

    /**
     * Builds the ListConfigGenerator instance.
     */
    public function __construct()
    {
        $this->container = null;
        $this->config = [];
        $this->debugCallable = null;
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

    /**
     * Sets the debugCallable.
     *
     * @param callable $debugCallable
     */
    public function setDebugCallable(callable $debugCallable)
    {
        $this->debugCallable = $debugCallable;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Calls the debugCallable function if set.
     *
     * @param string $msg
     */
    protected function debugLog(string $msg)
    {
        if (null !== $this->debugCallable) {
            call_user_func($this->debugCallable, $msg);
        }
    }


    /**
     * Returns the given absolute path, with the application directory replaced by a symbol if found.
     * If not, the path is returned as is.
     *
     *
     * For instance: [app]/my/image.png
     *
     * @param string $path
     * @return string
     */
    protected function getSymbolicPath(string $path): string
    {
        $appDir = $this->container->getApplicationDir();
        $p = explode($appDir, $path, 2);
        if (2 === count($p)) {
            return '[app]' . array_pop($p);
        }
        return $path;
    }


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

    /**
     * Returns the array of generic tags (used in the list and form configuration files), based on the given table.
     *
     * @param string $table
     * @return array
     * @throws \Exception
     */
    protected function getGenericTagsByTable(string $table): array
    {
        $tableNoPrefix = $this->getTableWithoutPrefix($table);
        $tableLabel = str_replace("_", " ", $tableNoPrefix);
        $tableLabelUcFirst = ucfirst($tableLabel);
        return [
            '{label}' => $tableLabel,
            '{Label}' => $tableLabelUcFirst,
            '{table}' => $table,
            '{TableClass}' => CaseTool::toPascal($table),
        ];
    }

    /**
     * Returns the table name without prefix.
     *
     * @param string $table
     * @return string
     * @throws \Exception
     */
    protected function getTableWithoutPrefix(string $table): string
    {
        $prefixes = $this->getKeyValue("table_prefixes", false, []);
        foreach ($prefixes as $prefix) {
            if (0 === strpos($table, $prefix)) {
                return substr($table, strlen($prefix . "_"));
            }
        }
        return $table;
    }


    /**
     * Returns whether the given table is a **has** table (aka a many to many table, such as user_has_permission for instance).
     * @param string $table
     * @return bool
     * @throws \Exception
     */
    protected function isHasTable(string $table): bool
    {
        $hasTables = $this->getKeyValue("has_tables", false, []);
        $hasKeywords = $hasTables['keywords'] ?? ['has'];
        foreach ($hasKeywords as $hasKeyword) {
            $hasKeyword = '_' . $hasKeyword . '_';
            if (false !== strpos($table, $hasKeyword)) {
                return true;
            }
        }
        return false;
    }


    /**
     * Returns the tableInfo array, either from the createFile, or from the database, depending on the configuration.
     *
     * @param string $table
     * @return array
     * @throws LightRealGeneratorException
     * @throws \Exception
     */
    protected function getTableInfo(string $table): array
    {
        $createFile = $this->getKeyValue('create_file', false, null);
        if (null !== $createFile) {
            $createFile = str_replace('{app_dir}', $this->container->getApplicationDir(), $createFile);
        }
        $useCreateFile = $this->getKeyValue('use_create_file', false, false);
        $database = $this->getKeyValue('database_name', false, null);
        if (true === $useCreateFile) {
            $reader = new MysqlStructureReader();
            $readerArray = $reader->readFile($createFile);
            if (array_key_exists($table, $readerArray)) {
                $tableInfo = MysqlStructureReader::readerArrayToTableInfo($readerArray[$table], $this->container->get("database"));
            } else {
                throw new LightRealGeneratorException("Table \"$table\" not defined in create file: $createFile.");
            }
        } else {
            /**
             * @var $dbInfo LightDatabaseInfoService
             */
            $dbInfo = $this->container->get('database_info');
            $tableInfo = $dbInfo->getTableInfo($table, $database);
        }
        return $tableInfo;
    }
}