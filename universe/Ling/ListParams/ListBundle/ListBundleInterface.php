<?php


namespace Ling\ListParams\ListBundle;


use Ling\ListParams\Controller\InfoFrame;
use Ling\ListParams\Controller\InfoFrameInterface;
use Ling\ListParams\Controller\PaginationFrame;
use Ling\ListParams\Controller\PaginationFrameInterface;
use Ling\ListParams\Controller\SortFrame;
use Ling\ListParams\Controller\SortFrameInterface;
use Ling\ListParams\ListParamsInterface;

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