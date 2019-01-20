<?php



namespace SequenceMatcher\Element;



interface EntityInterface extends ElementInterface{

    /**
     * @param $thing
     * @return bool
     */
    public function match($thing);


    /**
     * @return string
     */
    public function __toString();
}