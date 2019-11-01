<?php


namespace Ling\Light_RealGenerator\Generator;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\FileSystemTool;
use Ling\Light_DatabaseInfo\Service\LightDatabaseInfoService;
use Ling\Light_RealGenerator\Exception\LightRealGeneratorException;

/**
 * The ListConfigGenerator class.
 */
class ListConfigGenerator extends BaseConfigGenerator
{


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
        $targetDir = $this->getKeyValue("list.target_dir");
        $targetDir = str_replace('{app_dir}', $appDir, $targetDir);

        foreach ($tables as $table) {
            $content = $this->getFileContent($table);
            $fileName = $table . ".byml";
            $path = $targetDir . '/' . $fileName;
            FileSystemTool::mkfile($path, $content);
        }
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
        $identifier = "default";
        $main = [];
        $main['table'] = $table;
        $database = $this->getKeyValue('database_name', false, null);
        $pluginName = $this->getKeyValue('plugin_name');
        $useMicroPermission = $this->getKeyValue('list.use_micro_permission', false, true);
        $ignoreColumns = $this->getKeyValue("list.ignore_columns.$table", false, []);
        $globalIgnoreColumns = $this->getKeyValue("ignore_columns.$table", false, []);
        $useActionColumn = $this->getKeyValue("list.use_action_column", false, true);
        $useCheckboxColumn = $this->getKeyValue("list.use_checkbox_column", false, true);
        $columnActionName = $this->getKeyValue("list.column_action_name", false, 'actions');
        $columnCheckboxName = $this->getKeyValue("list.column_checkbox_name", false, 'checkbox');
        $rowsRendererIdentifier = $this->getKeyValue("list.rows_renderer_identifier", false);
        $rowsRendererClass = $this->getKeyValue("list.rows_renderer_class", false);
        $rowsRendererTypeAliases = $this->getKeyValue("list.rows_renderer_type_aliases", false, []);
        $rowsRendererTypesGeneral = $this->getKeyValue("list.rows_renderer_types_general", false, []);
        $rowsRendererTypesSpecific = $this->getKeyValue("list.rows_renderer_types_specific.$table", false, []);


        $ignoreColumns = array_unique(array_merge($globalIgnoreColumns, $ignoreColumns));
        /**
         * @var $dbInfo LightDatabaseInfoService
         */
        $dbInfo = $this->container->get('database_info');
        $tableInfo = $dbInfo->getTableInfo($table, $database);
        $autoIncrementedKey = $tableInfo['autoIncrementedKey'];

        $main['ric'] = $tableInfo['ric'];
        $columns = array_merge(array_diff($tableInfo['columns'], $ignoreColumns));
        $main['fields'] = $columns;


        if ('openAdminOne') {
            //--------------------------------------------
            // ORDER
            //--------------------------------------------
            $main['order'] = [
                "col_order" => '$column $direction',
            ];


            //--------------------------------------------
            // WHERE
            //--------------------------------------------
            $sGeneralSearch = '';
            foreach ($columns as $col) {
                if ('' !== $sGeneralSearch) {
                    $sGeneralSearch .= ' or' . PHP_EOL;
                }
                $sGeneralSearch .= "$col like :%expression%";
            }

            $main['where'] = [
                "general_search" => $sGeneralSearch,
                "generic_filter" => '$column $operator :operator_value',
                "generic_sub_filter" => '$column like :%operator_value%',
            ];

            if ('id' === $autoIncrementedKey) {
                $main['where']['in_ids'] = 'id in ($ids)';
            }
            $main['where']['open_parenthesis'] = '(';
            $main['where']['close_parenthesis'] = ')';
            $main['where']['and'] = 'and';
            $main['where']['or'] = 'or';


            //--------------------------------------------
            // LIMIT
            //--------------------------------------------
            $main['limit'] = [
                "page" => '$page',
                "page_length" => '$page_length',
            ];


            //--------------------------------------------
            // OPTIONS
            //--------------------------------------------
            $main['options'] = [
                "wiring" => [],
                "default_limit_page" => 1,
                "default_limit_page_length" => 20,
                "tag_options" => [
                    "generic_filter" => [
                        "operator_and_value" => [
                            "source" => "operator",
                            "value" => "operator_value",
                        ],
                    ],
                ],
            ];


            //--------------------------------------------
            // MISCELLANEOUS
            //--------------------------------------------
            $main['plugin'] = $pluginName;
            $main['csrf_token'] = [
                "name" => 'realist-request',
                "value" => 'REALIST(Light_Realist, csrf_token, realist-request)',
            ];
            $main['use_micro_permission'] = $useMicroPermission;


            //--------------------------------------------
            // RENDERING
            //--------------------------------------------
            $listGeneralActions = [
                [
                    'action_id' => "$pluginName.realist-generate_random_rows",
                    'text' => "Generate",
                    'icon' => "fas fa-spray-can",
                    'csrf_token' => true,
                ],
                [
                    'action_id' => "$pluginName.realist-save_table",
                    'text' => "Save table content",
                    'icon' => "fas fa-download",
                    'csrf_token' => true,
                ],
                [
                    'action_id' => "$pluginName.realist-load_table",
                    'text' => "Load table content",
                    'icon' => "fas fa-upload",
                    'csrf_token' => true,
                ],
            ];
            $listActionGroups = [
                [
                    'action_id' => "$pluginName.realist-print",
                    'text' => "Print",
                    'icon' => "fas fa-print",
                    'csrf_token' => true,
                ],
                [
                    'action_id' => "$pluginName.realist-delete_rows",
                    'text' => "Delete",
                    'icon' => "far fa-trash-alt",
                    'csrf_token' => true,
                ],
                [
                    'text' => "Share",
                    'icon' => "fas fa-share-square",
                    'items' => [
                        [
                            'action_id' => "$pluginName.realist-rows_to_ods",
                            'text' => "OpenOffice ods",
                            'icon' => "far fa-file-alt",
                            'csrf_token' => true,
                        ],
                        [
                            'action_id' => "$pluginName.realist-rows_to_xlsx",
                            'text' => "Excel xlsx",
                            'icon' => "far fa-file-excel",
                            'csrf_token' => true,
                        ],
                        [
                            'action_id' => "$pluginName.realist-rows_to_xls",
                            'text' => "Excel xls",
                            'icon' => "far fa-file-excel",
                            'csrf_token' => true,
                        ],
                        [
                            'action_id' => "$pluginName.realist-rows_to_html",
                            'text' => "Html",
                            'icon' => "far fa-file-code",
                            'csrf_token' => true,
                        ],
                        [
                            'action_id' => "$pluginName.realist-rows_to_csv",
                            'text' => "Csv",
                            'icon' => "fas fa-file-csv",
                            'csrf_token' => true,
                        ],
                        [
                            'action_id' => "$pluginName.realist-rows_to_pdf",
                            'text' => "Pdf",
                            'icon' => "far fa-file-pdf",
                            'csrf_token' => true,
                        ],
                    ],
                ],
            ];


            $dataTypes = $this->toOpenAdminDataTypes($tableInfo['types'], $table);
            if (true === $useActionColumn) {
                $dataTypes[$columnActionName] = 'action';
            }


            $columnLabelsBase = $columns;
            if (true === $useActionColumn) {
                $columnLabelsBase[] = $columnActionName;
            }
            $columnLabels = $this->createColumnLabels($columnLabelsBase, $table);


            $rowsRenderer = [];
            if (null !== $rowsRendererClass) {
                $rowsRenderer['identifier'] = $rowsRendererClass;
            } else {
                if (null === $rowsRendererIdentifier) {
                    $rowsRendererIdentifier = $pluginName;
                }
                $rowsRenderer['identifier'] = $rowsRendererIdentifier;
            }


            $rowsRendererTypes = array_replace($rowsRendererTypesGeneral, $rowsRendererTypesSpecific);
            $this->convertTypeAliases($rowsRendererTypes, $rowsRendererTypeAliases, $table);
            if ($rowsRendererTypes) {
                $rowsRenderer['types'] = $rowsRendererTypes;
            }


            if (true === $useCheckboxColumn) {
                $columnCheckboxLabel = $columnLabels[$columnCheckboxName] ?? '#';
                $rowsRenderer['checkbox_column'] = [
                    'name' => $columnCheckboxName,
                    'label' => $columnCheckboxLabel,
                ];
            }

            if (true === $useActionColumn) {
                $columnActionLabel = $columnLabels[$columnActionName] ?? 'Actions';
                $rowsRenderer['action_column'] = [
                    'name' => $columnActionName,
                    'label' => $columnActionLabel,
                ];
            }


            $main['rendering'] = [
                "list_general_actions" => $listGeneralActions,
                "list_action_groups" => $listActionGroups,
                "list_renderer" => [
                    'identifier' => $pluginName,
                ],
                "responsive_table_helper" => [
                    'collapsible_column_indexes' => 'admin',
                ],
                "open_admin_table" => [
                    'widget_statuses' => [
                        'debug_window' => true,
                        'global_search' => true,
                        'advanced_search' => true,
                        'toolbar' => true,
                        'table' => true,
                        'head' => true,
                        'head_sort' => true,
                        'checkbox' => true,
                        'neck_filters' => true,
                        'pagination' => true,
                        'number_of_items_per_page' => true,
                        'number_of_rows_info' => true,
                    ],
                    'data_types' => $dataTypes,
                ],
                "column_labels" => $columnLabels,
                "rows_renderer" => $rowsRenderer,
            ];


        } else {
            throw new LightRealGeneratorException("Don't know how to generate this style yet.");
        }


        $arr[$identifier] = $main;
        return BabyYamlUtil::getBabyYamlString($arr);
    }


    /**
     * Returns an array of columnName => openAdminDataType,
     * with openAdminDataType being an @page(open admin data type).
     *
     *
     *
     * @param array $types
     * @param string $table
     * @return array
     * @throws \Exception
     */
    protected function toOpenAdminDataTypes(array $types, string $table): array
    {
        $customTypes = $this->getKeyValue("list.open_admin_table_column_types.$table", false, []);
        array_walk($types, function (&$v, $k) use ($customTypes) {

            if (array_key_exists($k, $customTypes)) {
                $v = $customTypes[$k];
            } else {
                $p = explode('(', $v, 2);
                $simpleType = trim(array_shift($p));
                switch ($simpleType) {
                    case "tinyint":
                    case "smallint":
                    case "mediumint":
                    case "int":
                    case "integer":
                    case "bigint":
                    case "decimal":
                    case "float":
                    case "double":
                        $v = 'number';
                        break;
                    case "date":
                        $v = 'date';
                        break;
                    case "datetime":
                    case "timestamp":
                        $v = 'datetime';
                        break;
                    case "bit":
                    case "bool":
                    case "boolean":
                        $v = 'enum';
                        break;
                    default:
                        $v = 'string';
                        break;
                }
            }
        });
        return $types;
    }


    /**
     * Returns an array of columnName => label.
     *
     * @param array $columns
     * @param string $table
     * @return array
     * @throws \Exception
     */
    protected function createColumnLabels(array $columns, string $table): array
    {

        $ret = [];
        $customLabels = $this->getKeyValue("list.column_labels.$table", false, []);
        foreach ($columns as $col) {
            if (array_key_exists($col, $customLabels)) {
                $label = $customLabels[$col];
            } else {
                if ('id' === $col) {
                    $label = '#';
                } else {
                    $label = str_replace('_', ' ', ucfirst(strtolower($col)));
                }
            }
            $ret[$col] = $label;
        }
        return $ret;
    }


    /**
     * Transform the given types array in place, by replacing the alias notation ($alias) with the referenced values.
     *
     * @param array $types
     * @param array $rowsRendererTypeAliases
     * @param string $table
     */
    protected function convertTypeAliases(array &$types, array $rowsRendererTypeAliases, string $table)
    {
        array_walk($types, function (&$v, $k) use ($rowsRendererTypeAliases, $table) {
            if (is_string($v) && '$' === substr($v, 0, 1)) {
                $alias = substr($v, 1);
                if (array_key_exists($alias, $rowsRendererTypeAliases)) {
                    $v = $rowsRendererTypeAliases[$alias];
                } else {
                    throw new LightRealGeneratorException("Type alias not defined: $alias with table $table.");
                }
            }
        });
    }
}