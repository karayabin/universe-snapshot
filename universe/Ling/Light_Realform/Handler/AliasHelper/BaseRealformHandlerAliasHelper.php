<?php


namespace Ling\Light_Realform\Handler\AliasHelper;

use Ling\Chloroform\DataTransformer\DataTransformerInterface;
use Ling\Chloroform\Validator\ValidatorInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;

/**
 * The BaseRealformHandlerAliasHelper class.
 */
class BaseRealformHandlerAliasHelper implements RealformHandlerAliasHelperInterface
{

    /**
     * @implementation
     */
    public function getChloroformValidator(string $type, array $validatorConf, LightServiceContainerInterface $container): ?ValidatorInterface
    {
        return null;
    }

    /**
     * @implementation
     */
    public function getDataTransformer(string $alias, array $params, LightServiceContainerInterface $container): ?DataTransformerInterface
    {
        return null;
    }


}