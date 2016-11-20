<?php

namespace UrlFriendlyListHelper\ItemGeneratorHelper\One;

/*
 * LingTalfi 2015-11-04
 */

use UrlFriendlyListHelper\ItemGenerator\ItemGeneratorInterface;
use UrlFriendlyListHelper\ItemGeneratorHelper\ItemGeneratorHelper;

class OneSortArrayItemGeneratorHelper extends ItemGeneratorHelper
{
    public static function create()
    {
        return new static();
    }

    public function customize(array &$data, ItemGeneratorInterface $g)
    {
        if (null !== ($sort = $this->getPlugin()->getWidgetParamOrDefault('sort'))) {
            $sens = $this->getPlugin()->getWidgetParamOrDefault('sens');
            $ret = $data['items'];
            usort($ret, function (array $a, array $b) use ($sens, $sort) {
                if ('asc' === $sens) {
                    return $a[$sort] > $b[$sort];
                }
                return $a[$sort] < $b[$sort];
            });
            $data['items'] = $ret;
        }

    }
}
