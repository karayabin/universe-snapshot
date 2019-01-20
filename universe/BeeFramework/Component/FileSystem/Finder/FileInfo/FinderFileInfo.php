<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\FileSystem\Finder\FileInfo;


/**
 * FinderFileInfo
 * @author Lingtalfi
 * 2015-04-28
 *
 * See documentation for more info.
 *
 */
class FinderFileInfo extends \SplFileInfo
{

    private $componentsPath;
    private $depth;
    private $links;
    private $debugPath;


    public function __construct($file_name, array $components, array $links)
    {
        parent::__construct($file_name);
        $this->debugPath = realpath($file_name);
        $this->links = $links;
        $this->depth = count($components);
        $components[] = basename($file_name);
        $this->componentsPath = implode(DIRECTORY_SEPARATOR, $components);

    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function getComponentsPath()
    {
        return $this->componentsPath;
    }

    public function getDepth()
    {
        return $this->depth;
    }

    public function getLinks()
    {
        return $this->links;
    }


}
