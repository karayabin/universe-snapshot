<?php



namespace LinearFile\LineSetFinder;


use LinearFile\LineSet\LineSetInterface;

interface LineSetFinderInterface{

    /**
     * @return LineSetInterface[]
     */
    public function find(array $lines);

}