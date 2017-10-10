<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Cache\CacheMaster;


/**
 * CacheMasterInterface
 * @author Lingtalfi
 * 2015-06-03
 *
 *
 * To store/retrieve data.
 *
 * Although this depends of the concrete implementation,
 * one can probably assume that the cache master, as for now,
 * will only know how to store serializable data.
 *
 *
 * The freshness of the data is our responsibility,
 * we can store metaData to help defining the freshness of the data.
 *
 */
interface CacheMasterInterface
{


    /**
     * @return true
     */
    public function store($name, $data, $metaData = null);

    /**
     * Returns the stored data, or false if no data is associated with the given name.
     *
     * @param string $box :
     *          the type of data we want to retrieve:
     *
     *          - data (default): only the data
     *          - meta: only the meta
     *          - both: both the data and the meta, in the form of an array:
     *                          0: data
     *                          1: meta (or null if not set)
     * @return mixed|false
     */

    public function retrieve($name, $box = 'data');

    /**
     * @return bool
     */
    public function has($name);

    /**
     * Removing data and meta programmatically is perhaps necessary in buggy cases.
     * @return void
     */
    public function remove($name);

}
