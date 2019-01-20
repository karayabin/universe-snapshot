<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Application\Kernel\Kcp\Chameleon;


/**
 * ChameleonKernel
 * @author Lingtalfi
 * 2014-08-21
 *
 */
abstract class ChameleonKernel implements ChameleonKernelInterface
{


    protected $tagSoup;
    protected $options;

    public function __construct(array $options = [])
    {
        $this->tagSoup = [];
        $this->options = $options;
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS ChameleonKernelInterface
    //------------------------------------------------------------------------------/
    /**
     * @return ChameleonKernelInterface
     */
    public function setTagSoup(array $tagSoup)
    {
        $this->tagSoup = $tagSoup;
        return $this;
    }

    public function getTagSoup()
    {
        return $this->tagSoup;
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS KernelInterface
    //------------------------------------------------------------------------------/
    public function getOption($key, $defaultValue = null)
    {
        if (array_key_exists($key, $this->options)) {
            return $this->options[$key];
        }
        return $defaultValue;
    }

    public function getOptions()
    {
        return $this->options;
    }

    public function setOption($key, $value)
    {
        $this->options[$key] = $value;
    }


}
