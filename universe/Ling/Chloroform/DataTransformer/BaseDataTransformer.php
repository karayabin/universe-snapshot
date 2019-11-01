<?php


namespace Ling\Chloroform\DataTransformer;


/**
 * The BaseDataTransformer class.
 */
abstract class BaseDataTransformer implements DataTransformerInterface
{
    /**
     * Returns a new instance of the class being invoked.
     * @return static
     */
    public static function create()
    {
        return new static();
    }
}