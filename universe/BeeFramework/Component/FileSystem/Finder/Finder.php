<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace BeeFramework\Component\FileSystem\Finder;

use BeeFramework\Component\FileSystem\Finder\Filter\BaseNameFinderFilter;
use BeeFramework\Component\FileSystem\Finder\Filter\ComponentsPathFinderFilter;
use BeeFramework\Component\FileSystem\Finder\Filter\ExtensionFinderFilter;
use BeeFramework\Component\FileSystem\Finder\Filter\MaxDepthFinderFilter;
use BeeFramework\Component\FileSystem\Finder\Filter\Tool\TypeTool;
use BeeFramework\Component\FileSystem\Finder\Filter\TypeAndBaseNameFinderFilter;
use BeeFramework\Component\FileSystem\Finder\Filter\TypeFinderFilter;


/**
 * Finder
 * @author Lingtalfi
 * 2015-04-29
 *
 */
class Finder extends BaseFinder
{
    private $types;
    private $maxDepth;
    private $extensionsInfo;
    private $pathInfo;
    private $baseNameInfo;
    private $baseNameAndTypeInfo;
    private $ignoreSpecials;
    private $ignoreSpecialsPattern;
    private $filterCpt;

    public function __construct($dirs = null, array $options = [])
    {
        parent::__construct($dirs, $options);
        $this->types = TypeTool::TYPE_DIR | TypeTool::TYPE_FILE;
        $this->ignoreSpecials = true;
        $this->ignoreSpecialsPattern = '!^\.(git|idea|gitignore|DS_Store)$!i';
        $this->filterCpt = 0;
    }


    /**
     * Direct children of searchDir have a depth of 0.
     * -1 means all level
     */
    public function maxDepth($maxDepth)
    {
        if (-1 === $maxDepth) {
            $maxDepth = null;
        }
        $this->maxDepth = $maxDepth;
        return $this;
    }

    /**
     * match against the componentPath, see finder doc for more info.
     *      exemple of componentPath:
     *                      - a/her-text.php
     *      (it's like a relative path, but with the link symbolic name upfront in case of links following)
     *
     *
     *
     * param accept:
     *                  if true, accept all resources that match (and only those)
     *                  if false, accept all resources but those that match
     *
     *
     */
    public function path($pattern, $isRegex = false, $accept = true)
    {
        $this->pathInfo[] = [$pattern, $isRegex, $accept];
        return $this;
    }

    /**
     * see path method documentation (in this class)
     */
    public function baseName($pattern, $isRegex = false, $accept = true, $onAcceptedStopRecursion = null)
    {
        $this->baseNameInfo[] = [$pattern, $isRegex, $accept, $onAcceptedStopRecursion];
        return $this;
    }


    /**
     * @param array|string $extensions , extensions without the leading dot
     * @param bool $accept ,
     *                      if true, will accept only resources which extensions match
     *                      if false, will accept any resources except those which extensions match
     *
     * @return $this
     */
    public function extensions($extensions, $caseSensitive = false, $accept = true)
    {
        $this->extensionsInfo[] = [$extensions, $caseSensitive, $accept];
        return $this;
    }

    /**
     *
     * By default, specials are ignored.
     * Specials are files like .idea, .DS_Store, etc...
     */
    public function ignoreSpecials($bool)
    {
        $this->ignoreSpecials = $bool;
        return $this;
    }

    public function ignoreHidden()
    {
        $this->baseName('!^\..*$!', true, false);
        return $this;
    }

    /**
     * Ignore dirs (and their content) that match the given baseName.
     * The primary intent is to exclude dirs that start with an underscore (representing hidden dirs).
     * @return $this
     */
    public function ignoreDirs($baseName, $isRegex = false)
    {
        $this->baseNameAndTypeInfo[] = [TypeTool::TYPE_FILE | TypeTool::TYPE_LINK, $baseName, $isRegex, false, function ($isAccepted) {
            if (true === $isAccepted) {
                return false;
            }
            return true;
        }];
        return $this;
    }


    /**
     * type file with a common image extension
     */
    public function images()
    {
        $this->extensions(array('jpeg', 'jpg', 'gif', 'png', 'bmp'));
        return $this;
    }


    /**
     * Note: a link is only a link, not a directory
     */
    public function directories($reset = true)
    {
        if (true === $reset) {
            $this->types = TypeTool::TYPE_DIR;
        }
        else {
            $this->types |= TypeTool::TYPE_DIR;
        }
        return $this;
    }

    /**
     * Note: a link is only a link, not a file
     */
    public function files($reset = true)
    {
        if (true === $reset) {
            $this->types = TypeTool::TYPE_FILE;
        }
        else {
            $this->types |= TypeTool::TYPE_FILE;
        }
        return $this;
    }

    public function links($reset = true)
    {
        if (true === $reset) {
            $this->types = TypeTool::TYPE_LINK;
        }
        else {
            $this->types |= TypeTool::TYPE_LINK;
        }
        return $this;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function init()
    {
        parent::init();


        if (true === $this->ignoreSpecials) {
            $this->addFilter(new BaseNameFinderFilter($this->ignoreSpecialsPattern, true, false), $this->getFilterName('ignoreSpecials'));
        }


        if (null !== $this->baseNameAndTypeInfo) {
            foreach ($this->baseNameAndTypeInfo as $baseNameTypeInfo) {
                list($types, $pattern, $isRegex, $accept, $onAcceptedStopRecursion) = $baseNameTypeInfo;
                $this->addFilter(new TypeAndBaseNameFinderFilter($types, $pattern, $isRegex, $accept, $onAcceptedStopRecursion), $this->getFilterName('baseNameAndType'));
            }
        }


        $this->addFilter(new TypeFinderFilter($this->types), $this->getFilterName('type'));


        if (null !== $this->maxDepth) {
            $this->addFilter(new MaxDepthFinderFilter($this->maxDepth), $this->getFilterName('maxDepth'));
        }

        if (null !== $this->extensionsInfo) {
            foreach ($this->extensionsInfo as $extensionInfo) {
                list($extensions, $caseSensitive, $accept) = $extensionInfo;
                $filterType = (true === $accept) ? 'accept' : 'refute';
                $this->addFilter(new ExtensionFinderFilter($filterType, $extensions, $caseSensitive), $this->getFilterName('extension'));
            }
        }
        if (null !== $this->pathInfo) {
            foreach ($this->pathInfo as $pathInfo) {
                list($pattern, $isRegex, $accept) = $pathInfo;
                $this->addFilter(new ComponentsPathFinderFilter($pattern, $isRegex, $accept), $this->getFilterName('componentsPath'));
            }
        }

        if (null !== $this->baseNameInfo) {
            foreach ($this->baseNameInfo as $baseNameInfo) {
                list($pattern, $isRegex, $accept, $onAcceptedStopRecursion) = $baseNameInfo;
                $this->addFilter(new BaseNameFinderFilter($pattern, $isRegex, $accept, $onAcceptedStopRecursion), $this->getFilterName('baseName'));
            }
        }


    }


    private function getFilterName($name)
    {
        return $name . $this->filterCpt++;
    }
}
