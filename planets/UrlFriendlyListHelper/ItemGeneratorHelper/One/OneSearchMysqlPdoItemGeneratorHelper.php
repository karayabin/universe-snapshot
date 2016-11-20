<?php

namespace UrlFriendlyListHelper\ItemGeneratorHelper\One;

/*
 * LingTalfi 2015-11-05
 */

use UrlFriendlyListHelper\ItemGenerator\ItemGeneratorInterface;
use UrlFriendlyListHelper\ItemGeneratorHelper\FilteringItemGeneratorHelperInterface;
use UrlFriendlyListHelper\ItemGeneratorHelper\ItemGeneratorHelper;

class OneSearchMysqlPdoItemGeneratorHelper extends ItemGeneratorHelper implements FilteringItemGeneratorHelperInterface
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

                $sql = $data['query'];
                $sqlCount = $data['countQuery'];

                $s = '';
                if (preg_match('!\swhere\s!mi', $sql, $m)) {
                    $s .= ' and ';
                }
                else {
                    $s .= ' where ';
                }

                
                $s .= '( ';
                $cpt = 0;
                $markers = [];
                $marker = 'mk_search';
                $markers[$marker] = '%' . str_replace('%', '\%', $search) . '%';
                foreach ($this->searchFields as $field) {
                    if(0 !== $cpt){
                        $s .= ' or ';
                    }
                    $s .= $field . ' like :' . $marker . '';
                    $cpt++;
                }
                $s .= ' )';


                $data['query'] = $sql . $s;
                $data['queryMarkers'] = $markers;
                $data['countQuery'] = $sqlCount . $s;
                $data['countQueryMarkers'] = $markers;
            }
        }

    }

    public function setSearchFields($searchFields)
    {
        $this->searchFields = $searchFields;
        return $this;
    }


}
