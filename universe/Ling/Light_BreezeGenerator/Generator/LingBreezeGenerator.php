<?php


namespace Ling\Light_BreezeGenerator\Generator;


use Ling\Bat\CaseTool;
use Ling\Bat\FileSystemTool;
use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_BreezeGenerator\Exception\LightBreezeGeneratorException;
use Ling\Light_BreezeGenerator\Tool\LightBreezeGeneratorTool;
use Ling\Light_DatabaseInfo\Service\LightDatabaseInfoService;

/**
 * The LingBreezeGenerator class.
 * This is my personal generator.
 * Feel free to use it if you like it.
 *
 *
 * It will generate the following objects, based on the configuration.
 *
 *
 * - ObjectFactory
 * - ObjectInterface    (one object per table)
 * - Object             (one object per table)
 *
 *
 *
 * The variables array:
 * -----------------
 *
 * In this generator, we pass a variables array containing a lot of useful information.
 * The variables array has at most the following structure:
 *
 * - namespace: string
 * - table: string
 * - className: string
 * - objectClassName: string
 * - ric: array
 * - ricVariables: array (more details in the getRicVariables method comments)
 * - uniqueIndexesVariables: array (more details in the getUniqueIndexesVariables method comments)
 * - autoIncrementedKey: string|false
 * - useMicroPermission: bool=false, whether to use the micro permission system
 * - microPermissionPluginName: string, the name of the plugin handling the micro permission checking (if useMicroPermission is true)
 *
 *
 *
 */
class LingBreezeGenerator implements BreezeGeneratorInterface, LightServiceContainerAwareInterface
{

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * Builds the LingBreezeGenerator instance.
     */
    public function __construct()
    {
        $this->container = null;
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
        /**
         * @var $dbInfo LightDatabaseInfoService
         */
        $dbInfo = $this->container->get('database_info');

        $dir = $conf['dir'];
        /**
         * Note: we do this manually because the configuration might have been scattered since 1.6.0.
         */
        $dir = str_replace('${app_dir}', $this->container->getApplicationDir(), $dir);


        $factoryClassName = $conf['factoryClassName'];
        $overwriteExisting = $conf['overwriteExisting'] ?? false;
        $useMicroPermission = $conf['useMicroPermission'] ?? false;

        $microPermissionPluginName = $conf['microPermissionPluginName'] ?? '';
        if (true === $useMicroPermission && empty($microPermissionPluginName)) {
            throw new LightBreezeGeneratorException("Undefined microPermissionPluginName property, but you defined useMicroPermission=true.");
        }


        $customPrefix = $conf['customPrefix'] ?? 'Custom';
        $classSuffix = $conf['classSuffix'] ?? 'Object';
        $interfaceClassSuffix = $classSuffix . "Interface";
        $generate = $conf['generate'];


        //--------------------------------------------
        // COLLECT THE TABLES TO GENERATE
        //--------------------------------------------
        $tables = [];
        $generatePrefix = null;
        if (array_key_exists("prefix", $generate)) {
            $generatePrefix = $generate['prefix'] . '_';
            $tables = $dbInfo->getTablesByPrefix($generatePrefix);

        } elseif (array_key_exists("tables", $generate)) {
            $tables = $generate['tables'];
        }


        //--------------------------------------------
        // HANDLING PREFIX RELATED THINGS
        //--------------------------------------------
        $usePrefixInClassName = $conf['usePrefixInClassName'] ?? false;

        $prefix = $conf['prefix'] ?? null;
        $namespace = $conf['namespace'];
//        if ($prefix) {
//            $namespace = str_replace('$prefix', ucfirst($prefix), $namespace);
//        }


        //--------------------------------------------
        // NOW GENERATE THE TABLES OBJECTS
        //--------------------------------------------
        $sFactoryMethods = "";
        $sFactoryUses = "";
        $containerIncluded = false;
        foreach ($tables as $table) {
            $tableInfo = $dbInfo->getTableInfo($table);
            $types = $tableInfo['types'];


            $tableClassName = $table;

            // strip the prefix from the table name?
            if (false === $usePrefixInClassName && null !== $prefix) {
                if (0 === strpos($tableClassName, $prefix . "_")) {
                    $tableClassName = substr($tableClassName, strlen($prefix . "_"));
                }
            }


            $className = $this->getClassNameFromTable($tableClassName);
            $objectClassName = $className . $classSuffix;
            $ricVariables = $this->getRicVariables($tableInfo['ric'], $types);
            $uniqueIndexesVariables = $this->getUniqueIndexesVariables($tableInfo['uniqueIndexes'], $types);


            //--------------------------------------------
            // GENERATE OBJECT
            //--------------------------------------------
            $content = $this->generateObjectClass([
                "namespace" => $namespace,
                "table" => $table,
                "className" => $className,
                "objectClassName" => $objectClassName,
                "ric" => $tableInfo['ric'],
                "ricVariables" => $ricVariables,
                "uniqueIndexesVariables" => $uniqueIndexesVariables,
                "useMicroPermission" => $useMicroPermission,
                "microPermissionPluginName" => $microPermissionPluginName,
                "autoIncrementedKey" => $tableInfo['autoIncrementedKey'],
            ]);
            $bs0Path = $dir . "/" . $objectClassName . ".php";
            if (false === file_exists($bs0Path) || true === $overwriteExisting) {
                FileSystemTool::mkfile($bs0Path, $content);
            }

            //--------------------------------------------
            // GENERATE OBJECT INTERFACE
            //--------------------------------------------
            $content = $this->generateObjectInterfaceClass([
                "namespace" => $namespace,
                "table" => $table,
                "className" => $className,
                "objectClassName" => $objectClassName,
                "ricVariables" => $ricVariables,
                "uniqueIndexesVariables" => $uniqueIndexesVariables,
            ]);

            $bs0Path = $dir . "/" . $objectClassName . "Interface.php";
            if (false === file_exists($bs0Path) || true === $overwriteExisting) {
                FileSystemTool::mkfile($bs0Path, $content);
            }


            $methodClassName = $objectClassName;
            $returnedClassName = $objectClassName . "Interface";
            $customClassPath = $dir . "/" . $customPrefix . "/Custom" . $objectClassName . ".php";
            if (file_exists($customClassPath)) {
                $returnedClassName = $customPrefix . $objectClassName;
                $objectClassName = $returnedClassName;
                $sFactoryUses .= 'use ' . $namespace . "\\" . $customPrefix . "\\" . $returnedClassName . ";" . PHP_EOL;
            }

            if (true === $useMicroPermission && false === $containerIncluded) {
                $sFactoryUses .= 'use Ling\Light\ServiceContainer\LightServiceContainerInterface;' . PHP_EOL;
                $containerIncluded = true;
            }


            $sFactoryMethods .= $this->getFactoryMethod([
                'methodClassName' => $methodClassName,
                'objectClassName' => $objectClassName,
                'returnedClassName' => $returnedClassName,
                'useMicroPermission' => $useMicroPermission,
                'microPermissionPluginName' => $microPermissionPluginName,
            ]);
            $sFactoryMethods .= PHP_EOL;
            $sFactoryMethods .= PHP_EOL;

        }


        //--------------------------------------------
        // GENERATE OBJECT FACTORY
        //--------------------------------------------
        $extraPropertiesDefinition = [];
        $extraPropertiesInstantiation = [];
        $extraPublicMethods = [];
        if (true === $useMicroPermission) {
            $extraPropertiesDefinition[] = file_get_contents(__DIR__ . "/../assets/classModel/Ling/template/extra/properties-def/container.tpl.txt");
            $extraPropertiesDefinition[] = file_get_contents(__DIR__ . "/../assets/classModel/Ling/template/extra/properties-def/micro-permission-plugin.tpl.txt");
            $extraPropertiesInstantiation[] = '$this->container = null;';
            $extraPropertiesInstantiation[] = '$this->microPermissionPlugin = "'. $microPermissionPluginName .'";';
            $extraPublicMethods[] = file_get_contents(__DIR__ . "/../assets/classModel/Ling/template/extra/public-methods/set-container.tpl.txt");
            $extraPublicMethods[] = file_get_contents(__DIR__ . "/../assets/classModel/Ling/template/extra/public-methods/set-micro-permission-plugin.tpl.txt");
        }

        $content = $this->generateObjectFactoryClass([
            "namespace" => $namespace,
            "objectClassName" => $objectClassName,
            "factoryClassName" => $factoryClassName,
            "factoryMethods" => $sFactoryMethods,
            "classSuffix" => $classSuffix,
            "uses" => $sFactoryUses,
            "extraPropertiesDefinition" => implode(PHP_EOL . PHP_EOL, $extraPropertiesDefinition),
            "extraPropertiesInstantiation" => "\t\t" . implode(PHP_EOL . "\t\t", $extraPropertiesInstantiation),
            "extraPublicMethods" => implode(PHP_EOL, $extraPublicMethods),
        ]);

        $bs0Path = $dir . "/" . $factoryClassName . $classSuffix . "Factory.php";
        if (false === file_exists($bs0Path) || true === $overwriteExisting) {
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

        $template = __DIR__ . "/../assets/classModel/Ling/template/UserObject.phtml";
        $content = file_get_contents($template);

        $namespace = $variables['namespace'];
        $objectClassName = $variables['objectClassName'];
        $useMicroPermission = $variables['useMicroPermission'];
        $microPermissionPluginName = $variables['microPermissionPluginName'];
        $table = $variables['table'];


        //--------------------------------------------
        //
        //--------------------------------------------
        $content = str_replace('The\ObjectNamespace', $namespace, $content);
        $content = str_replace('UserObject', $objectClassName, $content);
        $content = str_replace('// insertXXX', $this->getInsertMethod($variables), $content);
        $content = str_replace('// doInsertXXX', $this->getDoInsertMethod($variables), $content);


        //--------------------------------------------
        // HEADER METHODS
        //--------------------------------------------
        $content = str_replace('// getXXX', $this->getRicMethod("getUserById", $variables), $content);
        $content = str_replace('// updateXXX', $this->getRicMethod("updateUserById", $variables), $content);
        $content = str_replace('// deleteXXX', $this->getRicMethod("deleteUserById", $variables), $content);


        $uniqueIndexesVariables = $variables['uniqueIndexesVariables'];
        if ($uniqueIndexesVariables) {
            $uniqueVariables = $variables;
            foreach ($uniqueIndexesVariables as $set) {
                $uniqueVariables['ricVariables'] = $set;
                $content = str_replace('// getXXX', $this->getRicMethod("getUserById", $uniqueVariables), $content);
                $content = str_replace('// updateXXX', $this->getRicMethod("updateUserById", $uniqueVariables), $content);
                $content = str_replace('// deleteXXX', $this->getRicMethod("deleteUserById", $uniqueVariables), $content);
            }
        }

        // cleaning
        $content = str_replace('// getXXX', '', $content);
        $content = str_replace('// updateXXX', '', $content);
        $content = str_replace('// deleteXXX', '', $content);


        //--------------------------------------------
        // WORKING HORSES METHODS
        //--------------------------------------------
        $content = str_replace('// doGetXXX', $this->getDoRicMethod("getUserById", $variables), $content);
        $content = str_replace('// doUpdateXXX', $this->getDoRicMethod("updateUserById", $variables), $content);
        $content = str_replace('// doDeleteXXX', $this->getDoRicMethod("deleteUserById", $variables), $content);


        $uniqueIndexesVariables = $variables['uniqueIndexesVariables'];
        if ($uniqueIndexesVariables) {
            $uniqueVariables = $variables;
            foreach ($uniqueIndexesVariables as $set) {
                $uniqueVariables['ricVariables'] = $set;
                $content = str_replace('// doGetXXX', $this->getDoRicMethod("getUserById", $uniqueVariables), $content);
                $content = str_replace('// doUpdateXXX', $this->getDoRicMethod("updateUserById", $uniqueVariables), $content);
                $content = str_replace('// doDeleteXXX', $this->getDoRicMethod("deleteUserById", $uniqueVariables), $content);
            }
        }


        // cleaning
        $content = str_replace('// doGetXXX', '', $content);
        $content = str_replace('// doUpdateXXX', '', $content);
        $content = str_replace('// doDeleteXXX', '', $content);


        //--------------------------------------------
        // EXTRA CONTENT
        //--------------------------------------------
        $extraUseStatements = [];
        $extraPropertiesDefinition = [];
        $extraPropertiesInstantiation = [];
        $extraPublicMethods = [];
        $extraProtectedMethods = [];
        if (true === $useMicroPermission) {
            $extraUseStatements[] = 'use Ling\Light\ServiceContainer\LightServiceContainerInterface;';
            $extraUseStatements[] = 'use Ling\Light_MicroPermission\Exception\LightMicroPermissionException;';

            $extraPropertiesDefinition[] = file_get_contents(__DIR__ . "/../assets/classModel/Ling/template/extra/properties-def/micro-permission-plugin.tpl.txt");
            $extraPropertiesDefinition[] = file_get_contents(__DIR__ . "/../assets/classModel/Ling/template/extra/properties-def/container.tpl.txt");

            $extraPropertiesInstantiation[] = '$this->microPermissionPlugin = "' . $microPermissionPluginName . '";';
            $extraPropertiesInstantiation[] = '$this->container = null;';


            $extraPublicMethods[] = file_get_contents(__DIR__ . "/../assets/classModel/Ling/template/extra/public-methods/set-container.tpl.txt");
            $extraPublicMethods[] = file_get_contents(__DIR__ . "/../assets/classModel/Ling/template/extra/public-methods/set-micro-permission-plugin.tpl.txt");

            $c = file_get_contents(__DIR__ . "/../assets/classModel/Ling/template/extra/protected-methods/check-micro-permission.tpl.txt");
            $c = str_replace('$table', $table, $c);
            $extraProtectedMethods[] = $c;
        }

        $content = str_replace('//::extraUseStatements', implode(PHP_EOL, $extraUseStatements), $content);
        $content = str_replace('//::extraProperties--definition', implode(PHP_EOL . PHP_EOL, $extraPropertiesDefinition), $content);
        $content = str_replace('//::extraProperties--instantiation', "\t\t" . implode(PHP_EOL . "\t\t", $extraPropertiesInstantiation), $content);
        $content = str_replace('//::extraPublicMethods', implode(PHP_EOL, $extraPublicMethods), $content);
        $content = str_replace('//::extraProtectedMethods', implode(PHP_EOL, $extraProtectedMethods), $content);

        return $content;

    }


    /**
     * Returns the content of an object interface class based on the given variables.
     * The variables array structure is defined in this class description.
     *
     * @param array $variables
     * @return string
     */
    public function generateObjectInterfaceClass(array $variables): string
    {
        $template = __DIR__ . "/../assets/classModel/Ling/template/UserObjectInterface.phtml";
        $content = file_get_contents($template);


        $namespace = $variables['namespace'];
        $objectClassName = $variables['objectClassName'];

        $content = str_replace('The\ObjectNamespace', $namespace, $content);
        $content = str_replace('UserObject', $objectClassName, $content);

        $content = str_replace('// insertXXX', $this->getInterfaceMethod('insertXXX', $variables), $content);
        $content = str_replace('// getXXX', $this->getInterfaceMethod('getXXXById', $variables), $content);
        $content = str_replace('// updateXXX', $this->getInterfaceMethod('updateXXXById', $variables), $content);
        $content = str_replace('// deleteXXX', $this->getInterfaceMethod('deleteXXXById', $variables), $content);


        $uniqueIndexesVariables = $variables['uniqueIndexesVariables'];
        if ($uniqueIndexesVariables) {
            $uniqueVariables = $variables;
            foreach ($uniqueIndexesVariables as $set) {
                $uniqueVariables['ricVariables'] = $set;
                $content = str_replace('// getXXX', $this->getInterfaceMethod('getXXXById', $uniqueVariables), $content);
                $content = str_replace('// updateXXX', $this->getInterfaceMethod('updateXXXById', $uniqueVariables), $content);
                $content = str_replace('// deleteXXX', $this->getInterfaceMethod('deleteXXXById', $uniqueVariables), $content);
            }
        }


        //--------------------------------------------
        // cleaning
        //--------------------------------------------
        $content = str_replace('// getXXX', '', $content);
        $content = str_replace('// updateXXX', '', $content);
        $content = str_replace('// deleteXXX', '', $content);

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

        $template = __DIR__ . "/../assets/classModel/Ling/template/MyFactoryObjectFactory.phtml";
        $content = file_get_contents($template);
        $namespace = $variables['namespace'];
        $factoryClassName = $variables['factoryClassName'];
        $classSuffix = $variables['classSuffix'];
        $sFactoryMethods = $variables['factoryMethods'];
        $sUses = $variables['uses'];
        $extraPropertiesDefinition = $variables['extraPropertiesDefinition'];
        $extraPropertiesInstantiation = $variables['extraPropertiesInstantiation'];
        $extraPublicMethods = $variables['extraPublicMethods'];


        $content = str_replace('The\ObjectNamespace', $namespace, $content);
        $content = str_replace('MyFactory', $factoryClassName, $content);
        $content = str_replace('ObjectFactory', $classSuffix . "Factory", $content);
        $content = str_replace('// getXXX', $sFactoryMethods, $content);
        $content = str_replace('// use', $sUses, $content);


        $content = str_replace('//::extraProperties--definition', $extraPropertiesDefinition, $content);
        $content = str_replace('//::extraProperties--instantiation', $extraPropertiesInstantiation, $content);
        $content = str_replace('//::extraPublicMethods', $extraPublicMethods, $content);


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
     * Returns some useful variables based on the ric array.
     * It returns the following entries:
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
        $byTheGivenString = '';
        $argString = '';
        $variableString = '';
        $markerString = '';
        $paramDeclarationString = '';
        $calledVariables = '';
        $markerLines = [];
        foreach ($ric as $column) {
            if ('' === $byString) {
                $byString .= "By" . CaseTool::toPascal($column);
            } else {
                $byString .= "And" . CaseTool::toPascal($column);
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


        return [
            "byString" => $byString,
            "byTheGivenString" => 'by the given ' . $byTheGivenString,
            "argString" => $argString,
            "variableString" => $variableString,
            "markerString" => $markerString,
            "markerLines" => $markerLines,
            "paramDeclarationString" => rtrim($paramDeclarationString),
            "calledVariables" => $calledVariables,
        ];
    }

    /**
     * Returns an array of useful variables sets based on the unique indexes array (one set per unique indexes entry is returned).
     *
     *
     * Each set contains the following entries:
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
            $byTheGivenString = '';
            $argString = '';
            $variableString = '';
            $markerString = '';
            $paramDeclarationString = '';
            $calledVariables = '';
            $markerLines = [];


            foreach ($columns as $column) {
                if ('' === $byString) {
                    $byString .= "By" . CaseTool::toPascal($column);
                } else {
                    $byString .= "And" . CaseTool::toPascal($column);
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


            $ret[] = [
                "byString" => $byString,
                "byTheGivenString" => 'by the given ' . $byTheGivenString,
                "argString" => $argString,
                "variableString" => $variableString,
                "markerString" => $markerString,
                "markerLines" => $markerLines,
                "paramDeclarationString" => rtrim($paramDeclarationString),
                "calledVariables" => $calledVariables,
            ];
        }


        return $ret;
    }


    /**
     * Returns the content of a php method of type ric (internal naming convention, it basically means
     * that the method requires the ric array in order to produce the concrete php method).
     *
     * The variables array is described in this class description.
     *
     * @param string $method
     * @param array $variables
     * @return string
     * @throws \Exception
     */
    protected function getRicMethod(string $method, array $variables): string
    {
        $ricVariables = $variables['ricVariables'];
        $className = $variables['className'];
        $useMicroPermission = $variables['useMicroPermission'];
        $variableName = lcfirst($variables['className']);


        $tpl = __DIR__ . "/../assets/classModel/Ling/template/partials/$method.tpl.txt";
        $content = file_get_contents($tpl);
        $content = str_replace('$user', '$' . $variableName, $content);
        $content = str_replace('User', $className, $content);
        $content = str_replace('ById', $ricVariables['byString'], $content);
        $content = str_replace('int $id', $ricVariables['argString'], $content);
        $content = str_replace('$id', $ricVariables['calledVariables'], $content);


        $microPermReplacement = '';
        if (true === $useMicroPermission) {
            switch ($method) {
                case "getUserById":
                    $microType = 'read';
                    break;
                case "updateUserById":
                    $microType = 'update';
                    break;
                case "deleteUserById":
                    $microType = 'delete';
                    break;
                default:
                    throw new LightBreezeGeneratorException("Unknown method name: $method.");
                    break;
            }
            $microPermReplacement = PHP_EOL . "\t\t" . '$this->checkMicroPermission("' . $microType . '");';
        }
        $content = str_replace('//microperm', $microPermReplacement, $content);


        return $content;
    }


    /**
     * Returns the content of a php method of type ric (internal naming convention, it basically means
     * that the method requires the ric array in order to produce the concrete php method).
     *
     * The variables array is described in this class description.
     *
     * @param string $method
     * @param array $variables
     * @return string
     */
    protected function getDoRicMethod(string $method, array $variables): string
    {

        $isGet = ('get' === substr($method, 0, 3));
        $ricVariables = $variables['ricVariables'];
        $className = $variables['className'];
        $table = $variables['table'];
        $variableName = lcfirst($variables['className']);


        $sLines = '';
        foreach ($ricVariables['markerLines'] as $line) {
            if ('' !== $sLines) {
                $sLines .= "\t\t\t";
                if (true === $isGet) {
                    $sLines .= "\t";
                }
            }
            $sLines .= $line . PHP_EOL;
        }

        $tpl = __DIR__ . "/../assets/classModel/Ling/template/partials/do" . ucfirst($method) . ".tpl.txt";
        $content = file_get_contents($tpl);
        $content = str_replace('* @param int $id', $ricVariables['paramDeclarationString'], $content);
        $content = str_replace('User', $className, $content);
        $content = str_replace('$user', '$' . $variableName, $content);
        $content = str_replace('`user`', '`' . $table . '`', $content);
        $content = str_replace('"user"', '"' . $table . '"', $content);
        $content = str_replace('ById', $ricVariables['byString'], $content);
        $content = str_replace('int $id', $ricVariables['argString'], $content);
        $content = str_replace('id=:id', $ricVariables['markerString'], $content);
        $content = str_replace('id=$id', $ricVariables['variableString'], $content);
        $content = str_replace('"id" => $id,', $sLines, $content);
        return $content;
    }


    /**
     * Returns the content of the interface method identified by the given methodName.
     *
     * @param string $methodName
     * @param array $variables
     * @return string
     */
    protected function getInterfaceMethod(string $methodName, array $variables): string
    {
        $template = __DIR__ . "/../assets/classModel/Ling/template/partials/$methodName.tpl.txt";
        $content = file_get_contents($template);

        $variableName = lcfirst($variables['className']);
        $className = $variables['className'];
        $ricVariables = $variables['ricVariables'];


        $content = str_replace('user', $variableName, $content);
        $content = str_replace('insertXXX', 'insert' . $className, $content);
        $content = str_replace('by the given id', $ricVariables['byTheGivenString'], $content);
        $content = str_replace('* @param int $id', $ricVariables['paramDeclarationString'], $content);
        $content = str_replace('getXXXById', 'get' . $className . $ricVariables['byString'], $content);
        $content = str_replace('updateXXXById', 'update' . $className . $ricVariables['byString'], $content);
        $content = str_replace('deleteXXXById', 'delete' . $className . $ricVariables['byString'], $content);
        $content = str_replace('int $id', $ricVariables['argString'], $content);
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
        $objectClassName = $variables['objectClassName'];
        $methodClassName = $variables['methodClassName'];
        $returnedClassName = $variables['returnedClassName'];
        $useMicroPermission = $variables['useMicroPermission'];
        $tpl = __DIR__ . "/../assets/classModel/Ling/template/partials/getUserObject.tpl.txt";
        $content = file_get_contents($tpl);

        $content = str_replace('UserObjectInterface', $returnedClassName, $content);
        $content = str_replace('new UserObject', 'new ' . $objectClassName, $content);

        $moreCalls = '';
        if (true === $useMicroPermission) {
            $moreCalls = PHP_EOL . "\t\t" . '$o->setContainer($this->container);';
            $moreCalls .= PHP_EOL . "\t\t" . '$o->setMicroPermissionPlugin($this->microPermissionPlugin);';
        }
        $content = str_replace('//moreCalls', $moreCalls, $content);


        $content = str_replace('getUserObject', "get" . $methodClassName, $content);
        return $content;
    }


    /**
     * Returns the content of a php method of type insert (internal naming convention.
     *
     * The variables array is described in this class description.
     *
     * @param array $variables
     * @return string
     */
    protected function getInsertMethod(array $variables): string
    {
        $className = $variables['className'];
        $useMicroPermission = $variables['useMicroPermission'];
        $variableName = lcfirst($variables['className']);

        $tpl = __DIR__ . "/../assets/classModel/Ling/template/partials/insertUser.tpl.txt";
        $content = file_get_contents($tpl);
        $content = str_replace('User', $className, $content);
        $content = str_replace('$user', '$' . $variableName, $content);
        $microPermReplacement = '';
        if (true === $useMicroPermission) {
            $microPermReplacement = PHP_EOL . "\t\t" . '$this->checkMicroPermission("create");';
        }
        $content = str_replace('//microperm', $microPermReplacement, $content);
        return $content;
    }


    /**
     * Returns the content of a php method of type insert (internal naming convention.
     *
     * The variables array is described in this class description.
     *
     * @param array $variables
     * @return string
     */
    protected function getDoInsertMethod(array $variables): string
    {
        $ric = $variables['ric'];
        $className = $variables['className'];
        $table = $variables['table'];
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

        $tpl = __DIR__ . "/../assets/classModel/Ling/template/partials/doInsertUser.tpl.txt";
        $content = file_get_contents($tpl);
        $content = str_replace('User', $className, $content);
        $content = str_replace('$user', '$' . $variableName, $content);
        $content = str_replace('"user"', '"' . $table . '"', $content);
        $content = str_replace('`user`', '`' . $table . '`', $content);
        $content = str_replace('\'id\' => $lastInsertId,', $sLines, $content);
        $content = str_replace('$implodedRicAndAik', $sImplodedRicAndAik, $content);
        $content = str_replace('return $res[\'id\']', $lastInsertIdReturn, $content);
        $content = str_replace('"id" => $res[\'id\'],', $sRicLines, $content);
        return $content;
    }
}