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

    public function __construct()
    {
        $this->sqlRequest = null;
        $this->infoArray = [];
    }

    public function setSqlRequest(SqlRequestInterface $sqlRequest)
    {
        $this->sqlRequest = $sqlRequest;
        return $this;
    }

    public function getSqlRequest()
    {
        return $this->sqlRequest;
    }

    public function getItems()
    {
        $this->infoArray = []; // reset?
        $sqlRequest = $this->sqlRequest->getSqlRequest();
        $countRequest = $this->sqlRequest->getCountSqlRequest();
        $markers = $this->sqlRequest->getMarkers();


        $row = QuickPdo::fetch($countRequest);
        $rows = QuickPdo::fetchAll($sqlRequest, $markers);
        $nbItems = $row['count'];


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
}