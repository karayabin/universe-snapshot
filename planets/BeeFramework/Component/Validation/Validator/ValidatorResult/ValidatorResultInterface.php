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
 * ValidatorResultInterface
 * @author Lingtalfi
 * 2015-05-07
 *
 */
interface ValidatorResultInterface
{

    /**
     * @return string
     */
    public function getRequirementPhrase();

    public function setRequirementPhrase($string);

    /**
     * @return string
     */
    public function getErrorMessage();

    public function setErrorMessage($string);

}
