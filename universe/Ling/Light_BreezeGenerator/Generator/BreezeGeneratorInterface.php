<?php


namespace Ling\Light_BreezeGenerator\Generator;

/**
 * The BreezeGeneratorInterface interface.
 */
interface BreezeGeneratorInterface
{

    /**
     * Generates some php classes based on the given configuration.
     *
     * @param array $conf
     * @return void
     */
    public function generate(array $conf);
}