<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Application\ElementInstallerOld\MetaRepository;

use BeeFramework\Bat\FileTool;
use BeeFramework\Bat\SanitizerTool;
use BeeFramework\Notation\File\BabyDash\Tool\BabyDashTool;
use Komin\Application\ElementInstallerOld\ResourceDownloader\ResourceDownloaderInterface;


/**
 * MockupMetaRepository
 * @author Lingtalfi
 * 2015-04-19
 *
 *
 */
class MockupMetaRepository extends MetaRepository
{

    protected $elements;

    public function __construct(array $options = [])
    {
        $options = array_replace([
            /**
             * array of elementName => elementInfo
             */
            'elements' => [],
        ], $options);
        $this->elements = $options['elements'];
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS MetaRepositoryInterface
    //------------------------------------------------------------------------------/
    public function hasMeta($type, $name, $version)
    {
        return (array_key_exists($name, $this->elements) && array_key_exists($version, $this->elements[$name]));
    }

    public function getMeta($type, $name, $version)
    {
        if (true === $this->hasMeta($type, $name, $version)) {
            return $this->elements[$name][$version];
        }
        return false;
    }


}
