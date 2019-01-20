<?php


namespace RowsGenerator;


/**
 * This rowGenerator implements the three kinds of searchItems:
 * - searchExpression
 * - searchFilter
 * - searchConstraint
 *
 */
class ArrayRowsGenerator extends AbstractRowsGenerator
{
    private $realPage;

    public function getRows()
    {
        $rows = [];


        //--------------------------------------------
        // FILTERING
        //--------------------------------------------
        foreach ($this->array as $row) {
            if (count($this->searchItems) > 0) {

                $match = true;

                foreach ($this->searchItems as $col => $value) {

                    // some extra columns might not be searchable
                    if (false === array_key_exists($col, $row)) {
                        continue;
                    }


                    // searchExpression
                    if (is_string($value) || is_numeric($value)) {
                        $value = (string)$value;
                        if (false === stripos($row[$col], $value)) {
                            $match = false;
                            break;
                        }
                    } // searchConstraint
                    elseif (is_array($value)) {
                        $rowVal = $row[$col];
                        list($operator, $operand) = $value;
                        switch ($operator) {
                            case '<':
                                $match = ($rowVal < $operand);
                                break;
                            case '<=':
                                $match = ($rowVal <= $operand);
                                break;
                            case '>':
                                $match = ($rowVal > $operand);
                                break;
                            case '>=':
                                $match = ($rowVal >= $operand);
                                break;
                            case 'between':
                                $operand2 = $value[2];
                                $match = ($rowVal >= $operand && $rowVal <= $operand2);
                                break;
                            case '=':
                                $match = ($rowVal === $operand);
                                break;
                            case '!=':
                                $match = ($rowVal !== $operand);
                                break;
                            case 'like':
                                $match = (false !== (stripos($rowVal, $operand)));
                                break;
                            case '%like':
                                $match = (0 === (stripos($rowVal, $operand)));
                                break;
                            case 'like%':
                                $match = (0 === (stripos(strrev($rowVal), strrev($operand))));
                                break;
                            default:
                                break;
                        }
                        if (false === $match) {
                            break;
                        }
                    } // searchFilter
                    elseif (is_callable($value)) {
                        if (false === call_user_func($value, $row[$col])) {
                            $match = false;
                            break;
                        }
                    }
                }

                if (true === $match) {
                    $rows[] = $row;
                }
            } else {
                $rows = $this->array;
            }
        }

        //--------------------------------------------
        // SORTING
        //--------------------------------------------
        if (count($this->sortValues) > 0) {
            usort($rows, $this->make_cmp($this->sortValues));
        }


        // preparing nbTotalItems
        $this->nbTotalItems = count($rows);


        //--------------------------------------------
        // SLICING
        //--------------------------------------------
        if ('all' !== $this->nipp) {
            // DOUBLE CHECKING USER INPUT
            // page data might come from the user, so we double check
            $page = $this->page;
            if ($page < 1) {
                $page = 1;
            }
            $maxPage = ceil($this->nbTotalItems / $this->nipp);
            if ($page > $maxPage) {
                $page = $maxPage;
            }
            $this->realPage = $page;
            $offset = ($page - 1) * $this->nipp;
            $rows = array_slice($rows, $offset, $this->nipp);
        } else {
            $this->realPage = 1;
        }


        return $rows;
    }

    public function getPage()
    {
        return $this->realPage;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    public function setArray(array $array)
    {
        $this->array = $array;
        return $this;
    }
    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * http://stackoverflow.com/questions/3232965/sort-multidimensional-array-by-multiple-keys/43700433#43700433
     */
    private function make_cmp(array $sortValues)
    {
        return function ($a, $b) use (&$sortValues) {


            foreach ($sortValues as $column => $sortDir) {

                // skip "forgotten" unsearchable columns
                if (false === array_key_exists($column, $a)) {
                    continue;
                }

                if (is_string($a[$column])) {
                    $diff = strcmp($a[$column], $b[$column]);
                    if ($diff !== 0) {
                        if ('asc' === $sortDir) {
                            return $diff;
                        }
                        return $diff * -1;
                    }
                } else { // float, int
                    $diff = ($a[$column] > $b[$column]);
                    if ('asc' === $sortDir) {
                        return $diff;
                    } else {
                        return !$diff;
                    }
                }
            }
            return 0;
        };
    }


}