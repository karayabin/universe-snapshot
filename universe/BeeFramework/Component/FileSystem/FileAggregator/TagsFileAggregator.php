<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\FileSystem\FileAggregator;

use BeeFramework\Bat\FileTool;
use BeeFramework\Component\FileSystem\Finder\FileInfo\FinderFileInfo;
use BeeFramework\Component\FileSystem\Finder\Finder;


/**
 * TagsFileAggregator
 * @author Lingtalfi
 * 2015-03-06
 *
 * This file aggregator collects files based on their tag.
 *
 *
 */
class TagsFileAggregator implements FileAggregatorInterface
{
    /**
     * @var array $extensions :
     *          if empty, all extensions will be searched
     *          if not empty, only given extensions will be searched
     *
     */
    protected $extensions;

    /**
     * @var $firstComponent ,
     *                  if not null, will restrict the matching to files with that firstComponent.
     *                  It can be either an array or a string.
     */
    protected $firstComponent;

    /**
     * @var $recursive ,
     *          whether to look in nested directories or not.
     */
    protected $recursive;

    /**
     * @var Finder
     */
    private $finder;

    public function __construct(array $options = [])
    {
        $options = array_replace([
            'extensions' => [],
            'firstComponent' => null,
            'recursive' => true,
        ], $options);
        $this->extensions = $options['extensions'];
        $this->firstComponent = $options['firstComponent'];
        $this->recursive = $options['recursive'];

    }


    /**
     * @param $dir , one dir, or an array of dirs
     * @return array
     */
    public function collectFiles($dir)
    {
        $this->finder = Finder::create($dir)->files();
        $ret = [];
        if ($this->extensions) {
            $this->finder->extensions($this->extensions);
        }
        if (null !== $this->firstComponent) {
            if (is_array($this->firstComponent)) {
                $this->finder->addFilter(function (FinderFileInfo $f) {
                    return (in_array(FileTool::getFirstComponent($f->getRealPath()), $this->firstComponent, true));
                });
            }
            elseif (is_string($this->firstComponent)) {
                $this->finder->addFilter(function (FinderFileInfo $f) {
                    return ($this->firstComponent === FileTool::getFirstComponent($f->getRealPath()));
                });
            }
            else {
                throw new \InvalidArgumentException(sprintf("firstComponent must be either an array or a string, %s given", $this->firstComponent));
            }
        }
        if (false === $this->recursive) {
            $this->finder->maxDepth(0);
        }


        $this->prepareFinder($this->finder);

        $this->finder->find(function (FinderFileInfo $f) use (&$ret) {
            $path = $f->getRealPath();
            $tags = FileTool::getTags($path);
            if (true === $this->filter($tags)) {
                $ret[] = $path;
                $this->onFileCollectedAfter($path, $f);
            }
        });
        return $ret;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setFirstComponent($firstComponent)
    {
        $this->firstComponent = $firstComponent;
    }

    public function setRecursive($recursive)
    {
        $this->recursive = $recursive;
    }

    public function setExtensions(array $extensions)
    {
        $this->extensions = $extensions;
    }





    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function prepareFinder(Finder $f)
    {

    }

    protected function onFileCollectedAfter($path, FinderFileInfo $file)
    {

    }

    protected function filter(array $tags)
    {
        return true;
    }

}
