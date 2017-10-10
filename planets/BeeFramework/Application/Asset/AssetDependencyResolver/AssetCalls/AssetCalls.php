<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Application\Asset\AssetDependencyResolver\AssetCalls;


/**
 * AssetCalls
 * @author Lingtalfi
 * 2014-10-21
 *
 * We can call (presumably well known) libs,
 * or on the fly assets.
 *
 */
class AssetCalls
{

    private static $inst;
    protected $libs;
    protected $assets;

    private function __construct()
    {
        $this->libs = [];
        $this->assets = [];
    }

    public static function getInst()
    {
        if (null === self::$inst) {
            self::$inst = new static;
        }

        return self::$inst;
    }


    public function callLib($id)
    {
        if (is_array($id)) {
            foreach ($id as $_id) {
                $this->callLib($_id);
            }
        }
        else {
            $this->libs[] = $id;
        }
    }

    public function callAssets(array $assets, array $libs = null)
    {
        $this->assets[] = [$assets, $libs];
    }

    /**
     * @return array of libId
     */
    public function getLibs()
    {
        return $this->libs;
    }

    /**
     * @return array of entry:
     *                          0: array assets
     *                          1: array libs=null
     */
    public function getAssets()
    {
        return $this->assets;
    }


}
