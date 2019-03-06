<?php

namespace Ling\UrlFriendlyListHelper\ItemGeneratorHelper\One;

/*
 * LingTalfi 2015-11-05
 */

use Ling\UrlFriendlyListHelper\ItemGenerator\ItemGeneratorInterface;
use Ling\UrlFriendlyListHelper\ItemGeneratorHelper\ItemGeneratorHelper;

class OneSortMysqlPdoItemGeneratorHelper extends ItemGeneratorHelper
{
    public static function create()
    {
        return new static();
    }

    public function customize(array &$data, ItemGeneratorInterface $g)
    {
        if (null !== ($sort = $this->getPlugin()->getWidgetParamOrDefault('sort'))) {
            $sens = $this->getPlugin()->getWidgetParamOrDefault('sens');
            $sql = $data['query'];
            $sql .= ' order by ' . $sort . ' ' . $sens;
            $data['query'] = $sql;
        }

    }
}
