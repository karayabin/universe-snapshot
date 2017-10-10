<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Application\ServiceContainer\ServicePlainCode;


/**
 * ServicePlainCode.
 * @author LingTalfi
 */
class ServicePlainCode
{

    protected $code;

    public function __construct($code = null)
    {
        $this->code = $code;
    }

    public static function create()
    {
        return new static();
    }

    public function getCode()
    {
        return $this->code;
    }

    public function __toString()
    {
        return (string)$this->code;
    }

    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }


}
