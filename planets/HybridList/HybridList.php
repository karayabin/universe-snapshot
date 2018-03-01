<?php


namespace HybridList;


use HybridList\Exception\HybridListException;
use HybridList\HybridListControl\HybridListControlInterface;
use HybridList\ListShaper\ListShaperInterface;
use HybridList\RequestGenerator\RequestGeneratorInterface;
use HybridList\RequestGenerator\SqlRequestGenerator;
use HybridList\RequestShaper\RequestShaperInterface;
use HybridList\Shaper\ShaperInterface;


/**
 *
 * With
 *
 *
 */
class HybridList implements HybridListInterface
{

    /**
     * @var RequestGeneratorInterface
     */
    private $requestGenerator;
    /**
     * @var string, the key through which we access the sort identifier (in list parameters)
     */
    private $sortKey;
    private $listParameters;
    private $listShapers;

    /**
     * @var HybridListControlInterface[]
     */
    private $controls;
    private $controlsContext;
    private static $allowedListInfoOverride = [
        'sliceNumber',
        'sliceLength',
        'totalNumberOfItems',
        'offset',
    ];

    public function __construct()
    {
        $this->requestGenerator = null;
        $this->sortKey = "sort";
        $this->listParameters = [];
        $this->listShapers = [];
        $this->controls = [];
        $this->controlsContext = [];
    }

    public static function create()
    {
        return new static();
    }


    public function execute()
    {
        $listInfo = [
            'items' => [],
            'sliceNumber' => null,
            'sliceLength' => null,
            'totalNumberOfItems' => 0,
            'offset' => null,
        ];


        //--------------------------------------------
        // PREPARE ALL CONTROLS NOW
        //--------------------------------------------
        $context = $this->controlsContext;
        foreach ($this->controls as $control) {
            $control->prepareHybridList($this, $context);
        }


        //--------------------------------------------
        // TREAT SQL PART
        //--------------------------------------------
        if ($this->requestGenerator instanceof SqlRequestGenerator) {
            $sqlRequest = $this->requestGenerator->getSqlRequest();
            $params2Shapers = $this->getParam2Shapers($this->requestGenerator->getRequestShapers());

            //--------------------------------------------
            // NOW EXECUTE THE RELEVANT SHAPERS
            //--------------------------------------------
            foreach ($this->listParameters as $key => $value) {
                if (array_key_exists($key, $params2Shapers)) {
                    /**
                     * @var $shaper RequestShaperInterface
                     */
                    $shaper = $params2Shapers[$key];
                    $shaper->execute($value, $sqlRequest);
                }
            }
        }

        //--------------------------------------------
        // NOW GET THE BASE LIST
        //--------------------------------------------
        $items = $this->requestGenerator->getItems();



        //--------------------------------------------
        // COLLECT ALL THE INFO THAT WE CAN FROM THE SQL
        //--------------------------------------------
        if ($this->requestGenerator instanceof SqlRequestGenerator) {
            $info = $this->requestGenerator->getAfterItemsInfo();
            self::mergeInfo($info, $listInfo);
        }


        //--------------------------------------------
        // TREAT THE PHP PART
        //--------------------------------------------
        if ($items) {
            $items = $this->preparePhpItems($items);
            $originalItems = $items;

            /**
             * Note: as for now the list shapers' priority
             * affect both the order of listShapers and parameters,
             * while technically only order of parameters was (originally) required.
             * This is private stuff anyway.
             */
            $listShapers = $this->getOrderedListShapers();
            $listParameters = self::orderListParameters($listShapers, $this->listParameters);

            if ($listShapers) {

                //--------------------------------------------
                // PROVIDE OPPORTUNITY FOR LIST SHAPERS TO PREPARE WITH ORIGINAL ITEMS
                //--------------------------------------------
                foreach ($listShapers as $listShaper) {
                    /**
                     * @var $listShaper ListShaperInterface
                     */
                    $listShaper->prepareWithOriginalItems($originalItems);
                }


                //--------------------------------------------
                // BUILD THE ARRAY OF PARAMETERS => SHAPERS TO EXECUTE
                //--------------------------------------------
                $params2Shapers = $this->getParam2Shapers($listShapers);


                //--------------------------------------------
                // NOW EXECUTE THE RELEVANT SHAPERS
                //--------------------------------------------
                foreach ($listParameters as $key => $value) {
                    if (array_key_exists($key, $params2Shapers)) {
                        /**
                         * @var $shaper ListShaperInterface
                         */
                        $shaper = $params2Shapers[$key];
                        $shaper->execute($value, $items, $listInfo, $originalItems);
                    }
                }

                //--------------------------------------------
                // WILDCARD SHAPER
                //--------------------------------------------
                if (array_key_exists("*", $params2Shapers)) {
                    foreach ($params2Shapers["*"] as $shaper) {
                        $shaper->execute("*", $items, $listInfo, $originalItems);
                    }
                }
            }


            //--------------------------------------------
            //
            //--------------------------------------------
            $listInfo['items'] = $items;
        }
        return $listInfo;


    }

    //--------------------------------------------
    //
    //--------------------------------------------
    public function setRequestGenerator(RequestGeneratorInterface $requestGenerator)
    {
        $this->requestGenerator = $requestGenerator;
        return $this;
    }

    /**
     * @return RequestGeneratorInterface
     */
    public function getRequestGenerator()
    {
        return $this->requestGenerator;
    }

    public function addListShaper(ListShaperInterface $listShaper)
    {
        $this->listShapers[] = $listShaper;
        return $this;
    }


    public function setListParameters(array $listParameters)
    {
        $this->listParameters = $listParameters;
        return $this;
    }

    /**
     * @return array
     */
    public function getListParameters()
    {
        return $this->listParameters;
    }

    public function addControl($name, HybridListControlInterface $control)
    {
        $this->controls[$name] = $control;
        return $this;
    }

    public function getControl($name, $throwEx = true, $default = null)
    {
        if (array_key_exists($name, $this->controls)) {
            return $this->controls[$name];
        }
        if (true === $throwEx) {
            throw new HybridListException("Control not found with name $name");
        }
        return $default;
    }

    public function removeControl($name)
    {
        unset($this->controls[$name]);
        return $this;
    }


    public function setControlsContext(array $controlsContext)
    {
        $this->controlsContext = $controlsContext;
        return $this;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    protected function preparePhpItems(array $items)
    {
        return $items;
    }
    //--------------------------------------------
    //
    //--------------------------------------------
    private static function mergeInfo(array $info, array &$listInfo)
    {

        if ($info) {
            foreach ($info as $k => $v) {
                if (in_array($k, self::$allowedListInfoOverride)) {
                    $listInfo[$k] = $v;
                }
            }
        }
    }

    private static function orderListParameters(array $orderedListShapers, array $listParameters)
    {
        $ret = [];

        /**
         * @var $orderedListShapers ListShaperInterface[]
         */
        foreach ($orderedListShapers as $shaper) {
            $reactsTo = $shaper->getReactsTo();
            foreach ($reactsTo as $name) {
                if (array_key_exists($name, $listParameters)) {
                    $ret[$name] = $listParameters[$name];
                    unset($listParameters[$name]);
                }
            }
        }

        // adding the rest of the params
        foreach ($listParameters as $k => $v) {
            $ret[$k] = $v;
        }
        return $ret;
    }


    private function getParam2Shapers(array $shapers)
    {
        $params2Shapers = [];
        foreach ($shapers as $shaper) {
            /**
             * @var $shaper ShaperInterface
             */
            $params = $shaper->getReactsTo();
            foreach ($params as $param) {
                if ('*' === $param) {
                    $params2Shapers[$param][] = $shaper;
                } else {
                    $params2Shapers[$param] = $shaper;
                }
            }
        }
        return $params2Shapers;
    }

    private function getOrderedListShapers()
    {
        $listShapers = $this->listShapers;
        usort($listShapers, function (ListShaperInterface $listShaperA, ListShaperInterface $listShaperB) {
            $p1 = (int)$listShaperA->getPriority();
            $p2 = (int)$listShaperB->getPriority();
            return $p1 > $p2;
        });
        return $listShapers;
    }

}