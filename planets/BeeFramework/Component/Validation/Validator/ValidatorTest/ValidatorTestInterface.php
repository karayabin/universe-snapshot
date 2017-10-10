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
 * ValidatorTestInterface
 * @author Lingtalfi
 * 2015-05-07
 *
 */
interface ValidatorTestInterface
{

    /**
     * @return bool
     */
    public function execute($value);

    public function getParams();

    public function setParams(array $params);

    public function setParam($key, $value);

}
