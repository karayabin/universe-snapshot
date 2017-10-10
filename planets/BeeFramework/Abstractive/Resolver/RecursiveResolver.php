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


/**
 * RecursiveResolver
 * @author Lingtalfi
 * 2015-05-15
 *
 * This resolver re-execute itself as long as at least one filter has modified the given value.
 *
 */
class RecursiveResolver extends Resolver
{

    private $maxRecursions;

    public function __construct()
    {
        parent::__construct();
        $this->maxRecursions = 50;
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
        $n = 0;
        while (true === parent::resolve($v)) {
            $modified = true;
            if ($n > $this->maxRecursions) {
                break;
            }
            parent::resolve($v);
            $n++;
        }
        return $modified;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setMaxRecursions($maxRecursions)
    {
        $this->maxRecursions = $maxRecursions;
    }


}
