<?php


namespace Ling\Models\Pagination\Lee;


use Ling\Bat\UriTool;
use Ling\Models\Pagination\PaginationModel;


/**
 * // your app
 * $nbItems = 13;
 * $nipp = 2;
 *
 *
 *
 * // creating the model
 * $pagination = LeePaginationModel::createByInfo($nbItems, $nipp);
 *
 *
 * if (false === 'demo') { // creating the model alternative
 *      $uri = UriTool::uri(null, ['page' => '%s'], false);
 *      $linkFormatter = function ($n) use ($uri) {
 *          return sprintf($uri, $n);
 *      };
 *
 *      $pagination = LeePaginationModel::createByInfo($nbItems, $nipp, 'page', $linkFormatter);
 * }
 *
 * az($pagination->getArray());
 *
 *
 *
 */
class LeePaginationModel extends PaginationModel
{
    private $currentPage;
    private $items;
    private $namePage;
    private $pool;

    public function __construct()
    {
        $this->currentPage = 1;
        $this->items = [];
        $this->pool = $_GET;
        $this->namePage = 'page';
    }


    /**
     * @param $nbItems
     * @param $nipp
     * @param string $namePage
     * @param callable|null $linkFormatter
     *                  string  fn ( pageNumber )
     * @return static
     */
    public static function createByInfo($nbItems, $nipp, $namePage = 'page', callable $linkFormatter = null)
    {


        if (null === $linkFormatter) {


            $uri = UriTool::uri(null, [$namePage => '%s'], false);
            $linkFormatter = function ($n) use ($uri) {
                return sprintf($uri, $n);
            };
        }

        $nbPages = ceil($nbItems / $nipp);

        $o = new static();
        if (array_key_exists($namePage, $o->pool)) {
            $currentPage = (int)$o->pool[$namePage];
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
                'link' => call_user_func($linkFormatter, $i),
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