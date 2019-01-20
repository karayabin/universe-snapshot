<?php


namespace ListParams\Controller;


interface PaginationFrameInterface
{


    /**
     * @return array:
     *
     * - currentPage
     * - items: array of item, each item:
     *                  - number
     *                  - link
     *                  - selected: bool
     *
     */
    public function getArray();
}