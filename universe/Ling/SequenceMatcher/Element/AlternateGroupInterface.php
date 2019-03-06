<?php



namespace Ling\SequenceMatcher\Element;



interface AlternateGroupInterface extends ElementInterface
{
    /**
     * @return GroupInterface[]
     */
    public function getAlternatives();
}






