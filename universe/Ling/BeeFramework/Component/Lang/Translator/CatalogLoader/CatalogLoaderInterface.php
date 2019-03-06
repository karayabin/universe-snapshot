<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ling\BeeFramework\Component\Lang\Translator\CatalogLoader;

use Ling\BeeFramework\Component\Lang\Translator\Catalog\CatalogInterface;


/**
 * CatalogLoaderInterface
 * @author Lingtalfi
 * 2014-06-05
 *
 */
interface CatalogLoaderInterface
{


    /**
     * @param $catalogId
     * @return CatalogInterface|false
     */
    public function load($catalogId, $lang);
}
