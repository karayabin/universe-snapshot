<?php


namespace Kamille\Utils\Morphic\Helper;


use Bat\SessionTool;
use Bat\UriTool;
use Kamille\Architecture\Controller\Exception\ClawsHttpResponseException;
use Kamille\Architecture\Response\Web\RedirectResponse;
use QuickPdo\QuickPdo;
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
            $avatar = MorphicHelper::getFormContextValue("avatar", $context);

            $q .= " where ";
            $hasWhere = true;
            $c = 0;
            foreach ($parentKeys as $key) {
                if (0 !== $c++) {
                    $q .= " and ";
                }
                $value = MorphicHelper::getFormContextValue($key, $context);
                $q .= "h.$key=$value";
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
                $q .= "h.$k=$v";
            }
        }
        return $parentValues;
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


    public static function getFeedFunction($table)
    {
        return self::getFeedFunctionByQuery("select * from `$table`");
    }

    public static function getFeedFunctionByQuery($query)
    {
        return function (SokoFormInterface $form, array $ric) use ($query) {
            $markers = [];
            $values = array_intersect_key($_GET, array_flip($ric));
            $q = $query;
            QuickPdoStmtTool::addWhereEqualsSubStmt($values, $q, $markers);
            $row = QuickPdo::fetch("$q", $markers);
            if ($row) {
                $form->inject($row);
            }
        };
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
}