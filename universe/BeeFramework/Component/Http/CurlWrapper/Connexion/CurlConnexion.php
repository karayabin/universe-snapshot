<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Http\CurlWrapper\Connexion;

use BeeFramework\Component\Http\CurlWrapper\Exception\CurlWrapperException;
use BeeFramework\Component\Http\CurlWrapper\Tool\CurlWrapperTool;


/**
 * CurlConnexion
 * @author Lingtalfi
 * 2015-06-10
 *
 */
class CurlConnexion implements CurlConnexionInterface
{


    private $handle;
    private $options;

    public function __construct()
    {
        $this->options = [];
    }


    public static function create()
    {
        return new static();
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS CurlConnexionInterface
    //------------------------------------------------------------------------------/
    /**
     * @return CurlConnexionInterface
     */
    public function open()
    {
        if (false !== $handle = curl_init()) {
            $this->handle = $handle;
        }
        else {
            throw new CurlWrapperException("Call to curl_init failed");
        }
        return $this;

    }

    /**
     * @return CurlConnexionInterface
     */
    public function close()
    {
        if (null !== $this->handle) {
            curl_close($this->handle);
        }
        return $this;
    }

    public function getCurlHandle()
    {
        if (null === $this->handle) {
            throw new CurlWrapperException("Please call the open method first");
        }
        return $this->handle;
    }

    /**
     * @return CurlConnexionInterface
     */
    public function setOption($name, $value)
    {
        if (false === curl_setopt($this->getCurlHandle(), $name, $value)) {
            throw new CurlWrapperException("Could not set the option " . CurlWrapperTool::optionToLiteral($name));
        }
        return $this;
    }

    public function getOptions($showKeyAsLiteral = false)
    {
        if (true === $showKeyAsLiteral) {
            $op = [];
            foreach ($this->options as $k => $v) {
                $op[CurlWrapperTool::optionToLiteral($k)] = $v;
            }
            return $op;
        }
        return $this->options;
    }


}
