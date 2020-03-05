<?php


namespace Ling\ParametrizedSqlQuery\Helper;

/**
 * The ParametrizedSqlQueryHelper class.
 */
class ParametrizedSqlQueryHelper
{

    /**
     * Returns an array of alias => columnExpression based on the given columns array.
     *
     * @param array $columns
     * @return array
     */
    public static function getColumnName2ColumnExpression(array $columns): array
    {
        $ret = [];
        foreach ($columns as $colExpr) {




            $p = preg_split('!\s+as\s+!i', $colExpr);
            if (count($p) > 1) {
                $alias = array_pop($p);
                $theColExpr = array_shift($p);
            } else {
                $theColExpr = $colExpr;
                $alias = $colExpr;
            }


            // removing possible alias prefixes
            if (
                false !== strpos($alias, ".")
            ) {
                $p = explode(".", $alias, 2);
                $alias = array_pop($p);
            }


            $ret[$alias] = $theColExpr;
        }
        return $ret;
    }
}