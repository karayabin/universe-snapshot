<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Abstractive\Resolver;

use BeeFramework\Abstractive\Resolver\Filter\ResolverFilterInterface;


/**
 * Resolver
 * @author Lingtalfi
 * 2015-05-15
 *
 * This class passes a value through a series of filters, in order to modify it.
 *
 */
class Resolver implements ResolverInterface
{

    private $filters;

    public function __construct()
    {
        $this->filters = [];
    }




    //------------------------------------------------------------------------------/
    // IMPLEMENTS RecursiveResolverInterface
    //------------------------------------------------------------------------------/
    /**
     * @return bool, whether or not v has been modified
     */
    public function resolve(&$v)
    {
        $modified = false;
        foreach ($this->filters as $r) {
            /**
             * @var ResolverInterface $r
             */
            if (true === $r->resolve($v)) {
                $this->onSuccessfulResolve($v);
                $modified = true;
            }
        }
        return $modified;
    }

    public function setFilter(ResolverFilterInterface $f, $index = null)
    {
        if (null === $index) {
            $this->filters[] = $f;
        }
        else {
            $this->filters[$index] = $f;
        }
        return $this;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * To give the opportunity of logging every transformation step
     */
    protected function onSuccessfulResolve($v)
    {

    }
}
