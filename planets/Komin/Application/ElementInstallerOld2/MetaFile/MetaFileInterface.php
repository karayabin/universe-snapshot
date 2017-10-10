<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Application\ElementInstaller\MetaFile;


/**
 * MetaFileInterface
 * @author Lingtalfi
 * 2015-05-21
 *
 */
interface MetaFileInterface
{

    /**
     * @return int
     */
    public function getMetaVersion();

    public function getType();

    public function getName();

    /**
     * @return string
     */
    public function getVersion();

    /**
     * @return array
     */
    public function getDependencies();
}
