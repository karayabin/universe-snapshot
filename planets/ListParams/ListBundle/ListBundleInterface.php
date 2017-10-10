<?php


namespace ListParams\ListBundle;


use ListParams\Controller\InfoFrame;
use ListParams\Controller\InfoFrameInterface;
use ListParams\Controller\PaginationFrame;
use ListParams\Controller\PaginationFrameInterface;
use ListParams\Controller\SortFrame;
use ListParams\Controller\SortFrameInterface;
use ListParams\ListParamsInterface;

interface ListBundleInterface
{


    /**
     * @return array, rows representing the list items
     */
    public function getListItems();

    /**
     * @return ListParamsInterface|null
     */
    public function getListParams();

    /**
     * @return PaginationFrameInterface|null
     */
    public function getPaginationFrame();

    /**
     * @return SortFrameInterface|null
     */
    public function getSortFrame();

    /**
     * @return InfoFrameInterface|null
     */
    public function getInfoFrame();



//    /**
//     * @return SearchExpressionFrame|null
//     */
//    public function getSearchExpressionFrame();
//
//
//    /**
//     * @return SearchItemsFrame|null
//     */
//    public function getSearchItemsFrame();

}