<?php


namespace QueryFilterBox\ItemsGenerator;


use QueryFilterBox\QueryFilterBox\QueryFilterBoxInterface;

interface ItemsGeneratorInterface
{
    public function setFilterBox($name, QueryFilterBoxInterface $filterBox);

    /**
     * @param array $pool , parameters available to the system
     * @param int|null $fetchStyle , if defined, is a pdo constant passed
     * to the fetchAll method of pdo retrieving all items.
     * This might impact the structure of the returned array.
     *
     *
     * @return array relevant paginated items
     */
    public function getItems(array $pool, $fetchStyle = null);
}


