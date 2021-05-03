<?php


namespace Ling\Light_Kit_Editor\Light_Realist\DuelistEngine;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\FileSystemTool;
use Ling\DirScanner\YorgDirScannerTool;
use Ling\Light_Kit_Editor\Exception\LightKitEditorException;
use Ling\Light_Realist\DuelistEngine\DuelistEngineInterface;
use Ling\LogicalOperator\Tool\LogicalOperatorExpressionEvaluatorTool;
use Ling\PaginationHelper\PaginationHelperTool;
use Ling\RowsSortHelper\RowsSortHelperTool;

/**
 * The LightKitEditorBabyYamlDuelistEngine class.
 */
class LightKitEditorBabyYamlDuelistEngine implements DuelistEngineInterface
{


    /**
     * This property holds the rootDir for this instance.
     * @var ?string
     */
    private ?string $rootDir;


    /**
     * This property holds the options for this instance.
     *
     * Available options are:
     *
     * - caseSensitive: bool=false, whether the engine should be case sensitive
     *
     *
     * @var array
     */
    private array $options;


    /**
     * Builds the LightKitEditorBabyYamlDuelistEngine instance.
     */
    public function __construct()
    {
        $this->rootDir = null;
        $this->options = [];
    }

    /**
     * Sets the rootDir.
     *
     * @param string $rootDir
     */
    public function setRootDir(string $rootDir)
    {
        $this->rootDir = $rootDir;
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







    //--------------------------------------------
    // DuelistEngineInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function getRowsInfo(string $requestId, array $duelistDeclaration, array $tags): array|false
    {

//        CheapLogger::logg($tags);


        $callables = [];
        $expression = '';
        $table = $this->getSimplifiedTable($duelistDeclaration['table']);
        $allowedFields = $this->getAllowedFieldsByTable($table);
        $allowedOperators = [
            '=',
            '>',
            '>=',
            '<',
            '<=',
            '!=',
            'like',
            '%like%',
            '%like',
            'like%',
            'not_like',
            '%not_like%',
            '%not_like',
            'not_like%',
            'in',
            'not_in',
            'between',
            'not_between',
            'null',
            'is_not_null',
        ];


        $rows = $this->getRowsByTable($table);


        //--------------------------------------------
        // SEARCH FILTERING PREPARATION
        //--------------------------------------------
        /**
         * Assuming we are using oat1,
         * https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/open-admin-table-one.md
         *
         * then the logical tags are already in order, se we can simply run them through a foreach loop.
         *
         */

        $pageLength = 20;
        $pageNumber = 1;
        $sorts = [];
        $tCount = 0;


        if (array_key_exists("developer_variables", $duelistDeclaration)) {
            $this->error("not implemented yet: developer_variables.");
        }

        foreach ($tags as $tag) {
            $tCount++;
            $tagId = $tag['tag_id'];
            $variables = $tag['variables'];


            switch ($tagId) {
                case "general_search":
                    if (true === array_key_exists("expression", $variables)) {

                        $expr = $variables['expression'];
                        $id = "general_search" . $this->getIdentifierSuffix($tCount);
                        $expression .= $id;
                        $callables[$id] = function ($row) use ($allowedFields, $expr) {
                            $match = false;
                            foreach ($allowedFields as $field) {
                                if (true === array_key_exists($field, $row)) {
                                    $value = $row[$field];


                                    if (true === str_contains($this->format($value), $this->format($expr))) {
                                        $match = true;
                                        break;
                                    }
                                }
                            }
                            return $match;
                        };

                    } else {
                        $this->error("Unexpected case: the \"variables\" property was not provided with the \"general_search\" tag.");
                    }
                    break;
                case "generic_sub_filter":

                    if (
                        true === array_key_exists("column", $variables) &&
                        true === array_key_exists("operator", $variables) &&
                        true === array_key_exists("operator_value", $variables)
                    ) {
                        if (
                            true === in_array($variables['column'], $allowedFields)
                        ) {

                            $column = $variables['column'];
                            $operatorValue = $variables['operator_value'];
                            $operator = "%like%";


                            $id = "sub_filter" . $this->getIdentifierSuffix($tCount);
                            $expression .= $id;

                            $callables[$id] = function ($row) use ($column, $operator, $operatorValue) {
                                return $this->matchSearch($row, $column, $operator, $operatorValue);
                            };


                        } else {
                            $this->error("This generic_sub_filter tag is compromised. Aborting...");
                        }
                    } else {
                        $this->error("Invalid generic_sub_filter tag: it should have a column, operator, and operator_value properties.");
                    }
                    break;
                case "generic_filter":
                    if (
                        true === array_key_exists("column", $variables) &&
                        true === array_key_exists("operator", $variables) &&
                        true === array_key_exists("operator_value", $variables)
                    ) {

                        if (
                            true === in_array($variables['column'], $allowedFields) &&
                            true === in_array($variables['operator'], $allowedOperators)
                        ) {


                            $column = $variables['column'];
                            $operator = $variables['operator'];
                            $operatorValue = $variables['operator_value'];


                            $id = "generic_filter" . $this->getIdentifierSuffix($tCount);
                            $expression .= $id;

                            $callables[$id] = function ($row) use ($column, $operator, $operatorValue) {
                                return $this->matchSearch($row, $column, $operator, $operatorValue);
                            };


                        } else {
                            $this->error("This generic_filter tag is compromised. Aborting...");
                        }
                    } else {
                        $this->error("Invalid generic_filter tag: it should have a column, operator, and operator_value properties.");
                    }
                    break;
                case "col_order":
                    if (
                        true === array_key_exists("column", $variables) &&
                        true === array_key_exists("direction", $variables)
                    ) {
                        if (
                            true === in_array($variables['column'], $allowedFields) &&
                            true === in_array($variables['direction'], ['asc', 'desc'])
                        ) {
                            $sorts[$variables['column']] = $variables['direction'];
                        } else {
                            $this->error("This col_order tag is compromised. Aborting...");
                        }
                    } else {
                        $this->error("Invalid col_order tag: it should have a column and direction properties.");
                    }
                    break;
                case "open_parenthesis":
                    $expression .= '(';

                    break;
                case "close_parenthesis":
                    $expression .= ')';
                    break;
                case "and":
                    $expression .= ' && ';
                    break;
                case "or":
                    $expression .= ' || ';
                    break;
                case "limit":
                    if (array_key_exists('page_length', $variables)) {
                        $pageLength = (int)$variables['page_length'];
                    } elseif (array_key_exists('page', $variables)) {
                        $pageNumber = (int)$variables['page'];
                    }
                    break;
                default:
                    $this->error("Unrecognized tagId: $tagId.");
                    break;
            }
        }


//        CheapLogger::log("Expression: $expression");


        //--------------------------------------------
        // SEARCH FILTERING EXECUTION
        //--------------------------------------------
        if ('' !== $expression) {
            foreach ($rows as $k => $row) {
                $match = LogicalOperatorExpressionEvaluatorTool::resolve($expression, $callables, [
                    "input" => $row,
                ]);
                if (false === $match) {
                    unset($rows[$k]);
                }
            }
        }


        $nbTotalRows = count($rows);
        $nbPages = ceil($nbTotalRows / $pageLength);
        if ($pageNumber > $nbPages) {
            $pageNumber = 1;
        }


        //--------------------------------------------
        // SORTING
        //--------------------------------------------
        RowsSortHelperTool::sort($rows, $sorts);


        //--------------------------------------------
        // PAGINATION FILTERING
        //--------------------------------------------
        $offset = ($pageNumber - 1) * $pageLength;
        $rows = PaginationHelperTool::slice($rows, $offset, $pageLength);


        $ret = [
            "rows" => $rows,
            "nbTotalRows" => $nbTotalRows,
            "limit" => [
                $offset,
                $pageLength,
            ],
            "debugInfo" => [
                'stmt' => 'n/a (babyYaml engine)',
            ],
        ];


        return $ret;


        return false;
    }


    /**
     * @implementation
     */
    public function getError(): string|null
    {
        return "too lazy to work...";
    }




    //--------------------------------------------
    //
    //--------------------------------------------

    /**
     * Returns all the rows for the given duelist table.
     *
     * @param string $table
     * @return array
     */
    private function getRowsByTable(string $table): array
    {
        $rows = [];
        switch ($table) {
            case "lke_page":
                $tableDir = $this->rootDir . "/pages";
                $rows = $this->getRowsByDir($tableDir, [
                    'id' => true,
                    'weakMap' => [
                        'bodyclass' => '',
                        'layout_vars' => '',
                        'label' => '',
                    ],
                    'transform' => [
                        'layout_vars' => function ($arr) {
                            return BabyYamlUtil::getBabyYamlString($arr);
                        },
                    ],
                    'remove' => [
                        "zones",
                    ],
                ]);
                break;
            case "lke_block":
                $tableDir = $this->rootDir . "/blocks";
                $rows = $this->getRowsByDir($tableDir, [
                    'id' => true,
                    'filesOnly' => true,
                ]);
                break;
            case "lke_widget":
                $rows = $this->getWidgetRows();
                break;
            case "lke_page_has_block":
                $rows = $this->getPageHasBlockRows();
                break;
            case "lke_block_has_widget":
                $rows = $this->getBlockHasWidgetRows();
                break;
            default:
                $this->error("getRowsByTable: Unknown table: $table.");
                break;
        }
        return $rows;
    }


    /**
     * Returns all the block_has_widget entries as rows.
     * @return array
     */
    private function getBlockHasWidgetRows(): array
    {
        $rows = [];
        $blockDir = $this->rootDir . "/blocks";
        if (true === is_dir($blockDir)) {
            $files = YorgDirScannerTool::getFilesWithExtension($blockDir, 'byml', false, true, true);
            foreach ($files as $relPath) {
                $absPath = $blockDir . "/$relPath";
                $arr = BabyYamlUtil::readFile($absPath);
                $blockIdentifier = FileSystemTool::removeExtension($relPath);


                foreach ($arr as $widgetIndex => $widget) {
                    if (true === array_key_exists("identifier", $widget)) {
                        $widgetIdentifier = $widget['identifier'];
                    } else {
                        $widgetIdentifier = "blocks/$blockIdentifier/$widgetIndex";
                    }

                    $rows[] = [
                        "id" => $blockIdentifier . "--" . $widgetIdentifier,
                        "block_id" => $blockIdentifier,
                        "widget_id" => $widgetIdentifier,
                        "position" => $widgetIndex,
                        "block_id_plus" => $blockIdentifier,
                        "widget_id_plus" => $widgetIdentifier,
                    ];
                }


            }
        }
        return $rows;
    }


    /**
     * Returns all the page_has_block entries as rows.
     * @return array
     */
    private function getPageHasBlockRows(): array
    {
        $rows = [];
        $pageDir = $this->rootDir . "/pages";
        if (true === is_dir($pageDir)) {
            $files = YorgDirScannerTool::getFilesWithExtension($pageDir, 'byml', false, true, true);
            foreach ($files as $relPath) {
                $absPath = $pageDir . "/$relPath";
                $arr = BabyYamlUtil::readFile($absPath);
                $pageIdentifier = FileSystemTool::removeExtension($relPath);

                if (true === array_key_exists("zones", $arr)) {
                    foreach ($arr['zones'] as $zoneName => $zone) {


                        $zoneAlias = null;

                        if (true === is_array($zone)) {
                            foreach ($zone as $slotIndex => $slot) {
                                if (true === is_string($slot)) {
                                    $zoneAlias = $slot;
                                    $blockIndex = $slotIndex;
                                }
                            }
                        } elseif (true === is_string($zone)) {
                            if (true === str_starts_with($zone, 'b$:')) {
                                $zoneAlias = $zone;
                                $blockIndex = 0;
                            }
                        }

                        if (null !== $zoneAlias) {

                            $p = explode(':', $zoneAlias, 2);
                            $blockIdentifier = array_pop($p);

                            $rows[] = [
                                'id' => $pageIdentifier . "--" . $blockIdentifier,
                                'page_id' => $pageIdentifier,
                                'block_id' => $blockIdentifier,
                                'position_name' => $zoneName,
                                'block_index' => $blockIndex,
                                'page_id_plus' => $pageIdentifier,
                                'block_id_plus' => $blockIdentifier,
                            ];
                        }

                    }
                }
            }
        }
        return $rows;
    }


    /**
     * Return all the widgets as rows.
     * @return array
     */
    private function getWidgetRows(): array
    {
        $rows = [];
        $pageDir = $this->rootDir . "/pages";
        $blockDir = $this->rootDir . "/blocks";


        $weakMap = [
            "js" => '',
            "skin" => '',
            "active" => true,
        ];


        // parsing pages
        if (true === is_dir($pageDir)) {
            $files = YorgDirScannerTool::getFilesWithExtension($pageDir, 'byml', false, true, true);
            foreach ($files as $relPath) {
                $absPath = $pageDir . "/$relPath";
                $arr = BabyYamlUtil::readFile($absPath);
                if (true === array_key_exists("zones", $arr)) {
                    foreach ($arr['zones'] as $zoneName => $zone) {
                        if (true === is_array($zone)) {
                            foreach ($zone as $slotIndex => $slot) {
                                if (true === is_array($slot)) {
                                    $this->normalizeWidget($slot, $weakMap);


                                    if (true === array_key_exists("identifier", $slot)) {
                                        $identifier = $slot['identifier'];
                                    } else {
                                        $identifier = 'pages/' . FileSystemTool::removeExtension($relPath) . "/$zoneName/$slotIndex";
                                    }

                                    $slot['id'] = $identifier;
                                    $slot['identifier'] = $identifier;
                                    $rows[] = $slot;
                                }
                            }
                        }
                    }
                }
            }
        }


        // parsing blocks
        if (true === is_dir($blockDir)) {
            $files = YorgDirScannerTool::getFilesWithExtension($blockDir, 'byml', false, true, true);
            foreach ($files as $relPath) {
                $absPath = $blockDir . "/$relPath";
                $widgets = BabyYamlUtil::readFile($absPath);
                foreach ($widgets as $index => $widget) {
                    $this->normalizeWidget($widget, $weakMap);


                    if (true === array_key_exists("identifier", $widget)) {
                        $identifier = $widget['identifier'];
                    } else {
                        $identifier = 'blocks/' . FileSystemTool::removeExtension($relPath) . "/$index";
                    }

                    $widget['id'] = $identifier;
                    $widget['identifier'] = $identifier;
                    $rows[] = $widget;
                }
            }
        }


        return $rows;
    }


    /**
     * Prepares the given widget for rendering.
     *
     * @param array $widget
     * @param array $weakMap
     */
    private function normalizeWidget(array &$widget, array $weakMap)
    {
        if (true === array_key_exists("vars", $widget)) {
            $widget['vars'] = BabyYamlUtil::getBabyYamlString($widget['vars']);
        }

        if (true === array_key_exists("className", $widget)) {
            $widget['classname'] = $widget['className'];
            unset($widget['className']);
        }
        if (true === array_key_exists("widgetDir", $widget)) {
            $widget['widget_dir'] = $widget['widgetDir'];
            unset($widget['widgetDir']);
        }

        foreach ($weakMap as $k => $v) {
            if (false === array_key_exists($k, $widget)) {
                $widget[$k] = $v;
            }
        }
    }

    /**
     * Returns the rows from the given dir.
     *
     *
     * Available options are:
     * - id: bool, whether to add the id (auto-incremented property) to each row
     * - weakMap: array=null, a map of extra properties to add to each row, if they don't exist
     * - transform: array of propertyName => php callable.
     *      This is applied BEFORE the weakMap is applied.
     *      This will transform the given propertyName, if it exists in the row, into whatever the php callable returns.
     *      The php callable takes the property's value as input.
     * - remove: array of properties to remove
     * - filesOnly: bool=false. If true, the relative path to the file will be set as the "identifier" key in the row,
     *      and the content of the babyYaml file is not parsed.
     *
     *
     * @param string $dir
     * @param array $options
     * @return array
     */
    private function getRowsByDir(string $dir, array $options = []): array
    {

        $rows = [];


        $useId = $options['id'] ?? false;
        $weakMap = $options['weakMap'] ?? null;
        $transform = $options['transform'] ?? [];
        $remove = $options['remove'] ?? [];
        $filesOnly = $options['filesOnly'] ?? false;


        $files = YorgDirScannerTool::getFilesWithExtension($dir, 'byml', false, true, true);
        foreach ($files as $relFile) {
            $absFile = $dir . "/$relFile";
            $identifier = FileSystemTool::removeExtension($relFile);


            if (false === $filesOnly) {
                $arr = BabyYamlUtil::readFile($absFile);

                foreach ($remove as $prop) {
                    unset($arr[$prop]);
                }


                foreach ($transform as $prop => $callable) {
                    if (true === array_key_exists($prop, $arr)) {
                        $arr[$prop] = call_user_func($callable, $arr[$prop]);
                    }
                }


                if (null !== $weakMap) {
                    foreach ($weakMap as $k => $v) {
                        if (false === array_key_exists($k, $arr)) {
                            $arr[$k] = $v;
                        }
                    }
                }


            } else {
                $arr = [];
            }
            $arr['identifier'] = $identifier;

            if (true === $useId) {
                $arr['id'] = $identifier;
            }


            $rows[] = $arr;

        }
        return $rows;
    }


    /**
     * Returns the array of allowed fields for the given table.
     * @param string $table
     * @return array
     */
    private function getAllowedFieldsByTable(string $table): array
    {
        $ret = [];
        switch ($table) {
            case "lke_page":
                $ret = [
                    "id",
                    "identifier",
                    "label",
                    "layout",
                    "layout_vars",
                    "title",
                    "description",
                    "bodyclass",
                ];
                break;
            case "lke_block":
                $ret = [
                    "id",
                    "identifier",
                ];
                break;
            case "lke_widget":
                $ret = [
                    "id",
                    "identifier",
                    "name",
                    "type",
                    "className",
                    "widgetDir",
                    "template",
                    "vars",
                    "js",
                    "skin",
                    "active",
                ];
                break;
            case "lke_page_has_block":
                $ret = [
                    "id",
                    "page_id",
                    "block_id",
                    "position_name",
                    "block_index",
                    "page_id_plus",
                    "block_id_plus",
                ];
                break;
            case "lke_block_has_widget":
                $ret = [
                    "id",
                    "block_id",
                    "widget_id",
                    "position",
                    "block_id_plus",
                    "widget_id_plus",
                ];
                break;
            default:
                $this->error("getAllowedFieldsByTable: Unknown table $table.");
                break;
        }
        return $ret;
    }


    /**
     * Returns the simplified version of the given duelist table.
     * @param string $duelistTable
     * @return string
     */
    private function getSimplifiedTable(string $duelistTable): string
    {
        /**
         * For now, we ignore aliases
         */
        $p = explode(" ", $duelistTable, 2);
        return array_shift($p);
    }


    /**
     * Returns a unique identifier based on the given number.
     * @param int $count
     * @return string
     */
    private function getIdentifierSuffix(int $count): string
    {
        return "_" . str_pad($count, 4, "0", STR_PAD_LEFT);
    }


    /**
     * Checks if the given row match the filter defined by the other parameters, and returns whether it's a match or not.
     *
     * @param array $row
     * @param string $column
     * @param string $operator
     * @param string $operatorValue
     * @param string|null $operatorValue2
     * @return bool
     * @throws \Exception
     */
    private function matchSearch(array $row, string $column, string $operator, string $operatorValue, string $operatorValue2 = null): bool
    {

        $operatorValue = $this->format($operatorValue);
        $ret = true;
        if (true === array_key_exists($column, $row)) {

            $originalValue = $row[$column];
            $value = $this->format($originalValue);

            switch ($operator) {
                case "like":
                case "=":
                    $ret = ($value === $operatorValue);
                    break;
                case ">":
                    $ret = ($value > $operatorValue);
                    break;
                case ">=":
                    $ret = ($value >= $operatorValue);
                    break;
                case "<":
                    $ret = ($value < $operatorValue);
                    break;
                case "<=":
                    $ret = ($value <= $operatorValue);
                    break;
                case "!=":
                    $ret = ($value !== $operatorValue);
                    break;
                case "%like%":
                    $ret = str_contains($value, $operatorValue);
                    break;
                case "%like":
                    $ret = str_starts_with($value, $operatorValue);
                    break;
                case "like%":
                    $ret = str_ends_with($value, $operatorValue);
                    break;
                case "in":
                case "not_in":
                case "between":
                case "not_between":
                    $this->error("Not implemented yet: operator $operator.");
                    break;
                case "null":
                    $ret = (null === $originalValue);
                    break;
                case "is_not_null":
                    $ret = (null !== $originalValue);
                    break;
                default:
                    $this->error("Unknown operator: $operator.");
                    break;
            }
        } else {
            $this->error("This row doesn't contain the $column column.");
        }
        return $ret;
    }

    /**
     * Returns a formatted string.
     *
     * The returned string takes into account:
     * - the case sensitive option
     *
     *
     * @param string $str
     * @return string
     */
    private function format(string $str): string
    {
        $cs = $this->options['caseSensitive'] ?? false;
        if (false === $cs) {
            return strtolower($str);
        }
    }


    /**
     * Throws an exception.
     * @param string $msg
     * @param int|null $code
     * @throws \Exception
     */
    private function error(string $msg, int $code = null)
    {
        throw new LightKitEditorException(static::class . ": " . $msg, $code);
    }

}