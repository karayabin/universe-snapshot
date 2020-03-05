<?php


namespace Ling\Light_UserData\Realform\RealformHandlerAliasHelper;


use Ling\Chloroform\DataTransformer\DataTransformerInterface;
use Ling\Chloroform\Validator\ValidatorInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Realform\Handler\AliasHelper\BaseRealformHandlerAliasHelper;
use Ling\Light_UserData\Chloroform\DataTransformer\LightUserData2SvpDataTransformer;
use Ling\Light_UserData\Chloroform\Validator\ValidUserDataUrlValidator;


/**
 * The LightUserDataRealformHandlerAliasHelper class.
 */
class LightUserDataRealformHandlerAliasHelper extends BaseRealformHandlerAliasHelper
{


    /**
     * @overrides
     */
    public function getChloroformValidator(string $type, array $validatorConf, LightServiceContainerInterface $container): ?ValidatorInterface
    {
        $validator = null;
        switch ($type) {
            case "validUserDataUrl":
                $validator = new ValidUserDataUrlValidator();
                $validator->setContainer($container);
                break;
            default:
                break;
        }
        return $validator;
    }


    /**
     * @implementation
     */
    public function getDataTransformer(string $alias, array $params, LightServiceContainerInterface $container): ?DataTransformerInterface
    {
        $ret = null;
        switch ($alias) {
            case "lightUserData2Svp":
                $ret = LightUserData2SvpDataTransformer::create()->setContainer($container);
                break;
        }
        return $ret;
    }


}