<?php



namespace Ling\SequenceMatcher\Element;



interface GroupInterface extends ElementInterface
{
    /**
     * @return ElementInterface[]
     */
    public function getElements();
}






