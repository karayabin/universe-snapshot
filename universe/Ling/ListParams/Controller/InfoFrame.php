<?php


namespace Ling\ListParams\Controller;


use Ling\Bat\UriTool;
use Ling\ListParams\ListParamsInterface;
use Ling\ListParams\Util\ListParamsUtil;


/**
 *
 * The following model is used:
 *
 * - offsetStart: int, the index of the first item of the currently displayed slice
 * - offsetEnd: int, the index of the last item of the currently displayed slice
 * - nbTotalItems: int, the total number of items
 * - page: int, the current page number
 * - nipp: int, the number of items per page
 * - ...could be extended
 *
 *
 *
 */
class InfoFrame implements InfoFrameInterface
{

    private $offsetStart;
    private $offsetEnd;
    private $nbTotalItems;
    private $page;
    private $nipp;


    public function __construct()
    {
        $this->offsetStart = 0;
        $this->offsetEnd = 0;
        $this->nbTotalItems = 0;
        $this->page = 1;
        $this->nipp = 20;
    }


    public static function create(ListParamsInterface $params)
    {
        $o = new self();
        $nipp = $params->getNumberOfItemsPerPage();
        $nbTotalItems = $params->getTotalNumberOfItems();
        $page = $params->getPage();
        $offsetStart = ($page - 1) * $nipp;
        $offsetEnd = $offsetStart + $nipp;
        if ($offsetEnd > $nbTotalItems) {
            $offsetEnd = $nbTotalItems;
        }
        $o->offsetStart = $offsetStart;
        $o->offsetEnd = $offsetEnd;
        $o->nbTotalItems = $nbTotalItems;
        $o->page = $page;
        $o->nipp = $nipp;
        return $o;
    }


    public static function createByOptions(array $options)
    {
        $o = new self();
        $nipp = array_key_exists('nipp', $options) ? $options['nipp'] : 20;
        $nbTotalItems = array_key_exists('nbTotalItems', $options) ? $options['nbTotalItems'] : 0;
        $page = array_key_exists('page', $options) ? $options['page'] : 1;
        $offsetStart = ($page - 1) * $nipp;
        $offsetEnd = $offsetStart + $nipp;
        if ($offsetEnd > $nbTotalItems) {
            $offsetEnd = $nbTotalItems;
        }
        $o->offsetStart = $offsetStart;
        $o->offsetEnd = $offsetEnd;
        $o->nbTotalItems = $nbTotalItems;
        $o->page = $page;
        $o->nipp = $nipp;
        return $o;
    }


    /**
     * @return array
     */
    public function getArray()
    {
        return [
            'offsetStart' => $this->offsetStart,
            'offsetEnd' => $this->offsetEnd,
            'nbTotalItems' => $this->nbTotalItems,
            'page' => $this->page,
            'nipp' => $this->nipp,
        ];
    }
}