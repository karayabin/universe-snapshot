<?php


namespace ListParams\ListBundle;

use ListParams\Controller\InfoFrame;
use ListParams\Controller\PaginationFrameInterface;
use ListParams\Controller\SortFrameInterface;
use ListParams\ListParamsInterface;

class LingListBundle extends ListBundle
{


    public static function createByItems(
        array $items,
        ListParamsInterface $params = null,
        PaginationFrameInterface $pagination = null,
        SortFrameInterface $sort = null
    )
    {
        $list = ListBundle::create()->setItems($items);

        if (null !== $params) {
            $list->setListParams($params);
        }

        if (null !== $pagination) {
            $list->setPagination($pagination);
        }

        if (null !== $sort) {
            $list->setSort($sort);
        }

        $list->setInfo(InfoFrame::create($params));

        return $list;
    }
}