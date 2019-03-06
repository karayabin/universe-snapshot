<?php


namespace Ling\ListModifier\RequestModifier;


interface RequestModifierInterface
{

    public function addSortItem($column, $dir);

    /**
     * @param $field
     * @param $operand
     * @param string $operator
     *
     * Available operators are:
     * - <         (match if value < operand)
     * - <=
     * - >
     * - >=
     * - between    (this is the only operator which requires the two operands)
     * - =          (strict match)
     * - !=
     * - like
     * - %like     (matches only if the value of the column starts with the operand provided with this operator)
     * - like%     (matches only if the value of the column ends with the operand provided with this operator)
     *
     * @return mixed
     *
     */
    public function addSearchItem($field, $operand, $operator = "=", $operand2 = null);


    /**
     * @return array of column => dir
     */
    public function getSortItems();

    /**
     * @return array of field => [operand, operator]
     */
    public function getSearchItems();


    /**
     * @return array
     *      - 0: offset
     *      - 1: length
     */
    public function getLimit();

}


