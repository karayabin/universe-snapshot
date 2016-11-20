<?php

namespace UrlFriendlyListHelper\ItemGeneratorHelper\One;

/*
 * LingTalfi 2015-11-04
 */

use UrlFriendlyListHelper\ItemGenerator\ItemGeneratorInterface;
use UrlFriendlyListHelper\ItemGeneratorHelper\ItemGeneratorHelper;

class OnePaginationMysqlPdoItemGeneratorHelper extends ItemGeneratorHelper
{
    public static function create()
    {
        return new static();
    }

    public function customize(array &$data, ItemGeneratorInterface $g)
    {
        if (null !== ($currentPage = $this->getPlugin()->getWidgetParamOrDefault('page'))) {


            $nbItemsPerPage = $this->getPlugin()->getPluginParam('nbItemsPerPage', 10);

            $currentPage = (int)$currentPage;

            if ($currentPage < 1) {
                $currentPage = 1;
            }
            $nbTotalPages = (int)ceil($g->getNbTotalItems() / $nbItemsPerPage);

            if ($nbTotalPages < 1) {
                $nbTotalPages = 1;
            }
            if ($currentPage > $nbTotalPages) {
                $currentPage = $nbTotalPages;
            }


            $offset = $nbItemsPerPage * ($currentPage - 1);


            $limit = ' limit ' . $offset . ', ' . $nbItemsPerPage;

            $data['query'] .= $limit;
            $data['countQuery'] .= $limit;
        }

    }
}
