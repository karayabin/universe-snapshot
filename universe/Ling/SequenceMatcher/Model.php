<?php


namespace Ling\SequenceMatcher;


use Ling\SequenceMatcher\Element\Group;

class Model extends Group
{

    public static function create()
    {
        return new self();
    }
}