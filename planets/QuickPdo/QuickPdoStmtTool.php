<?php

namespace QuickPdo;


/**
 * QuickPdoStmtTool
 * @author Lingtalfi
 * 2016-01-15
 *
 * A companion tool for QuickPdo to manipulate statements.
 *
 */
class QuickPdoStmtTool
{


    public static function addDateRangeToQuery(&$q, array &$markers = [], $dateStart = null, $dateEnd = null, $dateCol = null)
    {
        if (null === $dateCol) {
            $dateCol = 'date';
        }

        $queryHasWhere = QuickPdoStmtTool::hasWhere($q);


        if (null !== $dateStart && null !== $dateEnd) {
            if (false === $queryHasWhere) {
                $q .= " where ";
            } else {
                $q .= " and ";
            }

            $q .= "($dateCol >= :date_start and $dateCol <= :date_end)";
            $markers["date_start"] = $dateStart;
            $markers["date_end"] = $dateEnd;
        } elseif (null !== $dateStart || null !== $dateEnd) {
            if (false === $queryHasWhere) {
                $q .= " where ";
            } else {
                $q .= " and ";
            }


            if (null !== $dateStart) {
                $q .= "$dateCol >= :date_start";
                $markers["date_start"] = $dateStart;
            } else {

                $q .= "$dateCol <= :date_end";
                $markers["date_end"] = $dateEnd;
            }
        }
    }



    public static function hasWhere($query)
    {
        if (preg_match('!\swhere\s!i', $query)) {
            return true;
        }
        return false;
    }

    /**
     * @param $query
     * @return string, the query minus the wildcards it potentially contains
     */
    public static function stripWildcards($query)
    {
        return str_replace(['%', '_'], ['\%', '\_'], $query);
    }

    /**
     * @param $whereConds
     *
     *
     * - whereConds: glue | array of (whereCond | glue)
     *
     * with:
     *
     * - whereCond:
     * ----- 0: field
     * ----- 1: operator (<, =, >, <=, >=, like, between)
     * ----- 2: operand (the value to compare the field with)
     * ----- ?3: operand 2, only if between operator is used
     *
     *          Note: for mysql users, if the like operator is used, the operand can contain the wildcards chars:
     *
     *          - %: matches any number of characters, even zero characters
     *          - _: matches exactly one character
     *
     *          To use the literal version of a wildcard char, prefix it with backslash (\%, \_).
     *          See mysql docs for more info.
     *
     *
     * - glue: string directly injected in the statement, so that one
     *              can create the logical AND and OR and parenthesis operators.
     *              We can also use it with the IN keyword, for instance:
     *                      - in ( 6, 8, 9 )
     *                      - in ( :doo, :foo, :koo )
     *              In the latter case, we will also pass corresponding markers manually using the $extraMarkers argument.
     *                      doo => 6,
     *                      koo => 'something',
     *                      ...
     *
     *
     *
     *
     * @param $stmt
     * @param array $markers
     */
    public static function addWhereSubStmt($whereConds, &$stmt, array &$markers)
    {
        if (is_array($whereConds)) {
            if ($whereConds) {

                $mkCpt = 0;
                $mk = 'bzz_';
                $stmt .= ' WHERE ';
                $first = true;

                // if the previous cond was a glue, do not inject the "AND" keyword 
                $previousWasGlue = false;
                foreach ($whereConds as $cond) {
                    if (is_array($cond)) {
                        list($field, $op, $val) = $cond;
                        $val2 = (isset($cond[3])) ? $cond[3] : null;
                        if (true === $first) {
                            $first = false;
                        } else {
                            if (false === $previousWasGlue) {
                                $stmt .= ' AND ';
                            }
                        }


                        if (null !== $val) {
                            $stmt .= '`' . $field . '` ' . $op . ' :' . $mk . $mkCpt;
                            $markers[':' . $mk . $mkCpt] = $val;
                            $mkCpt++;
                        } else {
                            $stmt .= '`' . $field . '` IS NULL';
                        }


                        if ('between' === $op) {
                            $stmt .= ' AND :' . $mk . $mkCpt;
                            $markers[':' . $mk . $mkCpt] = $val2;
                            $mkCpt++;
                        }
                        $previousWasGlue = false;
                    } elseif (is_string($cond)) {
                        $stmt .= $cond;
                        $previousWasGlue = true;
                    }
                }
            }
        } elseif (is_string($whereConds)) {
            $stmt .= ' WHERE ' . $whereConds;
        }
    }


    /**
     * This method computes a where statements based on key to value mapping.
     * Use this method if every key/value pair you have use an "equal" operator.
     * This is a syntactic sugar.
     *
     *
     * @param array $keys2Values
     * @param $stmt
     * @param array $markers
     */
    public static function addWhereEqualsSubStmt(array $keys2Values, &$stmt, array &$markers, $tablePrefix = '')
    {
        if ($keys2Values) {
            $mkCpt = 0;
            $mk = 'bzz_';
            if (false === stripos($stmt, 'where ')) {
                $stmt .= ' WHERE ';
            } else {
                $stmt .= ' AND ';
            }

            $first = true;
            foreach ($keys2Values as $key => $val) {
                if (true === $first) {
                    $first = false;
                } else {
                    $stmt .= ' AND ';
                }

                if ('' === $tablePrefix) {
                    $p = explode(".", $key, 2);
                    if (count($p) < 2) {
                        $keyVal = '`' . $key . '`';
                    } else {
                        $keyVal = $p[0] . '.`' . $p[1] . '`';
                    }

                    if (null !== $val) {
                        $stmt .= $keyVal . ' = :' . $mk . $mkCpt;
                        $markers[':' . $mk . $mkCpt] = $val;
                    } else {
                        $stmt .= $keyVal . ' IS NULL';
                    }
                } else {
                    if (null !== $val) {
                        $stmt .= $tablePrefix . '`' . $key . '` = :' . $mk . $mkCpt;
                        $markers[':' . $mk . $mkCpt] = $val;
                    } else {
                        $stmt .= $tablePrefix . '`' . $key . '` IS NULL';
                    }
                }

                $mkCpt++;
            }
        }
    }


    /**
     * Converts a simple map array (array of key => value) to a pdo whereConds array.
     *
     * @param array $where
     * @return array, the pdoWhere array
     */
    public static function simpleWhereToPdoWhere(array $where)
    {
        $ret = [];
        foreach ($where as $k => $v) {
            $ret[] = [$k, '=', $v];
        }
        return $ret;
    }
}
