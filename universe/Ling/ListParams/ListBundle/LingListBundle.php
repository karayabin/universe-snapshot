<?php


namespace Ling\ListParams\ListBundle;

use Ling\ListParams\Controller\InfoFrame;
use Ling\ListParams\Controller\PaginationFrameInterface;
use Ling\ListParams\Controller\SortFrameInterface;
use Ling\ListParams\ListParamsInterface;

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