<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

//namespace BeeFramework\Component\FileSystem\Finder;
namespace BeeFramework\Component\FileSystem\Finder;

use BeeFramework\Bat\VarTool;
use BeeFramework\Component\FileSystem\Finder\FileInfo\FinderFileInfo;
use BeeFramework\Component\FileSystem\Finder\Filter\FinderFilterInterface;


/**
 * BaseFinder
 * @author Lingtalfi
 * 2015-04-26
 *
 * See documentation for more info.
 *
 */
class BaseFinder
{

    private $dirs;
    private $options;
    private $filters;
    private $isInitialized;

    public function __construct($dirs = null, array $options = [])
    {
        $this->dirs = $dirs;
        $this->filters = [];
        $this->options = array_replace([
            /**
             * What to do when a researchDir was not found:
             *
             *      0: throws an exception (default)
             *      1: skip the dir
             */
            'researchDirNotFound' => 0,
            /**
             * Whether or not to skip any link encountered
             */
            'ignoreLinks' => false,
            /**
             * array of callbacks
             *                  bool callback ( FinderFileInfo f, &stopRecursion=false )
             */
            'filters' => [],
        ], $options);
        $this->addFilters($this->options['filters']);
        $this->isInitialized = false;
    }


    public static function create($dirs = null, array $options = [])
    {
        return new static($dirs, $options);
    }


    /**
     * @return array of FinderFileInfo
     */
    public function find($callback = null)
    {
        if (false === $this->isInitialized) {
            $this->init();
            $this->isInitialized = true;
        }

        $ret = [];
        if (null !== $this->dirs) {
            $dirs = $this->dirs;
            if (!is_array($dirs)) {
                $dirs = [$dirs];
            }

            foreach ($dirs as $dir) {
                $this->checkResearchDir($dir);
                $dir = realpath($dir);
                $parents = [];
                $links = [];
                $this->scanDir($dir, $parents, $links, $dir, $ret);
            }

        }
        else {
            throw new \LogicException("dirs must be set, null given");
        }
        if (is_callable($callback)) {
            foreach ($ret as $f) {
                call_user_func($callback, $f);
            }
        }
        return $ret;
    }


    public function addFilters(array $filters)
    {
        foreach ($filters as $filter) {
            $this->addFilter($filter);
        }
        return $this;
    }


    public function addFilter($filter, $index = null)
    {
        if (
            !$filter instanceof FinderFilterInterface
            &&
            !is_callable($filter)
        ) {
            throw new \InvalidArgumentException("filter must be either a FinderFilterInterface or a callable");
        }
        if (null === $index) {
            $this->filters[] = $filter;
        }
        else {
            $this->filters[$index] = $filter;
        }
        return $this;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/


    protected function init()
    {
        clearstatcache(); // ?
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function scanDir($dir, array $parents, array $links, $searchDir, array &$ret)
    {
        $files = scandir($dir);
        foreach ($files as $file) {
            if ('.' !== $file && '..' !== $file) {

                $realPath = $dir . '/' . $file;
                $isLink = is_link($realPath);

                // do we ignore links?
                if (true === $this->options['ignoreLinks'] && $isLink) {
                    continue;
                }


                //------------------------------------------------------------------------------/
                // CREATING THE FINDER FILE INFO
                //------------------------------------------------------------------------------/
                $stopRecursion = false;
                // BRIDGE LINK to files 
                if (true === $isLink && is_file($realPath)) {
                    $links[] = $this->createBridgeLink($realPath, $parents, $searchDir, 'file');
                }
                $f = new FinderFileInfo($realPath, $parents, $links);


                //------------------------------------------------------------------------------/
                // USING FILTERS TO ACCEPT/NOT ACCEPT THE RESOURCE
                //------------------------------------------------------------------------------/
                $accepted = true;
                foreach ($this->filters as $index => $filter) {
                    /**
                     * @var FinderFilterInterface $filter
                     */
                    $stopR = false;
                    if ($filter instanceof FinderFilterInterface) {
                        $res = $filter->filter($f, $stopR);
//                        a("path=$file; index: $index; res=" . (int)$res . "; stopR=" . (int)$stopR);
                    }
                    else {
                        $res = call_user_func_array($filter, [$f, &$stopR]);
                    }
                    if (true === $stopR) {
                        $stopRecursion = true;
                    }
                    if (false === $res) {
                        $accepted = false;
                        break;
                    }
                }
                if (true === $accepted) {
                    $ret[] = $f;
                }


                //------------------------------------------------------------------------------/
                // RECURSION ?
                //------------------------------------------------------------------------------/
                if (false === $stopRecursion && is_dir($realPath)) {


                    //------------------------------------------------------------------------------/
                    // BRIDGE LINK to dirs 
                    //------------------------------------------------------------------------------/
                    if ($isLink) {
                        $links[] = $this->createBridgeLink($realPath, $parents, $searchDir, 'dir');
                    }

                    $parents[] = $file;
                    $this->scanDir($realPath, $parents, $links, $searchDir, $ret);
                    array_pop($parents);
                    if ($isLink) {
                        array_pop($links);
                    }
                }

            }
        }
    }

    private function createBridgeLink($realPath, array &$parents, $searchDir, $type)
    {
        $baseName = basename($realPath);
        $src = $parents;
        array_unshift($src, $searchDir);
        $src[] = $baseName;
        return [
            'src' => implode(DIRECTORY_SEPARATOR, $src),
            'dst' => realpath($realPath),
            'type' => $type,
        ];
    }

    private function checkResearchDir($dir)
    {
        if (!is_string($dir) || !is_dir($dir)) {
            if (0 === $this->options['researchDirNotFound']) {
                throw new \InvalidArgumentException(sprintf("dir must be of type string and be an existing dir, %s given", VarTool::toString($dir)));
            }
        }
    }
}
