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
 * Catalog
 * @author Lingtalfi
 * 2014-06-05
 *
 * The expected structure of a catalog is:
 *
 * - (node):
 * ----- m: translation id (by convention, in english)
 * ----- 0: translation of plural form 0 (which is singular)
 * ----- ?1: translation of plural form 1
 * ----- ?2: translation of plural form 2
 * ----- ...
 * ----- ?x: translation of plural form x
 * - ...
 *
 *
 *
 *
 */
class Catalog implements CatalogInterface
{

    protected $translationNodes;

    public function __construct($translationNodes)
    {
        $this->translationNodes = $translationNodes;
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS CatalogInterface
    //------------------------------------------------------------------------------/
    /**
     * @return string|false
     */
    public function getTranslation($msgId, $pluralFormIndex = 0)
    {
        foreach ($this->translationNodes as $node) {
            if (array_key_exists('m', $node) && trim($node['m']) === $msgId) {
                if (array_key_exists($pluralFormIndex, $node)) {
                    return $node[$pluralFormIndex];
                }
                else {
                    trigger_error(sprintf("msgId found, but no translation for pluralFormIndex %s", $pluralFormIndex), E_USER_WARNING);
                }
            }
        }
        return false;
    }
}
