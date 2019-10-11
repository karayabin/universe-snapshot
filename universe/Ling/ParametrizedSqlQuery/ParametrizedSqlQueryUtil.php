<?php


namespace Ling\ParametrizedSqlQuery;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\ArrayTool;
use Ling\Bat\StringTool;
use Ling\ParametrizedSqlQuery\Exception\ParametrizedSqlQueryException;
use Ling\SqlQuery\SqlQuery;
use Ling\UniversalLogger\UniversalLoggerInterface;

/**
 * The ParametrizedSqlQueryUtil class.
 *
 * See @page(conception notes) for more details.
 *
 *
 *
 */
class ParametrizedSqlQueryUtil
{

    /**
     * This property holds the regex for an inner marker.
     * @var string
     */
    protected static $regMarker = '!:([a-z%A-Z_0-9]+)!';


    /**
     * This property holds the regex for a variable.
     * @var string
     */
    protected static $regVariable = '!\$([a-zA-Z_0-9]+)!';

    /**
     * This property holds the list of available operators (by default) for this instance.
     * This list is defined by @page(the open admin protocol).
     * @var array
     */
    protected static $operators = [
        "=",
        ">",
        ">=",
        "<",
        "<=",
        "!=",
        "like",
        "%like%",
        "%like",
        "like%",
        "not_like",
        "%not_like%",
        "%not_like",
        "not_like%",
        "in",
        "not_in",
        "between",
        "not_between",
        "null",
        "is_not_null",
    ];

    /**
     * This property holds temporarily the routines for this instance.
     * @var array
     */
    private $_options;


    /**
     * This property holds the markers used by this instance.
     * I use it to avoid repetition of markers.
     * It's used only in the context of the getSqlQuery method.
     * @var array
     */
    protected $_markers;


    /**
     * This property holds the _processedMarkers for this instance.
     *
     * Usually, there is no problem with the same marker name being used multiple time.
     * For instance, the marker :expression could be used multiple times, such as in:
     *
     * - id like :%expression% or identifier like :%expression%, ...
     *
     * However, there are some cases where using the same marker is undesirable.
     * Including:
     *
     * - with the where treatment, when the applyOperatorAndValueRoutine method is executed, it already creates
     *      a marker. So when the prepareExpression method is used after, it shouldn't re-create that marker.
     *      This is done by putting the marker created by the applyOperatorAndValueRoutine method in this processed markers array.
     *      This array is reset for every tag item. See the source code for more.
     *
     *
     *
     *
     * @var array
     */
    protected $_processedMarkers;

    /**
     * This property holds the fields for this instance.
     * It's used only in the context of the getSqlQuery method.
     * @var array
     */
    protected $_fields;

    /**
     * This property holds the logger for this instance.
     * @var UniversalLoggerInterface
     */
    protected $logger;


    /**
     * Builds the ParametrizedSqlQueryUtil instance.
     */
    public function __construct()
    {
        $this->logger = null;
    }


    /**
     * Returns an SqlQuery instance parametrized using the given request declaration and params.
     * Or throws an exception if something wrong occurs.
     *
     * For more information about the request declaration structure, see @page(the conception notes).
     *
     *
     *
     *
     * @param array $requestDeclaration
     * @param array $tags
     * Array of tagItems, each of which being an array with the following structure:
     * - tag_id: string. The tag name
     * - ?variables: array. The tag variables if any
     *
     *
     *
     * @return SqlQuery
     * @throws ParametrizedSqlQueryException
     */
    public function getSqlQuery(array $requestDeclaration, array $tags = []): SqlQuery
    {
        $this->_markers = [];

        $query = new SqlQuery();
        $query->setDefaultWhereValue(""); // pure style


        if (ArrayTool::arrayKeyExistAll(['table', 'base_fields'], $requestDeclaration)) {


            //--------------------------------------------
            // BASE
            //--------------------------------------------
            $fields = $requestDeclaration['base_fields'];
            if (false === is_array($fields)) {
                $fields = [$fields];
            }
            $this->_fields = $fields;
            $query->setTable($requestDeclaration['table']);
            foreach ($fields as $field) {
                $query->addField($field);
            }
            if (array_key_exists("base_joins", $requestDeclaration)) {
                $baseJoin = $requestDeclaration['base_joins'];
                if (false === is_array($baseJoin)) {
                    $baseJoin = [$baseJoin];
                }
                foreach ($baseJoin as $join) {
                    $query->addJoin($join);
                }
            }
            if (array_key_exists("base_group_by", $requestDeclaration)) {
                $baseGroupBy = $requestDeclaration['base_group_by'];
                if (false === is_array($baseGroupBy)) {
                    $baseGroupBy = [$baseGroupBy];
                }
                foreach ($baseGroupBy as $groupBy) {
                    $query->addGroupBy($groupBy);
                }
            }

            if (array_key_exists("base_having", $requestDeclaration)) {
                $baseHaving = $requestDeclaration['base_having'];
                if (false === is_array($baseHaving)) {
                    $baseHaving = [$baseHaving];
                }
                foreach ($baseHaving as $having) {
                    $query->addHaving($having);
                }
            }
            if (array_key_exists("base_order", $requestDeclaration)) {
                $baseOrder = $requestDeclaration['base_order'];
                if (false === is_array($baseOrder)) {
                    $baseOrder = [$baseOrder];
                }
                foreach ($baseOrder as $orderBy) {
                    $p = explode(' ', $orderBy, 2);
                    $query->addOrderBy($p[0], $p[1]);
                }
            }


            //--------------------------------------------
            // TAG BASED
            //--------------------------------------------
            $fields = $requestDeclaration['fields'] ?? [];
            $joins = $requestDeclaration['joins'] ?? [];
            $where = $requestDeclaration['where'] ?? [];
            $groupBy = $requestDeclaration['group_by'] ?? [];
            $having = $requestDeclaration['having'] ?? [];
            $order = $requestDeclaration['order'] ?? [];
            $this->_options = $requestDeclaration['options'] ?? [];
            $tagOptions = $this->_options["tag_options"] ?? [];
            $whereBlocks = [];
            $limitVariables = [];


            foreach ($tags as $tagItem) {

                $this->_processedMarkers = [];

                $tagName = $tagItem['tag_id'];
                $tagVariables = $tagItem['variables'] ?? [];


                if ('limit' === $tagName) {
                    $limitVariables = array_merge($limitVariables, $tagVariables);
                    continue;
                }


                $thisTagOptions = $tagOptions[$tagName] ?? [];


                //--------------------------------------------
                // WHERE PREPARATION
                //--------------------------------------------
                if (array_key_exists($tagName, $where)) {

                    $whereExpr = $where[$tagName];
                    if (array_key_exists("operator_and_value", $thisTagOptions)) {
                        $this->applyOperatorAndValueRoutine($whereExpr, $thisTagOptions['operator_and_value'], $tagVariables, $thisTagOptions);
                    }
                    $realWhereExpression = $this->prepareExpression($whereExpr, $tagName, $tagVariables, $thisTagOptions);
                    $whereBlocks[] = $realWhereExpression;
                }

                //--------------------------------------------
                // GROUP BY
                //--------------------------------------------
                if (array_key_exists($tagName, $groupBy)) {
                    $query->addGroupBy($groupBy[$tagName]);
                }


                //--------------------------------------------
                // ORDER
                //--------------------------------------------
                if (array_key_exists($tagName, $order)) {
                    $orderExpr = $order[$tagName];
                    $realOrderExpression = $this->prepareExpression($orderExpr, $tagName, $tagVariables, $thisTagOptions);
                    $p = explode(' ', $realOrderExpression, 2);
                    $query->addOrderBy($p[0], $p[1]);
                }
            }


            //--------------------------------------------
            // WHERE RESOLUTION
            //--------------------------------------------
            if ($whereBlocks) {
                $sWhere = "";
                $sWhere .= implode(PHP_EOL, $whereBlocks);
                $sWhere .= PHP_EOL;
                $query->addWhere($sWhere);
            }


            if ($this->_markers) {
                $query->addMarkers($this->_markers);
            }


            //--------------------------------------------
            // LIMIT
            //--------------------------------------------
            /**
             * Limit is special, it's defined statically.
             * If the developer used variable, then only those values can be overridden by the user.
             */
            $limit = $requestDeclaration['limit'] ?? null;
            if ($limit) {


                $page = $limit['page'];
                $pageLength = $limit['page_length'] ?? null;


                if ('$page' === $page) {
                    if (array_key_exists("page", $limitVariables)) {
                        $page = $limitVariables["page"];
                    } else {
                        if (array_key_exists("default_limit_page", $this->_options)) {
                            $page = $this->_options['default_limit_page'];
                        } else {
                            $this->error("The \"page\" variable was defined by the developer, but not set by the user (for the limit clause), and no default value was set by the developer.");
                        }
                    }
                }
                if ('$page_length' === $pageLength) {
                    if (array_key_exists("page_length", $limitVariables)) {
                        $pageLength = $limitVariables["page_length"];
                    } else {
                        if (array_key_exists("default_limit_page_length", $this->_options)) {
                            $pageLength = $this->_options['default_limit_page_length'];
                        } else {
                            $this->error("The \"page_length\" variable was defined by the developer, but not set by the user (for the limit clause), and no default value was set by the developer.");
                        }
                    }
                }

                if ($pageLength) {
                    if ('all' !== $pageLength) {
                        $offset = ((int)$page - 1) * (int)$pageLength;
                        $query->setLimit($offset, $pageLength);
                    }
                }
                // else just one big page (i.e. no pagination)


            }


//            az($query->getSqlQuery(), $this->_markers);
            return $query;

        } else {
            $this->error("Some mandatory field is missing. It could be one either the  \"table\" property, or the \"base_fields\" property.");
        }
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the logger.
     *
     * @param UniversalLoggerInterface $logger
     */
    public function setLogger(UniversalLoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Logs a message if a logger has been set.
     *
     * @param mixed $message
     * @param string $channel
     */
    protected function log($message, string $channel = "debug")
    {
        if (null !== $this->logger) {
            $this->logger->log($message, $channel);
        }
    }





    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Throws an exception.
     *
     *
     * @param string $message
     * @throws ParametrizedSqlQueryException
     */
    protected function error(string $message)
    {
        throw new ParametrizedSqlQueryException($message);
    }


    /**
     * Returns the sql expression to inject in a sql query,
     * and stores the markers (if any) in the _markers array.
     *
     * This method also:
     * - resolves the $variables
     * - resolves the inner marker notation
     *
     *
     *
     *
     * @param string $expr
     * @param string $tagName
     * @param array $tagVariables
     * @param array $tagOptions
     * @return string
     * @throws \Exception
     */
    protected function prepareExpression(string $expr, string $tagName, array $tagVariables, array $tagOptions): string
    {
        //--------------------------------------------
        // PREPARE VARIABLES
        //--------------------------------------------
        $exprVariables = [];
        if (preg_match_all(self::$regVariable, $expr, $match)) {
            $exprVariables = $match[1];
        }
        foreach ($exprVariables as $variable) {
            if (array_key_exists($variable, $tagVariables)) {
                $value = $tagVariables[$variable];


                // SPECIAL VARIABLES
                //--------------------------------------------
                switch ($variable) {
                    case "column":
                        if (false === in_array($value, $this->_fields, true)) {
                            $this->error("Unexpected value for variable \"column\" (tag=$tagName).");
                        }
                        break;
                    case "direction":
                        if (false === in_array($value, ["asc", 'desc'], true)) {
                            $this->error("Unexpected value for variable \"direction\" (tag=$tagName).");
                        }
                        break;
                    case "operator":
                        $operators = $tagOptions['operators'] ?? self::$operators;
                        if (false === in_array($value, $operators, true)) {
                            $this->error("Unexpected value for variable \"operator\" (tag=$tagName).");
                        }
                        switch ($value) {
                            case "%like%":
                            case "like%":
                            case "%like":
                                $value = 'LIKE';
                                break;
                            case "not_like":
                            case "%not_like%":
                            case "not_like%":
                            case "%not_like":
                                $value = 'NOT LIKE';
                                break;
                            case "in":
                            case "not_in":
                            case "between":
                            case "not_between":
                                $value = 'between ()';
                                $this->error("Not implemented yet, with special operator $value.");
                                break;
                            case "null":
                                $value = 'IS NULL';
                                break;
                            case "is_not_null":
                                $value = 'IS NOT NULL';
                                break;
                            default:
                                break;
                        }
                        break;
                    case "page":
                        $value = (int)$value;
                        break;
                }


                // now inject the SAFE value in the "tag expression".
                $expr = preg_replace('!\$' . $variable . '\b!', $value, $expr);
            } else {
                $this->error("Variable not provided by the user: $variable.");
            }
        }


        //--------------------------------------------
        // EXTRACT MARKERS
        //--------------------------------------------
        $internalMarkers = [];
        if (preg_match_all(self::$regMarker, $expr, $match)) {
            $internalMarkers = $match[1];

            /**
             * If the expression contains the same tag multiple times, we reduce it to one tag because it's the same tag.
             *
             * Example:
             * - general_search:
             *          id like %expression% or
             *          identifier like %expression% or
             *          pseudo like %expression% ...
             */
            $internalMarkers = array_unique($internalMarkers);
            $internalMarkers = array_diff($internalMarkers, $this->_processedMarkers);
        }


        //--------------------------------------------
        // NOW UPDATE THE VARIABLES IF NECESSARY
        //--------------------------------------------
        foreach ($internalMarkers as $internalMarker) {


            $varName = str_replace('%', '', $internalMarker);

            if (array_key_exists($varName, $tagVariables)) {

                $value = $tagVariables[$varName];


                //--------------------------------------------
                // HANDLING LIKE-WRAPPING
                //--------------------------------------------
                $value = $this->resolveInternalMarkerPercent($internalMarker, $value, $tagOptions);


                //--------------------------------------------
                // PREPARING MARKERS
                //--------------------------------------------
                $markerName = $this->getNewMarkerName($varName);
                $expr = preg_replace('!:%?' . $varName . '%?(?:\b|\s|$)!', ':' . $markerName . ' ', $expr);
                $this->_markers[$markerName] = $value;


            } else {
                $this->error("The variable $varName was not provided (tag=$tagName).");
            }

        }
        return $expr;
    }


    /**
     * Resolves the percent symbol in internal marker notation, and returns the result.
     * It returns an array with the following entries:
     *
     * - 0: the sql marker name
     * - 1: the value to bind to that marker
     *
     *
     * @param string $internalMarkerName
     * The internal marker without the colon prefix.
     *
     * @param mixed $value
     * The marker value
     * @param array $tagOptions
     *
     * @return string
     */
    protected function resolveInternalMarkerPercent(string $internalMarkerName, $value, array $tagOptions): string
    {
        $underscoreChar = $this->_options['sql_like_underscore_char'] ?? '_';
        $percentChar = $this->_options['sql_like_percent_char'] ?? '%';
        $escapeUnderscore = $tagOptions['escape_underscore'] ?? true;
        $escapePercent = $tagOptions['escape_percent'] ?? true;


        if (false !== strpos($internalMarkerName, '%')) {
            // escaping the user value
            if (true === $escapePercent) {
                $value = str_replace($percentChar, '\\' . $percentChar, $value);
            }
            if (true === $escapeUnderscore) {
                $value = str_replace($underscoreChar, '\\' . $underscoreChar, $value);
            }


            if ('%' === substr($internalMarkerName, 0, 1)) {
                $value = $percentChar . $value;
            }
            if ('%' === substr($internalMarkerName, -1)) {
                $value = $value . $percentChar;
            }
        }

        return $value;
    }

    /**
     *
     * Applies the transformIfLike routine to the given expression.
     *
     * See @page(the routines section) in the documentation for more info.
     *
     * Note: the tags array might be updated.
     *
     *
     *
     *
     * @param string $expression
     * @param array $transformLikeOptions
     * @param array $tags
     * @param array $tagOptions
     * @throws \Exception
     */
    protected function applyOperatorAndValueRoutine(string &$expression, array $transformLikeOptions, array &$tags, array $tagOptions)
    {

        $source = $transformLikeOptions['source'];
        $target = $transformLikeOptions['target'];

        if (
            preg_match('!\$' . $source . '\b!', $expression) &&
            preg_match('!:' . $target . '\b!', $expression) &&
            array_key_exists($source, $tags) &&
            array_key_exists($target, $tags)
        ) {

            $sourceValue = $tags[$source];
            $targetValue = $tags[$target];
            /**
             * https://github.com/lingtalfi/NotationFan/blob/master/sql-unofficial-standard-comparison-operators.md
             */
            switch ($sourceValue) {
                case "%like%":
                case "%not_like%":
                case "%like":
                case "%not_like":
                case "like%":
                case "not_like%":


                    $markerName = $this->getNewMarkerName($target, true);

                    switch ($sourceValue) {
                        case "%like%":
                        case "%not_like%":
                            $internalMarkerName = "%$markerName%";
                            break;
                        case "%like":
                        case "%not_like":
                            $internalMarkerName = "%$markerName";
                            break;
                        case "like%":
                        case "not_like%":
                            $internalMarkerName = "$markerName%";
                            break;
                    }

                    $newValue = $this->resolveInternalMarkerPercent($internalMarkerName, $targetValue, $tagOptions);
                    $this->_markers[$markerName] = $newValue;
                    $expression = preg_replace('!:' . $target . '\b!', ':' . $markerName, $expression);

                    break;
                case "in":
                case "not_in":
                    $keyword = ("in" === $sourceValue) ? "IN" : "NOT IN";
                    if (false === is_array($targetValue)) {
                        $targetValue = BabyYamlUtil::parseCsv($targetValue);
                    }
                    $marker = "in_tag";
                    $ins = [];
                    foreach ($targetValue as $v) {
                        $markerName = $this->getNewMarkerName($marker, true);
                        $this->_markers[$markerName] = $v;
                        $ins[] = ":" . $markerName;
                        $tags[$markerName] = $v;
                    }


                    $sIn = $keyword . "(" . implode(', ', $ins) . ") ";
                    $expression = preg_replace('!:' . $target . '\b!', ' ', $expression);
                    $expression = preg_replace('!\$' . $source . '\b!', $sIn, $expression);

                    break;
                case "between":
                case "not_between":

                    $keyword = ("between" === $sourceValue) ? "BETWEEN" : "NOT BETWEEN";
                    if (false === is_array($targetValue)) {
                        $targetValue = BabyYamlUtil::parseCsv($targetValue);
                    }
                    $marker = "between_tag";
                    if (is_array($targetValue)) {
                        if (2 === count($targetValue)) {


                            $betweens = [];
                            foreach ($targetValue as $v) {
                                $markerName = $this->getNewMarkerName($marker, true);
                                $this->_markers[$markerName] = $v;
                                $betweens[] = ":" . $markerName;
                                $tags[$markerName] = $v;
                            }

                            $sBetween = $keyword . "(" . implode(' AND ', $betweens) . ") ";
                            $expression = preg_replace('!:' . $target . '\b!', ' ', $expression);
                            $expression = preg_replace('!\$' . $source . '\b!', $sBetween, $expression);


                        } else {
                            $this->error("count != 2 (keyword=between, expression=$expression).");
                        }
                    } else {
                        $this->error("Target value not an array (keyword=between, expression=$expression)");
                    }

                    break;
                case "is_null":
                case "is_not_null":
                    $keyword = ("is_null" === $sourceValue) ? "IS NULL" : "IS NOT NULL";
                    $expression = preg_replace('!:' . $target . '\b!', ' ', $expression);
                    unset($tags[$target]);
                    $expression = preg_replace('!\$' . $source . '\b!', $keyword, $expression);
                    break;

                case "=":
                case ">":
                case ">=":
                case "<":
                case "<=":
                case "!=":

                    break;
                default:
                    $this->error("Unknown operator: $sourceValue.");
                    break;
            }

        }
    }


    /**
     * Returns a unique marker name that's not already in the _markers array.
     *
     * @param string $marker
     * @param bool $isFinal
     * @return string
     */
    protected function getNewMarkerName(string $marker, bool $isFinal = false): string
    {
        $res = StringTool::incrementNumericalSuffix($marker, $this->_markers, true);
        if (true === $isFinal) {
            $this->_processedMarkers[] = $res;
        }
        return $res;
    }

}
