<?php


namespace ListParams\Model;


use ListParams\Exception\ListParamsException;
use ListParams\ListParamsInterface;

class QueryDecorator
{

    /**
     * Whether or not the user is allowed to modify those values
     */
    private $allowSort;
    private $allowSearch;
    private $allowPage;
    private $allowNipp;

    /**
     * Which values the user is allowed to modify for search
     */
    private $allowedSearchFields;

    /**
     * Which values the user is allowed to modify for sort.
     * If the key is provided (i.e non numeric), then it represents the
     * real field, while the value represents the symbolic field.
     *
     * This mechanism allows the developer to hide the table fields to the user.
     * For instance, with this mechanism you can have a "price" field in the uri, which translates
     * to a "p._sale_price_with_tax" field in this class.
     *
     */
    private $allowedSortFields;


    private $defaultNipp;
    private $defaultSort;
    private $defaultSortDir;


    public function __construct()
    {
        $this->allowSort = true;
        $this->allowSearch = true;
        $this->allowPage = true;
        $this->allowNipp = true;
        $this->allowedSearchFields = [];
        $this->allowedSortFields = [];
        $this->defaultNipp = 20;
    }

    public static function create()
    {
        return new static();
    }


    /**
     * Potentially decorates:
     *
     * - the query with
     *          WHERE...
     *          ORDER BY...
     *          LIMIT...
     * - the countQuery with
     *          WHERE...
     *
     * - the params
     *          ->setAllowedSortFields
     *          ->setAllowedSearchFields
     *
     * @param $query
     * @param $countQuery
     * @param array $markers
     * @param ListParamsInterface|null $params
     * @throws ListParamsException
     */
    public function decorate(&$query, &$countQuery, array &$markers = [], ListParamsInterface $params = null)
    {

        if (null !== $params) {
            $params->setAllowedSortFields($this->allowedSortFields);
            $params->setAllowedSearchFields($this->allowedSearchFields);
        }


        if (true === $this->allowSearch && null !== $params) {
            /**
             * Search expression?
             */
            $searchExpression = $params->getSearchExpression();
            if ('' !== $searchExpression) {
                if ($this->allowedSearchFields) {

                    $markers['search'] = '%' . str_replace('%', '\%', $searchExpression) . '%';

                    $c = 0;
                    if (false === $this->hasWhere($query)) {
                        $query .= " where ( ";
                        $countQuery .= " where ( ";
                    } else {
                        $query .= " and ( ";
                        $countQuery .= " and ( ";
                    }

                    foreach ($this->allowedSearchFields as $field) {
                        if (0 !== $c++) {
                            $query .= ' or ';
                            $countQuery .= ' or ';
                        }
                        $query .= "$field like :search";
                        $countQuery .= "$field like :search";
                    }
                    $query .= " )";
                    $countQuery .= " )";
                }
            }


            /**
             * Search items?
             */
            $searchItems = $params->getSearchItems();
            if (is_array($searchItems)) {
                if ($searchItems) {
                    $valid = false;
                    $markerCount = 0;
                    foreach ($searchItems as $field => $searchItem) {
                        if (in_array($field, $this->allowedSearchFields)) {

                            if (false === $valid) {
                                if (false === $this->hasWhere($query)) {
                                    $query .= " where ";
                                    $countQuery .= " where ";
                                } else {
                                    $query .= " and ";
                                    $countQuery .= " and ";
                                }
                                $valid = true;
                            }

                            if (0 !== $markerCount) {
                                $query .= " and ";
                                $countQuery .= " and ";
                            }
                            $marker = "m" . $markerCount++;
                            if (is_int($searchItem)) {
                                $query .= "$field = " . (int)$searchItem;
                                $countQuery .= "$field = " . (int)$searchItem;
                            } else {
                                $query .= "$field like :$marker";
                                $countQuery .= "$field like :$marker";
                                $markers[$marker] = '%' . str_replace('%', '\%', $searchItem) . '%';
                            }

                        } else {
                            $this->onSearchFieldNotAllowed($field);
                        }
                    }
                }
            } else {
                throw new ListParamsException("Oops, this form of searchItem is not recognized yet, you may want to upgrade the code");
            }
        }


        if (true === $this->allowSort && null !== $params) {
            $sortItems = $params->getSortItems();
            $valid = false;
            $c = 0;

            if (empty($sortItems)) {
                if (null !== $this->defaultSort) {
                    $sortItems[$this->defaultSort] = $this->defaultSortDir;
                }
            }

            foreach ($sortItems as $field => $isAsc) {
                if (false !== ($alias = array_search($field, $this->allowedSortFields, true))) {

                    if (true === is_numeric($alias)) {
                        $alias = $field;
                    }

                    if (false === $valid) {
                        $query .= " order by ";
                        $valid = true;
                    }

                    if (0 !== $c++) {
                        $query .= ', ';
                    }

                    $query .= "$alias ";
                    if (true === $isAsc) {
                        $query .= 'asc';
                    } else {
                        $query .= 'desc';
                    }
                } else {
                    $this->onSortFieldNotAllowed($field);
                }
            }
        }


        if (true === $this->allowPage && null !== $params) {
            $page = $params->getPage();
            if (true === $this->allowNipp) {
                $nipp = $params->getNumberOfItemsPerPage();
                if (null === $nipp) {
                    $nipp = $this->defaultNipp;
                    $params->setNumberOfItemsPerPage($nipp);
                }
            } else {
                $nipp = $this->defaultNipp;
            }
            $offset = ($page - 1) * $nipp;
            $query .= " limit $offset, $nipp";
        }
    }


    //--------------------------------------------
    // SETTERS
    //--------------------------------------------
    public function setAllowSort($allowSort)
    {
        $this->allowSort = $allowSort;
        return $this;
    }

    public function setAllowSearch($allowSearch)
    {
        $this->allowSearch = $allowSearch;
        return $this;
    }

    public function setAllowPage($allowPage)
    {
        $this->allowPage = $allowPage;
        return $this;
    }

    public function setAllowNipp($allowNipp)
    {
        $this->allowNipp = $allowNipp;
        return $this;
    }

    public function setAllowedSearchFields($allowedSearchFields)
    {
        $this->allowedSearchFields = $allowedSearchFields;
        return $this;
    }

    public function setAllowedSortFields($allowedSortFields)
    {
        $this->allowedSortFields = $allowedSortFields;
        return $this;
    }

    public function setDefaultNipp($defaultNipp)
    {
        $this->defaultNipp = $defaultNipp;
        return $this;
    }

    public function setDefaultSort($sort, $sortDir)
    {
        $this->defaultSort = $sort;
        $this->defaultSortDir = $sortDir;
        return $this;
    }



    //--------------------------------------------
    // HOOKS
    //--------------------------------------------
    protected function onSearchFieldNotAllowed($invalidSearchField) // override me
    {

    }

    protected function onSortFieldNotAllowed($invalidSortField) // override me
    {

    }

    //--------------------------------------------
    //
    //--------------------------------------------
    private function hasWhere($query)
    {
        if (false === stripos($query, ' where ')) {
            return false;
        }
        return true;
    }
}