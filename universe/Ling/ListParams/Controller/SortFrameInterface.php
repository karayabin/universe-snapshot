<?php


namespace Ling\ListParams\Controller;


interface SortFrameInterface
{


    /**
     * @return array:
     *
     * - formMethod: string (get|post)
     * - formTrail: string
     * - nameSort: string
     * - nameSortDir: string
     * - sortItems: array
     *      - (item)
     *          - value: string
     *          - label: string|null.
     *                      If null, the translated version of the value will be used.
     *          - selected: bool
     * - valueSortDirAsc: string
     * - valueSortDirDesc: string
     * - selectedSortDirAsc: bool
     * - selectedSortDirDesc: bool
     *
     */
    public function getArray();
}