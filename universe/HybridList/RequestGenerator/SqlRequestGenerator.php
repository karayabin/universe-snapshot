<?php


namespace HybridList\RequestGenerator;


use HybridList\SqlRequest\SqlRequestInterface;
use QuickPdo\QuickPdo;

class SqlRequestGenerator extends RequestGenerator
{
    /**
     * @var SqlRequestInterface
     */
    private $sqlRequest;
    private $infoArray;
    private $pdoFetchStyle;

    /**
     * @var null|  fn ( SqlRequestGenerator $generator, $nbItems )
     */
    private $onNbItemsReadyCb;

    public function __construct()
    {
        parent::__construct();
        $this->sqlRequest = null;
        $this->pdoFetchStyle = null;
        $this->onNbItemsReadyCb = null;
        $this->infoArray = [];
    }

    public function setSqlRequest(SqlRequestInterface $sqlRequest)
    {
        $this->sqlRequest = $sqlRequest;
        return $this;
    }

    public function setPdoFetchStyle($pdoFetchStyle)
    {
        $this->pdoFetchStyle = $pdoFetchStyle;
        return $this;
    }


    public function getSqlRequest()
    {
        return $this->sqlRequest;
    }

    public function getItems()
    {
        $this->infoArray = []; // reset?
        $countRequest = $this->sqlRequest->getCountSqlQuery();
        $markers = $this->sqlRequest->getMarkers();


        $row = QuickPdo::fetch($countRequest, $markers);
        $nbItems = $row['count'];


        $this->onNbItemsReady($nbItems);


        $sqlRequest = $this->sqlRequest->getSqlQuery();
        $rows = QuickPdo::fetchAll($sqlRequest, $markers, $this->pdoFetchStyle);


        $this->infoArray["totalNumberOfItems"] = $nbItems;

        if (null !== ($limit = $this->sqlRequest->getLimit())) {


            list($offset, $nipp) = $limit;
            $this->infoArray['sliceLength'] = $nipp;
            $this->infoArray['offset'] = $offset;
            /**
             * Assert: the offset is always a multiple of the
             * sliceLength
             */
            $this->infoArray['sliceNumber'] = ($offset / $nipp) + 1;
        } else {
            $this->infoArray['sliceLength'] = null;
            $this->infoArray['offset'] = null;
            $this->infoArray['sliceNumber'] = null;
        }

        return $rows;
    }


    /**
     * Return an array useful to the HybridList.
     *
     * @return array, can contain any of the following properties
     * (or many of them is also allowed)
     */
    public function getAfterItemsInfo()
    {
        /**
         * Note that you need to call the getItems method
         * before the returned array makes any sense.
         */
        return $this->infoArray;
    }

    public function setOnNbItemsReadyCb(callable $onNbItemsReadyCb)
    {
        $this->onNbItemsReadyCb = $onNbItemsReadyCb;
        return $this;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    protected function onNbItemsReady($nbItems)
    {
        if (null !== $this->onNbItemsReadyCb) {
            call_user_func($this->onNbItemsReadyCb, $this, $nbItems);
        }
    }
}