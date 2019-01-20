<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\Service\Biskotte\Parser\InstantiationSnippet\SpecialArg;


/**
 * ServiceRefSpecialArg
 * @author Lingtalfi
 * 2015-05-26
 *
 */
class ServiceRefSpecialArg extends SpecialArg
{

    private $address;
    private $askedForNewInstance;

    public function __construct()
    {
        $this->askedForNewInstance = false;
    }


    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    public function getAskedForNewInstance()
    {
        return $this->askedForNewInstance;
    }

    public function setAskedForNewInstance($askedForNewInstance)
    {
        $this->askedForNewInstance = $askedForNewInstance;
        return $this;
    }
    

}
