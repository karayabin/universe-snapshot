<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Html\Crawler\Collection;


/**
 * CollectionInterface
 * @author Lingtalfi
 * 2015-06-18
 *
 * See notes as per documentation.
 *
 */
interface CollectionInterface
{


    /**
     * @param $crawlerQuery
     * @param null $context
     * @return CollectionInterface
     */
    public function find($crawlerQuery, $context = null);

    /**
     * @param $xpath
     * @param null $context
     * @return CollectionInterface
     */
    public function xpath($xpath, $context = null);

    /**
     * @param callable $callable
     *                  void    callable ( BDomElementInterface )
     * @return static
     */
    public function each(callable $callable);
}
