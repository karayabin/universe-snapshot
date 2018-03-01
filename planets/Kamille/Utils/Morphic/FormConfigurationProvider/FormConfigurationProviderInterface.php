<?php


namespace Kamille\Utils\Morphic\FormConfigurationProvider;


use Kamille\Utils\Morphic\Exception\MorphicException;

interface FormConfigurationProviderInterface
{

    /**
     * @param $identifier
     * @return array, the configuration array corresponding to the given identifier
     * @throws MorphicException
     */
    public function getConfig($module, $identifier, array $context = []);

}