<?php


namespace SequenceMatcher;


use SequenceMatcher\Element\Group;

class Model extends Group
{

    public static function create()
    {
        return new self();
    }
}