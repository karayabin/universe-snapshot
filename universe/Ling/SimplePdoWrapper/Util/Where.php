<?php


namespace Ling\SimplePdoWrapper\Util;


use Ling\SimplePdoWrapper\Exception\SimplePdoWrapperException;

/**
 * The Where class.
 *
 * This class is used to ease the writing of simple but secured (via pdo markers) where conditions.
 * In particular, writing conditions involving "like" can be difficult to remember.
 *
 * The concept is that you create the where conditions list like this:
 *
 * ```php
 * $whereConditions = Where::inst()
 *      ->key("user_id")->equals(3)
 *      ->key("pseudo")->like("maurice");
 * ```
 *
 * And then you can pass the whereConditions array to any method that accept whereConditions, such as update and delete.
 * Alternately, you can also use it in methods like fetch or fetchAll, by using the appendToQuery method.
 *
 *
 * All conditions use pdo markers (i.e. sql injection safe).
 *
 *
 */
class Where
{


    /**
     * This property holds the conditionsList for this instance.
     * It's an array of condition items.
     *
     * Each condition item is an array:
     * - 0: key, the name of the targeted column
     * - 1: comparisonFunction, using the [susco notation](https://github.com/lingtalfi/NotationFan/blob/master/sql-unofficial-standard-comparison-operators.md)
     * - 2: value1: the value used to compare the column against
     * - ?3: option: an optional value, depending ont he comparisonFunction used.
     *      For instance the second value in case of the "between" and/or "not_between" operator, or the list of allowed wildchars with like methods.
     *
     *
     * @var array
     */
    protected $conditionsList;

    /**
     * This property holds the current key.
     * @var string
     */
    protected $key;


    /**
     * Builds the Where instance.
     */
    public function __construct()
    {
        $this->conditionsList = [];
        $this->key = null;
    }


    /**
     * Creates a new instance and returns it.
     * @return static
     */
    public static function inst()
    {
        return new static();
    }


    /**
     * Sets the current key and return this instance for chaining.
     *
     *
     * @param string $key
     * @return $this
     */
    public function key(string $key): self
    {
        $this->key = $key;
        return $this;
    }


    /**
     * Proxy to the operator method, with a predefined operator of "=".
     *
     * @param $value
     * @return $this
     * @throws \Exception
     */
    public function equals($value): self
    {
        return $this->operator("=", $value);
    }


    /**
     * Proxy to the operator method, with a predefined operator of ">".
     *
     * @param $value
     * @return $this
     * @throws \Exception
     */
    public function greaterThan($value): self
    {
        return $this->operator(">", $value);
    }


    /**
     * Proxy to the operator method, with a predefined operator of ">=".
     *
     * @param $value
     * @return $this
     * @throws \Exception
     */
    public function greaterThanOrEqualTo($value): self
    {
        return $this->operator(">=", $value);
    }


    /**
     * Proxy to the operator method, with a predefined operator of "<".
     *
     * @param $value
     * @return $this
     * @throws \Exception
     */
    public function lessThan($value): self
    {
        return $this->operator("<", $value);
    }


    /**
     * Proxy to the operator method, with a predefined operator of "<=".
     *
     * @param $value
     * @return $this
     * @throws \Exception
     */
    public function lessThanOrEqualsTo($value): self
    {
        return $this->operator("<=", $value);
    }


    /**
     * Proxy to the operator method, with a predefined operator of "!=".
     *
     * @param $value
     * @return $this
     * @throws \Exception
     */
    public function notEquals($value): self
    {
        return $this->operator("!=", $value);
    }


    /**
     * Proxy to the operator method, with a predefined operator of "like".
     *
     * @param $value
     * @param $allowedWildChars = null
     * @return $this
     * @throws \Exception
     */
    public function likeStrict($value, $allowedWildChars = null): self
    {
        return $this->operator("like", $value, $allowedWildChars);
    }


    /**
     * Proxy to the operator method, with a predefined operator of "%like%".
     *
     * @param $value
     * @param $allowedWildChars = null
     * @return $this
     * @throws \Exception
     */
    public function like($value, $allowedWildChars = null): self
    {
        return $this->operator("%like%", $value, $allowedWildChars);
    }


    /**
     * Alias of the like method.
     *
     * @param $value
     * @param $allowedWildChars = null
     * @return $this
     * @throws \Exception
     */
    public function contains($value, $allowedWildChars = null): self
    {
        return $this->operator("%like%", $value, $allowedWildChars);
    }


    /**
     * Proxy to the operator method, with a predefined operator of "%like".
     *
     * @param $value
     * @param $allowedWildChars = null
     * @return $this
     * @throws \Exception
     */
    public function likePre($value, $allowedWildChars = null): self
    {
        return $this->operator("%like", $value, $allowedWildChars);
    }

    /**
     * Alias of the likePre method.
     *
     * @param $value
     * @param $allowedWildChars = null
     * @return $this
     * @throws \Exception
     */
    public function endsWith($value, $allowedWildChars = null): self
    {
        return $this->operator("%like", $value, $allowedWildChars);
    }


    /**
     * Proxy to the operator method, with a predefined operator of "like%".
     *
     * @param $value
     * @param $allowedWildChars = null
     * @return $this
     * @throws \Exception
     */
    public function likePost($value, $allowedWildChars = null): self
    {
        return $this->operator("like%", $value, $allowedWildChars);
    }


    /**
     * Alias of the likePost method.
     *
     * @param $value
     * @param $allowedWildChars = null
     * @return $this
     * @throws \Exception
     */
    public function startsWith($value, $allowedWildChars = null): self
    {
        return $this->operator("like%", $value, $allowedWildChars);
    }



    /**
     * Proxy to the operator method, with a predefined operator of "not_like".
     *
     * @param $value
     * @param $allowedWildChars = null
     * @return $this
     * @throws \Exception
     */
    public function notLikeStrict($value, $allowedWildChars = null): self
    {
        return $this->operator("not_like", $value, $allowedWildChars);
    }


    /**
     * Proxy to the operator method, with a predefined operator of "%not_like%".
     *
     * @param $value
     * @param $allowedWildChars = null
     * @return $this
     * @throws \Exception
     */
    public function notLike($value, $allowedWildChars = null): self
    {
        return $this->operator("%not_like%", $value, $allowedWildChars);
    }


    /**
     * Alias of the notLike method.
     *
     * @param $value
     * @param $allowedWildChars = null
     * @return $this
     * @throws \Exception
     */
    public function notContaining($value, $allowedWildChars = null): self
    {
        return $this->operator("%not_like%", $value, $allowedWildChars);
    }


    /**
     * Proxy to the operator method, with a predefined operator of "%not_like".
     *
     * @param $value
     * @param $allowedWildChars = null
     * @return $this
     * @throws \Exception
     */
    public function notLikePre($value, $allowedWildChars = null): self
    {
        return $this->operator("%not_like", $value, $allowedWildChars);
    }

    /**
     * Alias of the notLikePre method.
     *
     * @param $value
     * @param $allowedWildChars = null
     * @return $this
     * @throws \Exception
     */
    public function notEndingWith($value, $allowedWildChars = null): self
    {
        return $this->operator("%not_like", $value, $allowedWildChars);
    }



    /**
     * Proxy to the operator method, with a predefined operator of "not_like%".
     *
     * @param $value
     * @param $allowedWildChars = null
     * @return $this
     * @throws \Exception
     */
    public function notLikePost($value, $allowedWildChars = null): self
    {
        return $this->operator("not_like%", $value, $allowedWildChars);
    }

    /**
     * Alias of the notLikePost method.
     *
     * @param $value
     * @param $allowedWildChars = null
     * @return $this
     * @throws \Exception
     */
    public function notStartingWith($value, $allowedWildChars = null): self
    {
        return $this->operator("not_like%", $value, $allowedWildChars);
    }



    /**
     * Proxy to the operator method, with a predefined operator of "in".
     *
     * @param array $value
     * @return $this
     * @throws \Exception
     */
    public function in($value): self
    {
        return $this->operator("in", $value);
    }

    /**
     * Proxy to the operator method, with a predefined operator of "not_in".
     *
     * @param array $value
     * @return $this
     * @throws \Exception
     */
    public function notIn($value): self
    {
        return $this->operator("not_in", $value);
    }


    /**
     * Proxy to the operator method, with a predefined operator of "between".
     *
     * @param $value1
     * @param $value2
     * @return $this
     * @throws \Exception
     */
    public function between($value1, $value2): self
    {
        return $this->operator("between", $value1, $value2);
    }


    /**
     * Proxy to the operator method, with a predefined operator of "not_between".
     *
     * @param $value1
     * @param $value2
     * @return $this
     * @throws \Exception
     */
    public function notBetween($value1, $value2): self
    {
        return $this->operator("not_between", $value1, $value2);
    }


    /**
     * Proxy to the operator method, with a predefined operator of "null".
     *
     * @return $this
     * @throws \Exception
     */
    public function isNull(): self
    {
        return $this->operator("null");
    }

    /**
     * Proxy to the operator method, with a predefined operator of "is_not_null".
     *
     * @return $this
     * @throws \Exception
     */
    public function isNotNull(): self
    {
        return $this->operator("is_not_null");
    }


    /**
     * Adds a condition list item using the current key and the given operator and value,
     * and returns this instance for chaining.
     *
     *
     *
     * The option is used only by the following operators:
     *
     * - for like/not like: string|null = null.
     *      The list of wild chars allowed (i.e. interpreted as such) inside the given value.
     *
     *      The possible wild chars in mysql are:
     *          - _ (underscore)
     *          - % (percent)
     *
     *      If null (by default), then none of the wild chars (% and _) will be interpreted.
     *
     *
     * - for between and not_between operators: mixed.
     *      The second value of the between comparison.
     *
     *
     * @param string $operator
     * @param mixed $value
     * @param null $option
     * @return $this
     * @throws \Exception
     */
    public function operator(string $operator, $value = null, $option = null): self
    {
        if (null === $this->key) {
            throw new SimplePdoWrapperException("Key not defined. Call the key method first.");
        }

        $this->conditionsList[] = [
            $this->key,
            $operator,
            $value,
            $option,
        ];

        $this->key = null; // reinitialize key for the next condition list item
        return $this;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Prepares the query portion and the markers corresponding to the actual condition list,
     * and appends it to the given query, and update the given markers accordingly.
     *
     * Note: the WHERE keyword is not appended by this method, nor are parenthesis.
     *
     * Note2: the query portion returned by this method is sql safe (i.e. protected against sql injection by
     * using :markers).
     *
     * Note3: the appended query parts are separated using the AND combination operator.
     *
     *
     * @param string $query
     * @param array $markers
     * @throws SimplePdoWrapperException
     */
    public function apply(string &$query, array &$markers = [])
    {
        $mkCpt = 0;
        $mk = 'wm_';
        $first = true;


        foreach ($this->getConditions() as $condition) {

            list($field, $operator, $value) = $condition;
            $option = $condition[3] ?? null;


            if (true === $first) {
                $first = false;
            } else {
                $query .= ' AND ';
            }

            if (null === $value && false === in_array($operator, [
                    "null",
                    "is_not_null",
                ])) {
                throw new SimplePdoWrapperException("The given value can't be null except for the null and is_not_null operations.");
            }


            switch ($operator) {
                case "=":
                case ">":
                case ">=":
                case "<":
                case "<=":
                case "!=":
                    $query .= '`' . $field . '` ' . $operator . ' :' . $mk . $mkCpt;
                    $markers[':' . $mk . $mkCpt] = $value;
                    $mkCpt++;
                    break;
                case "like":
                case "%like%":
                case "%like":
                case "like%":
                case "not_like":
                case "%not_like%":
                case "%not_like":
                case "not_like%":

                    $nbPercents = substr_count($operator, '%');
                    $sqlOperator = str_replace('_', ' ', trim($operator, '%'));
                    $query .= '`' . $field . '` ' . $sqlOperator . ' :' . $mk . $mkCpt;

                    // escaping the value if necessary
                    $desiredWildChars = $option;
                    $escapedChars = '%_';
                    if (null === $desiredWildChars) {
                        $escapedChars = '%_';
                    } else {
                        if (false !== strpos($desiredWildChars, '_')) {
                            $escapedChars = str_replace('_', '', $escapedChars);
                        }
                        if (false !== strpos($desiredWildChars, '%')) {
                            $escapedChars = str_replace('%', '', $escapedChars);
                        }
                    }
                    $pre = '';
                    $post = '';
                    if (2 === $nbPercents) {
                        $pre = '%';
                        $post = '%';
                    } elseif (1 === $nbPercents) {
                        $firstChar = substr($operator, 0, 1);
                        if ('%' === $firstChar) {
                            $pre = '%';
                        } else {
                            $post = '%';
                        }
                    }
                    $value = $pre . addcslashes($value, $escapedChars) . $post;


                    $markers[':' . $mk . $mkCpt] = $value;
                    $mkCpt++;
                    break;
                case "in":
                case "not_in":


                    if (is_array($value)) {
                        $sqlOperator = str_replace('_', ' ', $operator);

                        $sMarkers = '';
                        $cpt = 0;
                        foreach ($value as $val) {
                            if (0 !== $cpt) {
                                $sMarkers .= ', ';
                            }
                            $marker = ':' . $mk . $mkCpt;
                            $sMarkers .= $marker;
                            $markers[$marker] = $val;
                            $mkCpt++;
                            $cpt++;
                        }

                        $query .= '`' . $field . '` ' . $sqlOperator . ' (' . $sMarkers . ')';

                    } else {
                        $type = gettype($value);
                        throw new SimplePdoWrapperException("The value of the \"$operator\" operator should be an array, $type given.");
                    }
                    break;
                case "between":
                case "not_between":

                    $value2 = $option;
                    $sqlOperator = str_replace('_', ' ', $operator);

                    $marker = ':' . $mk . $mkCpt;
                    $markers[$marker] = $value;
                    $mkCpt++;
                    $marker2 = ':' . $mk . $mkCpt;
                    $markers[$marker2] = $value2;
                    $mkCpt++;
                    $query .= '`' . $field . '` ' . $sqlOperator . " $marker AND $marker2";

                    break;
                case "null":
                    $query .= '`' . $field . '` IS NULL';
                case "is_not_null":
                    $query .= '`' . $field . '` IS NOT NULL';
                    break;
                default:
                    break;
            }
        }
    }

    /**
     * Returns the conditions list.
     */
    public function getConditions(): array
    {
        return $this->conditionsList;
    }
}