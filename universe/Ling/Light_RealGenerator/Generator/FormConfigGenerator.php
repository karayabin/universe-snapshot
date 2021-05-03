<?php


namespace Ling\Light_RealGenerator\Generator;


use Ling\ArrayVariableResolver\ArrayVariableResolverUtil;
use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\ArrayTool;
use Ling\Bat\FileSystemTool;
use Ling\Light_RealGenerator\Exception\LightRealGeneratorException;
use Ling\Light_RealGenerator\Util\RepresentativeColumnFinderUtil;

/**
 * The FormConfigGenerator class.
 */
class FormConfigGenerator extends BaseConfigGenerator
{

    /**
     * Array of table => item, with item an array containing:
     * - tableListIdentifier: string, the table identifier
     * - fkInfo: array containing reversed fk info (see code for more details):
     *      - 0: rfDb
     *      - 1: rfTable
     *      - 2: rfCol
     *
     * @var array
     */
    private $tableListIdentifiers;


    /**
     * This property holds the tableListMode for this instance.
     * Defines how we'll generate the tableList type.
     *
     *
     * Possible values are:
     * - tableListIdentifier
     * - tableListDirectiveId
     *
     * (more info in tableList conception notes)
     *
     *
     * Default and recommended value is tableListDirectiveId, since all the configuration is gathered
     * in the same place, whereas with tableListIdentifier, you've got configuration split
     * into different files (not practical from the user's perspective).
     *
     * "tableListIdentifier" was the old mode.
     *
     *
     *
     *
     *
     * @var string
     */
    private $tableListMode;


    /**
     * This property holds the representativeColumnFinder for this instance.
     * Just a cache.
     *
     * @var RepresentativeColumnFinderUtil
     */
    private $representativeColumnFinder;


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->tableListIdentifiers = [];
        $this->tableListMode = "tableListDirectiveId";
        $this->representativeColumnFinder = null;
    }


    /**
     * Generates the list configuration files according to the given @page(configuration block).
     * @param array $config
     * @throws \Exception
     */
    public function generate(array $config)
    {
        $this->setConfig($config);
        $tables = $this->getTables();

        $appDir = $this->container->getApplicationDir();
        $targetDir = $this->getKeyValue("form.target_dir");
        $targetDir = str_replace('{app_dir}', $appDir, $targetDir);


        $this->debugLog("Generating " . count($tables) . " form config(s) in the following directory: " . $this->getSymbolicPath($targetDir) . ".");


        foreach ($tables as $table) {
            $content = $this->getFileContent($table);
            $fileName = $table . ".byml";
            $path = $targetDir . '/' . $fileName;
            FileSystemTool::mkfile($path, $content);
        }


        $this->generateContentByTables($tables);
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the content of the config file for the given table.
     *
     * @param string $table
     * @return string
     * @throws \Exception
     */
    protected function getFileContent(string $table): string
    {
        $arr = [];


        $galaxyName = $this->getKeyValue('variables.galaxyName', true);
        $pluginName = $this->getKeyValue('plugin_name');
        $globalIgnoreColumns = $this->getKeyValue("ignore_columns.$table", false, []);
        $ignoreColumns = $this->getKeyValue("form.ignore_columns.$table", false, []);
        $customFields = $this->getKeyValue("form.fields.$table", false, []);
        $notRequiredCols = $this->getKeyValue("form.not_required.$table", false, []);
        $customVariables = $this->getKeyValue("form.variables", false, []);
        $fieldsMergeSpecific = $this->getKeyValue("form.fields_merge_specific.$table", false, []);
        $onSuccessHandler = $this->getKeyValue("form.on_success_handler", false, []);
        $formTitle = $this->getKeyValue("form.title", false, "{Label} form");
        $specialFields = $this->getKeyValue("form.special_fields", false, []);
        $onSuccessHandlerType = $onSuccessHandler['type'] ?? "database";
        $useMultiplierOnHas = $this->getKeyValue("form.use_multiplier_on_has", false, true);
        $security = $this->getKeyValue("form.security", false, []);
        $relatedLinks = $this->getKeyValue("form.related_links", false, []);

        // special types
        $chloroformExtensions = $specialFields['chloroform_extensions'] ?? [];
        $useTableList = $chloroformExtensions['use_table_list'] ?? true;

        $isHasTable = $this->isHasTable($table);
        $genericTags = $this->getGenericTagsByTable($table);
        $formTitle = str_replace(array_keys($genericTags), array_values($genericTags), $formTitle);
        ArrayTool::replaceRecursive($genericTags, $relatedLinks);
        $rendering = [
            "title" => $formTitle,
            "related_links" => $relatedLinks,
        ];
        $arr['_vars'] = [
            'nuggetId' => $galaxyName . "." . $pluginName . ':generated/' . $table,
        ];
        $arr['rendering'] = $rendering;

        $theVariables = $customVariables;
        $theVariables['table'] = $table;
        $theVariables['field'] = "";

        $variableResolver = new ArrayVariableResolverUtil();
        $variableResolver->setFirstSymbol('');


        $ignoreColumns = array_unique(array_merge($globalIgnoreColumns, $ignoreColumns));
        $tableInfo = $this->getTableInfo($table);
        $nullables = $tableInfo['nullables'];


        $foreignKeysInfo = $tableInfo['foreignKeysInfo'];
        $autoIncrementedKey = $tableInfo['autoIncrementedKey'];
        if (false !== $autoIncrementedKey) {
            $ignoreColumns[] = $autoIncrementedKey;
        }


//        $humanTable = $this->getHumanTableName($table);
        $humanTable = "item";


        $arr['ric'] = $tableInfo['ric'];
        $arr['feeder'] = null;
        $arr['storage_id'] = $table;
        $arr['success_messages'] = [
            'create' => 'The ' . $humanTable . ' has been successfully stored in the database',
            'update' => 'The ' . $humanTable . ' has been successfully updated in the database, with ric {sRic}',
        ];
        $arr['security'] = $security;


        $ricStrict = $tableInfo['ricStrict'];
        $types = $tableInfo['types'];
        $columns = array_merge(array_diff($tableInfo['columns'], $ignoreColumns));

        //--------------------------------------------
        // FORM HANDLER
        //--------------------------------------------
        $chloroform = [];

        $formId = "realgen-$table";
        $chloroform['id'] = $formId;

        $fields = [];
        foreach ($columns as $col) {

            if (array_key_exists($col, $types)) {


                $theVariables['field'] = $col;

                $customItem = $customFields[$col] ?? [];
                $merge = [];
                if (array_key_exists($col, $fieldsMergeSpecific)) {
                    $mergeArr = $fieldsMergeSpecific[$col];
                    if (is_string($mergeArr) && '$' === substr($mergeArr, 0, 1)) {
                        $alias = substr($mergeArr, 1);
                        $merge = $this->getKeyValue("form.fields_merge_aliases.$alias");
                    } else {
                        // assuming it's an array
                        $merge = $mergeArr;
                    }
                }


                // special item?
                $specialItem = [];
                if (true === $useTableList && array_key_exists($col, $foreignKeysInfo)) {

                    list($rfDb, $rfTable, $rfCol) = $foreignKeysInfo[$col];
                    $tableListIdentifier = $pluginName . ":generated/tablelist/$rfTable.$rfCol";

                    $this->tableListIdentifiers[$table] = [
                        'tableListIdentifier' => $tableListIdentifier,
                        'fkInfo' => [
                            $rfDb,
                            $rfTable,
                            $rfCol,
                        ],
                    ];


                    $specialItem = [
                        "type" => "table_list",
//                        "threshold" => 200,
                    ];

                    if ('tableListDirectiveId' === $this->tableListMode) {
                        $specialItem['tableListDirectiveId'] = '%{nuggetId}:chloroform.fields.' . $col . '.tableListConf';
                        $specialItem['tableListConf'] = $this->getTableListConf([
                            $rfDb,
                            $rfTable,
                            $rfCol,
                        ]);

                    } else {
                        $specialItem['tableListIdentifier'] = $tableListIdentifier;
                    }


                    if (true === $useMultiplierOnHas && $isHasTable) {

                        /**
                         * We consider that the first member of the ricStrict is a fk to the left table,
                         * and the second member (aka multiplier column) is the fk to the right table.
                         * Note: this is a rather simplistic approach that assumes that the primary key is
                         * composed of only two foreign keys.
                         *
                         * We might need to upgrade this technique later as the need for more complex db schemas occurs.
                         *
                         */
                        $isPivot = ($ricStrict[0] === $col);

                        if (false === $isPivot) {
                            $specialItem['mode'] = 'multiplier';
                            $specialItem['multiplier'] = [
                                "enabled" => true,
                                "pivot" => $ricStrict[0],
                            ];
                        }

                    }
                }


                $sqlType = $types[$col];
                $type = $this->getFieldType($sqlType);
                $label = str_replace('_', ' ', ucfirst(strtolower($col)));


                $validators = [];
                if (false === in_array($col, $notRequiredCols, true)) {
                    if ('datetime' === $type) {
                        $validators["requiredDatetime"] = [];
                    } elseif ('date' === $type) {
                        $validators["requiredDate"] = [];
                    } else {
                        $validators["required"] = [];
                    }
                }


                $fieldItem = [
                    'label' => $label,
                    'type' => $type,
                    'validators' => $validators,
                ];

                $fieldItem['nullable'] = in_array($col, $nullables, true);


                // note: merge is less specific than custom item
                $fieldItem = array_replace_recursive($fieldItem, $specialItem, $merge, $customItem);

                $variableResolver->resolve($fieldItem, $theVariables);


                $fields[$col] = $fieldItem;


            } else {
                throw new LightRealGeneratorException("Unknown column type for column $col, table $table.");
            }
        }
        $chloroform['fields'] = $fields;


        $arr['chloroform'] = $chloroform;


        //--------------------------------------------
        // ON SUCCESS HANDLER
        //--------------------------------------------
        $onSuccessHandlerArr = [];
        switch ($onSuccessHandlerType) {
            case "database":

                $onSuccessHandlerArr = [
                    "class" => "defaultDbHandler",
                ];
                break;
            default:
                throw new LightRealGeneratorException("Unknown success handler type: $onSuccessHandlerType.");
                break;
        }
        $arr['success_handler'] = $onSuccessHandlerArr;

        return BabyYamlUtil::getBabyYamlString($arr);
    }


    /**
     * Returns the field type for the given sql type.
     * For the returned field types, the chloroform list can be found here:
     * https://github.com/lingtalfi/Light_Realform/blob/master/doc/pages/realform-config-example.md
     *
     *
     * @param string $type
     * @return string
     * @throws \Exception
     */
    protected function getFieldType(string $type): string
    {


        $p = explode('(', $type, 2);
        $simpleType = trim(array_shift($p));
        switch ($simpleType) {
            case "tinyint":
            case "smallint":
            case "mediumint":
            case "int":
            case "integer":
            case "bigint":
                $type = 'number';
                break;
            case "date":
                $type = 'date';
                break;
            case "datetime":
            case "timestamp":
                $type = 'datetime';
                break;
            case "bit":
            case "bool":
            case "boolean":
                $type = 'select';
                break;
            case "time":
                $type = 'time';
                break;
            case "decimal":
            case "float":
            case "double":
            default:
                $type = 'string';
                break;
        }


        return $type;
    }


    /**
     * Generate some content that applies to the whole table selection rather than on each individual tables.
     *
     * @param array $tables
     * @throws \Exception
     */
    protected function generateContentByTables(array $tables)
    {


        if ('tableListIdentifier' === $this->tableListMode) {


            $specialFields = $this->getKeyValue("form.special_fields", false, []);
            $chloroformExtensions = $specialFields['chloroform_extensions'] ?? [];
            $useTableList = $chloroformExtensions['use_table_list'] ?? true;


            if (true === $useTableList) {
                $appDir = $this->container->getApplicationDir();

                $arr = [];
                foreach ($this->tableListIdentifiers as $table => $item) {


                    $tableListIdentifier = $item['tableListIdentifier'];
                    $fkInfo = $item['fkInfo'];


                    $arr = $this->getTableListConf($fkInfo);


                    list($plugin, $relPath) = explode(":", $tableListIdentifier, 2);

                    $f = $appDir . "/config/data/$plugin/Light_ChloroformExtension/tablelist/$relPath.byml";
                    FileSystemTool::mkfile($f, BabyYamlUtil::getBabyYamlString($arr));

                }
            }
        }
    }


    /**
     * Returns a configuration array based on the given fkInfo array.
     *
     * @param array $fkInfo
     * @return array
     * @throws LightRealGeneratorException
     */
    private function getTableListConf(array $fkInfo)
    {


        $tableListSecurity = $this->getKeyValue("form.special_fields.chloroform_extensions.table_list_security", false, []);

        list($rfDb, $rfTable, $rfCol) = $fkInfo;

        $commonRepresentativeMatches = $this->getKeyValue("list.common_representative_matches", false, [
            'name',
            'label',
            'identifier',
        ]);


        if (null === $this->representativeColumnFinder) {
            $reprFinder = new RepresentativeColumnFinderUtil();
            $reprFinder->setContainer($this->container);
            $reprFinder->setCommonMatches($commonRepresentativeMatches);
            $this->representativeColumnFinder = $reprFinder;
        }


        $commonRepresentative = $this->representativeColumnFinder->findRepresentativeColumn($rfTable);

        $sConcat = "concat($rfCol, '. ', $commonRepresentative)";


        $security = array_merge_recursive([
            "any" => [
                "micro_permission" => "store.$rfTable.read",
            ],
            "all" => [],
        ], $tableListSecurity);


        return [
            'sql' => "select $rfCol as value, $sConcat as label from $rfTable",
            'column' => $rfCol,
            'search_column' => $sConcat,
            'renderAs' => 'adapt',
            'threshold' => 200,
            'security' => $security,
        ];
    }
}