<?php

namespace UrlFriendlyListHelper\ItemGeneratorHelper\One;

/*
 * LingTalfi 2015-11-04
 */

use UrlFriendlyListHelper\ItemGenerator\ItemGeneratorInterface;
use UrlFriendlyListHelper\ItemGeneratorHelper\ItemGeneratorHelper;

class OnePaginationArrayItemGeneratorHelper extends ItemGeneratorHelper
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
            $nbTotalPages = (int)ceil(count($data['items']) / $nbItemsPerPage);
            if ($currentPage > $nbTotalPages) {
                $currentPage = $nbTotalPages;
            }


            $offset = $nbItemsPerPage * ($currentPage - 1);
            $data['items'] = array_slice($data['items'], $offset, $nbItemsPerPage);
        }

    }
}
