<?php


namespace StepFormBuilder\Step;


abstract class Step implements StepInterface
{
    public static function create()
    {
        return new static();
    }
}

