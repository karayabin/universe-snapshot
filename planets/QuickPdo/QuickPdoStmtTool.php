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
                $stmt .= ' where ';
                $first = true;

                // if the previous cond was a glue, do not inject the "AND" keyword 
                $previousWasGlue = false;
                foreach ($whereConds as $cond) {
                    if (is_array($cond)) {
                        list($field, $op, $val) = $cond;
                        $val2 = (isset($cond[3])) ? $cond[3] : null;
                        if (true === $first) {
                            $first = false;
                        }
                        else {
                            if (false === $previousWasGlue) {
                                $stmt .= ' and ';
                            }
                        }


                        if (null !== $val) {
                            $stmt .= $field . ' ' . $op . ' :' . $mk . $mkCpt;
                            $markers[':' . $mk . $mkCpt] = $val;
                            $mkCpt++;
                        }
                        else{
                            $stmt .= $field . ' is null';
                        }


                        if ('between' === $op) {
                            $stmt .= ' and :' . $mk . $mkCpt;
                            $markers[':' . $mk . $mkCpt] = $val2;
                            $mkCpt++;
                        }
                        $previousWasGlue = false;
                    }
                    elseif (is_string($cond)) {
                        $stmt .= $cond;
                        $previousWasGlue = true;
                    }
                }
            }
        }
        elseif (is_string($whereConds)) {
            $stmt .= ' where ' . $whereConds;
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
    public static function addWhereEqualsSubStmt(array $keys2Values, &$stmt, array &$markers)
    {

        if ($keys2Values) {
            $mkCpt = 0;
            $mk = 'bzz_';
            $stmt .= ' where ';
            $first = true;
            foreach ($keys2Values as $key => $val) {
                if (true === $first) {
                    $first = false;
                }
                else {
                    $stmt .= ' and ';
                }
                if (null !== $val) {
                    $stmt .= $key . ' = :' . $mk . $mkCpt;
                    $markers[':' . $mk . $mkCpt] = $val;
                }
                else {
                    $stmt .= $key . ' is null';
                }

                $mkCpt++;
            }
        }
    }
}
