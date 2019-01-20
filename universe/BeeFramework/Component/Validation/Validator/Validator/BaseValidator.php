<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Validation\Validator\Validator;

use BeeFramework\Bat\VarTool;
use BeeFramework\Component\Validation\Validator\ValidatorResult\ValidatorResult;
use BeeFramework\Component\Validation\Validator\ValidatorResult\ValidatorResultInterface;
use BeeFramework\Component\Validation\Validator\ValidatorTest\ValidatorTestInterface;


/**
 * BaseValidator
 * @author Lingtalfi
 * 2015-05-07
 *
 */
abstract class BaseValidator implements ValidatorInterface
{

    protected $requirementPhrase;
    protected $params;

    public function __construct($requirementPhrase = null, array $params = [])
    {
        $this->setParams($params);
        if (null === $requirementPhrase) {
            $requirementPhrase = $this->getDefaultRequirementPhrase();
        }
        $this->setRequirementPhrase($requirementPhrase);
    }


    /**
     * @return ValidatorTestInterface
     */
    abstract protected function getValidatorTest();

    abstract protected function getDefaultRequirementPhrase();




    //------------------------------------------------------------------------------/
    // IMPLEMENTS ValidatorInterface
    //------------------------------------------------------------------------------/
    /**
     * @return true|ValidatorResultInterface
     */
    public function validate($value)
    {
        $validatorTest = $this->getValidatorTest();
        $ret = $validatorTest->execute($value);
        if (true === $ret) {
            return true;
        }

        $tags = $validatorTest->getParams();
        if (!is_string($value)) {
            $value = VarTool::toString($value, ['details' => true]);
        }
        $tags['currentValue'] = $value;
        $this->injectAdditionalTags($tags, $value);
        $tags = $this->resolveTags($tags);
        $errMsg = str_replace(array_keys($tags), array_values($tags), $this->requirementPhrase);
        $r = new ValidatorResult($errMsg, $this->requirementPhrase);
        return $r;
    }

    public function setParams(array $params)
    {
        $this->getValidatorTest()->setParams($params);
        $this->params = $params;
        return $this;
    }

    public function setRequirementPhrase($requirementPhrase)
    {
        $this->requirementPhrase = $requirementPhrase;
    }



    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function injectAdditionalTags(array &$tags, $value)
    {

    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/

    private function resolveTags(array $tags)
    {
        $ret = [];
        foreach ($tags as $k => $v) {
            $k = '{' . $k . '}';
            $ret[$k] = (string)$v;
        }
        return $ret;
    }
}
