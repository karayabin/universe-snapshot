<?php


namespace Ling\Light_Realform\Service;


use Ling\Chloroform\DataTransformer\DataTransformerInterface;
use Ling\Chloroform\Validator\ValidatorInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Realform\Handler\AliasHelper\RealformHandlerAliasHelperInterface;

/**
 * The LightRealformHandlerAliasHelperService class.
 */
class LightRealformHandlerAliasHelperService
{

    /**
     * This property holds the aliasHelpers for this instance.
     * It's an array of pluginName => RealformHandlerAliasHelperInterface.
     *
     * @var RealformHandlerAliasHelperInterface[]
     */
    protected $aliasHelpers;


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * Builds the LightRealformHandlerAliasHelperService instance.
     */
    public function __construct()
    {
        $this->aliasHelpers = [];
        $this->container = null;
    }

    /**
     * Registers a realform handler alias helper.
     *
     * @param string $pluginName
     * @param RealformHandlerAliasHelperInterface $helper
     */
    public function registerRealformHandlerAliasHelper(string $pluginName, RealformHandlerAliasHelperInterface $helper)
    {
        $this->aliasHelpers[$pluginName] = $helper;
    }


    /**
     * Returns a configured validator instance, based on the given type and validatorConf.
     *
     * @param string $type
     * @param array $validatorConf
     * @return ValidatorInterface|null
     * @throws \Exception
     */
    public function getChloroformValidator(string $type, array $validatorConf): ?ValidatorInterface
    {
        foreach ($this->aliasHelpers as $helper) {
            if (null !== ($val = $helper->getChloroformValidator($type, $validatorConf, $this->container))) {
                return $val;
            }
        }
        return null;
    }

    /**
     * Returns a configured dataTransformer instance, based on the given alias and parameters.
     *
     * @param string $alias
     * @param array $params
     * @return DataTransformerInterface|null
     */
    public function getDataTransformer(string $alias, array $params = []): ?DataTransformerInterface
    {
        foreach ($this->aliasHelpers as $helper) {
            if (null !== ($val = $helper->getDataTransformer($alias, $params, $this->container))) {
                return $val;
            }
        }
        return null;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }


}