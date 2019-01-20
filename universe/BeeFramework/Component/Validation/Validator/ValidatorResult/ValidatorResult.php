<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Validation\Validator\ValidatorResult;


/**
 * ValidatorResult
 * @author Lingtalfi
 * 2015-05-07
 *
 */
class ValidatorResult implements ValidatorResultInterface
{

    protected $requirementPhrase;
    protected $errorMessage;

    public function __construct($errorMessage = null, $requirementPhrase = null)
    {
        $this->setErrorMessage($errorMessage);
        $this->setRequirementPhrase($requirementPhrase);
    }




    //------------------------------------------------------------------------------/
    // IMPLEMENTS ValidatorResultInterface
    //------------------------------------------------------------------------------/
    /**
     * @return string
     */
    public function getRequirementPhrase()
    {
        return $this->requirementPhrase;
    }

    public function setRequirementPhrase($string)
    {
        $this->requirementPhrase = $string;
        return $this;
    }

    /**
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    public function setErrorMessage($string)
    {
        $this->errorMessage = $string;
        return $this;
    }


}
