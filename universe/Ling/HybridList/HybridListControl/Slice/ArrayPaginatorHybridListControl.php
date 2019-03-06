<?php


namespace Ling\HybridList\HybridListControl\Slice;


use Ling\Bat\UriTool;
use Ling\HybridList\Exception\HybridListException;
use Ling\HybridList\HybridListControl\HybridListControl;
use Ling\HybridList\HybridListInterface;
use Ling\HybridList\ListShaper\ListShaper;
use Ling\HybridList\RequestGenerator\RequestGenerator;
use Ling\HybridList\RequestGenerator\SqlRequestGenerator;
use Ling\HybridList\RequestShaper\RequestShaper;
use Ling\HybridList\SqlRequest\SqlRequestInterface;


/**
 *
 * The returned model is the page component of a listBundle model
 * https://github.com/lingtalfi/Models/tree/master/ListBundle
 *
 */
class ArrayPaginatorHybridListControl extends HybridListControl
{

    private $userPage; // user (tried) page
    private $nipp;
    private $linkCallback;
    private $pageName;


    private $done;


    public function __construct()
    {
        parent::__construct();
        $this->userPage = 1;
        $this->nipp = 20;
        $this->pageName = "page";
        $this->done = false;
    }


    /**
     * @param callable $linkCallback
     *              str:link   fn ( int:pageNumber, bool:isSelected )
     * @return $this
     */
    public function setLinkCallback(callable $linkCallback)
    {
        $this->linkCallback = $linkCallback;
        return $this;
    }


    public function setNumberOfItemsPerPage($nipp)
    {
        $this->nipp = $nipp;
        return $this;
    }

    public function setPageName($pageName)
    {
        $this->pageName = $pageName;
        return $this;
    }


    public function prepareHybridList(HybridListInterface $list, array $context)
    {
        $requestGenerator = $list->getRequestGenerator();
//        if ($requestGenerator instanceof RequestGenerator) {
//            $requestGenerator->setOnGetItemsAfterCallback(function (array $items) {
//                $this->nbItems = count($items);
//                $this->items = $items;
//            });
//        }


        $list
            ->addListShaper(ListShaper::create()
                ->reactsTo([$this->pageName, "*"])
                ->setPriority(1000)// execute after the other
                ->setExecuteCallback(function ($input, array &$boxes, array &$info = [], $originalBoxes) use ($context) {
                    if (false === $this->done) {
                        $this->done = true;


                        $nbItems = count($boxes);


                        // what's the current page?
                        $page = 1;
                        if ('*' !== $input) {
                            $page = (int)$input;
                        }

                        // what's the maximum number of pages?
                        $nipp = $this->nipp;
                        if ($nipp < 1) {
                            $nipp = 1;
                        }
                        $nbPages = ceil($nbItems / $nipp);
                        if ($page > $nbPages) {
                            $page = $nbPages;
                        }

                        // now that we know the current page, let's return the desired slice
                        $boxes = array_slice($boxes, ($page - 1)*$nipp, $nipp, true);


                        //--------------------------------------------
                        // UPDATE THE MODEL
                        //--------------------------------------------
                        $items = [];
                        $linkFn = $this->linkCallback;
                        if (null === $linkFn) {
                            $uriParams = $context;
                            $uriParams[$this->pageName] = '%s';
                            $uri = UriTool::uri(null, $uriParams, false);
                            $linkFn = function ($i, $isSelected) use ($uri) {
                                return sprintf($uri, $i);

                            };
                        }

                        for ($i = 1; $i <= $nbPages; $i++) {
                            $selected = ($page === $i);
                            $items[] = [
                                "number" => $i,
                                "link" => call_user_func($linkFn, $i, $selected),
                                "selected" => $selected,
                            ];
                        }
                        $this->model = [
                            "currentPage" => $page,
                            "items" => $items,
                        ];


                        //--------------------------------------------
                        // ALSO UPDATE INFO
                        //--------------------------------------------
                        $info['sliceNumber'] = $nbPages;
                        $info['sliceLength'] = $nipp;
                        $info['totalNumberOfItems'] = $nbItems;
                        $info['offset'] = ($page - 1) * $nipp;
                    }

                })
            );

    }

}