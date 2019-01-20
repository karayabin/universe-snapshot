<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Application\ServiceContainer\ServiceContainerBuilder\FileAggregator;

use BeeFramework\Bat\FileTool;
use BeeFramework\Component\FileSystem\FileAggregator\InPoolTagsFileAggregator;
use BeeFramework\Component\FileSystem\Finder\FileInfo\FinderFileInfo;


/**
 * ServiceContainerBuilderFileAggregator
 * @author Lingtalfi
 * 2015-03-06
 *
 */
class ServiceContainerBuilderPcfFileAggregator extends InPoolTagsFileAggregator
{

    protected $parametersFiles;
    protected $hooksFiles;
    protected $servicesFiles;
    private $insideHooksAndServices;


    public function __construct(array $options = [])
    {
        parent::__construct($options);
        $this->parametersFiles = [];
        $this->hooksFiles = [];
        $this->servicesFiles = [];
    }


    public function collectMasterParameters($masterDirs)
    {
        $this->setRecursive(false);
        $this->setFirstComponent([
            'parameters',
        ]);
        return $this->collectFiles($masterDirs);
    }


    /**
     * @return array of:
     *                  0: parameters files
     *                  1: hooks files
     *                  2: services files
     */
    public function collectHookAndServices($pluginDir)
    {
        $this->insideHooksAndServices = true;
        $this->setRecursive(true);
        $this->setFirstComponent([
            'services',
            'parameters',
            'hooks',
        ]);
        $this->collectFiles($pluginDir);
        $this->insideHooksAndServices = false;
        return [
            $this->parametersFiles,
            $this->hooksFiles,
            $this->servicesFiles,
        ];
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function onFileCollectedAfter($path, FinderFileInfo $file)
    {
        if (true === $this->insideHooksAndServices) {
            $fc = FileTool::getFirstComponent($file->getBasename());
            switch ($fc) {
                case 'parameters':
                    $this->parametersFiles[] = $path;
                    break;
                case 'hooks':
                    $this->hooksFiles[] = $path;
                    break;
                case 'services':
                    $this->servicesFiles[] = $path;
                    break;
                default:
                    throw new \LogicException(sprintf("Unknown firstComponent type: %s", $fc));
                    break;
            }
        }
    }

}
