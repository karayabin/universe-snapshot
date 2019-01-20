<?php

namespace UrlFriendlyListHelper\ItemGenerator;

/*
 * LingTalfi 2015-11-02
 * This object relies on convention
 */
use UrlFriendlyListHelper\ItemGeneratorHelper\FilteringItemGeneratorHelperInterface;

class ArrayItemGenerator extends ItemGenerator
{

    private $rows;
    private $nbTotalItems;

    public function __construct()
    {
        parent::__construct();
        $this->rows = [];
        $this->nbTotalItems = 0;
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
        return $this->nbTotalItems;
    }


    /**
     * This method is called in the rendering phase
     */
    public function getItems()
    {
        $ret = $this->rows;
        $this->nbTotalItems = count($ret);

        if (is_array($this->generatorHelpers)) {
            $data = ['items' => $ret];
            foreach ($this->generatorHelpers as $h) {
                $h->customize($data, $this);
                if($h instanceof FilteringItemGeneratorHelperInterface){
                    $this->nbTotalItems = count($data['items']);
                }
            }
            $ret = $data['items'];
        }
        return $ret;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setRows(array $rows)
    {
        $this->rows = $rows;
        return $this;
    }

}
