<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Validation\Validator\ValidatorTest;


/**
 * MinLengthValidatorTest
 * @author Lingtalfi
 * 2015-05-07
 *
 */
class MinLengthValidatorTest extends BaseValidatorTest
{
    public function __construct(array $params = [])
    {
        $params = array_replace([
            'minLength' => 2,
        ], $params);
        parent::__construct($params);
    }


    
    //------------------------------------------------------------------------------/
    // IMPLEMENTS ValidatorTestInterface
    //------------------------------------------------------------------------------/
    /**
     * @return bool
     */
    public function execute($value)
    {
        if (is_string($value)) {
            $minLength = $this->params['minLength'];
            if (strlen($value) < $minLength) {
                return false;
            }
            return true;
        }
        else {
            throw new \InvalidArgumentException(sprintf("value argument must be of type string, %s given", gettype($value)));
        }
    }

}
