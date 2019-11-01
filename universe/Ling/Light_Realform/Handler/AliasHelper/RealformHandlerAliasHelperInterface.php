<?php


namespace Ling\Light_Realform\Handler\AliasHelper;

use Ling\Chloroform\DataTransformer\DataTransformerInterface;
use Ling\Chloroform\Validator\ValidatorInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;

/**
 * The RealformHandlerAliasHelperInterface interface.
 */
interface RealformHandlerAliasHelperInterface
{

    /**
     * Returns a configured validator instance, based on the given type and validatorConf array.
     *
     * @param string $type
     * @param array $validatorConf
     * @param LightServiceContainerInterface $container
     * @return ValidatorInterface|null
     * @throws \Exception
     */
    public function getChloroformValidator(string $type, array $validatorConf, LightServiceContainerInterface $container): ?ValidatorInterface;


    /**
     * Returns the data transformer instance based on the given alias and parameters.
     *
     * @param string $alias
     * @param array $params
     * @param LightServiceContainerInterface $container
     * @return DataTransformerInterface|null
     */
    public function getDataTransformer(string $alias, array $params, LightServiceContainerInterface $container): ?DataTransformerInterface;
}