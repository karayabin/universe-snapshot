<?php


namespace Ling\Light_RealGenerator\Generator;


use Ling\ArrayVariableResolver\ArrayVariableResolverUtil;
use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\FileSystemTool;
use Ling\Light_DatabaseInfo\Service\LightDatabaseInfoService;
use Ling\Light_RealGenerator\Exception\LightRealGeneratorException;

/**
 * The FormConfigGenerator class.
 */
class FormConfigGenerator extends BaseConfigGenerator
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
        $targetDir = $this->getKeyValue("form.target_dir");
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


        $database = $this->getKeyValue('database_name', false, null);
        $formHandlerClassGeneral = $this->getKeyValue("form.form_handler_class_general", false, null);
        $formHandlerClassSpecific = $this->getKeyValue("form.form_handler_class_specific.$table", false, null);
        $globalIgnoreColumns = $this->getKeyValue("ignore_columns.$table", false, []);
        $ignoreColumns = $this->getKeyValue("form.ignore_columns.$table", false, []);
        $customFields = $this->getKeyValue("form.fields.$table", false, []);
        $notRequiredCols = $this->getKeyValue("form.not_required.$table", false, []);
        $customVariables = $this->getKeyValue("form.variables", false, []);
        $fieldsMergeAliases = $this->getKeyValue("form.fields_merge_aliases", false, []);
        $fieldsMergeSpecific = $this->getKeyValue("form.fields_merge_specific.$table", false, []);


        $theVariables = $customVariables;
        $theVariables['table'] = $table;
        $theVariables['field'] = "";

        $variableResolver = new ArrayVariableResolverUtil();
        $variableResolver->setFirstSymbol('');


        $ignoreColumns = array_unique(array_merge($globalIgnoreColumns, $ignoreColumns));
        /**
         * @var $dbInfo LightDatabaseInfoService
         */
        $dbInfo = $this->container->get('database_info');
        $tableInfo = $dbInfo->getTableInfo($table, $database);
        $autoIncrementedKey = $tableInfo['autoIncrementedKey'];
        if (false !== $autoIncrementedKey) {
            $ignoreColumns[] = $autoIncrementedKey;
        }

        $main['ric'] = $tableInfo['ric'];
        $types = $tableInfo['types'];
        $columns = array_merge(array_diff($tableInfo['columns'], $ignoreColumns));

        //--------------------------------------------
        // FORM HANDLER
        //--------------------------------------------
        $formHandler = [];
        if (null !== $formHandlerClassSpecific) {
            $formHandler['class'] = $formHandlerClassSpecific;
        } elseif (null !== $formHandlerClassGeneral) {
            $formHandler['class'] = $formHandlerClassGeneral;
        }

        $formId = "realgen-$table";
        $formHandler['id'] = $formId;

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


                $sqlType = $types[$col];
                $type = $this->getFieldType($sqlType);
                $label = str_replace('_', ' ', ucfirst(strtolower($col)));


                $validators = [];
                if (false === in_array($col, $notRequiredCols, true)) {
                    $validators["required"] = [];
                }

                $fieldItem = [
                    'label' => $label,
                    'type' => $type,
                    'validators' => $validators,
                ];

                // note: merge is less specific than custom item
                $fieldItem = array_replace_recursive($fieldItem, $merge, $customItem);

                $variableResolver->resolve($fieldItem, $theVariables);


                $fields[$col] = $fieldItem;


            } else {
                throw new LightRealGeneratorException("Unknoqn column type for column $col, table $table.");
            }
        }
        $formHandler['fields'] = $fields;


        $arr['form_handler'] = $formHandler;


        //--------------------------------------------
        // ON SUCCESS HANDLER
        //--------------------------------------------
        // not used yet...
//        $arr['on_success_handler'] = '';

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
}