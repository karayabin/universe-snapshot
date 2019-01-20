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

class MorphicGenerator2Old implements MorphicGenerator2Interface
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
    private $_relatedTables;


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

        //
        $this->_relatedTables = []; // private cache
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
            foreach ($tablesBasicInfo as $fullTable => $tableInfo) {
                $tableAdvancedInfo = $this->getAdvancedInfo($tableInfo);
                $table2Aliases = $this->_getTable2Aliases($tableInfo);
                $tableAdvancedInfo['table2Aliases'] = $table2Aliases;
                $this->registerTableInfo($tableAdvancedInfo); // from now on, $this->db2TableInfo contains all info ($this->db2TableInfo[$db][$table] = $tableInfo;)

            }


            // now generating the subset that we want
            foreach ($this->db2Tables as $db => $tables) {
                foreach ($tables as $table) {
                    $info = $this->db2TableInfo[$db][$table];
                    $this->generateByTableInfo($info);
                }
            }

        } else {
            // don't know this generation technique yet
        }
    }


    //--------------------------------------------
    //
    //--------------------------------------------
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
    protected function doGenerate()
    {

    }

    protected function generateByTableInfo(array $tableInfo)
    {
        $table2Aliases = $tableInfo['table2Aliases'];
        $this->generateController($tableInfo);
        $this->generateListConfigFile($tableInfo, $table2Aliases);
        $this->generateFormConfigFile($tableInfo, $table2Aliases);
    }


    protected function getTablesBasicInfo(array $db2Tables)
    {
        $tablesBasicInfo = [];
        foreach ($db2Tables as $db => $tables) {
            /**
             * Actually, since tables sometimes reference other tables from other modules),
             * we generate information for all tables in the database no matter what.
             */
            $allTables = $this->getAllTablesBasicInfo($db);
            foreach ($allTables as $tableInfo) {
                $tablesBasicInfo[$db . "." . $tableInfo['table']] = $tableInfo;
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
        $s .= $this->_getControllerTopMethods($tableInfo);
        $s .= $this->_getControllerRenderMethod($tableInfo);
        $s .= $this->_getControllerRenderWithParentMethod($tableInfo);
        $s .= $this->_getControllerRenderWithNoParentMethod($tableInfo);
        $s .= $this->_getControllerGetRicMethod($tableInfo);
//        $s .= $this->_getControllerGetAddBtnTextByAvatarMethod($tableInfo);
//        $s .= $this->_getControllerGetRenderWithParentTitle($tableInfo);

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


    protected function _getTablePrefix($table)
    {
        $tablesWithoutPrefix = $this->getConfiguration("tablesWithoutPrefix", []);

        $prefix = "";
        if (!in_array($table, $tablesWithoutPrefix, true)) {
            $q = explode('_', $table, 2);
            if (count($q) > 1) {
                $prefix = array_shift($q) . "_";
            }
        }
        return $prefix;
    }

    /**
     * @param array $tableInfo
     * @return array
     */
    protected function _getFormInferred(array $tableInfo)
    {
        return [];
    }


    protected function getAutocompleteControlContent($column, $autocompletePrefix, array $tableInfo)
    {
        return <<<EEE
            ->setAutocompleteOptions([
                'action' => "auto.$column",
                'source' => "/your/service?action=",
                'minLength' => 0,
            ])                    
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

                $pivotTableInfo = $this->db2TableInfo[$item[0]][$item[1]];
                $labelPlural = $pivotTableInfo['labelPlural'];

                if ('cities' === $labelPlural) {
                    az($pivotTableInfo, __FILE__);
                }
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
                    "link" => A::link("' . $route . '") . "?s&' . $args . '",
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


    protected function getFormInsertSuccessMessage(array $tableInfo, $table, $label)
    {
        return "Le/la " . $label . " a bien été ajouté(e)";
    }

    protected function getFormUpdateSuccessMessage(array $tableInfo, $table, $label)
    {
        return "Le/la " . $label . " a bien été mis(e) à jour";
    }


    protected function _getFormConfigConfProcess(array $tableInfo, array $inferred)
    {

        $table = $tableInfo['table'];
        $database = $tableInfo['db'];
        $ric = $tableInfo['ric'];
        $label = $tableInfo['label'];
        $cols = $tableInfo['columns'];
        $hasPrimaryKey = $tableInfo['hasPrimaryKey'];
        $nullables = $tableInfo['columnNullables'];
        $ai = $tableInfo['ai'];


        $commaRics = '$' . implode(', $', $ric);


        $formInsertSuccessMsg = $this->getFormInsertSuccessMessage($tableInfo, $table, $label);
        $formUpdateSuccessMsg = $this->getFormUpdateSuccessMessage($tableInfo, $table, $label);


        $insertCols = '';
        $updateCols = '';
        $updateWhere = '';
        $updateWhereCols = [];
        $indent = "\t\t\t\t";
        foreach ($cols as $col) {

            $thisAi = ($ai === $col) ? $ai : false;
            $isNullable = (array_key_exists($col, $nullables) && true === $nullables[$col]);


            if (false === $thisAi) {
                if (false === $isNullable) {
                    $insertCols .= $indent . '"' . $col . '" => $fData["' . $col . '"],' . PHP_EOL;
                } else {
                    $insertCols .= $indent . '"' . $col . '" => ($fData["' . $col . '"]) ? $fData["' . $col . '"] : null,' . PHP_EOL;
                }
            }


            $inRic = (true === in_array($col, $ric, true));

            if (false === $inRic || false === $hasPrimaryKey) {
                if (false === $isNullable) {
                    $updateCols .= $indent . '"' . $col . '" => $fData["' . $col . '"],' . PHP_EOL;
                } else {
                    $updateCols .= $indent . '"' . $col . '" => ($fData["' . $col . '"]) ? $fData["' . $col . '"] : null,' . PHP_EOL;
                }
            }

            if (true === $inRic) {
                $updateWhere .= $indent . '["' . $col . '", "=", $' . $col . '],' . PHP_EOL;
                $updateWhereCols[] = $col;
            }
        }

        $sessionFlagName = "form-generated-$table";

        $sInsertStatement = $this->getFormInsertStatement($tableInfo, $table, $insertCols);
        $sUpdateStatement = $this->getFormUpdateStatement($tableInfo, $table, $updateCols, $updateWhere, $updateWhereCols);


        $s = <<<EEE
    'feed' => MorphicHelper::getFeedFunction("$database.$table", function (SokoFormInterface \$form) {
        if (SessionTool::pickupFlag("$sessionFlagName")) {
            \$form->addNotification("$formInsertSuccessMsg", "success");
        }
    }),
    'process' => function (\$fData, SokoFormInterface \$form) use (\$isUpdate, \$ric, $commaRics) {
            
        if (false === \$isUpdate) {
$sInsertStatement
            \$form->addNotification("$formInsertSuccessMsg", "success");
            
            if (array_key_exists("submit-and-update", \$_POST)) {
                SessionTool::setFlag("$sessionFlagName");
                MorphicHelper::redirect(\$ric);
            }
            
        } else {
$sUpdateStatement
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

    protected function getFormInsertStatement(array $tableInfo, $table, $insertCols)
    {
        return <<<EEE
            \$ric = QuickPdo::insert("$table", [
$insertCols
            ], '', \$ric);
EEE;
    }

    protected function getFormUpdateStatement(array $tableInfo, $table, $updateCols, $updateWhere, array $updateWhereCols)
    {
        return <<<EEE
            QuickPdo::update("$table", [
$updateCols
            ], [
$updateWhere            
            ]);
EEE;
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
    'title' => \$title,
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
        $table = $tableInfo["table"];
        $columnTypes = $tableInfo["columnTypes"];
        $nullableKeys = $tableInfo['columnNullables'];
        $columnTypesPrecision = $tableInfo['columnTypesPrecision'];
        $autocompletes = $this->getConfiguration("formControlTypes.autocomplete", []);


        if ($cols) {



            foreach ($cols as $col) {


                $label = $this->identifierToLabel($col, $table, $tableInfo);

                $type = $columnTypes[$col];
                $typePrecision = $columnTypesPrecision[$col];
                $isNullable = false;
                if (array_key_exists($col, $nullableKeys) && true === $nullableKeys[$col]) {
                    $isNullable = true;
                }


                if (array_key_exists($col, $fks) || $ai === $col) {



                    $sExtra = "";
                    $sPre = "";


                    if ($ai === $col) {
                        $class = 'SokoInputControl';
                        $readOnly = 'true';
                        $sExtraLink = "";
                    } else {
                        $fkTableInfo = $this->db2TableInfo[$fks[$col][0]][$fks[$col][1]];
                        $fkRoute = $fkTableInfo['route'];

                        $autocompletePrefix = null;
                        if (true === $this->isAutocompleteControl($col, $autocompletes, $tableInfo, $autocompletePrefix)) {
                            $class = "SokoAutocompleteInputControl";
                            $sExtra = $this->getAutocompleteControlContent($col, $autocompletePrefix, $tableInfo);
                            $readOnly = '(null !== $' . $col . ')';
                            $sExtraLink = $this->getForeignKeyExtraLink('autocomplete', $col, $label, $fkRoute, $tableInfo, $fkTableInfo);
                        } else {
                            $class = "SokoChoiceControl";
                            $sExtra = <<<EEE
            ->setChoices(\$choice_$col)
EEE;
                            $readOnly = '(null !== $' . $col . ')';
                            $sExtraLink = $this->getForeignKeyExtraLink('fk', $col, $label, $fkRoute, $tableInfo, $fkTableInfo);

                            if ($isNullable) {
                                $sPre .= PHP_EOL;
                                $firstValueLabel = str_replace('"', '\"', $this->getChoiceListFirstValueLabel());
                                $sPre .= <<<EEE
                'nullableFirstItem' => "$firstValueLabel",
EEE;

                            }

                        }

                    }


                    $sControl = <<<EEE
$class::create()
            ->setName("$col")
            ->setLabel("$label")
            ->setProperties([$sPre
                'readonly' => $readOnly,$sExtraLink
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


                    if (false === $this->doPrepareColumnControl($s, $params, $tableInfo)) {


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
        ->addControl(SokoDateControl::create()
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
        ->addControl(SokoDateControl::create()
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
        $type = $params['type'];
        $col = $params['column'];
        $label = $params['label'];


//        switch ($type) {
//            case "date":
//
//
//                $s .= PHP_EOL . <<<EEE
//        ->addControl(SokoDateControl::create()
//            ->setName("$col")
//            ->setLabel('$label')
//        )
//EEE;
//                return true;
//                break;
//        }

        return false;
    }


    protected function isAutocompleteControl($col, array $autocompletes, array $tableInfo, &$autocompletePrefix = null)
    {
        $table = $tableInfo['table'];
        foreach ($autocompletes as $prefix => $items) {
            if (0 === strpos($table, $prefix)) {
                if (array_key_exists($col, $items)) {
                    $thing = $items[$col];
                    $autocompletePrefix = $prefix;
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


        $title = str_replace('"', '\"', ucfirst($tableInfo["label"]));

        $s = <<<EEE

$sChoices


\$ric = $sRic;

$sInit


\$avatar = (array_key_exists("avatar", \$context)) ? \$context['avatar'] : null;

//--------------------------------------------
// UPDATE|INSERT MODE
//--------------------------------------------
\$isUpdate = MorphicHelper::getIsUpdate(\$ric);
\$title = MorphicHelper::getFormTitle("$title", \$isUpdate);


EEE;

        return $s;

    }


    protected function _getFormConfigFileTop(array $tableInfo, array $inferred)
    {
        return <<<EEE
<?php 

use Core\Services\A;        
use Bat\SessionTool;        
use QuickPdo\QuickPdo;
use Kamille\Utils\Morphic\Helper\MorphicHelper;
use SokoForm\Form\SokoFormInterface;
use SokoForm\Form\SokoForm;
use SokoForm\Control\SokoAutocompleteInputControl;
use SokoForm\Control\SokoInputControl;
use SokoForm\Control\SokoChoiceControl;
use SokoForm\Control\SokoDateControl;
use SokoForm\Control\SokoBooleanChoiceControl;
EEE;

    }


    protected function _getListConfigFileHeader(array $tableInfo)
    {
        $s = '<?php ' . PHP_EOL . PHP_EOL;
        $s .= <<<EEE
use Core\Services\A;        
use Kamille\Utils\Morphic\Helper\MorphicHelper;
use Module\NullosAdmin\Morphic\Helper\NullosMorphicHelper;
EEE;
        $s .= PHP_EOL;

        return $s;
    }


    protected function _getListConfigFileQuery(array $tableInfo, array $table2Aliases)
    {

        // find db prefixes (to find aliases)
        $reversedKeys = $tableInfo['reversedFks'];
        $nullables = $tableInfo['columnNullables'];

        $joins = [];

        foreach ($reversedKeys as $ftable => $colsInfo) {
            $p = explode('.', $ftable);
            $table = array_pop($p);
            $db = array_pop($p);

            $prefix = $table2Aliases[$table];

            $onClause = [];
            $hasNullable = false;
            foreach ($colsInfo as $info) {

                $col = $info[0];
                if (array_key_exists($col, $nullables) && true === $nullables[$col]) {
                    $hasNullable = true;
                }


                $onClause[] = "`$prefix`." . $info[3] . "=h." . $col;
            }

//            $joins[] = "inner join $ftable $prefix on " . implode(' and ', $onClause);


            $joinType = "inner";
            if ($hasNullable) {
                $joinType = "left";
            }
            $joins[] = "$joinType join `$db`.`$table` `$prefix` on " . implode(' and ', $onClause);
        }


        $sJoins = implode(PHP_EOL, $joins);


        $s = <<<EEE
        
\$q = "select %s from `$tableInfo[db]`.`$tableInfo[table]` h
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
        $table = $tableInfo["table"];
        $route = $tableInfo["route"];
        $originalTable = $table;
        $cols = $tableInfo["columns"];
        $columnTypes = $tableInfo["columnTypes"];
        $columnTypesPrecision = $tableInfo["columnTypesPrecision"];
        $fks = $tableInfo["fks"];
        $originalRic = $tableInfo["ric"];
        $reversedKeys = $tableInfo['reversedFks'];
        $resolvedFks = $tableInfo['resolvedFks'];
        $rcMap = [];
        $headers = [];
        $qCols = [];
        $colTransformers = [];
        $searchColumnLists = [];
        $searchColumnDates = [];
        $operators = [];
        $formRouteExtraActions = [];
        $col2DateType = [];


        foreach ($cols as $col) {
            $colType = $columnTypes[$col];

            if (false === strpos($colType, 'blob')) {
                $label = $this->identifierToLabel($col, $table, $tableInfo);
                $headers[$col] = $label;
                $qCols[] = 'h.' . $col;
            }


            if (false !== strpos($colType, 'text')) {
                $colTransformers[] = <<<EEE
        '$col' => NullosMorphicHelper::getStandardColTransformer("toolong"),
EEE;
            } elseif (false !== strpos($col, 'color')) {
                $colTransformers[] = <<<EEE
        '$col' => NullosMorphicHelper::getStandardColTransformer("color"),
EEE;
            } elseif ("date" === $colType || "datetime" === $colType) {
                $colTransformers[] = <<<EEE
        '$col' => NullosMorphicHelper::getStandardColTransformer("$colType"),
EEE;
                $searchColumnDates[] = $col;
                $operators[$col . "_low"] = '>=';
                $operators[$col . "_high"] = '<=';

                $col2DateType[$col] = $colType;
            }
        }


        foreach ($columnTypesPrecision as $col => $type) {
            if ('tinyint(1)' === $type) {
                $colTransformers[] = <<<EEE
        '$col' => NullosMorphicHelper::getStandardColTransformer("active"),
EEE;

                $searchColumnLists[] = <<<EEE
        "$col" => NullosMorphicHelper::getStandardSearchList("active"),
EEE;

            }
        }


        foreach ($reversedKeys as $fullTable => $v) {
            $p = explode(".", $fullTable);
            $db = $p[0];
            $table = $p[1];


            $prefix = $table2Aliases[$table];

            $ric = QuickPdoInfoTool::getPrimaryKey($table, $db, true);
            $repr = OrmToolsHelper::getRepresentativeColumn($fullTable);
            $sRic = '';


            $name = $this->getNameByTable($table);
            $label = ucfirst($this->db2TableInfo[$db][$table]['label']);


            /**
             * Subclass like LingFrenchMorphicGenerator2 has already inserted an appropriate translation
             * of the column here, so we don't want to override it with our "cheap" label.
             */
            if (false === array_key_exists($name, $headers)) {
                $headers[$name] = $label;
            }

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


        $formRouteExtraActionsStatements = [];
        $parentsWords = [];
        foreach ($resolvedFks as $col => $info) {


            // formRouteExtraActions
            $foreignTableInfo = $this->db2TableInfo[$info[0]][$info[1]];
            $foreignRoute = $foreignTableInfo['route'];
            $parentsWords[$col] = $this->getTheThingFromTableInfo($foreignTableInfo);

            $var = 'update_' . $info[1] . '_link_fmt';
            $formRouteExtraActions[] = [
                "foreignTableLinkName" => $var,
                "updateForeignRecordLabel" => $this->getRowActionUpdateForeignRecord($foreignTableInfo),
                "foreignKey" => $col,
            ];
            $formRouteExtraActionsStatements[] = '$' . $var . ' = A::link("' . $foreignRoute . '") . "?form&' . $info[2] . '=%s";';
        }
        $sFormRouteLinks = implode(PHP_EOL, $formRouteExtraActionsStatements);


        foreach ($searchColumnDates as $colDate) {
            $rcMap[$colDate . "_low"] = "h.$colDate";
            $rcMap[$colDate . "_high"] = "h.$colDate";
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

        $title = str_replace('"', '\"', ucfirst($tableInfo["labelPlural"]));


        $sTitleDecoration = $this->getTitleDecorationBlock($parentsWords);


        $s = <<<EEE



\$parentValues = MorphicHelper::getListParentValues(\$q, \$context);

$sFormRouteLinks


\$title = "$title";

$sTitleDecoration


\$conf = [
    //--------------------------------------------
    // LIST WIDGET
    //--------------------------------------------
    'title' => \$title,
    'table' => '$tableInfo[table]',
    /**
     * This is actually the list.conf identifier
     */
    "headers" => $sHeaders,
    "headersVisibility" => $sHeadersVis,
    "realColumnMap" => $sRcMap,
    'querySkeleton' => \$q,
    "queryCols" => $sQCols,
    "ric" => $sRic,
    "formRouteExtraVars" => \$parentValues,
    'formRoute' => "$tableInfo[route]",    
    'context' => \$context,
EEE;


        //--------------------------------------------
        // COLS TRANSFORMERS
        //--------------------------------------------
        $s .= $this->renderConfigListProperty('colTransformers', $colTransformers);


        //--------------------------------------------
        // SEARCH COLUMN LISTS
        //--------------------------------------------
        $s .= $this->renderConfigListProperty('searchColumnLists', $searchColumnLists);


        //--------------------------------------------
        // SEARCH COLUMN DATES
        //--------------------------------------------
        if ($searchColumnDates) {
            $s .= PHP_EOL;
            $s .= <<<RRR
    "searchColumnDates" => [
RRR;
            foreach ($searchColumnDates as $col) {
                $col_low = $col . "_low";
                $col_high = $col . "_high";

                $dateType = $col2DateType[$col];
                $bool = ("date" === $dateType) ? 'false' : 'true';


                $s .= PHP_EOL;
                $s .= <<<EEE
        "$col" => [
            '$col_low',
            '$col_high',
            $bool, // $dateType
        ],
EEE;
            }
            $s .= PHP_EOL;
            $s .= <<<RRR
    ],
RRR;

        }

        //--------------------------------------------
        // OPERATORS
        //--------------------------------------------
        if ($operators) {
            $sOperators = ArrayToStringTool::toPhpArray($operators, null, 4);
            $s .= PHP_EOL;
            $s .= <<<EEE
    'operators' => $sOperators,
EEE;

        }

        //--------------------------------------------
        // FORM ROUTE EXTRA ACTIONS
        //--------------------------------------------
        if ($formRouteExtraActions) {
            $s .= PHP_EOL;
            $s .= <<<EEE
    'formRouteExtraActions' => [
EEE;

            foreach ($formRouteExtraActions as $extraAction) {

                $foreignTableLinkName = $extraAction['foreignTableLinkName'];
                $updateForeignRecordLabel = str_replace('"', '\"', $extraAction['updateForeignRecordLabel']);
                $foreignKey = $extraAction['foreignKey']; // assuming only one foreign key is always enough
//                $foreignKeys = $extraAction['foreignKeys'];
//                $foreignKeys = array_map(function ($v) {
//                    return '\$row["' . $v . '"]';
//                }, $foreignKeys);
//                $sForeignKeys = implode(', ', $foreignKeys);


                $s .= PHP_EOL;
                $s .= <<<EEE
        [
            "name" => "update_$foreignKey",
            "label" => "$updateForeignRecordLabel",
            "icon" => "fa fa-pencil",
            "link" => function (array \$row) use (\$$foreignTableLinkName) {
                return sprintf(\$$foreignTableLinkName, \$row["$foreignKey"]);
            },
        ],
EEE;

            }
            $s .= PHP_EOL;
            $s .= <<<EEE
    ],
EEE;
        }


        //--------------------------------------------
        // END OF $CONF
        //--------------------------------------------
        $s .= <<<EEE
        
];
EEE;


        return $s;
    }


    protected function getTitleDecorationBlock(array $parentWords)
    {
        return "";
    }

    protected function getTheThingFromTableInfo(array $tableInfo)
    {
        return "the " . $tableInfo['label'];
    }

    protected function getRowActionUpdateForeignRecord(array $tableInfo)
    {
        return "Update " . $tableInfo['label'];
    }

    private function renderConfigListProperty($propertyName, array $arrOfLines)
    {
        $s = '';
        if ($arrOfLines) {
            $s .= PHP_EOL;
            $s .= <<<EEE
    '$propertyName' => [
EEE;
            $s .= PHP_EOL;
            foreach ($arrOfLines as $line) {
                $s .= $line . PHP_EOL;
            }
            $s .= <<<EEE
    ],
EEE;
        }
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


    protected function identifierToLabel($identifier, $table, array $tableInfo)
    {
        return ucfirst(str_replace('_', ' ', $identifier));
    }

    protected function decorateTableInfo(array &$tableInfo)
    {

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
        $a["prefix"] = $this->_getTablePrefix($a["table"]);
        $a["relatedTables"] = $this->_getRelatedTables($a["prefix"], $a['db']);

        $this->decorateTableInfo($a);
        return $a;
    }


    private function _getRelatedTables($prefix, $db)
    {

        $key = $db . "-" . $prefix;
        if (array_key_exists($key, $this->_relatedTables)) {
            return $this->_relatedTables[$key];
        }
        $relatedTables = QuickPdoInfoTool::getTables($db, $prefix);
        $this->_relatedTables[$key] = $relatedTables;
        return $relatedTables;
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


    private function getAllTablesBasicInfo($db)
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

    protected function getRenderWithParentCodeBlockLangInfo($tableInfo)
    {
        $label = $tableInfo['label'];
        $labelPlural = $tableInfo['labelPlural'];
        return [
            'label' => $label,
            'labelPlural' => $labelPlural,
        ];
    }

    private function getRenderWithParentCodeBlock($fullTable, array $cols)
    {

        $p = explode(".", $fullTable);
        list($db, $table) = $p;
        $tableInfo = $this->db2TableInfo[$db][$table];


        $langInfo = $this->getRenderWithParentCodeBlockLangInfo($tableInfo);
        $sLangInfo = ArrayToStringTool::toPhpArray($langInfo, null, 16);

        $route = $this->getTableRouteByTable($table);


        $aArrLinesGet = [];
        $aArrLines = [];
        foreach ($cols as $col => $parentCol) {
            $aArrLinesGet[] = '"' . $col . '" => $_GET["' . $col . '"],';
            $aArrLines[] = '"' . $col . '" => "' . $parentCol . '",';
        }
        $sArrLinesGet = implode(PHP_EOL . "\t\t\t\t\t", $aArrLinesGet);
        $sArrLines = implode(PHP_EOL . "\t\t\t\t\t", $aArrLines);

        return <<<EEE
        
                return \$this->renderWithParent("$table", [
                    $sArrLinesGet
                ], [
                    $sArrLines
                ], $sLangInfo, \$this->configValues['parent2Route']["$table"]);
EEE;
    }


    protected function _getControllerClassHeader(array $tableInfo)
    {


        $s = <<<EEE
<?php

namespace Controller\Morphic\Generated\\$tableInfo[camel];
use Controller\Morphic\Pattern\MorphicListController;
use Kamille\Utils\Morphic\Exception\MorphicException;
use Core\Services\A;
use Bat\UriTool;
use Models\DropDown\SimpleDropDownModel;


class $tableInfo[camel]ListController extends MorphicListController
{
EEE;

        return $s;

    }


    protected function getChoiceListFirstValueLabel()
    {
        return "No value";
    }

    protected function getControllerConstructorExtraStatements()
    {
        return '';
    }

    protected function _getControllerTopMethods(array $tableInfo)
    {

        $originalTableInfo = $tableInfo;
        $originalTableRoute = $tableInfo['route'];
        $originalTable = $originalTableInfo['table'];
        $db = $tableInfo['db'];
        $parent2Route = [];
        $reversedFks = $tableInfo['reversedFks'];
        $resolvedFks = $tableInfo['resolvedFks'];
        if ($reversedFks) {
            foreach ($reversedFks as $fkFullTable => $colsInfo) {
                $p = explode(".", $fkFullTable);
                list($db, $table) = $p;
                $tableInfo = $this->db2TableInfo[$db][$table];
                $route = $this->getTableRouteByTable($table);
                $parent2Route[$table] = $route;
            }
        }
        $sParent2Route = ArrayToStringTool::toPhpArray($parent2Route, null, 12);
        $constructorExtraStatements = $this->getControllerConstructorExtraStatements();
        $title = str_replace('"', '\"', ucfirst($originalTableInfo["labelPlural"]));


        // related tables?
        $relatedTables = $originalTableInfo['relatedTables'];
        if ($relatedTables) {

            $relatedTablesLabel = str_replace('"', '\"', $this->getRelatedTablesLabel());
            $sItems = '';
            $sortedRelatedItems = [];
            foreach ($relatedTables as $table) {
                $tableLabel = str_replace('"', '\"', ucfirst($this->db2TableInfo[$db][$table]['label']));
                $sortedRelatedItems[$tableLabel] = $table;
            }
            ksort($sortedRelatedItems);

            foreach ($sortedRelatedItems as $tableLabel => $table) {
                $tableRoute = $this->db2TableInfo[$db][$table]['route'];
                $sItems .= PHP_EOL;
                $sItems .= <<<EEE
                "$table" => [
                    'label' => "$tableLabel ($table)",
                    'link' => A::link("$tableRoute"),
                ],
EEE;

            }

            $sRelated = PHP_EOL;
            $sRelated .= <<<EEE
        \$pageTop->rightBar()->addDropDown(SimpleDropDownModel::create()
            ->setLabel("$relatedTablesLabel")
            ->setItems([
$sItems
            ])->getArray()
        );
EEE;

        }


        //--------------------------------------------
        // FIND STRONG SIDE IF ANY
        //--------------------------------------------
        $strongSideKey = "null";
        if (false !== strpos($originalTable, '_has_')) {
            $p = explode('_has_', $originalTable, 2);
            $strongTable = $p[0];
            foreach ($resolvedFks as $key => $info) {
                if ($strongTable === $info[1]) {
                    $strongSideKey = '"' . $key . '"';
                    break;
                }
            }

        }


        $s = <<<EEE
        
    protected \$configValues;

    public function __construct()
    {
        parent::__construct();
        \$this->configValues = [
            'route' => "$originalTableInfo[route]",
            'form' => "$originalTable",
            'list' => "$originalTable",
            'strongSideKey' => $strongSideKey,
            'showNewItemBtn' => true,            
            'parent2Route' => $sParent2Route,
        ];
        
        \$pageTop = \$this->pageTop();
        \$pageTop->setTitle("$title");    
        \$pageTop->breadcrumbs()->addLink("$originalTable", UriTool::uri(null, [], false));   
        
        $sRelated        
        $constructorExtraStatements                        
    }

    protected function addConfigValues(array \$configValues)
    {
        \$this->configValues = array_merge(\$this->configValues, \$configValues);
        return \$this;
    }
        
EEE;

        return $s;

    }


    protected function getControllerBackToListText(array $tableInfo)
    {
        return "Back to the list";
    }

    protected function getControllerNewListItemText(array $tableInfo)
    {
        return "Add new item";
    }

    protected function _getControllerRenderMethod(array $tableInfo)
    {
        $table = $tableInfo['table'];
        $reversedFks = $tableInfo['reversedFks'];


        $backToListText = str_replace('"', '\"', $this->getControllerBackToListText($tableInfo));
        $newItemText = str_replace('"', '\"', $this->getControllerNewListItemText($tableInfo));


        //--------------------------------------------
        // RENDER
        //--------------------------------------------
        $s = <<<EEE
        
    public function render()
    {        
    
        if (array_key_exists("form", \$_GET)) {
            if (null === \$this->configValues['strongSideKey']) {
                \$this->pageTop()->rightBar()->prependButton("$backToListText", A::link(\$this->configValues['route']), "fa fa-list");
                
                if (true === \$this->configValues['showNewItemBtn']) {
                    \$this->pageTop()->rightBar()->prependButton("$newItemText", A::link(\$this->configValues['route']) . "?form", "fa fa-plus");
                }
            }    
        }    
    
        \$ric = \$this->getRic();
        
        \$strongSideKey = \$this->configValues['strongSideKey'] ?? null;
        \$forceParent = (null !== \$strongSideKey && array_key_exists(\$strongSideKey, \$_GET));
        \$ricInGet = \$this->ricInGet(\$ric, \$_GET);        
        
        if (true === \$forceParent || false === \$ricInGet) {
            //--------------------------------------------
            // USING PARENTS
            //--------------------------------------------
EEE;

        $mul = PHP_EOL . "\t\t\t\t\t";


        //--------------------------------------------
        // PARENTS FROM URI?
        //--------------------------------------------
        $c = 0;

        if ($reversedFks) {


            foreach ($reversedFks as $fkFullTable => $colsInfo) {
                $conds = [];
                $s .= PHP_EOL . "\t\t\t";

                if (0 === $c++) {
                    $s .= 'if (';
                } else {
                    $s .= '} elseif (';
                }

                foreach ($colsInfo as $info) {
//                    $conds[] = 'array_key_exists("' . $info[0] . '", $_GET)';
//                    $conds[] = '"' . $info[0] . '" === $strongSideKey || (null === $strongSideKey && array_key_exists("' . $info[0] . '", $_GET))';
                    $conds[] = '(true === $forceParent && "' . $info[0] . '" === $strongSideKey) || (null === $strongSideKey && array_key_exists("' . $info[0] . '", $_GET))';
                    $conds[] = '
                (true === $forceParent && "' . $info[0] . '" === $strongSideKey) ||
                (null === $strongSideKey && array_key_exists("' . $info[0] . '", $_GET)) ||
                (false === $ricInGet && array_key_exists("' . $info[0] . '", $_GET))
                    ';
                }

                if (count($conds) > 1) {
                    $s .= $mul;
                }

                $s .= implode(' &&' . $mul, $conds);

                if (count($conds) > 1) {
                    $s .= PHP_EOL . "\t\t\t";
                }
                $s .= ') {';

                $cols = [];
                foreach ($colsInfo as $info) {
                    $cols[$info[0]] = $info[3];
                }
                $s .= $this->getRenderWithParentCodeBlock($fkFullTable, $cols);
            }

            $s .= PHP_EOL . "\t\t\t" . '}';
        }

        $s .= PHP_EOL . "\t\t}";
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


        $labelPlural = ucfirst($tableInfo['labelPlural']);
        $label = ucfirst($tableInfo['label']);

        $s = <<<EEE

    protected function renderWithParent(\$parentTable, array \$parentKey2Values, array \$parentKeys2ReferenceKeys, array \$labels, \$route)
    {
        \$elementInfo = [
            'table' => "$tableInfo[table]",
            'ric' => \$this->getRic(),
            'label' => "$label",
            'labelPlural' => "$labelPlural",
            'form' => \$this->configValues['form'],
            'list' => \$this->configValues['list'],
            'route' => \$this->configValues['route'],
        ];
        return \$this->doRenderWithParent(\$elementInfo, \$parentTable, \$parentKey2Values, \$parentKeys2ReferenceKeys, \$labels, \$route);
    }
    
EEE;
        return $s;
    }


    protected function getControllerNewItemBtnText(array $tableInfo)
    {
        return "Add a new $tableInfo[label]";
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
        $newItemBtnText = str_replace('"', '\"', $this->getControllerNewItemBtnText($tableInfo));


        $s = <<<EEE
        
    protected function renderWithNoParent()
    {
        if ('hasAdminPower') {

            if (false === array_key_exists("form", \$_GET) && true === \$this->configValues['showNewItemBtn']) {
                \$this->pageTop()->rightBar()
                    ->prependButton("$newItemBtnText",
                        A::link(\$this->configValues['route']) . "?form&s",
                        "fa fa-plus-circle"
                    );      
            }                      

            return \$this->doRenderFormList([
                'form' => \$this->configValues['form'],
                'list' => \$this->configValues['list'],
                'ric' => [
                    $sRic
                ],
                "route" => \$this->configValues['route'],
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


    protected function _getControllerGetRicMethod(array $tableInfo)
    {

        $sRic = ArrayToStringTool::toPhpArray($tableInfo['ric'], null, 8);

        $s = <<<EEE
        
    protected function getRic()
    {
        return $sRic;
    }
    
EEE;
        return $s;
    }


    protected function _getControllerGetAddBtnTextByAvatarMethod(array $tableInfo)
    {
        $s = <<<EEE
        
    protected function getAddBtnTextByAvatar(\$parentAvatar, \$elementLabel, \$parentLabel)
    {
        \$elementLabel = lcfirst(\$elementLabel);
        return "Add a \$elementLabel for \$parentLabel \"\$parentAvatar\"";
    }        
    
EEE;
        return $s;
    }

    protected function _getControllerGetRenderWithParentTitle(array $tableInfo)
    {
        $s = <<<EEE
        
    protected function getRenderWithParentTitle(\$parentAvatar, \$elementLabelPlural, \$parentLabel)
    {
        return "\$elementLabelPlural for \$parentLabel \"\$parentAvatar\"";
    }
    
EEE;
        return $s;
    }

    protected function _getControllerRenderWithNoParentMethodExtraVar(array $tableInfo)
    {
        return '';
    }

    /**
     * @param $fkType : one of
     *      - ai
     *      - autocomplete
     *      - fk
     * @param $col
     * @param $label
     * @return string
     */

    protected function getForeignKeyExtraLink($fkType, $col, $label, $route, array $tableInfo, array $fkTableInfo)
    {
        if ('ai' !== $fkType) {

            $rks = $tableInfo['rks'];


            $reversedFields = [];
            foreach ($rks as $info) {
                if ($info[1] === $fkTableInfo['table']) {
                    $reversedFields = $info[2];
                    break;
                }
            }


            $linkArgs = '';
            if ($reversedFields) {
                foreach ($reversedFields as $k => $v) {
                    $linkArgs .= "&$v=' . \$$k . '";
                }
            }

            $text = $this->getForeignKeyExtraLinkText($label, $tableInfo, $fkTableInfo);
            $text = str_replace("'", "\'", $text);

            return "
                'extraLink' => [
                    'text' => '$text',
                    'icon' => 'fa fa-plus',
                    'link' => A::link('$route') . '?form$linkArgs',
                ],";
        }
        return "";
    }


    protected function getForeignKeyExtraLinkText($label, array $tableInfo, array $fkTableInfo)
    {
        return "Create a new element \"$label\"";
//        return "Créer un nouvel élément \"$label\"";
    }

    protected function getRelatedTablesLabel()
    {
        return ucfirst("Related tables");
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




