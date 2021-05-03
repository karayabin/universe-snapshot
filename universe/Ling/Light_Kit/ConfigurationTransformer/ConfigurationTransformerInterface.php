<?php


namespace Ling\Light_Kit\ConfigurationTransformer;


/**
 * The ConfigurationTransformerInterface interface.
 */
interface ConfigurationTransformerInterface
{

    /**
     * Transforms the given configuration array in place.
     *
     *
     * @param array $conf
     * @return void
     */
    public function transform(array &$conf);
}