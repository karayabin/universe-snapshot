<?php



namespace SequenceMatcher\Element;



interface GroupInterface extends ElementInterface
{
    /**
     * @return ElementInterface[]
     */
    public function getElements();
}






