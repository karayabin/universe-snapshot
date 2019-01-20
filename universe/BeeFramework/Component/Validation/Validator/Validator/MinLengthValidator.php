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

use BeeFramework\Component\Validation\Validator\ValidatorTest\MinLengthValidatorTest;
use BeeFramework\Component\Validation\Validator\ValidatorTest\ValidatorTestInterface;


/**
 * MinLengthValidator
 * @author Lingtalfi
 * 2015-05-07
 *
 */
class MinLengthValidator extends BaseValidator
{


    /**
     * @return ValidatorTestInterface
     */
    protected function getValidatorTest()
    {
        return new MinLengthValidatorTest();
    }

    protected function injectAdditionalTags(array &$tags, $value)
    {
        $tags['currentLength'] = strlen($value);
    }

    protected function getDefaultRequirementPhrase()
    {
        return "The text must contain at least {minLength} chars, only {currentLength} given";
    }


}
