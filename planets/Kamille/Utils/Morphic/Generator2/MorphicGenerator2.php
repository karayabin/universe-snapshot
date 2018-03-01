<?php


namespace Kamille\Utils\Morphic\Generator2;


use ArrayToString\ArrayToStringTool;
use Bat\BDotTool;
use Bat\CaseTool;
use Bat\FileSystemTool;
use Bat\StringTool;
use DebugLogger\DebugLogger;
use Kamille\Utils\Morphic\Exception\MorphicException;
use OrmTools\Helper\OrmToolsHelper;
use QuickPdo\QuickPdoInfoTool;

class MorphicGenerator2 implements MorphicGenerator2Interface
{


    protected $debugMode;
    protected $db2Tables;
    protected $db2TableInfo;
    //
    private $recreateCacheFile;
    private $cacheFile;
    private $debugLogger;
    private $configuration;
    private $controllerBaseDir;
    private $listConfigFileBaseDir;
    private $formConfigFileBaseDir;


    public function __construct()
    {
        $this->debugMode = false;
        $this->recreateCacheFile = false;
        $this->cacheFile = "/tmp/MorphicGenerator2/quickpdo-basicinfo-{db}.php";
        $this->debugLogger = DebugLogger::create();
        $this->configuration = [];
        $this->controllerBaseDir = "/tmp/Morphic2/generated/controller";
        $this->listConfigFileBaseDir = "/tmp/Morphic2/generated/list";
        $this->formConfigFileBaseDir = "/tmp/Morphic2/generated/form";
    }

    public static function create()
    {
        return new static();
    }

    public function setControllerBaseDir($controllerBaseDir)
    {
        $this->controllerBaseDir = $controllerBaseDir;
        return $this;
    }

    public function setListConfigFileBaseDir($listConfigFileBaseDir)
    {
        $this->listConfigFileBaseDir = $listConfigFileBaseDir;
        return $this;
    }

    public function setFormConfigFileBaseDir($formConfigFileBaseDir)
    {
        $this->formConfigFileBaseDir = $formConfigFileBaseDir;
        return $this;
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    public function generate()
    {
        if ($this->db2Tables) {
            $tablesBasicInfo = $this->getTablesBasicInfo($this->db2Tables);
            foreach ($tablesBasicInfo as $table => $tableInfo) {
                $this->generateByTableInfo($tableInfo);
            }
        } else {
            // don't know this generation technique yet
        }
    }

    public function setConfiguration(array $configuration)
    {
        $this->configuration = $configuration;
        return $this;
    }

    public function setTables($tables, $db = null)
    {
        if (null === $db) {
            $db = QuickPdoInfoTool::getDatabase();
        }
        $this->db2Tables[$db] = $tables;
        return $this;
    }

    public function debug($bool)
    {
        $this->debugMode = $bool;
        return $this;
    }


    public function recreateCache($bool)
    {
        $this->recreateCacheFile = $bool;
        return $this;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    protected function generateByTableInfo(array $tableInfo)
    {
        $tableAdvancedInfo = $this->getAdvancedInfo($tableInfo);
        $table2Aliases = $this->_getTable2Aliases($tableInfo);
        $tableAdvancedInfo['table2Aliases'] = $table2Aliases;

        $this->registerTableInfo($tableAdvancedInfo);


        $this->generateController($tableAdvancedInfo);
        $this->generateListConfigFile($tableAdvancedInfo, $table2Aliases);
        $this->generateFormConfigFile($tableAdvancedInfo, $table2Aliases);
    }


    protected function getTablesBasicInfo(array $db2Tables)
    {
        $tablesBasicInfo = [];
        foreach ($db2Tables as $db => $tables) {
            $db2Tables = $this->getAllDbBasicInfo($db);
            foreach ($tables as $table) {
                $tablesBasicInfo[$table] = $db2Tables[$table];
            }
        }
        return $tablesBasicInfo;
    }


    protected function getTableBasicInfo($table, $db)
    {
        $hasPrimaryKey = false;
        $nullables = QuickPdoInfoTool::getColumnNullabilities($table);
        if (false === $nullables) {
            $nullables = [];
        }


        $fks = QuickPdoInfoTool::getForeignKeysInfo($table, $db);
        $reversedFks = [];
        foreach ($fks as $fk => $info) {
            $id = $info[0] . "." . $info[1];

            $reversedFks[$id][] = [
                $fk,
                $info[0],
                $info[1],
                $info[2],
            ];
        }


        return [
            "db" => $db,
            "table" => $table,
            "fks" => $fks,
            "resolvedFks" => QuickPdoInfoTool::getForeignKeysInfo($table, $db, true),
            "reversedFks" => $reversedFks,
            "rks" => QuickPdoInfoTool::getReferencedKeysInfo($table, $db),
            "ric" => QuickPdoInfoTool::getPrimaryKey($table, $db, true, $hasPrimaryKey),
            "hasPrimaryKey" => $hasPrimaryKey,
            "columnNullables" => $nullables,
            "columns" => QuickPdoInfoTool::getColumnNames($table),
            "columnTypes" => QuickPdoInfoTool::getColumnDataTypes($table),
            "columnTypesPrecision" => QuickPdoInfoTool::getColumnDataTypes($table, true),
            "ai" => QuickPdoInfoTool::getAutoIncrementedField($table),
        ];
    }


    protected function generateController(array $tableInfo)
    {

        $this->d('generating controller for table ' . $tableInfo['table']);


        $s = '';
        $s .= $this->_getControllerClassHeader($tableInfo);
        $s .= $this->_getControllerRenderMethod($tableInfo);
        $s .= $this->_getControllerRenderWithParentMethod($tableInfo);
        $s .= $this->_getControllerRenderWithNoParentMethod($tableInfo);

        $s .= <<<EEE

}

EEE;
//        $this->phpCode($s);


        $camel = $tableInfo['camel'];
        $f = $this->controllerBaseDir . "/$camel/$camel" . "ListController.php";
        FileSystemTool::mkfile($f, $s);

    }


    protected function generateListConfigFile(array $tableInfo, array $table2Aliases)
    {

        $this->d('generating list config file  for table ' . $tableInfo['table']);


        $s = '';
        $s .= $this->_getListConfigFileHeader($tableInfo);
        $s .= $this->_getListConfigFileQuery($tableInfo, $table2Aliases);
        $s .= $this->_getListConfigFileConfArray($tableInfo, $table2Aliases);


//        $this->phpCode($s);


        $table = $tableInfo['table'];
        $f = $this->listConfigFileBaseDir . "/$table.list.conf.php";
        FileSystemTool::mkfile($f, $s);

    }


    protected function generateFormConfigFile(array $tableInfo, array $table2Aliases)
    {

        $this->d('generating form config file  for table ' . $tableInfo['table']);


        $s = '';
        $inferred = $this->_getFormInferred($tableInfo);
        $s .= $this->_getFormConfigFileTop($tableInfo, $inferred);
        $s .= $this->_getFormConfigFileHeader($tableInfo, $inferred);


        $s .= $this->_getFormConfigConfTop($tableInfo, $inferred);
        $s .= $this->_getFormConfigConfControls($tableInfo, $inferred);
        $s .= $this->_getFormConfigConfProcess($tableInfo, $inferred);
        $s .= $this->_getFormConfigConfPivotLinks($tableInfo, $inferred);
        $s .= $this->_getFormConfigConfBottom($tableInfo, $inferred);


//        $this->phpCode($s);


        $table = $tableInfo['table'];
        $f = $this->formConfigFileBaseDir . "/$table.form.conf.php";
        FileSystemTool::mkfile($f, $s);

    }


    protected function _getTable2Aliases(array $tableInfo)
    {
        $tablesWithoutPrefix = $this->getConfiguration("tablesWithoutPrefix", []);

        // find db prefixes (to find aliases)
        $reversedKeys = $tableInfo['reversedFks'];
        $dbPrefixes = [];
        $allTables = [];
        foreach ($reversedKeys as $fullTable => $v) {
            $p = explode(".", $fullTable);
            $table = array_pop($p);
            $allTables[] = $table;
            if (!in_array($table, $tablesWithoutPrefix, true)) {
                $q = explode('_', $table);
                if (count($q) > 1) {
                    $prefix = array_shift($q) . "_";
                    $dbPrefixes[] = $prefix;
                }
            }
        }
        $dbPrefixes = array_unique($dbPrefixes);
        $table2Aliases = OrmToolsHelper::getAliases($allTables, $dbPrefixes, ['h']);
        return $table2Aliases;
    }

    /**
     * @param array $tableInfo
     * @return array
     */
    protected function _getFormInferred(array $tableInfo)
    {
        return [];
    }


    protected function getAutocompleteControlContent($column)
    {
        return <<<EEE
            ->setAutocompleteOptions([
                'action' => "auto.$column",
                'source' => "/your/service?action=",
                'minLength' => 0,
            ]))                        
EEE;
    }


    protected function _getFormConfigConfPivotLinks(array $tableInfo, array $inferred)
    {

        $s = '';
        $rks = $tableInfo['rks'];
        if ($rks) {
            $sItems = '';
            foreach ($rks as $item) {


                $route = $this->getTableRouteByTable($item[1]);
                list($label, $labelPlural) = $this->guessLabelsByTable($item[1]);

                $args = '';
                $ric2val = $item[2];


                $c = 0;
                foreach ($ric2val as $col => $fkey) {
                    if (0 !== $c) {
                        $args .= '&';
                    }
                    $args .= $fkey . '=$' . $col;
                    $c++;
                }

                $sItems .= '
                [
                    "link" => E::link("' . $route . '") . "?s&' . $args . '",
                    "text" => "Voir les ' . str_replace('"', '\"', $labelPlural) . '",
                    "disabled" => !$isUpdate,
                ],
';
            }


            $s .= <<<EEE
            
    //--------------------------------------------
    // CHILDREN
    //--------------------------------------------
    'formAfterElements' => [
        [
            "type" => "pivotLinks",
            "links" => [
$sItems
            ],
        ],
    ],
EEE;
        }

        return $s;
    }

    protected function _getFormConfigConfBottom(array $tableInfo, array $inferred)
    {
        $s = <<<EEE
        
];

EEE;
        return $s;
    }


    protected function _getFormConfigConfProcess(array $tableInfo, array $inferred)
    {

        $table = $tableInfo['table'];
        $ric = $tableInfo['ric'];
        $label = $tableInfo['label'];
        $cols = $tableInfo['columns'];
        $hasPrimaryKey = $tableInfo['hasPrimaryKey'];
        $ai = $tableInfo['ai'];


        $commaRics = '$' . implode(', $', $ric);


        $formInsertSuccessMsg = "Le/la " . $label . " a bien été ajouté(e)";
        $formUpdateSuccessMsg = "Le/la " . $label . " a bien été mis(e) à jour";


        $insertCols = '';
        $updateCols = '';
        $updateWhere = '';
        $indent = "\t\t\t\t";
        foreach ($cols as $col) {

            $thisAi = ($ai === $col) ? $ai : false;


            if (false === $thisAi) {
                $insertCols .= $indent . '"' . $col . '" => $fData["' . $col . '"],' . PHP_EOL;
            }


            $inRic = (true === in_array($col, $ric, true));

            if (false === $inRic || false === $hasPrimaryKey) {
                $updateCols .= $indent . '"' . $col . '" => $fData["' . $col . '"],' . PHP_EOL;
            }

            if (true === $inRic) {
                $updateWhere .= $indent . '["' . $col . '", "=", $' . $col . '],' . PHP_EOL;
            }
        }


        $s = <<<EEE
    'feed' => MorphicHelper::getFeedFunction("$table"),
    'process' => function (\$fData, SokoFormInterface \$form) use (\$isUpdate, \$ric, $commaRics) {
            
        if (false === \$isUpdate) {
            \$ric = QuickPdo::insert("$table", [
$insertCols
            ], '', \$ric);
            \$form->addNotification("$formInsertSuccessMsg", "success");
            
            MorphicHelper::redirectToUpdateFormIfNecessary(\$ric);
            
        } else {
            QuickPdo::update("$table", [
$updateCols
            ], [
$updateWhere            
            ]);
            \$form->addNotification("$formUpdateSuccessMsg", "success");
        }
        return false;
    },
    //--------------------------------------------
    // to fetch values
    'ric' => \$ric,
EEE;
        return $s;
    }


    protected function _getFormConfigConfTop(array $tableInfo, array $inferred)
    {
        $s = <<<EEE
//--------------------------------------------
// FORM
//--------------------------------------------
\$conf = [
    //--------------------------------------------
    // FORM WIDGET
    //--------------------------------------------
    'title' => "$tableInfo[label]",
    //--------------------------------------------
    // SOKO FORM
    'form' => SokoForm::create()
        ->setName("soko-form-$tableInfo[table]")
EEE;
        return $s;

    }

    protected function _getFormConfigConfControls(array $tableInfo, array $inferred)
    {
        $s = '';
        $cols = $tableInfo["columns"];
        $fks = $tableInfo["fks"];
        $ai = $tableInfo["ai"];
        $columnTypes = $tableInfo["columnTypes"];
        $nullableKeys = $tableInfo['columnNullables'];
        $columnTypesPrecision = $tableInfo['columnTypesPrecision'];


        $autocompletes = $this->getConfiguration("formControlTypes.autocomplete", []);


        if ($cols) {
            foreach ($cols as $col) {


                $label = $this->identifierToLabel($col);
                $type = $columnTypes[$col];
                $typePrecision = $columnTypesPrecision[$col];
                $isNullable = false;
                if (array_key_exists($col, $nullableKeys) && true === $nullableKeys[$col]) {
                    $isNullable = true;
                }


                if (array_key_exists($col, $fks) || $ai === $col) {


                    $sExtra = "";



                    if ($ai === $col) {
                        $class = 'SokoInputControl';
                        $readOnly = 'true';
                    } elseif (true === $this->isAutocompleteControl($col, $autocompletes, $tableInfo)) {
                        $class = "SokoAutocompleteInputControl";
                        $sExtra = $this->getAutocompleteControlContent($col);
                        $readOnly = '(null !== $' . $col . ')';
                    } else {
                        $class = "SokoChoiceControl";
                        $sExtra = <<<EEE
            ->setChoices(\$choice_$col)
EEE;
                        $readOnly = '(null !== $' . $col . ')';

                    }


                    $sControl = <<<EEE
$class::create()
            ->setName("$col")
            ->setLabel("$label")
            ->setProperties([
                'readonly' => $readOnly,
            ])
            ->setValue(\$$col)
EEE;

                    if ($sExtra) {
                        $sControl .= PHP_EOL . $sExtra;
                    }


                    $s .= PHP_EOL . <<<EEE
        ->addControl($sControl)
EEE;


                } else {
                    $params = [
                        "column" => $col,
                        "label" => $label,
                        "type" => $type,
                    ];
                    if (false === $this->doPrepareColumnControl($file, $params, $tableInfo)) {

                        $label = ucfirst($col);


                        switch ($type) {
                            case "tinyblob":
                            case "blob":
                            case "mediumblob":
                            case "longblob":
                                // let the user (dev) add it manually for now
                                break;
                            case "tinytext":
                            case "mediumtext":
                            case "longtext":
                            case "text":
                                $s .= PHP_EOL . <<<EEE
        ->addControl(SokoInputControl::create()
            ->setName("$col")
            ->setLabel("$label")
            ->setType("textarea")
        )
EEE;
                                break;
                            case "date":
                                $sRequired = 'true';
                                if ($isNullable) {
                                    $sRequired = 'false';
                                }
                                $sProps = '->addProperties([
                "required" => ' . $sRequired . ',                       
            ])
                        ';
                                $s .= PHP_EOL . <<<EEE
        ->addControl(EkomSokoDateControl::create()
            ->setName("$col")
            ->setLabel("$label")
            $sProps
        )
EEE;

                                break;
                            case "datetime":
                                $sRequired = 'true';
                                if ($isNullable) {
                                    $sRequired = 'false';
                                }
                                $sProps = '->addProperties([
                "required" => ' . $sRequired . ',                       
            ])
                        ';
                                $s .= PHP_EOL . <<<EEE
        ->addControl(EkomSokoDateControl::create()
            ->useDatetime()
            ->setName("$col")
            ->setLabel("$label")
            $sProps
        )
EEE;

                                break;
                            default:


                                if ('tinyint(1)' === $typePrecision) {

                                    $s .= PHP_EOL . <<<EEE
        ->addControl(SokoBooleanChoiceControl::create()
            ->setName("$col")
            ->setLabel("$label")
            ->setValue(1)
        )
EEE;
                                } else {
                                    $s .= PHP_EOL . <<<EEE
        ->addControl(SokoInputControl::create()
            ->setName("$col")
            ->setLabel("$label")
        )
EEE;
                                }
                                break;
                        }

                    }
                }
            }
            $s .= ',' . PHP_EOL;
        }


        return $s;
    }

    protected function doPrepareColumnControl(&$s, array $params, array $tableInfo)
    {
        return false;
    }


    protected function isAutocompleteControl($col, array $autocompletes, array $tableInfo)
    {
        $table = $tableInfo['table'];
        foreach ($autocompletes as $prefix => $items) {
            if (0 === strpos($table, $prefix)) {
                if (array_key_exists($col, $items)) {
                    $thing = $items[$col];
                    if (true === $thing) {
                        return true;
                    }
                    if (is_callable($thing)) {
                        return call_user_func($thing, $col, $tableInfo);
                    }
                    throw new MorphicException("Don't know how to handle this thing");
                }
            }
        }
        return false;
    }


    protected function _getFormConfigFileHeader(array $tableInfo, array $inferred)
    {

        $ai = $tableInfo['ai'];
        $ric = $tableInfo['ric'];
        $resolvedFks = $tableInfo['resolvedFks'];
        $sRic = ArrayToStringTool::toPhpArray($ric);
        $sChoices = '';
        $sInit = '';
        $autocompletes = $this->getConfiguration("formControlTypes.autocomplete", []);


        if ($ai) {
            $sInit .= '$' . $ai . ' = (array_key_exists("' . $ai . '", $_GET)) ? $_GET[\'' . $ai . '\'] : null;' . PHP_EOL;
        }

        foreach ($resolvedFks as $col => $info) {

            if (in_array($col, $inferred, true)) {
                $sInit .= '$' . $col . ' = (array_key_exists("' . $col . '", $_GET)) ? $_GET[\'' . $col . '\'] : $' . $col . '; // inferred' . PHP_EOL;
            } else {
                $sInit .= '$' . $col . ' = (array_key_exists("' . $col . '", $_GET)) ? $_GET[\'' . $col . '\'] : null;' . PHP_EOL;
            }


            if (in_array($col, $autocompletes, true)) {
                continue;
            }


            $ftable = $info[1];
//            $ftable = $info[0] . '.' . $info[1]; // if you need full tables, uncomment this line, but in my case I find it more portable without (and I don't use multiple databases...)
            $repr = OrmToolsHelper::getRepresentativeColumn($ftable);


            $sChoices .= '$choice_' . $col . ' = QuickPdo::fetchAll("select ' . $info[2] . ', concat(' . $info[2] . ', \". \", ' . $repr . ') as label from ' . $ftable . '", [], \PDO::FETCH_COLUMN | \PDO::FETCH_UNIQUE);' . PHP_EOL;

        }


        $s = <<<EEE

$sChoices


\$ric = $sRic;

$sInit


\$avatar = (array_key_exists("avatar", \$context)) ? \$context['avatar'] : null;

//--------------------------------------------
// UPDATE|INSERT MODE
//--------------------------------------------
\$isUpdate = MorphicHelper::getIsUpdate(\$ric);

EEE;

        return $s;

    }


    protected function _getFormConfigFileTop(array $tableInfo, array $inferred)
    {
        return <<<EEE
use QuickPdo\QuickPdo;
use Kamille\Utils\Morphic\Helper\MorphicHelper;
use SokoForm\Form\SokoFormInterface;
use SokoForm\Form\SokoForm;
use SokoForm\Control\SokoAutocompleteInputControl;
use SokoForm\Control\SokoInputControl;
use SokoForm\Control\SokoChoiceControl;
use SokoForm\Control\SokoBooleanChoiceControl;
EEE;

    }


    protected function _getListConfigFileHeader(array $tableInfo)
    {
        $s = '<?php ' . PHP_EOL;
        $s .= 'use Kamille\Utils\Morphic\Helper\MorphicHelper;' . PHP_EOL;
        return $s;
    }


    protected function _getListConfigFileQuery(array $tableInfo, array $table2Aliases)
    {
        // find db prefixes (to find aliases)
        $reversedKeys = $tableInfo['reversedFks'];

        $joins = [];
        foreach ($reversedKeys as $ftable => $colsInfo) {
            $p = explode('.', $ftable);
            $table = array_pop($p);
            $prefix = $table2Aliases[$table];

            $onClause = [];
            foreach ($colsInfo as $info) {
                $onClause[] = "`$prefix`." . $info[3] . "=h." . $info[0];
            }

//            $joins[] = "inner join $ftable $prefix on " . implode(' and ', $onClause);
            $joins[] = "inner join $table `$prefix` on " . implode(' and ', $onClause);
        }


        $sJoins = implode(PHP_EOL, $joins);


        $s = <<<EEE
        
\$q = "select %s from `$tableInfo[table]` h
$sJoins  
";
EEE;
        return $s;

    }


    protected function getNameByTable($table)
    {
        $tablesWithoutPrefix = $this->getConfiguration("tablesWithoutPrefix", []);

        /**
         * If a table contains an underscore, we assume that it is prefixed, unless
         * it is registered in the tablesWithoutPrefix array.
         */
        if (
            false !== strpos($table, "_") &&
            false === in_array($table, $tablesWithoutPrefix, true)
        ) {
            $p = explode("_", $table);
            array_shift($p); // drop the prefix
            $table = implode('_', $p);
        }
        $name = strtolower($table);
        $name = str_replace("_has_", '-', $name);
        return $name;
    }

    protected function _getListConfigFileConfArray(array $tableInfo, array $table2Aliases)
    {


        $viewId = $tableInfo["table"];
        $cols = $tableInfo["columns"];
        $columnTypes = $tableInfo["columnTypes"];
        $fks = $tableInfo["fks"];
        $originalRic = $tableInfo["ric"];
        $rcMap = [];
        $headers = [];
        $qCols = [];

        foreach ($cols as $col) {

            if (false === strpos($columnTypes[$col], 'blob')) {
                $label = $this->identifierToLabel($col);
                $headers[$col] = $label;
                $qCols[] = 'h.' . $col;
            }
        }


        $reversedKeys = $tableInfo['reversedFks'];
        foreach ($reversedKeys as $fullTable => $v) {
            $p = explode(".", $fullTable);
            $db = $p[0];
            $table = $p[1];

            $prefix = $table2Aliases[$table];

            $ric = QuickPdoInfoTool::getPrimaryKey($table, $db, true);
            $repr = OrmToolsHelper::getRepresentativeColumn($fullTable);
            $sRic = '';


            $name = $this->getNameByTable($table);
            $label = $this->identifierToLabel($name);
            $headers[$name] = $label;
            $rcMap[$name] = [];
            $c = 0;
            foreach ($ric as $col) {
                if (0 !== $c++) {
                    $sRic .= ', "-", ';
                }
                $rcMap[$name][] = $prefix . "." . $col;
                $sRic .= $prefix . "." . $col;
            }
            $rcMap[$name][] = $prefix . "." . $repr;
            $qCols[] = 'concat( ' . $sRic . ', ". ", ' . $prefix . "." . $repr . ' ) as `' . $name . '`';


        }
        $headers['_action'] = '';


        $headersVis = [];
        foreach ($fks as $col => $info) {
            $headersVis[$col] = false;
        }


        $sHeaders = ArrayToStringTool::toPhpArray($headers, null, 4);
        $sHeadersVis = ArrayToStringTool::toPhpArray($headersVis, null, 4);
        $sRcMap = ArrayToStringTool::toPhpArray($rcMap, null, 4);


        $sRic = ArrayToStringTool::toPhpArray($originalRic, null, 4);
        $sQCols = ArrayToStringTool::toPhpArray($qCols, null, 4);

        $s = <<<EEE



\$parentValues = MorphicHelper::getListParentValues(\$q, \$context);



\$conf = [
    //--------------------------------------------
    // LIST WIDGET
    //--------------------------------------------
    'title' => "$tableInfo[labelPlural]",
    'table' => '$tableInfo[table]',
    /**
     * This is actually the list.conf identifier
     */
    'viewId' => '$viewId',
    "headers" => $sHeaders,
    "headersVisibility" => $sHeadersVis,
    "realColumnMap" => $sRcMap,
    'querySkeleton' => \$q,
    "queryCols" => $sQCols,
    "ric" => $sRic,
    "formRouteExtraVars" => \$parentValues,
    /**
     * formRoute is just a helper, it will be used to generate the rowActions key.
     */
    'formRoute' => "$tableInfo[route]",    
    'context' => \$context,
];



EEE;

        return $s;
    }


    protected function guessLabelsByTable($table)
    {
        $prettyName = $this->getNameByTable($table);


        $label = str_replace("_", ' ', $prettyName);
        $labelPlural = StringTool::getPlural($label);

        return [
            $label,
            $labelPlural,
        ];
    }

    protected function getConfiguration($key, $default = null)
    {
        return BDotTool::getDotValue($key, $this->configuration, $default);
    }

    protected function getTableRouteByTable($table)
    {
        $camel = $this->getCamelByTable($table);
        return "Morphic_Generated_" . $camel . "_List";
    }

    protected function getCamelByTable($table)
    {
        return CaseTool::snakeToFlexiblePascal($table);
    }


    protected function identifierToLabel($identifier)
    {
        return ucfirst(str_replace('_', ' ', $identifier));
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    private function d($msg, $type = 'info')
    {
        if (true === $this->debugMode) {
            $this->debugLogger->log($msg, $type, true);
        }
    }


    private function getAdvancedInfo(array $tableBasicInfo)
    {
        $a = $tableBasicInfo;
        list($label, $labelPlural) = $this->guessLabelsByTable($tableBasicInfo['table']);
        $a['label'] = $label;
        $a['labelPlural'] = $labelPlural;
        $a['camel'] = $this->getCamelByTable($tableBasicInfo['table']);
        $a['route'] = $this->getTableRouteByTable($a['table']);
        return $a;
    }

    private function getContentFromCache($db)
    {
        $f = $this->getCacheFile($db);
        if (file_exists($f)) {
            return unserialize(file_get_contents($f));
        }
        return false;
    }

    private function getCacheFile($db)
    {
        return str_replace('{db}', $db, $this->cacheFile);
    }


    private function getAllDbBasicInfo($db)
    {

        $f = $this->getCacheFile($db);
        if (true === $this->recreateCacheFile) {
            if (strlen($f) > 10) {
                FileSystemTool::remove($f);
            }
        }

        $ret = $this->getContentFromCache($db);
        if (false !== $ret) {
            return $ret;
        }

        $tables = QuickPdoInfoTool::getTables($db);
        foreach ($tables as $table) {
            $tablesBasicInfo[$table] = $this->getTableBasicInfo($table, $db);
        }

        FileSystemTool::mkfile($f, serialize($tablesBasicInfo));
        return $tablesBasicInfo;
    }


    private function phpCode($str)
    {
        echo '<hr>';
        echo '<pre>';
        echo $str;
        echo '</pre>';
        echo '<hr>';


        FileSystemTool::mkfile("/tmp/MorphicGenerator2/tmp.php", $str);
    }

    private function getRenderWithParentCodeBlock($fullTable, array $cols)
    {

        $p = explode(".", $fullTable);
        if (count($p) > 1) {
            $table = array_pop($p);
        } else {
            $table = array_shift($p);
        }

        list($label, $labelPlural) = $this->guessLabelsByTable($table);
        $route = $this->getTableRouteByTable($table);


        $aArrLinesGet = [];
        $aArrLines = [];
        foreach ($cols as $col => $parentCol) {
            $aArrLinesGet[] = '"' . $col . '" => $_GET["' . $col . '"],';
            $aArrLines[] = '"' . $col . '" => "' . $parentCol . '",';
        }
        $sArrLinesGet = implode(PHP_EOL . "\t\t\t\t", $aArrLinesGet);
        $sArrLines = implode(PHP_EOL . "\t\t\t\t", $aArrLines);

        return <<<EEE
        
            return \$this->renderWithParent("$table", [
                $sArrLinesGet
            ], [
                $sArrLines
            ], [
                "$label",
                "$labelPlural",
            ], "$route");
EEE;
    }


    protected function _getControllerClassHeader(array $tableInfo)
    {


        $s = <<<EEE
<?php

namespace Controller\Morphic\Generated\\$tableInfo[camel];
use Controller\Morphic\Pattern\MorphicListController;
use Kamille\Utils\Morphic\Exception\MorphicException;


class $tableInfo[camel]ListController extends MorphicListController
{

EEE;

        return $s;

    }


    protected function _getControllerRenderMethod(array $tableInfo)
    {
        $table = $tableInfo['table'];
        $reversedFks = $tableInfo['reversedFks'];


        //--------------------------------------------
        // RENDER
        //--------------------------------------------
        $s = <<<EEE
        
    public function render()
    {        
        //--------------------------------------------
        // USING PARENTS
        //--------------------------------------------
EEE;

        $mul = PHP_EOL . "\t\t\t";


        //--------------------------------------------
        // PARENTS FROM URI?
        //--------------------------------------------
        $c = 0;

        if ($reversedFks) {

            foreach ($reversedFks as $fkFullTable => $colsInfo) {
                $conds = [];
                $s .= PHP_EOL . "\t\t";

                if (0 === $c++) {
                    $s .= 'if ( ';
                } else {
                    $s .= '} elseif ( ';
                }

                foreach ($colsInfo as $info) {
                    $conds[] = 'array_key_exists ( "' . $info[0] . '", $_GET)';
                }

                if (count($conds) > 1) {
                    $s .= $mul;
                }

                $s .= implode(' &&' . $mul, $conds);

                if (count($conds) > 1) {
                    $s .= PHP_EOL . "\t\t";
                }
                $s .= ') {';

                $cols = [];
                foreach ($colsInfo as $info) {
                    $cols[$info[0]] = $info[3];
                }
                $s .= $this->getRenderWithParentCodeBlock($fkFullTable, $cols);
            }

            $s .= PHP_EOL . "\t\t" . '}';
        }

        $s .= PHP_EOL . "\t\t";
        $s .= 'return $this->renderWithNoParent();';
        $s .= <<<EEE
        
    }
    
EEE;
        return $s;
    }


    protected function _getControllerRenderWithParentMethod(array $tableInfo)
    {
        $ric = $tableInfo['ric'];
        $ricCols = [];
        foreach ($ric as $col) {
            $ricCols[] = '"' . $col . '",';
        }
        $sRic = implode(PHP_EOL . "\t\t\t\t", $ricCols);

        $s = <<<EEE

    protected function renderWithParent(\$parentTable, array \$parentKey2Values, array \$parentKeys2ReferenceKeys, array \$labels, \$route)
    {
        \$elementInfo = [
            'table' => "$tableInfo[table]",
            'ric' => [
                $sRic
            ],
            'label' => "$tableInfo[label]",
            'labelPlural' => "$tableInfo[labelPlural]",
            'route' => "$tableInfo[route]",
        ];
        return \$this->doRenderWithParent(\$elementInfo, \$parentTable, \$parentKey2Values, \$parentKeys2ReferenceKeys, \$labels, \$route);
    }
    
EEE;
        return $s;
    }

    protected function _getControllerRenderWithNoParentMethod(array $tableInfo)
    {
        $ric = $tableInfo['ric'];
        $ricCols = [];
        foreach ($ric as $col) {
            $ricCols[] = '"' . $col . '",';
        }
        $sRic = implode(PHP_EOL . "\t\t\t\t\t", $ricCols);

        $sExtra = $this->_getControllerRenderWithNoParentMethodExtraVar($tableInfo);


        $s = <<<EEE
        
    protected function renderWithNoParent()
    {
        if ('hasAdminPower') {

            return \$this->doRenderFormList([
                'title' => "$tableInfo[labelPlural]",
                'breadcrumb' => "$tableInfo[table]",
                'form' => "$tableInfo[table]",
                'list' => "$tableInfo[table]",
                'ric' => [
                    $sRic
                ],

                "newItemBtnText" => "Add a new $tableInfo[label]",
                "newItemBtnLink" => E::link("$tableInfo[route]") . "?form",
                "route" => "$tableInfo[route]",
                $sExtra
                "context" => [],
            ]);
        } else {
            throw new MorphicException("not permitted");
        }
    }
    
EEE;
        return $s;
    }

    protected function _getControllerRenderWithNoParentMethodExtraVar(array $tableInfo)
    {
        return '';
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    private function registerTableInfo(array $tableInfo)
    {
        $db = $tableInfo['db'];
        $table = $tableInfo['table'];
        $this->db2TableInfo[$db][$table] = $tableInfo;
    }
}




