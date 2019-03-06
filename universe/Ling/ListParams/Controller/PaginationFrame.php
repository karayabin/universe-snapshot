<?php


namespace Ling\ListParams\Controller;


use Ling\Bat\UriTool;
use Ling\ListParams\ListParamsInterface;
use Ling\ListParams\Util\ListParamsUtil;


/**
 *
 * This class is basically an adapted implementation of the PaginationModel
 * (https://github.com/lingtalfi/Models/blob/master/Pagination/PaginationModel.php
 * for the ListParams environment.
 *
 *
 *
 *
 * == WARNING ============= WARNING ==========
 * THIS FRAME **REQUIRES** THE TOTAL NUMBER OF ITEMS (FROM THE MODEL)
 * ==========
 *
 *
 *
 * The model used is the following:
 *
 * - currentPage: int
 * - items: array
 *      - (itemIndex)
 *          - number: int
 *          - link: string
 *          - selected: bool
 *
 *
 *
 *
 */
class PaginationFrame implements PaginationFrameInterface
{
    private $currentPage;
    private $items;

    public function __construct()
    {
        $this->currentPage = 1;
        $this->items = [];
    }


    public static function createByParams(ListParamsInterface $params, callable $linkFormatter = null)
    {


        $namePage = $params->getNamePage();
        $nipp = $params->getNumberOfItemsPerPage();
        $nbItems = $params->getTotalNumberOfItems();
        $pool = $params->getPool();


        if (null === $linkFormatter) {
            $uriParams = $pool;
            $uriParams[$namePage] = '%s';
            ListParamsUtil::removeNonPersistentParams($uriParams, $params, 'page');
            $uri = UriTool::uri(null, $uriParams, true);
            $linkFormatter = function ($n) use ($uri) {
                return sprintf($uri, $n);
            };
        }

        return self::createByOptions([
            'nipp' => $nipp,
            'nbTotalItems' => $nbItems,
            'namePage' => $namePage,
            'pool' => $pool,
            'linkFormatter' => $linkFormatter,
        ]);

    }


    /**
     * @param array $options
     *
     * - nipp
     * - nbTotalItems
     * - namePage
     * - pool
     * - linkFormatter
     *
     *
     * @return static
     */
    public static function createByOptions(array $options)
    {
        $pool = (array_key_exists('pool', $options)) ? $options['pool'] : [];
        $options = array_replace([
            'nipp' => 20,
            'nbTotalItems' => 0,
            'namePage' => 'page',
            'pool' => [],
        ], $options);

        if (false === array_key_exists('linkFormatter', $options)) {
            $uriParams = $pool;
            $uriParams[$options['namePage']] = '%s';
            $uri = UriTool::uri(null, $uriParams, true);
            $linkFormatter = function ($n) use ($uri) {
                return sprintf($uri, $n);
            };
            $options['linkFormatter'] = $linkFormatter;
        }


        $nipp = (int)$options['nipp'];
        if ($nipp <= 0) {
            $nbPages = 1;
        } else {
            $nbPages = ceil($options['nbTotalItems'] / $nipp);
        }

        $o = new static();
        if (array_key_exists($options['namePage'], $options['pool'])) {
            $currentPage = (int)$options['pool'][$options['namePage']];
            if ($currentPage < 1) {
                $currentPage = 1;
            } elseif ($currentPage > $nbPages) {
                $currentPage = $nbPages;
            }
        } else {
            $currentPage = 1;
        }

        for ($i = 1; $i <= $nbPages; $i++) {
            $o->items[] = [
                'number' => $i,
                'link' => call_user_func($options['linkFormatter'], $i),
                'selected' => ($i === $currentPage),
            ];
        }
        $o->currentPage = $currentPage;
        return $o;
    }


    /**
     * @return int
     */
    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    public function setCurrentPage($currentPage)
    {
        $this->currentPage = $currentPage;
        return $this;
    }

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }

    public function setItems($items)
    {
        $this->items = $items;
        return $this;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    public function getArray()
    {
        return [
            'currentPage' => $this->currentPage,
            'items' => $this->items,
        ];
    }
}