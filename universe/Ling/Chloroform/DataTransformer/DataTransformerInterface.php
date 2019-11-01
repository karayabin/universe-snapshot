<?php


namespace Ling\Chloroform\DataTransformer;


use Ling\Chloroform\Field\FieldInterface;

/**
 * The DataTransformerInterface interface.
 */
interface DataTransformerInterface
{

    /**
     * Transforms the given value if necessary.
     *
     * @param $value
     * @param array $postedData
     * @param FieldInterface $field
     * @return void
     */
    public function transform(&$value, array $postedData, FieldInterface $field): void;
}