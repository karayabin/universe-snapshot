<?php

namespace UrlFriendlyListHelper\ItemGenerator;

/*
 * LingTalfi 2015-11-02
 * 
 * There are different types of generator.
 * 
 * - Array
 * - Mysql
 * - ...or your own
 * 
 */
use UrlFriendlyListHelper\ItemGeneratorHelper\ItemGeneratorHelperInterface;
use UrlFriendlyListHelper\ListHelper\ListHelperInterface;

interface ItemGeneratorInterface
{


    /**
     * This method is typically called by pagination component
     * upon plugin preparation (in the list helper)
     */
    public function getNbTotalItems();


    public function setParameters(array $params);


    /**
     * This method is called in the rendering phase
     */
    public function getItems();


    public function addGeneratorHelper(ItemGeneratorHelperInterface $h);

    public function setListHelper(ListHelperInterface $h);
}
