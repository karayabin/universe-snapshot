<?php


namespace Ling\ConditionResolver;


class SimpleConditionResolverUtil
{


    private $parenthesisBlocks;
    private $tags;
    private static $comparisonOperators = [
        '><', // between exclusive
        '>=<', // between inclusive
        '<=',
        '>=',
        '!=',
        '=',
        '<',
        '>',
    ];


    public function __construct()
    {
        $this->parenthesisBlocks = [];
        $this->tags = [];
    }


    public static function create()
    {
        return new static();
    }


    /**
     * @param $conditionString , the
     *      ekom discounts conditions language
     *      as described in database/discounts.md
     *
     * @param array $pool , an array of key => variable
     * @return bool, whether or not the condition string is successful
     */
    public function evaluate($conditionString, array $pool = [])
    {
        $this->parenthesisBlocks = []; // reset
        $tags = self::getTags($pool);


        $conditionString = trim($conditionString);
        //--------------------------------------------
        // SIMPLIFY THE CONDITION STRING BY REMOVING PARENTHESIS
        //--------------------------------------------
        $c = 1;
        $pattern = '!\(\((.*?)\)\)!';
        $expression = preg_replace_callback($pattern, function ($v) use (&$c) {
            $this->parenthesisBlocks[$c] = $v[1];
            return '$' . $c++;
        }, $conditionString);


        //--------------------------------------------
        // NOW RESOLVE EXPRESSION STRING
        //--------------------------------------------
        return $this->evaluateExpression($expression, $tags);
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    protected function languageError($msg)
    {
        throw new \Exception("Language error: $msg");
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    private function evaluateExpression($expression, array $tags)
    {
        $expression = trim($expression);
        $andBlocks = preg_split('!(&&)!', $expression);
        foreach ($andBlocks as $andBlock) {
            $andBlock = trim($andBlock);
            if (false === $this->evaluateAndBlock($andBlock, $tags)) {
                return false;
            }
        }
        return true;
    }

    private function evaluateAndBlock($andBlock, array $tags)
    {
        $orBlocks = preg_split('!(\|\|)!', $andBlock);
        foreach ($orBlocks as $orBlock) {
            $orBlock = trim($orBlock);
            if (true === $this->evaluateOrBlock($orBlock, $tags)) {
                return true;
            }
        }
        return false;
    }

    private function evaluateOrBlock($orBlock, array $tags)
    {
        /**
         * Miss foreach
         */

        /**
         * First, search for parenthesisBlocks and evaluate them
         */
        $flattenComparisonBlock = preg_replace_callback('!\$([0-9]+)!', function ($v) use ($tags) {
            $index = $v[1];
            if (array_key_exists($index, $this->parenthesisBlocks)) {
                $expression = $this->parenthesisBlocks[$index];
                return (int)$this->evaluateExpression($expression, $tags);
            } else {
                return $v[0];
            }
        }, $orBlock);


        $flattenComparisonBlock = trim($flattenComparisonBlock);
        return $this->evaluateComparisonBlock($flattenComparisonBlock, $tags);

    }

    private function evaluateComparisonBlock($comparisonBlock, array $tags)
    {
        /**
         * Note: the comparisonBlock could be just a flat string (not containing
         * a comparison operator or a variable) for testing purposes,
         * like 0 for instance, which evaluates to false, or any other flat string which evaluates to 1.
         *
         * So, this string for instance:
         *
         * ((2 || 0 && 1)) && ((0 || 1))
         *
         * evaluates to true.
         *
         */

        //--------------------------------------------
        // REPLACING VARIABLES WITH THEIR REAL VALUES
        //--------------------------------------------
        $validTags = array_filter($tags, function ($v) {
            return is_scalar($v);
        });
        uksort($validTags, function ($tagA, $tagB) {
            return strlen($tagA) < strlen($tagB);
        });

        $comparisonBlock = str_replace(array_keys($validTags), array_values($validTags), $comparisonBlock);


        //--------------------------------------------
        // NOW CHECK IF THERE IS A COMPARISON OPERATOR
        // if so, evaluate the comparison block, otherwise evaluate the string
        //--------------------------------------------
        foreach (self::$comparisonOperators as $operator) {
            if (false !== strpos($comparisonBlock, $operator)) {
                return $this->doEvaluateComparisonBlock($comparisonBlock, $operator);
            }
        }

        // else it's just a string
        return ('0' !== $comparisonBlock);
    }


    private function doEvaluateComparisonBlock($comparisonBlock, $operator)
    {
        $p = explode($operator, $comparisonBlock, 2);
        $left = trim($p[0]);
        $right = trim($p[1]);



        switch ($operator) {
            case "=":
                return ($left === $right);
                break;
            case "<":
                return ($left < $right);
                break;
            case ">":
                return ($left > $right);
                break;
            case "<=":
                return ($left <= $right);
                break;
            case ">=":
                return ($left >= $right);
                break;
            case ">=<":
            case "><":
                $members = explode(',', $right, 2);
                if (2 === count($members)) {
                    $start = trim($members[0]);
                    $end = trim($members[1]);
                    if ('><' === $operator) {
                        return ($left > $start && $left < $end);
                    } else {
                        return ($left >= $start && $left <= $end);
                    }
                } else {
                    $this->languageError("Missing comma in right member of comparisonBlock $comparisonBlock");
                }
                break;
            default:
                $this->languageError("Unknown operator: $operator in comparisonBlock $comparisonBlock");
                break;
        }

    }

    private static function getTags(array $pool)
    {
        $ret = [];
        foreach ($pool as $k => $v) {
            if (true === $v) {
                $v = 'true';
            } elseif (false === $v) {
                $v = 'false';
            } elseif (null === $v) {
                $v = 'null';
            }
            $ret['$' . $k] = $v;
        }
        return $ret;
    }


}