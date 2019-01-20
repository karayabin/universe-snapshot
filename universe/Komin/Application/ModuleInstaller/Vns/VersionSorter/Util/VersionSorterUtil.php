<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Application\ModuleInstaller\Vns\VersionSorter;


/**
 * 3VersionSorterUtil
 * @author Lingtalfi
 * 2015-05-06
 *
 */
class VersionSorterUtil
{

    /**
     * @var array of vns => VersionSorterInterface
     */
    protected $sorters;

    public function __construct()
    {
        $this->sorters = [
            '3m' => new ThreeMVersionSorter(),
        ];
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function getLastVersion(array $versions, $vns)
    {
        return $this->_getSorter($vns)->getLastVersion($versions);
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setSorter($name, VersionSorterInterface $sorter)
    {
        $this->sorters[$name] = $sorter;
    }

    public function removeSorter($name)
    {
        unset($this->sorters[$name]);
    }

    public function getSorters()
    {
        return $this->sorters;
    }

    public function setSorters($sorters)
    {
        $this->sorters = $sorters;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * @return VersionSorterInterface
     */
    private function _getSorter($vns)
    {
        if (array_key_exists($vns, $this->sorters)) {
            return $this->sorters[$vns];
        }
        else {
            throw new \RuntimeException("Unknown vns: $vns");
        }
    }
}
