<?php

namespace UrlFriendlyListHelper\ItemGeneratorHelper\One;

/*
 * LingTalfi 2015-11-04
 */

use UrlFriendlyListHelper\ItemGenerator\ItemGeneratorInterface;
use UrlFriendlyListHelper\ItemGeneratorHelper\FilteringItemGeneratorHelperInterface;
use UrlFriendlyListHelper\ItemGeneratorHelper\ItemGeneratorHelper;

class OneSearchArrayItemGeneratorHelper extends ItemGeneratorHelper implements FilteringItemGeneratorHelperInterface
{

    /**
     * @var array empty means none
     */
    private $searchFields;

    public function __construct()
    {
        $this->searchFields = [];
    }


    public static function create()
    {
        return new static();
    }

    public function customize(array &$data, ItemGeneratorInterface $g)
    {
        if (null !== ($search = $this->getPlugin()->getWidgetParamOrDefault('search'))) {

            if ('' !== $search) {

                $ret = $data['items'];
                $ret = array_filter($ret, function (array &$row) use ($search) {
                    $found = false;
                    foreach ($this->searchFields as $field) {
                        if (false !== strpos($row[$field], $search)) {
                            $found = true;
                            break;
                        }
                    }
                    return $found;
                });
                $data['items'] = $ret;
            }
        }

    }

    public function setSearchFields($searchFields)
    {
        $this->searchFields = $searchFields;
        return $this;
    }


}
