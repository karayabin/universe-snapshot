<?php



namespace Ling\LinearFile\LineSetFinder;


use Ling\LinearFile\LineSet\LineSetInterface;

interface LineSetFinderInterface{

    /**
     * @return LineSetInterface[]
     */
    public function find(array $lines);

}