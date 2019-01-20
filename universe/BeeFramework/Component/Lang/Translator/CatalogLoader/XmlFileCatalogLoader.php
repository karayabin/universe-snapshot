<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Lang\Translator\CatalogLoader;


use BeeFramework\Component\Lang\Translator\Catalog\CatalogInterface;
use BeeFramework\Component\Lang\Translator\Catalog\Catalog;
use BeeFramework\Notation\File\BabyXml\Util\BabyXmlTool;


/**
 * XmlFileCatalogLoader
 * @author Lingtalfi
 * 2014-06-05
 *
 */
class XmlFileCatalogLoader implements CatalogLoaderInterface
{

    protected $rootFolder;

    public function __construct($rootFolder)
    {
        $this->rootFolder = $rootFolder;
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS CatalogLoaderInterface
    //------------------------------------------------------------------------------/
    /**
     * @return CatalogInterface|false
     */
    public function load($catalogId, $lang)
    {
        $path = $this->rootFolder . '/' . $lang . '/' . str_replace('.', '/', $catalogId) . '.xml';
        if (file_exists($path)) {
            if (false !== $c = BabyXmlTool::parseFile($path)) {
                return new Catalog($c);
            }
        }
        return false;
    }
}
