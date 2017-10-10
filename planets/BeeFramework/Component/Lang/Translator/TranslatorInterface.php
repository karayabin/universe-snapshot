<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Lang\Translator;


/**
 * TranslatorInterface
 * @author Lingtalfi
 *
 *
 */
interface TranslatorInterface
{


    /**
     * @param null $catalogInfo : string|object|null, an identifier for the catalog id.
     *              An object would be converted to a string: the className with forward slashes
     *              as components separators.
     *
     * @return string
     */
    public function translate($msgId, $catalogInfo = null, array $tags = null, $pluralNumber = null, $lang = null);

    public function setDefaultLang($lang);

}
