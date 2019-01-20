<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Application\Application;

use BeeFramework\Application\ServiceContainer\ServiceContainer\ReadableParametersServiceContainerInterface;
use BeeFramework\Application\ServiceContainer\ServiceContainerBuilder\ExpandedPcfServiceContainerBuilder;


/**
 * BeeFrameworkApp
 * @author Lingtalfi
 * 2015-03-09
 *
 * BeeFrameworkApp basically provides access to a (readable parameters) service container.
 * It's a singleton, so every part of your code can gain access to it (if you use it).
 *
 * BeeFrameworkApp follows some structure conventions,
 * so that just the rootDir can be passed to the boot method.
 *
 * - rootDir:
 * ----- app (not web accessible)
 * --------- cache:   (web accessible, but you can change the cacheDir if you want)
 * --------- config:  (pcf dir)
 * ------------- ?parameters.yml    (master)
 * ------------- plugins:   (see pcf doc for details on this folder' structure)
 * ----- web (the web root)
 *
 *
 *
 */
class BeeFrameworkApp
{

    protected $rootDir;
    protected $tags;
    protected $extraMasterDir;

    /**
     * @var ReadableParametersServiceContainerInterface
     */
    protected $container;

    private static $inst;

    private function __construct($rootDir, array $appTags, ReadableParametersServiceContainerInterface $container)
    {
        $this->rootDir = $rootDir;
        $this->tags = $appTags;
        $this->container = $container;
    }


    public static function boot($rootDir, array $appTags = [], array $options = [])
    {
        if (null === self::$inst) {
            $pcfDir = $rootDir . '/app/config';
            $emd = (array_key_exists('extraMasterDir', $options)) ? $options['extraMasterDir'] : null;
            $cacheDir = (array_key_exists('cacheDir', $options)) ? $options['cacheDir'] : $rootDir . '/app/cache';
            $o = new ExpandedPcfServiceContainerBuilder([
                'cacheDir' => $cacheDir,
                'pcfDir' => $pcfDir,
                'extraMasterDir' => $emd,
            ]);
            self::$inst = new self($rootDir, $appTags, $o->build($appTags));
        }
    }


    /**
     * @return BeeFrameworkApp
     */
    public static function getInst()
    {
        if (null === self::$inst) {
            throw new \LogicException("BeeFrameworkApp must be booted before you can call getInst");
        }
        return self::$inst;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * @return ReadableParametersServiceContainerInterface
     */
    public function getContainer()
    {
        return $this->container;
    }


}
