<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Lang\Translator\Catalog;


/**
 * CatalogInterface
 * @author Lingtalfi
 * 2014-06-05
 *
 */
interface CatalogInterface
{


    /**
     * @return string|false
     */
    public function getTranslation($msgId, $pluralFormIndex = 0);
}
