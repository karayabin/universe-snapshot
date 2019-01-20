<?php

namespace UrlFriendlyListHelper\ItemGenerator;

/*
 * LingTalfi 2015-11-04
 */
use QuickPdo\QuickPdo;
use UrlFriendlyListHelper\ItemGeneratorHelper\FilteringItemGeneratorHelperInterface;

class MysqlPdoItemGenerator extends ItemGenerator
{
    private $rawQuery;
    private $markers;
    private $rawCountQuery;
    private $countMarkers;
    private $nbTotalItems;


    public function __construct()
    {
        parent::__construct();
    }

    public static function create()
    {
        return new static();
    }

    /**
     * This method should only be called after the getItems method.
     */
    public function getNbTotalItems()
    {
        return (int)$this->nbTotalItems;
    }


    /**
     * This method is called in the rendering phase
     */
    public function getItems()
    {
        $sql = $this->rawQuery;
        $markers = $this->markers;
        $sqlCount = $this->rawCountQuery;
        $countMarkers = $this->countMarkers;

        if (is_array($this->generatorHelpers)) {
            $data = [
                'query' => $sql,
                'queryMarkers' => $markers,
                'countQuery' => $sqlCount,
                'countQueryMarkers' => $countMarkers,
            ];
            foreach ($this->generatorHelpers as $h) {
                // assuming there is only one filtering helper per list helper instance
                // also assuming the filtering helper is the first in the generator helper list
                if (null === $this->nbTotalItems && !$h instanceof FilteringItemGeneratorHelperInterface) {
                    $sqlCount = $data['countQuery'];
                    $countMarkers = $data['countQueryMarkers'];
                    if (false !== ($info = QuickPdo::fetch($sqlCount, $countMarkers))) {
                        $this->nbTotalItems = $info['count'];
                        a($this->nbTotalItems);
                    }
                }
                $h->customize($data, $this);

            }
            $sql = $data['query'];
            
            $markers = $data['queryMarkers'];
        }


        if (null === $this->nbTotalItems) {
            if (false !== ($info = QuickPdo::fetch($sqlCount, $countMarkers))) {
                $this->nbTotalItems = $info['count'];
            }
            else {
                return false;
            }
        }

        a($sql);
        return QuickPdo::fetchAll($sql, $markers);
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setRawQuery($rawQuery, array $markers = [])
    {
        $this->rawQuery = $rawQuery;
        $this->markers = $markers;
        return $this;
    }

    public function setCountRawQuery($rawQuery, array $markers = [])
    {
        $this->rawCountQuery = $rawQuery;
        $this->countMarkers = $markers;
        return $this;
    }

}
