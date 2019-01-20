<?php


namespace ListParams\Util;


use ListParams\ListParamsInterface;

class ListParamsUtil
{


    public static function applyParams(ListParamsInterface $params, array $rows)
    {
        $ret = [];


        $defaultNipp = 20;


        //--------------------------------------------
        // INIT
        //--------------------------------------------
        $searchItems = $params->getSearchItems();
        $sortItems = $params->getSortItems();
        $nipp = $params->getNumberOfItemsPerPage();
        $page = $params->getPage();


        //--------------------------------------------
        // FILTERING
        //--------------------------------------------
        if (count($searchItems) > 0) {
            foreach ($rows as $row) {

                $match = true;

                foreach ($searchItems as $col => $value) {

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
                    $ret[] = $row;
                }
            }
        } else {
            $ret = $rows;
        }
        //--------------------------------------------
        // SORTING
        //--------------------------------------------
        if (count($sortItems) > 0) {
            usort($ret, self::make_cmp($sortItems));
        }


        //--------------------------------------------
        // PREPARING NB TOTAL ITEMS
        //--------------------------------------------
        $nbTotalItems = count($ret);
        $params->setTotalNumberOfItems($nbTotalItems);


        //--------------------------------------------
        // SLICING
        //--------------------------------------------
        if ('all' !== $nipp) {
            if (null === $nipp) {
                $nipp = $defaultNipp;
                $params->setNumberOfItemsPerPage($nipp);
            }

            // DOUBLE CHECKING USER INPUT
            // page data might come from the user, so we double check
            if ($page < 1) {
                $page = 1;
            }
            $maxPage = ceil($nbTotalItems / $nipp);
            if ($page > $maxPage) {
                $page = $maxPage;
            }
            $offset = ($page - 1) * $nipp;
            $ret = array_slice($ret, $offset, $nipp);
        }


        return $ret;
    }


    public static function removeNonPersistentParams(array &$pool, ListParamsInterface $params, $except = null)
    {
        if (false === $params->hasPersistentPage() && 'page' !== $except) {
            unset($pool[$params->getNamePage()]);
            unset($pool[$params->getNameNipp()]);
        }
        if (false === $params->hasPersistentSort() && 'sort' !== $except) {
            unset($pool[$params->getNameSort()]);
            unset($pool[$params->getNameSortDir()]);
        }
        if (false === $params->hasPersistentSearch() && 'search' !== $except) {
            unset($pool[$params->getNameSearchExpression()]);
            unset($pool[$params->getNameSearchItems()]);
        }
    }


    public static function getFormTrail(array $pool, ListParamsInterface $params, $except = null)
    {
        $s = '';
        if (true === $params->hasPersistentPage() && 'page' !== $except) {
            $namePage = $params->getNamePage();
            $nameNipp = $params->getNameNipp();

            if (array_key_exists($namePage, $pool)) {
                $s .= self::getHiddenInput($namePage, $pool[$namePage]);
            }
            if (array_key_exists($nameNipp, $pool)) {
                $s .= self::getHiddenInput($nameNipp, $pool[$nameNipp]);
            }
        }
        if (true === $params->hasPersistentSort() && 'sort' !== $except) {
            $nameSort = $params->getNameSort();
            $nameSortDir = $params->getNameSortDir();

            if (array_key_exists($nameSort, $pool)) {
                $s .= self::getHiddenInput($nameSort, $pool[$nameSort]);
            }
            if (array_key_exists($nameSortDir, $pool)) {
                $s .= self::getHiddenInput($nameSortDir, $pool[$nameSortDir]);
            }
        }
        if (true === $params->hasPersistentSearch() && 'search' !== $except) {
            $nameSearch = $params->getNameSearchExpression();
            $nameSearchItems = $params->getNameSearchItems();

            if (array_key_exists($nameSearch, $pool)) {
                $s .= self::getHiddenInput($nameSearch, $pool[$nameSearch]);
            }
            if (array_key_exists($nameSearchItems, $pool)) {
                $s .= self::getHiddenInput($nameSearchItems, $pool[$nameSearchItems]);
            }
        }
        return $s;
    }


    public static function getFormTrailByPool(array $pool, array $except = [])
    {
        $s = '';
        foreach ($pool as $key => $value) {
            if (in_array($key, $except)) {
                continue;
            }
            if (is_array($value)) {
                foreach ($value as $val) {
                    $s .= self::getHiddenInput($key, $val);
                }
            } else {
                $s .= self::getHiddenInput($key, $value);
            }
        }
        return $s;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    private static function getHiddenInput($name, $value)
    {
        // name and value don't contain html special chars
        return '<input type="hidden" name="' . $name . '" value="' . $value . '">' . PHP_EOL;
    }

    /**
     * http://stackoverflow.com/questions/3232965/sort-multidimensional-array-by-multiple-keys/43700433#43700433
     */
    private static function make_cmp(array $sortValues)
    {
        return function ($a, $b) use (&$sortValues) {


            foreach ($sortValues as $column => $isAsc) {

                // skip "forgotten" unsearchable columns
                if (false === array_key_exists($column, $a)) {
                    continue;
                }

                if (is_string($a[$column])) {
                    $diff = strcmp($a[$column], $b[$column]);
                    if ($diff !== 0) {
                        if (true === $isAsc) {
                            return $diff;
                        }
                        return $diff * -1;
                    }
                } else { // float, int
                    $diff = ($a[$column] > $b[$column]);
                    if (true === $isAsc) {
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