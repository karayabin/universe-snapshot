<?php


namespace SequenceMatcher\Element;


class CharEntity implements EntityInterface
{

    private $char;


    public function __construct($char)
    {
        $this->char = $char;
    }

    public static function create($char)
    {
        return new self($char);
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    public function match($thing)
    {
        return ($this->char === $thing);
    }

    public function __toString()
    {
        return (string)$this->char;
    }
}