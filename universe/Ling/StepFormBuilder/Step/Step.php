<?php


namespace Ling\StepFormBuilder\Step;


abstract class Step implements StepInterface
{
    public static function create()
    {
        return new static();
    }
}

