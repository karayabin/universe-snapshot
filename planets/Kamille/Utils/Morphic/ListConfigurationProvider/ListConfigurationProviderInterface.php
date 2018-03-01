<?php


namespace Kamille\Utils\Morphic\ListConfigurationProvider;


use Kamille\Utils\Morphic\Exception\MorphicException;

interface ListConfigurationProviderInterface
{

    /**
     * @param $identifier
     * @return array, the configuration array corresponding to the given identifier
     * @throws MorphicException
     */
    public function getConfig($module, $identifier, array $context=[]);

}