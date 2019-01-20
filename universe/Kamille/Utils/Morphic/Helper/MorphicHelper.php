<?php


namespace Kamille\Utils\Morphic\Helper;


use Bat\SessionTool;
use Bat\StringTool;
use Bat\UriTool;
use Kamille\Architecture\Controller\Exception\ClawsHttpResponseException;
use Kamille\Architecture\Response\Web\RedirectResponse;
use QuickPdo\QuickPdo;
use QuickPdo\QuickPdoInfoTool;
use QuickPdo\QuickPdoStmtTool;
use SokoForm\Form\SokoFormInterface;

class MorphicHelper
{


    /**
     * child pattern, used in list configs
     */
    public static function getListParentValues(&$q, array $context, array $inferred = [])
    {

        /**
         * parentKeys:
         * if not null, means there is a parent driving...
         */
        $parentKeys = (array_key_exists('_parentKeys', $context)) ? $context['_parentKeys'] : null;
        $parentValues = [];
        $queryInferred = $inferred;
        $hasWhere = false;


        if ($parentKeys) {
            if (false === QuickPdoStmtTool::hasWhere($q)) {
                $q .= " where ";
            } else {
                $q .= " and ";
            }

            $hasWhere = true;
            $c = 0;
            foreach ($parentKeys as $key) {
                if (0 !== $c++) {
                    $q .= " and ";
                }
                $value = MorphicHelper::getFormContextValue($key, $context);
                $q .= "h.$key='$value'";
                $parentValues[$key] = $value;

                if (array_key_exists($key, $queryInferred)) {
                    unset($queryInferred[$key]);
                }
            }
        }
        if ($queryInferred) {
            if (false === $hasWhere) {
                $q .= ' where ';
            } else {
                $q .= ' and ';
            }
            $c = 0;
            foreach ($queryInferred as $k => $v) {
                if (0 !== $c++) {
                    $q .= ' and ';
                }
                $q .= "h.$k='$v'";
            }
        }
        return $parentValues;
    }


    public static function getFormTitle(string $title, bool $isUpdate)
    {
        $s = $title;
        /**
         * @todo-ling: change french
         */
        if ($isUpdate) {
            $s .= ": modification";
        } else {
            $s .= ": ajout";
        }
        return $s;
    }


    public static function getIsUpdate(array $ric)
    {
        $isUpdate = true;
        foreach ($ric as $col) {
            if (false === array_key_exists($col, $_GET)) {
                $isUpdate = false;
                break;
            }
        }
        return $isUpdate;
    }

    public static function getFormContextValue($key, array $context)
    {
        if (array_key_exists($key, $context)) {
            return $context[$key];
        }
        throw new \Exception("Bad assertion: expected key $key to be set in the form context");
    }


    /**
     * Use this for persistence, in conjunction with getListParameters
     */
    public static function setListParameters($viewId, array $params)
    {
        SessionTool::start();

        if (false === array_key_exists("morphic-persistence", $_SESSION)) {
            $_SESSION["morphic-persistence"] = [];
        }
        $_SESSION["morphic-persistence"][$viewId] = $params;
    }


    /**
     * Use this for persistence, in conjunction with setListParameters
     * This returns an array, which might be empty if no entry is found for
     * the given viewId
     */
    public static function getListParameters($viewId)
    {
        $ret = [];
        if (false === array_key_exists("morphic-persistence", $_SESSION)) {
            $_SESSION["morphic-persistence"] = [];
        }
        if (array_key_exists($viewId, $_SESSION["morphic-persistence"])) {
            return $_SESSION["morphic-persistence"][$viewId];
        }
        return $ret;
    }


    public static function getFeedFunction($table, callable $onFeedAfter = null, array $ricMap = [], array $options = [])
    {
        $p = explode('.', $table, 2);
        if (2 === count($p)) {
            $table = "`$p[0]`.`$p[1]`";
        } else {
            $table = "`$table`";
        }
        return self::getFeedFunctionByQuery("select * from $table", $onFeedAfter, $ricMap, $options);
    }

    public static function getFeedFunctionByQuery($query, callable $onFeedAfter = null, array $ricMap = [], array $options = [])
    {
        return function (SokoFormInterface $form, array $ric) use ($query, $onFeedAfter, $ricMap, $options) {
            if ($ricMap) {
                $oldRic = $ric;
                $ric = [];
                foreach ($oldRic as $col) {
                    if (array_key_exists($col, $ricMap)) {
                        $col = $ricMap[$col];
                    }
                    $ric[] = $col;
                }
            }


            $markers = [];
            $values = array_intersect_key($_GET, array_flip($ric));
            $q = $query;

            QuickPdoStmtTool::addWhereEqualsSubStmt($values, $q, $markers);
            $row = QuickPdo::fetch("$q", $markers);
            if ($row) {

                $filters = $options['filters'] ?? [];
                if (array_key_exists("unserializeArray", $filters)) {
                    foreach ($filters['unserializeArray'] as $col) {
                        if (array_key_exists($col, $row) && null !== $row[$col]) {
                            $row[$col] = StringTool::unserializeAsArray($row[$col]);
                        }
                    }
                }
                $form->inject($row);
            }

            if ($onFeedAfter) {
                $onFeedAfter($form);
            }
        };
    }

    public static function applyPostFilters(array &$data, array $filters = [])
    {
        if (array_key_exists('serializeIfArray', $filters)) {
            foreach ($filters['serializeIfArray'] as $col) {
                if (array_key_exists($col, $data) && is_array($data[$col])) {
                    $data[$col] = serialize($data[$col]);
                }
            }
        }
    }


    public static function price($number)
    {
        return str_replace(',', '.', $number);
    }


    public static function redirectToUpdateFormIfNecessary(array $ric)
    {

        if (array_key_exists("submit-and-update", $_POST)) {
            $response = RedirectResponse::create(UriTool::uri(null, $ric, false, true));
            $e = ClawsHttpResponseException::create()->setHttpResponse($response);
            throw $e;
        }
    }

    public static function redirect(array $params = [])
    {
        $response = RedirectResponse::create(UriTool::uri(null, $params, false, true));
        $e = ClawsHttpResponseException::create()->setHttpResponse($response);
        throw $e;
    }


}