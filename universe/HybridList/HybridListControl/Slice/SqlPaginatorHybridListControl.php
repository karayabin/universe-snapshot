<?php


namespace HybridList\HybridListControl\Slice;


use Bat\UriTool;
use HybridList\Exception\HybridListException;
use HybridList\HybridListControl\HybridListControl;
use HybridList\HybridListInterface;
use HybridList\ListShaper\ListShaper;
use HybridList\RequestGenerator\SqlRequestGenerator;
use HybridList\RequestShaper\RequestShaper;
use HybridList\SqlRequest\SqlRequestInterface;


/**
 *
 * The returned model is the page component of a listBundle model
 * https://github.com/lingtalfi/Models/tree/master/ListBundle
 *
 */
class SqlPaginatorHybridListControl extends HybridListControl
{

    private $userPage; // user (tried) page
    private $nipp;
    private $linkCallback;
    private $pageName;


    public function __construct()
    {
        parent::__construct();
        $this->userPage = 1;
        $this->nipp = 20;
        $this->pageName = "page";
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
        if ($requestGenerator instanceof SqlRequestGenerator) {


            $requestGenerator
                ->addRequestShaper(RequestShaper::create()
                    ->reactsTo($this->pageName)
                    ->setExecuteCallback(function ($input, SqlRequestInterface $r) {
                        $this->userPage = $input;
                    }));

            $requestGenerator
                ->setOnNbItemsReadyCb(function (SqlRequestGenerator $generator, $nbItems) use ($context) {

                    $sqlRequest = $generator->getSqlRequest();


                    $linkFn = $this->linkCallback;
                    if (null === $linkFn) {
                        $uriParams = $context;
                        $uriParams[$this->pageName] = '%s';
                        $uri = UriTool::uri(null, $uriParams, false);
                        $linkFn = function ($i, $isSelected) use ($uri) {
                            return sprintf($uri, $i);

                        };
                    }

                    if ($nbItems) {

                        $nipp = $this->nipp; // is the user allowed to override it?
                        $maxPage = (int)ceil($nbItems / $nipp);
                        $page = (int)$this->userPage;
                        if ($page < 1) {
                            $page = 1;
                        } elseif ($page > $maxPage) {
                            $page = $maxPage;
                        }
                        $offset = ($page - 1) * $nipp;


                        $sqlRequest->setLimit($offset, $nipp);
                    }
                    else{
                        $maxPage = 1;
                        $page = 1;
                    }


                    //--------------------------------------------
                    // UPDATE THE MODEL
                    //--------------------------------------------
                    $items = [];
                    for ($i = 1; $i <= $maxPage; $i++) {
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

                });

            return $this;
        } else {
            throw new HybridListException("This object only works with SqlRequestGenerator");
        }
    }

}