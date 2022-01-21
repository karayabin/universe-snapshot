<?php


namespace Ling\Light_BreezeGenerator\Generator;


use Ling\ArrayToString\ArrayToStringTool;
use Ling\Bat\CaseTool;
use Ling\Bat\FileSystemTool;
use Ling\Bat\StringTool;
use Ling\CheapLogger\CheapLogger;
use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_BreezeGenerator\Exception\LightBreezeGeneratorException;
use Ling\Light_BreezeGenerator\Tool\LightBreezeGeneratorTool;
use Ling\Light_Database\Service\LightDatabaseService;
use Ling\Light_DatabaseInfo\Service\LightDatabaseInfoService;
use Ling\SqlWizard\Util\MysqlStructureReader;

/**
 * The LingBreezeGenerator2 class.
 *
 *
 * This is my personal generator.
 * Feel free to use it if you like it.
 *
 * See the @page(ling-breeze-generator-2.md) document for more details.
 *
 *
 *
 *
 * The variables array:
 * -----------------
 *
 * In this generator, we pass a variables array containing a lot of useful information.
 * The variables array has at most the following structure:
 *
 * - db: string
 * - namespace: string
 * - table: string
 * - className: string
 * - classNamePlural: string
 * - humanName: string
 * - humanNamePlural: string
 * - variableName: string
 * - variableNamePlural: string
 * - objectClassName: string
 * - ric: array
 * - ricVariables: array (more details in the getRicVariables method comments)
 * - uniqueIndexesVariables: array (more details in the getUniqueIndexesVariables method comments)
 * - autoIncrementedKey: string|false
 * - useMicroPermission: bool=false, whether to use the micro permission system
 * - relativeDirXXX: string=null, the relative path from the base directory (containing all the classes) to the directory containing
 *      the XXX class. If null, the base directory is the parent of the XXX class.
 * - hasCustomClass: bool, whether the created class has a custom class associated with it
 * - foreignKeysInfo: array, foreign keys information (see the @page(LightDatabaseInfoService->getTableInfo) method for more details)
 * - types: array, an array of column name => mysql type (see the @page(LightDatabaseInfoService->getTableInfo) method for more details)
 * - hasItems: array, see the @page(LightDatabaseInfoService->getTableInfo) method for more details
 * - allPrefixes: array, containing all the table prefixes used by this generating session.
 *
 *
 *
 */
class LingBreezeGenerator2 implements BreezeGeneratorInterface, LightServiceContainerAwareInterface
{

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * This property holds the alreadyUsedMethodNames for this instance.
     * Not all already used method names are stored here, just those that might create conflicts.
     *
     * @var array
     */
    private $alreadyUsedMethodNames;

    /**
     * This property holds the alreadyUsedMethodNamesInterface for this instance.
     * Same as $alreadyUsedMethodNames, but for interfaces.
     * @var array
     */
    private $alreadyUsedMethodNamesInterface;


    /**
     * This property holds the _usePrefixInMethodNames for this instance.
     * @var bool
     */
    private $_usePrefixInMethodNames;

    /**
     * This property holds the _allPrefixes for this instance.
     * @var array
     */
    private $_allPrefixes;


    /**
     * Custom templates to use instead of the default ones.
     * Available values are:
     * - base: to override the generated base api class
     * - factory: to override the generated factory class
     *
     *
     * @var array
     */
    private array $customTemplates;

    /**
     * Whether to generate interfaces for custom classes.
     * @var bool = false
     */
    private bool $useCustomInterfaces;


    /**
     * Builds the LingBreezeGenerator instance.
     */
    public function __construct()
    {
        $this->container = null;
        $this->alreadyUsedMethodNames = [];
        $this->alreadyUsedMethodNamesInterface = [];
        $this->_usePrefixInMethodNames = true;
        $this->useCustomInterfaces = true;
        $this->_allPrefixes = [];
        $this->customTemplates = [];
    }

    /**
     * @implementation
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }


    /**
     * @implementation
     */
    public function generate(array $conf)
    {

        $sourceType = null;

        //--------------------------------------------
        // CONFIGURATION
        //--------------------------------------------
        $options = $conf['options'] ?? [];
        $devMode = $options['dev'] ?? false;
        $this->_usePrefixInMethodNames = (bool)($options['usePrefixInMethodNames'] ?? true);
        $dbInfoService = $options['dbInfoService'] ?? null;
        $this->customTemplates = $options['templates'] ?? [];
        $this->useCustomInterfaces = $options['useCustomInterfaces'] ?? true;


        $source = $conf['source'];
        if (array_key_exists("file", $source)) {
            $sourceType = "file";
        } elseif (array_key_exists("tables", $source)) {
            $sourceType = "tables";
        } elseif (array_key_exists("database", $source) && true === $source['database']) {
            $sourceType = "database";
        }
        $prefix = $source['prefix'] ?? null;
        $allPrefixes = $source['prefixes'] ?? [];
        $this->_allPrefixes = $allPrefixes;


        $target = $conf['target'];
        $dir = $this->replaceCommonTags($target['dir']);
        $namespace = $target['namespace'];
        $apiName = $target['apiName'];


        //--------------------------------------------
        //
        //--------------------------------------------
        /**
         * @var $dbInfo LightDatabaseInfoService
         */
        if (null !== $dbInfoService) {
            $dbInfo = $dbInfoService;
            if (false === ($dbInfo instanceof LightDatabaseInfoService)) {
                $this->error("Conf error: dbInfoService must be an instance of LightDatabaseInfoService");
            }
        } else {
            $dbInfo = $this->container->get('database_info');
        }


        /**
         * @var $pdoWrapper LightDatabaseService
         */
        $pdoWrapper = $this->container->get('database');

        $database = $pdoWrapper->getDatabaseName();


        $factoryClassName = $apiName . "ApiFactory";
        $baseClassName = $apiName . "BaseApi";


        $customPrefix = 'Custom';
        $classSuffix = 'Api';
        $interfaceSuffix = 'Interface';


        //--------------------------------------------
        // COLLECT THE TABLES TO GENERATE
        //--------------------------------------------
        $tables = [];
        if ('file' === $sourceType) {
            $r = new MysqlStructureReader();
            $sourceFile = $this->replaceCommonTags($source['file']);


            $tables = $r->readFile($sourceFile);
        } elseif ('database' === $sourceType) {
            $tables = $dbInfo->getTables();
        } elseif ('tables' === $sourceType) {
            $tables = $source['tables'];
        }


        //--------------------------------------------
        // NOW GENERATE THE TABLES OBJECTS
        //--------------------------------------------
        $sFactoryMethods = "";
        $sFactoryUses = "";
        $containerIncluded = false;


        foreach ($tables as $table) {


            // reset cache per table
            $this->alreadyUsedMethodNamesInterface = [];
            $this->alreadyUsedMethodNames = [];

            // get table info
            if ('file' === $sourceType) {
                $readerArr = $table;
                $theTable = $readerArr['table'];
                $tableInfo = MysqlStructureReader::readerArrayToTableInfo($readerArr, $pdoWrapper, $database);
                $table = $theTable;
            } else {
                $tableInfo = $dbInfo->getTableInfo($table);
            }


            // prefix filtering
            if (null !== $prefix && 0 !== strpos($table, $prefix . "_")) {
                continue;
            }


            $types = $tableInfo['types'];
            $foreignKeysInfo = $tableInfo['foreignKeysInfo'];
            $hasItems = $tableInfo['hasItems'];


            $tableClassName = $table;

            // strip the prefix from the table name?
            if (null !== $prefix) {
                if (0 === strpos($tableClassName, $prefix . "_")) {
                    $tableClassName = substr($tableClassName, strlen($prefix . "_"));
                }
            }


            $className = $this->getClassNameFromTable($tableClassName);
            $classNamePlural = StringTool::getPlural($className);
            $humanName = CaseTool::toHumanFlatCase($className);
            $humanNamePlural = StringTool::getPlural($humanName);
            $variableName = CaseTool::toVariableName($className);
            $variableNamePlural = StringTool::getPlural($variableName);


            $objectClassName = $className . $classSuffix;
            $ricVariables = $this->getRicVariables($tableInfo['ric'], $types);
            $uniqueIndexesVariables = $this->getUniqueIndexesVariables($tableInfo['uniqueIndexes'], $types);

            $customClassPath = $this->getClassPath($dir, $customPrefix . $objectClassName, 'Custom');
            $hasCustomClass = file_exists($customClassPath);


            //--------------------------------------------
            // GENERATE OBJECT
            //--------------------------------------------
            $content = $this->generateObjectClass([
                "apiName" => $apiName,
                "db" => $database,
                "namespace" => $namespace,
                "table" => $table,
                "humanName" => $humanName,
                "humanNamePlural" => $humanNamePlural,
                "variableName" => $variableName,
                "variableNamePlural" => $variableNamePlural,
                "className" => $className,
                "classNamePlural" => $classNamePlural,
                "objectClassName" => $objectClassName,
                "interfaceSuffix" => $interfaceSuffix,
                "baseClassName" => $baseClassName,
                "ric" => $tableInfo['ric'],
                "ricVariables" => $ricVariables,
                "uniqueIndexesVariables" => $uniqueIndexesVariables,
                "autoIncrementedKey" => $tableInfo['autoIncrementedKey'],
                "hasCustomClass" => $hasCustomClass,
                "foreignKeysInfo" => $foreignKeysInfo,
                "types" => $types,
                "hasItems" => $hasItems,
                "allPrefixes" => $allPrefixes,
            ]);
            $bs0Path = $this->getClassPath($dir, 'Generated/Classes/' . $objectClassName);
            FileSystemTool::mkfile($bs0Path, $content);


            //--------------------------------------------
            // GENERATE OBJECT INTERFACE
            //--------------------------------------------
            $content = $this->generateObjectInterfaceClass([
                "namespace" => $namespace,
                "table" => $table,
                "humanName" => $humanName,
                "humanNamePlural" => $humanNamePlural,
                "variableName" => $variableName,
                "variableNamePlural" => $variableNamePlural,
                "className" => $className,
                "classNamePlural" => $classNamePlural,
                "objectClassName" => $objectClassName,
                "interfaceSuffix" => $interfaceSuffix,
                "ricVariables" => $ricVariables,
                "ric" => $tableInfo['ric'],
                "uniqueIndexesVariables" => $uniqueIndexesVariables,
                "autoIncrementedKey" => $tableInfo['autoIncrementedKey'],
                "foreignKeysInfo" => $foreignKeysInfo,
                "types" => $types,
                "hasItems" => $hasItems,
                "allPrefixes" => $allPrefixes,
            ]);

            $bs0Path = $this->getClassPath($dir, $objectClassName . $interfaceSuffix, 'Generated/Interfaces');
            FileSystemTool::mkfile($bs0Path, $content);


            // preparing custom classes
            $methodClassName = $objectClassName;
            $interfaceClassName = $objectClassName . $interfaceSuffix;
            $returnedClassName = $customPrefix . $objectClassName;
            $relativeDirFactory = 'Generated';

            $customNamespace = $this->getClassNamespace($namespace, 'Custom\Classes');
            $sFactoryUses .= 'use ' . $customNamespace . "\\" . $returnedClassName . ";" . PHP_EOL;

            if (true === $this->useCustomInterfaces) {
                $interfaceNamespace = $this->getClassNamespace($namespace, 'Custom\Interfaces');
                $sFactoryUses .= 'use ' . $interfaceNamespace . "\\" . 'Custom' . $interfaceClassName . ";" . PHP_EOL;
            }


            // preparing factory
            $sFactoryMethods .= $this->getFactoryMethod([
                'methodClassName' => $methodClassName,
                'objectClassName' => $objectClassName,
                'returnedClassName' => $returnedClassName,
                'hasCustomClass' => true,
                'interfaceClassName' => $interfaceClassName,
            ]);
            $sFactoryMethods .= PHP_EOL;
            $sFactoryMethods .= PHP_EOL;


            //--------------------------------------------
            // GENERATE CUSTOM CLASS
            //--------------------------------------------
            $content = $this->generateCustomClass([
                "namespace" => $namespace,
                "objectClassName" => $objectClassName,
                "interfaceSuffix" => $interfaceSuffix,
            ]);
            $bs0Path = $this->getClassPath($dir, 'Custom/Classes/Custom' . $objectClassName);
            if (true === $devMode || false === file_exists($bs0Path)) {
                FileSystemTool::mkfile($bs0Path, $content);
            }


            if (true === $this->useCustomInterfaces) {

                //--------------------------------------------
                // GENERATE CUSTOM INTERFACES
                //--------------------------------------------
                $content = $this->generateCustomInterfaces([
                    "namespace" => $namespace,
                    "objectClassName" => $objectClassName,
                    "interfaceSuffix" => $interfaceSuffix,
                ]);
                $bs0Path = $this->getClassPath($dir, 'Custom/Interfaces/Custom' . $objectClassName . $interfaceSuffix);
                if (true === $devMode || false === file_exists($bs0Path)) {
                    FileSystemTool::mkfile($bs0Path, $content);
                }
            }

        }


        //--------------------------------------------
        // GENERATE OBJECT FACTORY
        //--------------------------------------------
        $extraPropertiesDefinition = [];
        $extraPropertiesInstantiation = [];
        $extraPublicMethods = [];


        $content = $this->generateObjectFactoryClass([
            "namespace" => $namespace,
            "factoryClassName" => $factoryClassName,
            "factoryMethods" => $sFactoryMethods,
            "classSuffix" => $classSuffix,
            "uses" => $sFactoryUses,
            "extraPropertiesDefinition" => implode(PHP_EOL . PHP_EOL, $extraPropertiesDefinition),
            "extraPropertiesInstantiation" => "\t\t" . implode(PHP_EOL . "\t\t", $extraPropertiesInstantiation),
            "extraPublicMethods" => implode(PHP_EOL, $extraPublicMethods),
            "relativeDirFactory" => $relativeDirFactory,
        ]);


        $bs0Path = $this->getClassPath($dir, $factoryClassName, $relativeDirFactory);
        FileSystemTool::mkfile($bs0Path, $content);


        //--------------------------------------------
        // GENERATE OBJECT ABSTRACT PARENT
        //--------------------------------------------
        $content = $this->generateObjectBase([
            "namespace" => $namespace,
            "baseClassName" => $baseClassName,
        ]);
        $bs0Path = $this->getClassPath($dir, $baseClassName, 'Generated/Classes');
        FileSystemTool::mkfile($bs0Path, $content);


        //--------------------------------------------
        // GENERATE CUSTOM BASE CLASS
        //--------------------------------------------
        $content = $this->generateCustomBaseClass([
            "namespace" => $namespace,
            "objectClassName" => $objectClassName,
            "interfaceSuffix" => $interfaceSuffix,
            "baseClassName" => $baseClassName,
        ]);
        $bs0Path = $this->getClassPath($dir, 'Custom' . $baseClassName, 'Custom/Classes');
        if (true === $devMode || false === file_exists($bs0Path)) {
            FileSystemTool::mkfile($bs0Path, $content);
        }


        //--------------------------------------------
        // GENERATE CUSTOM FACTORY
        //--------------------------------------------
        $content = $this->generateCustomFactory([
            "namespace" => $namespace,
            "objectClassName" => $objectClassName,
            "interfaceSuffix" => $interfaceSuffix,
            "factoryClassName" => $factoryClassName,
        ]);
        $bs0Path = $this->getClassPath($dir, 'Custom' . $factoryClassName, 'Custom');
        if (true === $devMode || false === file_exists($bs0Path)) {
            FileSystemTool::mkfile($bs0Path, $content);
        }


    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the content of an object class based on the given variables.
     * The variables array structure is defined in this class description.
     *
     * @param array $variables
     * @return string
     * @throws \Exception
     */
    public function generateObjectClass(array $variables): string
    {


        $template = __DIR__ . "/../assets/classModel/Ling/template/UserObject2.phtml";
        $content = file_get_contents($template);
        $namespace = $variables['namespace'];


        $objectClassName = $variables['objectClassName'];
        $baseClassName = 'Custom' . $variables['baseClassName'];
        $table = $variables['table'];
        $database = $variables['db'];
        $hasCustomClass = $variables['hasCustomClass'];
        $foreignKeysInfo = $variables['foreignKeysInfo'];
        $types = $variables['types'];
        $ric = $variables['ric'];
        $objectInterfaceName = $objectClassName . $variables['interfaceSuffix'];

        $namespaceClass = $this->getClassNamespace($namespace, 'Generated\\Classes');
        $namespaceBaseApi = $this->getClassNamespace($namespace, 'Custom\\Classes');
        $namespaceInterface = $this->getClassNamespace($namespace, 'Generated\\Interfaces');


        $fullTable = "`$database`.`$table`";
        $defaultValues = $this->container->get("sql_wizard")->getMysqlWizard()->getColumnDefaultApiValues($fullTable);
        $sDefaultValues = trim(ArrayToStringTool::toPhpArray($defaultValues, true), '[]');
        $sDefaultValues = StringTool::indent($sDefaultValues, 8);


        $content = str_replace('// getDefaultValues.array.here', $sDefaultValues, $content);

        //--------------------------------------------
        //
        //--------------------------------------------
        if (true === $hasCustomClass) {
            $content = str_replace('class UserObject', 'abstract class UserObject', $content);
        }


        /**
         * replacing multiple insert first
         */
        $content = str_replace('// multipleInsertXXX', $this->getInsertMultipleMethod($variables), $content);


        $content = str_replace('UserObjectInterface', $objectInterfaceName, $content);
        $content = str_replace('The\ObjectNamespace', $namespaceClass, $content);
        $content = str_replace('UserObject', $objectClassName, $content);
        $content = str_replace('BaseParent', $baseClassName, $content);
        $content = str_replace('theTableName', $table, $content);
        $content = str_replace('// insertXXX', $this->getInsertMethod($variables), $content);


        //--------------------------------------------
        // HEADER METHODS
        //--------------------------------------------
        $content = str_replace('// fetchFetchAllXXX', $this->getFetchFetchAllYYYMethod($variables), $content);
        $content = str_replace('// getXXX', $this->getGetUserByIdMethod($variables), $content);
        $content = str_replace('// getTheItems', $this->getItemsMethod($variables), $content);
        $content = str_replace('// getThe_ItemsColumn', $this->getItemsMethod($variables, 'getUserItemsColumn'), $content);
        $content = str_replace('// getThe_Items_Columns', $this->getItemsMethod($variables, 'getUserItemsColumns'), $content);
        $content = str_replace('// getThe_Items_Key2Value', $this->getItemsMethod($variables, 'getUserItemsKey2Value'), $content);
        $content = str_replace('// getTheItem', $this->getItemMethod($variables), $content);
        $content = str_replace('// getIdByXXX', $this->getIdByUniqueIndexMethods($variables), $content);

        $content = str_replace('// getItemsByForeignKeys', $this->getItemsByForeignKeysMethod($variables), $content);
        $content = str_replace('// getItemsByHas', $this->getItemsByHasMethod($variables), $content);
        $content = str_replace('// getItemXXXByHas', $this->getItemsXXXByHasMethod($variables), $content);

        $content = str_replace('// getAllXXX', $this->getAllMethod($variables), $content);
        $content = str_replace('// updateXXX', $this->getUpdateUserByIdMethod($variables), $content);
        $content = str_replace('// updateRawXXX', $this->getUpdateUserMethod($variables), $content);
        $content = str_replace('// deleteXXX', $this->getDeleteUserByIdMethod($variables), $content);
        $content = str_replace('// deleteYYY', $this->getDeleteMethod(), $content);


        $content = str_replace('// deleteByFkXXX', $this->getDeleteByFkMethod($variables), $content);


        if (1 === count($ric)) {
            $content = str_replace('// deletesXXX', $this->getDeleteUserByIdsMethod($variables), $content);
        }


        $uniqueIndexesVariables = $variables['uniqueIndexesVariables'];
        if ($uniqueIndexesVariables) {
            $uniqueVariables = $variables;
            foreach ($uniqueIndexesVariables as $set) {
                $uniqueVariables['ricVariables'] = $set;
                $content = str_replace('// getXXX', $this->getGetUserByIdMethod($uniqueVariables), $content);
                $content = str_replace('// updateXXX', $this->getUpdateUserByIdMethod($uniqueVariables), $content);
//                $content = str_replace('// updateRawXXX', $this->getRicMethod("updateUser", $uniqueVariables), $content);
                $content = str_replace('// deleteXXX', $this->getDeleteUserByIdMethod($uniqueVariables), $content);
                $content = str_replace('// deletesXXX', $this->getDeleteUserByIdsMethod($uniqueVariables), $content);
            }
        }


        //--------------------------------------------
        // HAS TABLES
        //--------------------------------------------
        /**
         * For has tables (which ric is only composed of foreign keys, we often want to delete the entries based on only one of the
         * foreign keys (i.e. not both at the same time)
         *
         */
        $isHasTable = true;
        if ($foreignKeysInfo) {
            foreach ($ric as $column) {
                if (false === array_key_exists($column, $foreignKeysInfo)) {
                    $isHasTable = false;
                }
            }
        } else {
            $isHasTable = false;
        }
        if (true === $isHasTable) {
            foreach ($ric as $column) {
                $fkRicVariables = $variables;
                $fkRicVariables['ricVariables'] = $this->getRicVariables([$column], $types); // hacking myself (faster)
                $content = str_replace('// deleteXXX', $this->getDeleteUserByIdMethod($fkRicVariables), $content);
                $content = str_replace('// deletesXXX', $this->getDeleteUserByIdsMethod($fkRicVariables), $content);
            }
        }


        // cleaning
        $content = str_replace('// getXXX', '', $content);
        $content = str_replace('// updateXXX', '', $content);
        $content = str_replace('// updateRawXXX', '', $content);
        $content = str_replace('// deleteXXX', '', $content);
        $content = str_replace('// deletesXXX', '', $content);


        // uses
        $uses = [];
        $uses[] = "use " . $namespaceBaseApi . "\\$baseClassName;";
        $uses[] = "use " . $namespaceInterface . "\\$objectInterfaceName;";

        $content = str_replace('// the uses', implode(PHP_EOL, $uses) . PHP_EOL, $content);
        return $content;

    }


    /**
     * Returns the content of an object interface class based on the given variables.
     * The variables array structure is defined in this class description.
     *
     * @param array $variables
     * @return string
     * @throws \Exception
     */
    public function generateObjectInterfaceClass(array $variables): string
    {


        $template = __DIR__ . "/../assets/classModel/Ling/template/UserObjectInterface2.phtml";
        $content = file_get_contents($template);
        $ric = $variables['ric'];
        $foreignKeysInfo = $variables['foreignKeysInfo'];
        $types = $variables['types'];
        $namespace = $this->getClassNamespace($variables['namespace'], 'Generated\Interfaces');
        $objectClassName = $variables['objectClassName'] . $variables['interfaceSuffix'];

        $content = str_replace('The\ObjectNamespace', $namespace, $content);
        $content = str_replace('UserObjectInterface', $objectClassName, $content);

        $content = str_replace('// multipleInsertXXX', $this->getMultipleInsertXXXInterfaceMethod($variables), $content);

        $content = str_replace('// fetchFetchAllXXX', $this->getFetchFetchAllXXXInterfaceMethod($variables), $content);

        $content = str_replace('// insertXXX', $this->getInsertXXXInterfaceMethod($variables), $content);

        $content = str_replace('// getXXX', $this->getGetXXXByIdInterfaceMethod($variables), $content);

        $content = str_replace('// getTheItems', $this->getItemsInterfaceMethod($variables), $content);
        $content = str_replace('// getThe_Items_Column', $this->getItemsInterfaceMethod($variables, 'getUserItemsColumnInterface'), $content);
        $content = str_replace('// get_The_Items_Columns', $this->getItemsInterfaceMethod($variables, 'getUserItemsColumnsInterface'), $content);
        $content = str_replace('// get_The_Items_Key2Value', $this->getItemsInterfaceMethod($variables, 'getUserItemsKey2ValueInterface'), $content);


        $content = str_replace('// getTheItem', $this->getItemInterfaceMethod($variables), $content);


        $content = str_replace('// getItemsByForeignKeys', $this->getItemsByForeignKeysInterfaceMethod($variables), $content);
        $content = str_replace('// getItemsByHas', $this->getItemsByHasInterfaceMethod($variables), $content);
        $content = str_replace('// getItemXXXByHas', $this->getItemsXXXByHasInterfaceMethod($variables), $content);
        $content = str_replace('// getIdByXXX', $this->getIdByUniqueIndexInterfaceMethods($variables), $content);

        if (1 === count($ric)) {
            $content = str_replace('// getAllXXX', $this->getGetAllXXXInterfaceMethod($variables), $content);
        } else {
            $content = str_replace('// getAllXXX', '', $content);
        }

        $content = str_replace('// updateXXX', $this->getUpdateXXXByIdInterfaceMethod($variables), $content);
        $content = str_replace('// updateRawXXX', $this->getUpdateXXXInterfaceMethod($variables), $content);
        $content = str_replace('// deleteXXX', $this->getDeleteXXXByIdInterfaceMethod($variables), $content);
        $content = str_replace('// deleteYYY', $this->getDeleteMethodInterface($variables), $content);


        $content = str_replace('// deleteByFkXXX', $this->getDeleteByFkMethodInterface($variables), $content);


        if (1 === count($ric)) {
            $content = str_replace('// deletesXXX', $this->getDeleteXXXByIdsInterfaceMethod($variables), $content);
        }


        $uniqueIndexesVariables = $variables['uniqueIndexesVariables'];
        if ($uniqueIndexesVariables) {
            $uniqueVariables = $variables;
            foreach ($uniqueIndexesVariables as $set) {
                $uniqueVariables['ricVariables'] = $set;
                $content = str_replace('// getXXX', $this->getGetXXXByIdInterfaceMethod($uniqueVariables), $content);
                $content = str_replace('// updateXXX', $this->getUpdateXXXByIdInterfaceMethod($uniqueVariables), $content);
//                $content = str_replace('// updateRawXXX', $this->getInterfaceMethod('updateXXX', $uniqueVariables), $content);
                $content = str_replace('// deleteXXX', $this->getDeleteXXXByIdInterfaceMethod($uniqueVariables), $content);
                $content = str_replace('// deletesXXX', $this->getDeleteXXXByIdsInterfaceMethod($uniqueVariables), $content);
            }
        }


        //--------------------------------------------
        // HAS TABLES
        //--------------------------------------------
        /**
         * For has tables (which ric is only composed of foreign keys, we often want to delete the entries based on only one of the
         * foreign keys (i.e. not both at the same time)
         *
         */
        $isHasTable = true;
        if ($foreignKeysInfo) {
            foreach ($ric as $column) {
                if (false === array_key_exists($column, $foreignKeysInfo)) {
                    $isHasTable = false;
                }
            }
        } else {
            $isHasTable = false;
        }

        if (true === $isHasTable) {
            foreach ($ric as $column) {
                $fkRicVariables = $variables;
                $fkRicVariables['ricVariables'] = $this->getRicVariables([$column], $types); // hacking myself (faster)


                $content = str_replace('// deleteXXX', $this->getDeleteXXXByIdInterfaceMethod($fkRicVariables), $content);
                $content = str_replace('// deletesXXX', $this->getDeleteXXXByIdsInterfaceMethod($fkRicVariables), $content);
            }
        }


        //--------------------------------------------
        // cleaning
        //--------------------------------------------
        $content = str_replace('// getXXX', '', $content);
        $content = str_replace('// updateXXX', '', $content);
        $content = str_replace('// updateRawXXX', '', $content);
        $content = str_replace('// deleteXXX', '', $content);
        $content = str_replace('// deletesXXX', '', $content);

        return $content;

    }


    /**
     * Returns the content of an object factory class based on the given variables.
     * The variables array structure is defined in this class description.
     *
     * @param array $variables
     * @return string
     */
    public function generateObjectFactoryClass(array $variables): string
    {

        if (true === array_key_exists("factory", $this->customTemplates)) {
            $template = $this->customTemplates['factory'];
        } else {
            $template = __DIR__ . "/../assets/classModel/Ling/template/MyFactory.phtml";
        }

        $content = file_get_contents($template);
        $namespace = $this->getClassNamespace($variables['namespace'], $variables['relativeDirFactory']);
        $factoryClassName = $variables['factoryClassName'];
        $sFactoryMethods = $variables['factoryMethods'];
        $sUses = $variables['uses'];
        $extraPropertiesDefinition = $variables['extraPropertiesDefinition'];
        $extraPropertiesInstantiation = $variables['extraPropertiesInstantiation'];
        $extraPublicMethods = $variables['extraPublicMethods'];


        $content = str_replace('The\ObjectNamespace', $namespace, $content);
        $content = str_replace('MyFactory', $factoryClassName, $content);
        $content = str_replace('// getXXX', $sFactoryMethods, $content);
        $content = str_replace('// use', $sUses, $content);


        $content = str_replace('//::extraProperties--definition', $extraPropertiesDefinition, $content);
        $content = str_replace('//::extraProperties--instantiation', $extraPropertiesInstantiation, $content);
        $content = str_replace('//::extraPublicMethods', $extraPublicMethods, $content);


        return $content;

    }


    /**
     * Returns the content of a custom class based on the given variables.
     * The variables array structure is defined in this class description.
     *
     * @param array $variables
     * @return string
     * @throws \Exception
     */
    public function generateCustomClass(array $variables): string
    {


        if (true === $this->useCustomInterfaces) {
            $template = __DIR__ . "/../assets/classModel/Ling/template/CustomUserObject.phtml";
        } else {
            $template = __DIR__ . "/../assets/classModel/Ling/template/CustomUserObjectNoInterface.phtml";
        }
        $content = file_get_contents($template);
        $namespace = $variables['namespace'];

        $objectClassName = $variables['objectClassName'];
        $baseClassName = $variables['objectClassName'];
        $objectInterfaceName = 'Custom' . $objectClassName . $variables['interfaceSuffix'];

        $namespaceClass = $this->getClassNamespace($namespace, 'Custom\\Classes');
        $namespaceBaseApi = $this->getClassNamespace($namespace, 'Generated\\Classes');
        $namespaceInterface = $this->getClassNamespace($namespace, 'Custom\\Interfaces');


        $content = str_replace('UserObjectInterface', $objectInterfaceName, $content);
        $content = str_replace('The\ObjectNamespace', $namespaceClass, $content);
        $content = str_replace('UserObject', 'Custom' . $objectClassName, $content);
        $content = str_replace('BaseParent', $baseClassName, $content);


        // uses
        $uses = [];
        $uses[] = "use " . $namespaceBaseApi . "\\$baseClassName;";
        if (true === $this->useCustomInterfaces) {
            $uses[] = "use " . $namespaceInterface . "\\$objectInterfaceName;";
        }

        $content = str_replace('// the uses', implode(PHP_EOL, $uses) . PHP_EOL, $content);
        return $content;

    }


    /**
     * Returns the content of a custom base class based on the given variables.
     * The variables array structure is defined in this class description.
     *
     * @param array $variables
     * @return string
     * @throws \Exception
     */
    public function generateCustomBaseClass(array $variables): string
    {
        $template = __DIR__ . "/../assets/classModel/Ling/template/MyCustomObjectBase.phtml";
        $content = file_get_contents($template);
        $namespace = $variables['namespace'];

        $baseClassName = $variables['baseClassName'];

        $namespaceClass = $this->getClassNamespace($namespace, 'Custom\\Classes');
        $namespaceBaseApi = $this->getClassNamespace($namespace, 'Generated\\Classes');


        $content = str_replace('The\ObjectNamespace', $namespaceClass, $content);
        $content = str_replace('UserObject', 'Custom' . $baseClassName, $content);
        $content = str_replace('BaseParent', $baseClassName, $content);


        // uses
        $uses = [];
        $uses[] = "use " . $namespaceBaseApi . "\\$baseClassName;";

        $content = str_replace('// the uses', implode(PHP_EOL, $uses) . PHP_EOL, $content);
        return $content;

    }


    /**
     * Returns the content of a custom factory based on the given variables.
     * The variables array structure is defined in this class description.
     *
     * @param array $variables
     * @return string
     * @throws \Exception
     */
    public function generateCustomFactory(array $variables): string
    {


        $template = __DIR__ . "/../assets/classModel/Ling/template/MyCustomFactory.phtml";
        $content = file_get_contents($template);
        $namespace = $variables['namespace'];

        $factoryClassName = $variables['factoryClassName'];

        $namespaceClass = $this->getClassNamespace($namespace, 'Custom');
        $namespaceBaseApi = $this->getClassNamespace($namespace, 'Generated');


        $content = str_replace('The\ObjectNamespace', $namespaceClass, $content);
        $content = str_replace('UserObject', 'Custom' . $factoryClassName, $content);
        $content = str_replace('BaseParent', $factoryClassName, $content);


        // uses
        $uses = [];
        $uses[] = "use " . $namespaceBaseApi . "\\$factoryClassName;";

        $content = str_replace('// the uses', implode(PHP_EOL, $uses) . PHP_EOL, $content);
        return $content;

    }

    /**
     * Returns the content of a custom interfaces based on the given variables.
     * The variables array structure is defined in this class description.
     *
     * @param array $variables
     * @return string
     * @throws \Exception
     */
    public function generateCustomInterfaces(array $variables): string
    {


        $template = __DIR__ . "/../assets/classModel/Ling/template/CustomUserObjectInterface.phtml";
        $content = file_get_contents($template);
        $namespace = $variables['namespace'];

        $objectClassName = $variables['objectClassName'];
        $objectInterfaceName = 'Custom' . $objectClassName . $variables['interfaceSuffix'];
        $generatedInterfaceName = $objectClassName . $variables['interfaceSuffix'];
        $namespaceBaseApi = $this->getClassNamespace($namespace, 'Generated\\Interfaces');

        $namespaceClass = $this->getClassNamespace($namespace, 'Custom\\Interfaces');


        $content = str_replace('UserObjectInterface', $objectInterfaceName, $content);
        $content = str_replace('The\ObjectNamespace', $namespaceClass, $content);
        $content = str_replace('GeneratedInterface', $generatedInterfaceName, $content);

        // uses
        $uses = [];
        $uses[] = "use " . $namespaceBaseApi . "\\$generatedInterfaceName;";

        $content = str_replace('// the uses', implode(PHP_EOL, $uses) . PHP_EOL, $content);


        return $content;

    }


    /**
     * Returns the content of an object abstract parent class based on the given variables.
     *
     * The variables array structure is defined in this class description.
     *
     * @param array $variables
     * @return string
     */
    public function generateObjectBase(array $variables): string
    {

        if (true === array_key_exists("base", $this->customTemplates)) {
            $template = $this->customTemplates['base'];
        } else {
            $template = __DIR__ . "/../assets/classModel/Ling/template/MyObjectBase2.phtml";
        }
        $content = file_get_contents($template);

        $namespace = $this->getClassNamespace($variables['namespace'], 'Generated\Classes');
        $baseClassName = $variables['baseClassName'];
        $content = str_replace('The\ObjectNamespace', $namespace, $content);
        $content = str_replace('BaseLightUserDatabaseApi', $baseClassName, $content);


        return $content;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the class name from the given table name.
     *
     * @param string $table
     * @return string
     */
    protected function getClassNameFromTable(string $table): string
    {
        // if not overridden by conf...
        $name = LightBreezeGeneratorTool::getClassNameByTable($table);
        return $name;
    }


    /**
     *
     *
     * Returns some useful variables based on the ric array.
     *
     * It returns at least the following entries (see the source code for all details):
     *
     * - byString: the string to append to a method name based on ric.
     *         Ex:
     *              - ById
     *              - ByFirstnameAndLastname
     * - argString: the string representing the "ric" arguments in the method signature.
     *         Ex:
     *              - int $id
     *              - string $firstName, string $lastName
     * - variableString: the string representing the "ric" debug array in comments.
     *         Ex:
     *              - id=$id
     *              - firstName=$firstName, lastName=$lastName
     * - markerString: the string representing the "ric" arguments in the the where clause of the mysql query.
     *         Ex:
     *              - id=:id
     *              - first_name=:first_name and last_name=:last_name
     * - markerLines: an array of lines representing the $markers variable to inject into the pdo wrapper fetch method.
     *         Ex:
     *              -
     *                  "id" => $id,
     *              -
     *                  "first_name" => $first_name,
     *                  "last_name" => $last_name,
     *
     * - calledVariables: the string representing a comma separated variable names. We use it as method arguments when invoking a method.
     *          Ex:
     *              - $id
     *              - $firstName, $lastName
     *
     *
     *
     * The types array is an array of columnName => mysql type.
     *
     * A mysql type looks like this: int(11), or varchar(128) for instance.
     *
     *
     *
     *
     * @param array $ric
     * @param array $types
     * @return array
     */
    protected function getRicVariables(array $ric, array $types): array
    {
        $byString = '';
        $byStrings = '';
        $byStringNoPrefix = '';
        $byStringsNoPrefix = '';

        $byTheGivenString = '';
        $argString = '';
        $variableString = '';
        $markerString = '';
        $paramDeclarationString = '';
        $calledVariables = '';
        $markerLines = [];

        foreach ($ric as $column) {


            $columnNoPrefix = $this->getEpuratedTableName($column, $this->_allPrefixes);

            if ('' === $byString) {
                $byString .= "By" . CaseTool::toPascal($column);
            } else {
                $byString .= "And" . CaseTool::toPascal($column);
            }
            if ('' === $byStrings) {
                $byStrings .= "By" . CaseTool::toPascal(StringTool::getPlural($column));
            } else {
                $byStrings .= "And" . CaseTool::toPascal(StringTool::getPlural($column));
            }


            if ('' === $byStringNoPrefix) {
                $byStringNoPrefix .= "By" . CaseTool::toPascal($columnNoPrefix);
            } else {
                $byStringNoPrefix .= "And" . CaseTool::toPascal($columnNoPrefix);
            }
            if ('' === $byStringsNoPrefix) {
                $byStringsNoPrefix .= "By" . CaseTool::toPascal(StringTool::getPlural($columnNoPrefix));
            } else {
                $byStringsNoPrefix .= "And" . CaseTool::toPascal(StringTool::getPlural($columnNoPrefix));
            }

            if ('' !== $variableString) {
                $variableString .= ', ';
            }
            $variableString .= $column . "=\$" . $column;


            if ('' !== $calledVariables) {
                $calledVariables .= ', ';
            }
            $calledVariables .= '$' . $column;


            if ('' !== $byTheGivenString) {
                $byTheGivenString .= ' and ';
            }
            $byTheGivenString .= $column;

            $type = $types[$column];
            $type = explode('(', $type)[0];
            $argHint = "string";
            switch ($type) {
                case "bit":
                case "bool":
                case "boolean":
                case "int":
                case "integer":
                case "tinyint":
                case "smallint":
                case "mediumint":
                case "bigint":
                case "decimal":
                case "dec":
                case "float":
                case "double":
                case "double_precision": //?
                    $argHint = "int";
                    break;
            }
            if ('' !== $argString) {
                $argString .= ', ';
            }
            $argString .= $argHint . " \$" . $column;

            if ('' !== $markerString) {
                $markerString .= " and ";
            }
            $markerString .= "$column=:$column";
            $markerLines[] = "\"$column\" => \$$column,";

            if ('' !== $paramDeclarationString) {
                $paramDeclarationString .= "\t ";
            }
            $paramDeclarationString .= '* @param ' . $argHint . ' $' . $column . PHP_EOL;

        }

        $firstRicColumnPlural = StringTool::getPlural($ric[0]);
        $firstRicColumn = $ric[0];


        return [
            "byString" => $byString,
            "byStrings" => $byStrings,
            "byStringNoPrefix" => $byStringNoPrefix,
            "byStringsNoPrefix" => $byStringsNoPrefix,
            "byTheGivenString" => 'by the given ' . $byTheGivenString,
            "argString" => $argString,
            "variableString" => $variableString,
            "markerString" => $markerString,
            "markerLines" => $markerLines,
            "paramDeclarationString" => rtrim($paramDeclarationString),
            "calledVariables" => $calledVariables,
            "firstRicColumnPlural" => $firstRicColumnPlural,
            "firstRicColumn" => $firstRicColumn,
        ];
    }

    /**
     * Returns an array of useful variables sets based on the unique indexes array (one set per unique indexes entry is returned).
     *
     * Each set contains at least the following entries (see the source code for all details):
     *
     * - byString: the string to append to a method name based on unique indexes.
     *         Ex:
     *              - ByRealName
     *              - ByPseudoAndPassWord
     * - argString: the string representing the arguments in the method signature.
     *         Ex:
     *              - string $realName
     *              - string $pseudo, string $password
     * - variableString: the string representing the debug array in comments.
     *         Ex:
     *              - realName=$realName
     *              - pseudo=$pseudo, password=$password
     * - markerString: the string representing the arguments in the the where clause of the mysql query.
     *         Ex:
     *              - realName=:realName
     *              - pseudo=:pseudo and password=:password
     * - markerLines: an array of lines representing the $markers variable to inject into the pdo wrapper fetch method.
     *         Ex:
     *              -
     *                  "realName" => $realName,
     *              -
     *                  "pseudo" => $pseudo,
     *                  "password" => $password,
     *
     * - calledVariables: the string representing a comma separated variable names. We use it as method arguments when invoking a method.
     *          Ex:
     *              - $id
     *              - $firstName, $lastName
     *
     *
     * The types array is an array of columnName => mysql type.
     *
     * A mysql type looks like this: int(11), or varchar(128) for instance.
     *
     *
     *
     *
     * @param array $uniqueIndexes
     * @param array $types
     * @return array
     */
    protected function getUniqueIndexesVariables(array $uniqueIndexes, array $types): array
    {

        $ret = [];

        foreach ($uniqueIndexes as $columns) {


            $byString = '';
            $byStrings = '';
            $byStringNoPrefix = '';
            $byStringsNoPrefix = '';
            $byTheGivenString = '';
            $argString = '';
            $variableString = '';
            $markerString = '';
            $paramDeclarationString = '';
            $calledVariables = '';
            $markerLines = [];


            $firstColumn = null;
            foreach ($columns as $column) {

                $columnNoPrefix = $this->getEpuratedTableName($column, $this->_allPrefixes);


                if (null === $firstColumn) {
                    $firstColumn = $column;
                }

                if ('' === $byString) {
                    $byString .= "By" . CaseTool::toPascal($column);
                } else {
                    $byString .= "And" . CaseTool::toPascal($column);
                }
                if ('' === $byStrings) {
                    $byStrings .= "By" . CaseTool::toPascal(StringTool::getPlural($column));
                } else {
                    $byStrings .= "And" . CaseTool::toPascal(StringTool::getPlural($column));
                }


                if ('' === $byStringNoPrefix) {
                    $byStringNoPrefix .= "By" . CaseTool::toPascal($columnNoPrefix);
                } else {
                    $byStringNoPrefix .= "And" . CaseTool::toPascal($columnNoPrefix);
                }
                if ('' === $byStringsNoPrefix) {
                    $byStringsNoPrefix .= "By" . CaseTool::toPascal(StringTool::getPlural($columnNoPrefix));
                } else {
                    $byStringsNoPrefix .= "And" . CaseTool::toPascal(StringTool::getPlural($columnNoPrefix));
                }


                if ('' !== $variableString) {
                    $variableString .= ', ';
                }
                $variableString .= $column . "=\$" . $column;


                if ('' !== $calledVariables) {
                    $calledVariables .= ', ';
                }
                $calledVariables .= '$' . $column;


                if ('' !== $byTheGivenString) {
                    $byTheGivenString .= ' and ';
                }
                $byTheGivenString .= $column;

                $type = $types[$column];
                $type = explode('(', $type)[0];
                $argHint = "string";
                switch ($type) {
                    case "bit":
                    case "bool":
                    case "boolean":
                    case "int":
                    case "integer":
                    case "tinyint":
                    case "smallint":
                    case "mediumint":
                    case "bigint":
                    case "decimal":
                    case "dec":
                    case "float":
                    case "double":
                    case "double_precision": //?
                        $argHint = "int";
                        break;
                }
                if ('' !== $argString) {
                    $argString .= ', ';
                }
                $argString .= $argHint . " \$" . $column;

                if ('' !== $markerString) {
                    $markerString .= " and ";
                }
                $markerString .= "$column=:$column";
                $markerLines[] = "\"$column\" => \$$column,";

                if ('' !== $paramDeclarationString) {
                    $paramDeclarationString .= "\t ";
                }
                $paramDeclarationString .= '* @param ' . $argHint . ' $' . $column . PHP_EOL;

            }


            $firstRicColumnPlural = StringTool::getPlural($firstColumn);
            $firstRicColumn = $firstColumn;

            $ret[] = [
                "byString" => $byString,
                "byStrings" => $byStrings,
                "byStringNoPrefix" => $byStringNoPrefix,
                "byStringsNoPrefix" => $byStringsNoPrefix,
                "byTheGivenString" => 'by the given ' . $byTheGivenString,
                "argString" => $argString,
                "variableString" => $variableString,
                "markerString" => $markerString,
                "markerLines" => $markerLines,
                "paramDeclarationString" => rtrim($paramDeclarationString),
                "calledVariables" => $calledVariables,
                "firstRicColumnPlural" => $firstRicColumnPlural,
                "firstRicColumn" => $firstRicColumn,
            ];
        }


        return $ret;
    }


    /**
     * Returns the content of the fetchFetchAllYYY method.
     * @param array $variables
     * @return string
     */
    protected function getFetchFetchAllYYYMethod(array $variables): string
    {
        $tpl = __DIR__ . "/../assets/classModel/Ling/template/partials/fetchFetchAllYYY.tpl.txt";
        return file_get_contents($tpl);
    }


    /**
     * Returns the content of the getUserById method.
     * @param array $variables
     * @return string
     */
    protected function getGetUserByIdMethod(array $variables): string
    {
        $tpl = __DIR__ . "/../assets/classModel/Ling/template/partials/getUserById.tpl.txt";
        $content = file_get_contents($tpl);

        $ricVariables = $variables['ricVariables'];
        $className = $variables['className'];


        if (true === $this->_usePrefixInMethodNames) {
            $methodName = 'get' . $className . $ricVariables['byString'];
        } else {
            $methodName = 'get' . $className . $ricVariables['byStringNoPrefix'];
        }

        if (true === in_array($methodName, $this->alreadyUsedMethodNames)) {
            return '';
        }
        $this->alreadyUsedMethodNames[] = $methodName;


        //--------------------------------------------
        //
        //--------------------------------------------
        $content = str_replace('getUserById', $methodName, $content);
        $content = str_replace('int $id', $ricVariables['argString'], $content);
        $content = str_replace('id=:id', $ricVariables['markerString'], $content);
        $content = str_replace('"id" => $id,', $this->getLineStack($ricVariables, 4), $content);
        $content = str_replace('id=$id', $ricVariables['variableString'], $content);

        return $content;
    }


    /**
     * Returns the content of the updateUserById method.
     * @param array $variables
     * @return string
     */
    protected function getUpdateUserByIdMethod(array $variables): string
    {
        $tpl = __DIR__ . "/../assets/classModel/Ling/template/partials/updateUserById.tpl.txt";
        $content = file_get_contents($tpl);

        $ricVariables = $variables['ricVariables'];
        $className = $variables['className'];


        if (true === $this->_usePrefixInMethodNames) {
            $methodName = 'update' . $className . $ricVariables['byString'];
        } else {
            $methodName = 'update' . $className . $ricVariables['byStringNoPrefix'];
        }

        if (true === in_array($methodName, $this->alreadyUsedMethodNames)) {
            return '';
        }
        $this->alreadyUsedMethodNames[] = $methodName;


        //--------------------------------------------
        //
        //--------------------------------------------
        $content = str_replace('updateUserById', $methodName, $content);
        $content = str_replace('int $id', $ricVariables['argString'], $content);
        $content = str_replace('array $user', 'array $' . $variables['variableName'], $content);
        $content = str_replace('$user,', '$' . $variables['variableName'] . ',', $content);
        $content = str_replace('"id" => $id,', $this->getLineStack($ricVariables, 3), $content);
        return $content;
    }


    /**
     * Returns the content of the updateUser method.
     * @param array $variables
     * @return string
     */
    protected function getUpdateUserMethod(array $variables): string
    {
        $tpl = __DIR__ . "/../assets/classModel/Ling/template/partials/updateUser.tpl.txt";
        $content = file_get_contents($tpl);

        $className = $variables['className'];
        $methodName = 'update' . $className;


        $content = str_replace('updateUser', $methodName, $content);
        $content = str_replace('array $user', 'array $' . $variables['variableName'], $content);
        $content = str_replace('$user,', '$' . $variables['variableName'] . ',', $content);
        return $content;
    }

    /**
     * Returns the content of the deleteUserById method.
     * @param array $variables
     * @return string
     */
    protected function getDeleteUserByIdMethod(array $variables): string
    {
        $tpl = __DIR__ . "/../assets/classModel/Ling/template/partials/deleteUserById.tpl.txt";
        $content = file_get_contents($tpl);


        $ricVariables = $variables['ricVariables'];
        $className = $variables['className'];


        if (true === $this->_usePrefixInMethodNames) {
            $methodName = 'delete' . $className . $ricVariables['byString'];
        } else {
            $methodName = 'delete' . $className . $ricVariables['byStringNoPrefix'];
        }

        if (true === in_array($methodName, $this->alreadyUsedMethodNames)) {
            return '';
        }
        $this->alreadyUsedMethodNames[] = $methodName;


        //--------------------------------------------
        //
        //--------------------------------------------
        $content = str_replace('deleteUserById', $methodName, $content);
        $content = str_replace('int $id', $ricVariables['argString'], $content);
        $content = str_replace('"id" => $id,', $this->getLineStack($ricVariables, 3), $content);
        return $content;
    }


    /**
     * Returns the content of the deleteUserByIds method.
     * @param array $variables
     * @return string
     */
    protected function getDeleteUserByIdsMethod(array $variables): string
    {
        $tpl = __DIR__ . "/../assets/classModel/Ling/template/partials/deleteUserByIds.tpl.txt";
        $content = file_get_contents($tpl);


        $ricVariables = $variables['ricVariables'];
        $className = $variables['className'];


        if (true === $this->_usePrefixInMethodNames) {
            $methodName = 'delete' . $className . $ricVariables['byStrings'];
        } else {
            $methodName = 'delete' . $className . $ricVariables['byStringsNoPrefix'];
        }

        if (true === in_array($methodName, $this->alreadyUsedMethodNames)) {
            return '';
        }
        $this->alreadyUsedMethodNames[] = $methodName;


        $content = str_replace('deleteUserByMultiples', $methodName, $content);
        $content = str_replace('$ids', '$' . $ricVariables['firstRicColumnPlural'], $content);
        $content = str_replace('"id"', '"' . $ricVariables['firstRicColumn'] . '"', $content);
        return $content;
    }


    /**
     * Parses the given variables, and returns an output.
     *
     * The output depends on the whether the table has an auto-incremented key and some unique indexes:
     *
     * - if the table has no auto-incremented key, the method returns an empty string
     * - if the table has an auto-incremented key, but has no unique indexes, the method also returns an empty string
     * - if the table has an auto-incremented key and some unique indexes, then the method generates a getter method for
     *      each unique index; this method returns the auto-incremented key from the given unique index column(s)
     *
     *
     * @param array $variables
     * @return string
     * @throws \Exception
     */
    protected function getIdByUniqueIndexMethods(array $variables): string
    {


        $s = "";
        $ai = $variables['autoIncrementedKey'];
        $uqs = $variables['uniqueIndexesVariables'];

        if (false !== $ai && false === empty($uqs)) {
            $template = __DIR__ . "/../assets/classModel/Ling/template/partials/getIdByUniqueIndex.tpl.txt";
            $originalContent = file_get_contents($template);

            foreach ($uqs as $uq) {
                $content = $originalContent;

                $className = $variables['className'];


                if (true === $this->_usePrefixInMethodNames) {
                    $methodName = "get" . $className . CaseTool::toPascal($ai) . $uq['byString'];
                } else {
                    $methodName = "get" . $className . CaseTool::toPascal($ai) . $uq['byStringNoPrefix'];
                }

                if (true === in_array($methodName, $this->alreadyUsedMethodNames, true)) {
                    continue;
                }
                $this->alreadyUsedMethodNames[] = $methodName;


                $sLines = $this->getLineStack($uq, 3);
                $content = str_replace('getUserGroupIdByName', $methodName, $content);
                $content = str_replace('string $name', $uq['argString'], $content);
                $content = str_replace('select id from', 'select ' . $ai . ' from', $content);
                $content = str_replace('name=:name', $uq['markerString'], $content);
                $content = str_replace('"name" => $name,', $sLines, $content);
                $content = str_replace('name=$name', $uq['variableString'], $content);

                $s .= $content;
                $s .= PHP_EOL;
                $s .= PHP_EOL;
            }

        }
        return $s;
    }

    /**
     * Parses the given variables and return a string corresponding to the getItems method.
     *
     * @param array $variables
     * @param string|null $template
     * @return string
     */
    protected function getItemsMethod(array $variables, string $template = null): string
    {
        if (null === $template) {
            $template = 'getUserItems';
        }
        $className = $variables['className'];
        $template = __DIR__ . "/../assets/classModel/Ling/template/partials/$template.tpl.txt";
        $s = file_get_contents($template);
        $s = str_replace('getResources', "get" . StringTool::getPlural($className), $s);
        return $s;
    }


    /**
     * Parses the given variables and return a string corresponding to the getItem method.
     *
     * @param array $variables
     * @return string
     */
    protected function getItemMethod(array $variables): string
    {
        $className = $variables['className'];
        $template = __DIR__ . "/../assets/classModel/Ling/template/partials/getUserItem.tpl.txt";
        $s = file_get_contents($template);
        $s = str_replace('getResource', "get" . $className, $s);
        return $s;
    }


    /**
     * Parses the given variables and return a string corresponding to the getItemsInterface method.
     *
     * @param string|null $template
     * @param array $variables
     * @return string
     *
     */
    protected function getItemsInterfaceMethod(array $variables, string $template = null): string
    {
        if (null === $template) {
            $template = 'getUserItemsInterface';
        }
        $className = $variables['className'];
        $object = lcfirst($className);
        $template = __DIR__ . "/../assets/classModel/Ling/template/partials/$template.tpl.txt";
        $s = file_get_contents($template);
        $s = str_replace('resource', $object, $s);
        $s = str_replace('getResources', "get" . StringTool::getPlural($className), $s);
        return $s;
    }


    /**
     * Parses the given variables and return a string corresponding to the getItemInterface method.
     *
     * @param array $variables
     * @return string
     */
    protected function getItemInterfaceMethod(array $variables): string
    {
        $className = $variables['className'];
        $object = lcfirst($className);
        $template = __DIR__ . "/../assets/classModel/Ling/template/partials/getUserItemInterface.tpl.txt";
        $s = file_get_contents($template);
        $s = str_replace('resource', $object, $s);

        $methodName = "get" . $className;


        $s = str_replace('getResource', $methodName, $s);
        return $s;
    }


    /**
     * Parses the given variables and returns a string corresponding to the "getTagsByResourceId" methods.
     *
     * @param array $variables
     * @return string
     */
    protected function getItemsByHasMethod(array $variables): string
    {
        $template = __DIR__ . "/../assets/classModel/Ling/template/partials/getTagsByResourceId.tpl.txt";


        $allPrefixes = $variables['allPrefixes'];
        $plural = StringTool::getPlural($variables['className']);


        $s = '';
        $hasItems = $variables['hasItems'];
        foreach ($hasItems as $hasItem) {
            if (false === $hasItem['is_owner']) {


                $hasTable = $hasItem['has_table'];
                $leftFk = $hasItem['left_fk'];
                $rightFk = $hasItem['right_fk'];
                $referencedByLeft = $hasItem['referenced_by_left'];

                foreach ($hasItem['left_handles'] as $handle) {

                    $leftTable = $this->getEpuratedTableName($hasItem['left_table'], $allPrefixes);

                    $leftTableName = CaseTool::toPascal($leftTable);


                    $handleName = "";
                    $argString = '';
                    $sMarkers = '';
                    foreach ($handle as $col) {
                        if ('' !== $handleName) {
                            $handleName .= "And";
                            $argString .= ', ';
                            $sMarkers .= PHP_EOL . "\t";
                        }
                        $handleName .= CaseTool::toPascal(strtolower($col));
                        $var = '$' . lcfirst($leftTableName) . CaseTool::toPascal($col);
                        $marker = $leftTable . "_" . $col;
                        $argString .= 'string ' . $var;
                        $sMarkers .= '":' . $marker . '" => ' . $var . ',';
                    }


                    $methodName = "get" . $plural . "By" . $leftTableName . CaseTool::toPascal($handleName);


                    $rel1 = "h.$rightFk=a.$referencedByLeft";
                    $rel2 = "h.$leftFk=:$leftFk";


                    $t = file_get_contents($template);
                    $t = str_replace("getTagsByResourceId", $methodName, $t);
                    $t = str_replace('string $resourceId', $argString, $t);
                    $t = str_replace('luda_resource_has_tag', $hasTable, $t);
                    $t = str_replace('h.tag_id=a.id', $rel1, $t);
                    $t = str_replace('h.resource_id=:resource_id', $rel2, $t);
                    $t = str_replace('":resource_id" => $resourceId,', $sMarkers, $t);

                    $s .= $t . PHP_EOL . PHP_EOL;

                }

            }
        }
        return $s;
    }


    /**
     * Parses the given variables and returns a generated method for each given foreign key.
     *
     * @param array $variables
     * @return string
     */
    protected function getItemsByForeignKeysMethod(array $variables): string
    {
        $template = __DIR__ . "/../assets/classModel/Ling/template/partials/getRowsByForeignKeys.tpl.txt";


        $s = '';
        $fkInfo = $variables['foreignKeysInfo'];
        $plural = StringTool::getPlural($variables['className']);

        foreach ($fkInfo as $fkCol => $item) {


            $colPart = CaseTool::toPascal($fkCol);
            $varName = lcfirst($colPart);
            $flatFkCol = CaseTool::toSnake($fkCol);


            $methodName = "get" . $plural . "By" . $colPart;

            if (true === in_array($methodName, $this->alreadyUsedMethodNames, true)) {
                continue;
            }
            $this->alreadyUsedMethodNames[] = $methodName;

            $t = file_get_contents($template);
            $t = str_replace("getUserRatesItemsByUserId", $methodName, $t);
            $t = str_replace('$userId', '$' . $varName, $t);
            $t = str_replace('`user_id`', '`' . $fkCol . '`', $t);
            $t = str_replace(':user_id', ':' . $flatFkCol, $t);
            $s .= $t . PHP_EOL . PHP_EOL;
        }
        return $s;
    }

    /**
     * Parses the given variables and returns a string corresponding to the "getTagsByResourceId" methods for the interface.
     *
     * @param array $variables
     * @return string
     */
    protected function getItemsByHasInterfaceMethod(array $variables): string
    {
        $template = __DIR__ . "/../assets/classModel/Ling/template/partials/getTagsByResourceId.interface.tpl.txt";


        $allPrefixes = $variables['allPrefixes'];
        $plural = StringTool::getPlural($variables['className']);


        $s = '';
        $hasItems = $variables['hasItems'];
        foreach ($hasItems as $hasItem) {
            if (false === $hasItem['is_owner']) {


                $rightTable = $hasItem['right_table'];
                $leftObject = $this->getEpuratedTableName($hasItem['left_table'], $allPrefixes);

                foreach ($hasItem['left_handles'] as $handle) {

                    $leftTable = $this->getEpuratedTableName($hasItem['left_table'], $allPrefixes);
                    $leftTableName = CaseTool::toPascal($leftTable);


                    $handleName = "";
                    $argString = '';
                    $sMarkers = '';
                    $commentArgs = '';
                    $paramString = '';
                    foreach ($handle as $col) {
                        if ('' !== $handleName) {
                            $handleName .= "And";
                            $argString .= ', ';
                            $sMarkers .= PHP_EOL . "\t";
                            $commentArgs .= ' and ';
                            $paramString .= PHP_EOL;
                        }
                        $handleName .= CaseTool::toPascal(strtolower($col));
                        $var = '$' . lcfirst($leftTableName) . CaseTool::toPascal($col);
                        $marker = $leftTable . "_" . $col;
                        $argString .= 'string ' . $var;
                        $sMarkers .= '":' . $marker . '" => ' . $var . ',';
                        $commentArgs .= $col;
                        $paramString .= '* @param string ' . $var;
                    }


                    $methodName = "get" . $plural . "By" . $leftTableName . $handleName;


                    $t = file_get_contents($template);
                    $t = str_replace("luda_tag", $rightTable, $t);
                    $t = str_replace("given resource id", 'given ' . $leftObject . " " . $commentArgs, $t);
                    $t = str_replace('* @param string $resourceId', $paramString, $t);
                    $t = str_replace("getTagsByResourceId", $methodName, $t);
                    $t = str_replace('string $resourceId', $argString, $t);

                    $s .= $t . PHP_EOL . PHP_EOL;

                }

            }
        }
        return $s;
    }


    /**
     * Parses the given variables and returns a string corresponding to the interface method to generate.
     *
     * @param array $variables
     * @return string
     */
    protected function getItemsByForeignKeysInterfaceMethod(array $variables): string
    {
        $template = __DIR__ . "/../assets/classModel/Ling/template/partials/getXXXRowsByForeignKeys.tpl.txt";


        $s = '';
        $fkInfo = $variables['foreignKeysInfo'];
        $plural = StringTool::getPlural($variables['className']);


        foreach ($fkInfo as $fkCol => $item) {


            $colPart = CaseTool::toPascal($fkCol);
            $varName = lcfirst($colPart);


            $methodName = "get" . $plural . "By" . $colPart;


            if (true === in_array($methodName, $this->alreadyUsedMethodNamesInterface, true)) {
                continue;
            }
            $this->alreadyUsedMethodNamesInterface[] = $methodName;

            $t = file_get_contents($template);
            $t = str_replace("getUserRatesItemsByUserId", $methodName, $t);
            $t = str_replace('userId', $varName, $t);
            $t = str_replace('xx_table', $variables['table'], $t);
            $s .= $t . PHP_EOL . PHP_EOL;
        }
        return $s;
    }


    /**
     * Parses the given variables and returns a string corresponding to the "getTagNamesByResourceId" methods.
     *
     * @param array $variables
     * @return string
     */
    protected function getItemsXXXByHasMethod(array $variables): string
    {
        $template = __DIR__ . "/../assets/classModel/Ling/template/partials/getTagNamesByResourceId.tpl.txt";


        $allPrefixes = $variables['allPrefixes'];


        $s = '';
        $hasItems = $variables['hasItems'];
        foreach ($hasItems as $hasItem) {
            if (false === $hasItem['is_owner']) {


                $hasTable = $hasItem['has_table'];
                $leftFk = $hasItem['left_fk'];
                $rightFk = $hasItem['right_fk'];
                $referencedByLeft = $hasItem['referenced_by_left'];


                foreach ($hasItem['right_handles'] as $rightHandle) {

                    // we know by definition that those right handles only contain one column.
                    // see MysqlInfoUtil for more details.
                    $rightCol = $rightHandle[0];
                    $rightColPluralName = CaseTool::toPascal(StringTool::getPlural($rightCol));


                    foreach ($hasItem['left_handles'] as $leftHandle) {

                        $leftTable = $this->getEpuratedTableName($hasItem['left_table'], $allPrefixes);
                        $leftTableName = CaseTool::toPascal($leftTable);


                        $handleName = "";
                        $argString = '';
                        $sMarkers = '';
                        $sWhere = '';
                        foreach ($leftHandle as $col) {
                            if ('' !== $handleName) {
                                $handleName .= "And";
                                $argString .= ', ';
                                $sMarkers .= PHP_EOL . "\t";
                                $sWhere .= ' and ';
                            }
                            $handleName .= CaseTool::toPascal(strtolower($col));
                            $var = '$' . lcfirst(CaseTool::toPascal($leftTable)) . CaseTool::toPascal($col);
                            $marker = $leftTable . "_" . $col;
                            $argString .= 'string ' . $var;
                            $sMarkers .= '":' . $marker . '" => ' . $var . ',';
                            $sWhere .= "b.$col=:$marker";
                        }


                        $methodName = "get" . $variables['className'] . $rightColPluralName . "By" . $leftTableName . $handleName;


                        $rel1 = "h.$rightFk=a.$referencedByLeft";
                        $rel2 = "inner join " . $hasItem['left_table'] . " b on b.$referencedByLeft=h.$leftFk";


                        $t = file_get_contents($template);
                        $t = str_replace("getTagNamesByResourceId", $methodName, $t);
                        $t = str_replace('string $resourceId', $argString, $t);
                        $t = str_replace('a.name', 'a.' . $rightCol, $t);
                        $t = str_replace('luda_resource_has_tag', $hasTable, $t);
                        $t = str_replace('h.tag_id=a.id', $rel1, $t);
                        $t = str_replace('inner join luda_resource b on b.id=h.resource_id', $rel2, $t);
                        $t = str_replace('b.id=:resource_id', $sWhere, $t);
                        $t = str_replace('":resource_id" => $resourceId,', $sMarkers, $t);

                        $s .= $t . PHP_EOL . PHP_EOL;

                    }
                }


            }
        }
        return $s;
    }


    /**
     * Parses the given variables and returns a string corresponding to the "getTagNamesByResourceId" interface methods.
     *
     * @param array $variables
     * @return string
     */
    protected function getItemsXXXByHasInterfaceMethod(array $variables): string
    {
        $template = __DIR__ . "/../assets/classModel/Ling/template/partials/getTagNamesByResourceId.interface.tpl.txt";


        $allPrefixes = $variables['allPrefixes'];


        $s = '';
        $hasItems = $variables['hasItems'];
        foreach ($hasItems as $hasItem) {
            if (false === $hasItem['is_owner']) {


                $rightTable = $hasItem['right_table'];


                foreach ($hasItem['right_handles'] as $rightHandle) {

                    // we know by definition that those right handles only contain one column.
                    // see MysqlInfoUtil for more details.
                    $rightCol = $rightHandle[0];
                    $rightColPluralName = CaseTool::toPascal(StringTool::getPlural($rightCol));


                    foreach ($hasItem['left_handles'] as $leftHandle) {

                        $leftTable = $this->getEpuratedTableName($hasItem['left_table'], $allPrefixes);
                        $leftObject = $this->getEpuratedTableName($hasItem['left_table'], $allPrefixes);
                        $leftTableName = CaseTool::toPascal($leftTable);


                        $handleName = "";
                        $argString = '';
                        $sMarkers = '';
                        $commentArgs = '';
                        $paramString = '';
                        foreach ($leftHandle as $col) {
                            if ('' !== $handleName) {
                                $handleName .= "And";
                                $argString .= ', ';
                                $sMarkers .= PHP_EOL . "\t";
                                $commentArgs .= ' and ';
                                $paramString .= PHP_EOL;
                            }
                            $handleName .= CaseTool::toPascal(strtolower($col));
                            $var = '$' . lcfirst($leftTableName) . CaseTool::toPascal($col);
                            $marker = $leftTable . "_" . $col;
                            $argString .= 'string ' . $var;
                            $sMarkers .= '":' . $marker . '" => ' . $var . ',';
                            $commentArgs .= $col;
                            $paramString .= '* @param string ' . $var;
                        }


                        $methodName = "get" . $variables['className'] . $rightColPluralName . "By" . $leftTableName . $handleName;


                        $t = file_get_contents($template);
                        $t = str_replace("luda_tag.name", $rightTable . "." . $rightCol, $t);
                        $t = str_replace("given resource id", 'given ' . $leftObject . " " . $commentArgs, $t);
                        $t = str_replace('* @param string $resourceId', $paramString, $t);
                        $t = str_replace("getTagNamesByResourceId", $methodName, $t);
                        $t = str_replace('string $resourceId', $argString, $t);

                        $s .= $t . PHP_EOL . PHP_EOL;

                    }
                }


            }
        }
        return $s;
    }


    /**
     * Parses the given variables, and returns an output.
     *
     * The output depends on the whether the table has an auto-incremented key and some unique indexes:
     *
     * - if the table has no auto-incremented key, the method returns an empty string
     * - if the table has an auto-incremented key, but has no unique indexes, the method also returns an empty string
     * - if the table has an auto-incremented key and some unique indexes, then the method generates a getter method for
     *      each unique index; this method returns the auto-incremented key from the given unique index column(s)
     *
     *
     * @param array $variables
     * @return string
     * @throws \Exception
     */
    protected function getIdByUniqueIndexInterfaceMethods(array $variables): string
    {


        $s = "";
        $ai = $variables['autoIncrementedKey'];
        $aiPascal = CaseTool::toPascal($ai);
        $uqs = $variables['uniqueIndexesVariables'];
        $table = $variables['table'];

        if (false !== $ai && false === empty($uqs)) {
            $template = __DIR__ . "/../assets/classModel/Ling/template/partials/getIdByXXX.tpl.txt";
            $originalContent = file_get_contents($template);

            foreach ($uqs as $uq) {

                $content = $originalContent;


                $className = $variables['className'];

                if (true === $this->_usePrefixInMethodNames) {
                    $methodName = "get" . $className . $aiPascal . $uq['byString'];
                } else {
                    $methodName = "get" . $className . $aiPascal . $uq['byStringNoPrefix'];
                }

                $definition = $ai . " of the $table table";

                $sLines = '';
                foreach ($uq['markerLines'] as $line) {
                    if ('' !== $sLines) {
                        $sLines .= "\t\t\t";
                    }
                    $sLines .= $line . PHP_EOL;
                }


                $content = str_replace('id of the user group', $definition, $content);
                $content = str_replace('* @param string $name', $uq['paramDeclarationString'], $content);
                $content = str_replace('getUserGroupIdByName', $methodName, $content);
                $content = str_replace('string $name', $uq['argString'], $content);


                $s .= $content;
                $s .= PHP_EOL;
                $s .= PHP_EOL;
            }
        }

        return $s;
    }


    /**
     * Returns the content of the multipleInsertXXX method for the interfaces.
     * @param array $variables
     * @return string
     */
    protected function getMultipleInsertXXXInterfaceMethod(array $variables): string
    {

        $template = __DIR__ . "/../assets/classModel/Ling/template/partials/multipleInsertXXX.tpl.txt";
        $content = file_get_contents($template);
        $content = str_replace('!user', $variables['humanName'], $content);
        $content = str_replace('array $users', 'array $' . $variables['variableNamePlural'], $content);
        $content = str_replace('multipleInsertXXX', 'insert' . $variables['classNamePlural'], $content);
        return $content;
    }


    /**
     * Returns the content of the fetchFetchAllXXX method for the interfaces.
     * @param array $variables
     * @return string
     */
    protected function getFetchFetchAllXXXInterfaceMethod(array $variables): string
    {

        $template = __DIR__ . "/../assets/classModel/Ling/template/partials/fetchFetchAllXXX.tpl.txt";
        return file_get_contents($template);

    }


    /**
     * Returns the content of the insertXXX method for the interfaces.
     * @param array $variables
     * @return string
     */
    protected function getInsertXXXInterfaceMethod(array $variables): string
    {

        $template = __DIR__ . "/../assets/classModel/Ling/template/partials/insertXXX.tpl.txt";
        $content = file_get_contents($template);
        $content = str_replace('!user', $variables['humanName'], $content);
        $content = str_replace('$user', '$' . $variables['variableName'], $content);
        $content = str_replace('insertXXX', 'insert' . $variables['className'], $content);
        return $content;
    }


    /**
     * Returns the content of the getXXXById method for the interfaces.
     * @param array $variables
     * @return string
     */
    protected function getGetXXXByIdInterfaceMethod(array $variables): string
    {

        $template = __DIR__ . "/../assets/classModel/Ling/template/partials/getXXXById.tpl.txt";
        $content = file_get_contents($template);

        $ricVariables = $variables['ricVariables'];

        if (true === $this->_usePrefixInMethodNames) {
            $methodName = 'get' . $variables['className'] . $ricVariables['byString'];
        } else {
            $methodName = 'get' . $variables['className'] . $ricVariables['byStringNoPrefix'];
        }

        if (true === in_array($methodName, $this->alreadyUsedMethodNamesInterface, true)) {
            return '';
        }
        $this->alreadyUsedMethodNamesInterface[] = $methodName;


        $content = str_replace('!user', $variables['humanName'], $content);
        $content = str_replace('by the given id', $ricVariables['byTheGivenString'], $content);
        $content = str_replace('* @param int $id', $ricVariables['paramDeclarationString'], $content);
        $content = str_replace('getXXXById', $methodName, $content);
        $content = str_replace('int $id', $ricVariables['argString'], $content);


        return $content;
    }


    /**
     * Returns the content of the getAllXXX method for the interfaces.
     * @param array $variables
     * @return string
     */
    protected function getGetAllXXXInterfaceMethod(array $variables): string
    {

        $template = __DIR__ . "/../assets/classModel/Ling/template/partials/getAllXXX.tpl.txt";
        $content = file_get_contents($template);
        $ric = $variables['ric'];
        $originalColumn = current($ric);
        $plural = StringTool::getPlural($originalColumn);
        $methodName = $this->getGetAllXXXMethodName($ric);

        $content = str_replace('user ids', $variables['variableName'] . " " . $plural, $content);
        $content = str_replace('getAll', $methodName, $content);

        return $content;
    }


    /**
     * Returns the content of the updateXXXById method for the interfaces.
     * @param array $variables
     * @return string
     */
    protected function getUpdateXXXByIdInterfaceMethod(array $variables): string
    {

        $template = __DIR__ . "/../assets/classModel/Ling/template/partials/updateXXXById.tpl.txt";
        $content = file_get_contents($template);


        $ricVariables = $variables['ricVariables'];


        $content = str_replace('!user', $variables['humanName'], $content);
        $content = str_replace('by the given id', $ricVariables['byTheGivenString'], $content);
        $content = str_replace('$user', '$' . $variables['variableName'], $content);
        $content = str_replace('* @param int $id', $ricVariables['paramDeclarationString'], $content);
        $content = str_replace('int $id', $ricVariables['argString'], $content);


        if (true === $this->_usePrefixInMethodNames) {
            $methodName = 'update' . $variables['className'] . $ricVariables['byString'];
        } else {
            $methodName = 'update' . $variables['className'] . $ricVariables['byStringNoPrefix'];
        }


        if (true === in_array($methodName, $this->alreadyUsedMethodNamesInterface, true)) {
            return '';
        }
        $this->alreadyUsedMethodNamesInterface[] = $methodName;


        $content = str_replace('updateXXXById', $methodName, $content);

        return $content;
    }


    /**
     * Returns the content of the updateXXX method for the interfaces.
     * @param array $variables
     * @return string
     */
    protected function getUpdateXXXInterfaceMethod(array $variables): string
    {

        $template = __DIR__ . "/../assets/classModel/Ling/template/partials/updateXXX.tpl.txt";
        $content = file_get_contents($template);

        $content = str_replace('!user', $variables['humanName'], $content);
        $content = str_replace('$user', '$' . $variables['variableName'], $content);
        $content = str_replace('updateXXX', 'update' . $variables['className'], $content);

        return $content;
    }


    /**
     * Returns the content of the deleteXXXById method for the interfaces.
     * @param array $variables
     * @return string
     */
    protected function getDeleteXXXByIdInterfaceMethod(array $variables): string
    {

        $template = __DIR__ . "/../assets/classModel/Ling/template/partials/deleteXXXById.tpl.txt";
        $content = file_get_contents($template);

        $ricVariables = $variables['ricVariables'];


        if (true === $this->_usePrefixInMethodNames) {
            $methodName = 'delete' . $variables['className'] . $ricVariables['byString'];
        } else {
            $methodName = 'delete' . $variables['className'] . $ricVariables['byStringNoPrefix'];
        }


        //--------------------------------------------
        // DUPLICATE METHOD NAME CHECKING
        //--------------------------------------------
        if (in_array($methodName, $this->alreadyUsedMethodNamesInterface, true)) {
            return '';
        } else {
            $this->alreadyUsedMethodNamesInterface[] = $methodName;
        }


        $content = str_replace('!user', $variables['humanName'], $content);
        $content = str_replace('by the given id', $ricVariables['byTheGivenString'], $content);
        $content = str_replace('* @param int $id', $ricVariables['paramDeclarationString'], $content);
        $content = str_replace('int $id', $ricVariables['argString'], $content);
        $content = str_replace('deleteXXXById', $methodName, $content);

        return $content;
    }

    /**
     * Returns the content of the deleteXXXByIds method for the interfaces.
     * @param array $variables
     * @return string
     */
    protected function getDeleteXXXByIdsInterfaceMethod(array $variables): string
    {

        $template = __DIR__ . "/../assets/classModel/Ling/template/partials/deleteXXXByIds.tpl.txt";
        $content = file_get_contents($template);

        $ricVariables = $variables['ricVariables'];


        if (true === $this->_usePrefixInMethodNames) {
            $methodName = 'delete' . $variables['className'] . $ricVariables['byStrings'];
        } else {
            $methodName = 'delete' . $variables['className'] . $ricVariables['byStringsNoPrefix'];
        }


        //--------------------------------------------
        // DUPLICATE METHOD NAME CHECKING
        //--------------------------------------------
        if (in_array($methodName, $this->alreadyUsedMethodNamesInterface, true)) {
            return '';
        } else {
            $this->alreadyUsedMethodNamesInterface[] = $methodName;
        }


        $content = str_replace('!user', $variables['humanName'], $content);
        $content = str_replace('!ids', $ricVariables['firstRicColumnPlural'], $content);
        $content = str_replace('$ids', '$' . $ricVariables['firstRicColumnPlural'], $content);

        $content = str_replace('deleteAllByIds', $methodName, $content);

        return $content;
    }


    /**
     * Returns the content of a php method of type factory (internal naming convention to designate a method used
     * inside the generated factory object).
     *
     * The variables array is described in this class description.
     *
     * @param array $variables
     * @return string
     */
    protected function getFactoryMethod(array $variables): string
    {
        $methodClassName = $variables['methodClassName'];
        $interfaceClassName = $variables['interfaceClassName'];
        $returnedClassName = $variables['returnedClassName'];
        $returnedObjectName = $returnedClassName;


        if (false === $this->useCustomInterfaces) {
            $returnedType = $returnedObjectName;
        } else {
            $returnedType = "Custom" . $interfaceClassName;
        }


        $tpl = __DIR__ . "/../assets/classModel/Ling/template/partials/getUserObject.tpl.txt";
        $content = file_get_contents($tpl);

        $content = str_replace('returnedUserObjectInterface', $returnedType, $content);
        $content = str_replace('UserObjectInterface', $returnedType, $content);


        $content = str_replace('new UserObject', 'new ' . $returnedObjectName, $content);

        $moreCalls = '';
        $content = str_replace('//moreCalls', $moreCalls, $content);


        $content = str_replace('getUserObject', "get" . $methodClassName, $content);
        return $content;
    }


    /**
     * Returns the content of a php method of type insert (internal naming convention).
     *
     * The variables array is described in this class description.
     *
     * @param array $variables
     * @return string
     */
    protected function getInsertMethod(array $variables): string
    {
        $tpl = __DIR__ . "/../assets/classModel/Ling/template/partials/insertUser.tpl.txt";
        $content = file_get_contents($tpl);


        //--------------------------------------------
        // MICRO-PERMISSION
        //--------------------------------------------
        $microPermReplacement = '';
        $content = str_replace('//microperm', $microPermReplacement, $content);


        //--------------------------------------------
        //
        //--------------------------------------------
        $ric = $variables['ric'];
        $className = $variables['className'];
        $autoIncrementedKey = $variables['autoIncrementedKey'];
        $variableName = lcfirst($variables['className']);
        $ricAndAik = $ric;
        /**
         * After two tests, I came to the conclusion that the pdo->lastInsertId() method
         * returns string "0" when the table doesn't have an auto-incremented key.
         * This might be erroneous (as two is not a big number).
         *
         */
        $lastInsertIdReturn = 'return "0"';


        if (false !== $autoIncrementedKey) {
            $ricAndAik = array_merge($ricAndAik, [$autoIncrementedKey]);
            $ricAndAik = array_unique($ricAndAik);
            $lastInsertIdReturn = 'return $res[\'' . $autoIncrementedKey . '\']';
        }

        $sLines = '';
        $sRicLines = '';
        foreach ($ric as $col) {
            if ('' !== $sLines) {
                $sLines .= "\t\t\t\t";
            }
            if ('' !== $sRicLines) {
                $sRicLines .= "\t\t\t\t";
            }
            if (
                false !== $autoIncrementedKey &&
                $col === $autoIncrementedKey
            ) {
                $sLines .= '\'' . $autoIncrementedKey . '\' => $lastInsertId,' . PHP_EOL;
            } else {
                $sLines .= '\'' . $col . '\' => $' . $variableName . '["' . $col . '"],' . PHP_EOL;
            }
            $sRicLines .= '\'' . $col . '\' => $res["' . $col . '"],' . PHP_EOL;
        }

        $sImplodedRicAndAik = implode(', ', $ricAndAik);


        $content = str_replace('User', $className, $content);
        $content = str_replace('$user', '$' . $variableName, $content);
        $content = str_replace('"user"', '$this->table', $content);
        $content = str_replace('`user`', '`$this->table`', $content);
        $content = str_replace('\'id\' => $lastInsertId,', $sLines, $content);
        $content = str_replace('$implodedRicAndAik', $sImplodedRicAndAik, $content);
        $content = str_replace('return $res[\'id\']', $lastInsertIdReturn, $content);
        $content = str_replace('"id" => $res[\'id\'],', $sRicLines, $content);
        return $content;

    }

    /**
     * Returns the content of a php method of type insert multiple (internal naming convention).
     *
     * The variables array is described in this class description.
     *
     * @param array $variables
     * @return string
     */
    protected function getInsertMultipleMethod(array $variables): string
    {
        $tpl = __DIR__ . "/../assets/classModel/Ling/template/partials/multipleInsertUser.tpl.txt";
        $content = file_get_contents($tpl);
        $content = str_replace([
            'insertPermissions',
            '$permissions',
            '$xxx',
            '$this->insertPermission',
        ], [
            'insert' . $variables['classNamePlural'],
            '$' . $variables['variableNamePlural'],
            '$' . $variables['variableName'],
            '$this->insert' . $variables['className'],
        ], $content);
        return $content;
    }


    /**
     * Returns the content of a php method of type getAll method (internal naming convention),
     * if the table has a primary key composed of a single column,
     * or an empty string otherwise.
     *
     * The variables array is described in this class description.
     *
     * @param array $variables
     * @return string
     */
    protected function getAllMethod(array $variables): string
    {

        $content = '';
        $ric = $variables['ric'];
        if (1 === count($ric)) {

            $originalColumn = current($ric);
            $methodName = $this->getGetAllXXXMethodName($ric);


            $tpl = __DIR__ . "/../assets/classModel/Ling/template/partials/getAllIds.tpl.txt";

            $content = file_get_contents($tpl);
            $content = str_replace('getAllIds', $methodName, $content);
            $content = str_replace('id', $originalColumn, $content);
            $content = str_replace('user', '$this->table', $content);


            $microPermReplacement = '';
            $content = str_replace('//microperm', $microPermReplacement, $content);
        }
        return $content;
    }


    /**
     * Returns the content of the delete template.
     * @return string
     */
    protected function getDeleteMethod()
    {
        $tpl = __DIR__ . "/../assets/classModel/Ling/template/partials/delete.tpl.txt";
        return file_get_contents($tpl);
    }


    /**
     * Returns the content of the "delete by fk" method template.
     * We generate one method per foreign key column.
     *
     *
     * @param array $variables
     * @return string
     */
    protected function getDeleteByFkMethod(array $variables)
    {
        $content = '';
        $fk = $variables['foreignKeysInfo'];
        if ($fk) {
            $tpl = __DIR__ . "/../assets/classModel/Ling/template/partials/deleteByFk.tpl.txt";


            foreach ($fk as $col => $fkInfo) {
                $colNoPrefix = $this->getEpuratedTableName($col, $variables['allPrefixes']);
                $variableCol = CaseTool::toVariableName($colNoPrefix);


                if (true === $this->_usePrefixInMethodNames) {
                    $byMethodName = ucfirst(CaseTool::toVariableName($col));
                } else {
                    $byMethodName = ucfirst($variableCol);
                }


                $s = file_get_contents($tpl);
                $s = str_replace([
                    'ResourceFile',
                    'ResourceId',
                    '$resourceId',
                    'luda_resource_id',
                ], [
                    $variables['className'],
                    $byMethodName,
                    '$' . $variableCol,
                    $col,
                ], $s);


                // avoid potential duplicate method name conflicts...
                $methodName = 'delete' . $variables['className'] . "By" . $byMethodName;
                $this->alreadyUsedMethodNames[] = $methodName;


                $content .= PHP_EOL;
                $content .= $s;
            }
        }
        return $content;
    }

    /**
     * Returns the content of the delete template for the interface.
     * @param array $variables
     * @return string
     */
    protected function getDeleteMethodInterface(array $variables)
    {
        $tpl = __DIR__ . "/../assets/classModel/Ling/template/partials/deleteXXX.tpl.txt";
        $content = file_get_contents($tpl);
        $content = str_replace('resource', lcfirst($variables['className']), $content);
        return $content;
    }


    /**
     * Returns the content of the delete by fk template for the interface if there is a foreign key.
     * We generate one method per foreign key column.
     *
     * If the table doesn't have foreign key, it returns an empty string.
     *
     * @param array $variables
     * @return string
     */
    protected function getDeleteByFkMethodInterface(array $variables)
    {


        $content = '';
        $fk = $variables['foreignKeysInfo'];
        if ($fk) {


            $tpl = __DIR__ . "/../assets/classModel/Ling/template/partials/deleteByFkXXX.tpl.txt";


            foreach ($fk as $col => $fkInfo) {


                $colNoPrefix = $this->getEpuratedTableName($col, $variables['allPrefixes']);
                $humanCol = CaseTool::toHumanFlatCase($colNoPrefix);
                $variableCol = CaseTool::toVariableName($colNoPrefix);


                if (true === $this->_usePrefixInMethodNames) {
                    $byMethodName = ucfirst(CaseTool::toVariableName($col));
                } else {
                    $byMethodName = ucfirst($variableCol);
                }


                // deleteResourceFileByResourceId
                $methodName = 'delete' . $variables['className'] . 'By' . $byMethodName;


                $this->alreadyUsedMethodNamesInterface[] = $methodName;


                $s = file_get_contents($tpl);
                $s = str_replace([
                    'ResourceFile',
                    'ResourceId',
                    'resourceFile',
                    'resource id',
                    'resourceId',
                ], [
                    $variables['className'],
                    $byMethodName,
                    lcfirst($variables['humanName']),
                    $humanCol,
                    $variableCol,
                ], $s);


                $content .= PHP_EOL;
                $content .= $s;
            }
        }
        return $content;
    }


    /**
     * Sends a message to the log.
     * This is a debug utility.
     *
     * @param $msg
     */
    protected function log($msg)
    {
        CheapLogger::log($msg);
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the getAllXXX method name for the first column of the given ric.
     *
     * @param array $ric
     * @return string
     */
    private function getGetAllXXXMethodName(array $ric): string
    {
        $column = CaseTool::toPascal(strtolower(current($ric)));
        $plural = StringTool::getPlural($column);
        return 'getAll' . $plural;
    }


    /**
     * Returns the class path (absolute path to the php file containing the class).
     *
     * @param string $baseDir . Absolute path of the base directory containing all the classes.
     * @param string $className
     * @param string|null $relativeDir
     * @return string
     */
    private function getClassPath(string $baseDir, string $className, string $relativeDir = null): string
    {
        $path = $baseDir;
        if (null !== $relativeDir) {
            $path .= "/$relativeDir";
        }
        $path .= "/$className.php";
        return $path;
    }


    /**
     * Returns the namespace of an object based on the given arguments.
     *
     * @param string $baseNamespace
     * @param string|null $relativeNamespace
     * @return string
     */
    private function getClassNamespace(string $baseNamespace, string $relativeNamespace = null): string
    {
        $ret = $baseNamespace;
        if (null !== $relativeNamespace) {
            $ret .= "\\" . $relativeNamespace;
        }
        return $ret;
    }

    /**
     * Returns the lowercase table name without prefix, based on the given table and prefixes.
     *
     * @param string $table
     * @param array $allPrefixes
     * @return string
     */
    private function getEpuratedTableName(string $table, array $allPrefixes): string
    {
        $p = explode('_', $table);
        if (count($p) > 1) {
            foreach ($allPrefixes as $prefix) {
                if ($p[0] === $prefix) {
                    array_shift($p);
                    break;
                }
            }
        }
        return strtolower(implode("_", $p));
    }


    /**
     * Injects the common tags in the given expression and returns the result.
     *
     * @param string $expression
     * @return string
     */
    private function replaceCommonTags(string $expression): string
    {

        return str_replace([
            '${app_dir}',
        ], [
            $this->container->getApplicationDir(),
        ], $expression);
    }


    /**
     * Returns $indent lines of marker lines as a string.
     * See the source code for more details.
     *
     *
     * @param array $ricVariables
     * @param int $indent
     * @return string
     */
    private function getLineStack(array $ricVariables, int $indent = 3): string
    {
        $sLines = '';
        foreach ($ricVariables['markerLines'] as $line) {
            if ('' !== $sLines) {
                $sLines .= str_repeat("\t", $indent);
            }
            $sLines .= $line . PHP_EOL;
        }
        return $sLines;
    }


    /**
     * Throws an error message.
     *
     * @param string $msg
     * @throws LightBreezeGeneratorException
     */
    private function error(string $msg)
    {
        throw new LightBreezeGeneratorException($msg);
    }

}