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
 * CacheDisciple
 * @author Lingtalfi
 * 2015-06-03
 *
 */
abstract class CacheDisciple implements CacheDiscipleInterface
{
    /**
     * @var CacheMasterInterface
     */
    private $cacheMaster;

    public function __construct()
    {
        $this->cacheMaster = null;
    }

    public static function create()
    {
        return new static();
    }

    abstract protected function isFresh($meta);

    abstract protected function createMeta(array $params);

    //------------------------------------------------------------------------------/
    // IMPLEMENTS CacheDiscipleInterface
    //------------------------------------------------------------------------------/
    public function setCacheMaster(CacheMasterInterface $m)
    {
        $this->cacheMaster = $m;
        return $this;
    }

    /**
     * @return CacheMasterInterface|null
     */
    public function getCacheMaster()
    {
        return $this->cacheMaster;
    }

    /**
     * @return true
     */
    public function store($name, $data, array $params = [])
    {
        $meta = $this->createMeta($params);
        return $this->cacheMaster->store($name, $data, $meta);
    }

    /**
     * @return false|mixed
     */
    public function getData($name)
    {
        $ret = false;
        if (false !== $d = $this->cacheMaster->retrieve($name, 'both')) {
            list($data, $meta) = $d;
            if (true === $this->isFresh($meta)) {
                $ret = $data;
            }
        }
        return $ret;
    }


}
