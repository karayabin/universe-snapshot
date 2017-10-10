<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Cache\CacheMaster\CacheDisciple;

use BeeFramework\Component\Cache\CacheMaster\CacheMasterInterface;


/**
 * CacheDiscipleInterface
 * @author Lingtalfi
 * 2015-06-03
 *
 * A disciple would handle the validity of a cache on your behalf.
 *
 *
 *
 * The workflow with a disciple looks like this:
 *
 *      if ( false !== data = handler->getData ( name ) )
 *              // use data here
 *      else
 *              data = some data; // create data here
 *              handler->store ( name, data, someConcreteDiscipleParams )
 *
 */
interface CacheDiscipleInterface
{

    /**
     * @return CacheDiscipleInterface
     */
    public function setCacheMaster(CacheMasterInterface $m);

    /**
     * @return CacheMasterInterface|null
     */
    public function getCacheMaster();

    /**
     * @return true
     */
    public function store($name, $data, array $params = []);

    /**
     * @return false|mixed
     */
    public function getData($name);


}
