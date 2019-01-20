<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Application\Config\Util;

use BeeFramework\Bat\FileTool;
use BeeFramework\Notation\File\BabyXml\Util\BabyXmlTool;
use BeeFramework\Notation\File\BabyYaml\Tool\BabyYamlTool;


/**
 * FeeConfig.
 * @author Lingtalfi
 *
 *
 */
class FeeConfig
{

    private static $inst;

    private function __construct()
    {

    }


    /**
     * @return array|false, false on failure
     */
    public static function readFile($file)
    {
        $ret = false;
        $ext = FileTool::getExtension($file);
        if ('yml' === $ext) {
            return BabyYamlTool::parseFile($file);
        }
        elseif ('xml' === $ext) {
            return BabyXmlTool::parseFile($file);
        }
//        elseif ('json' === $ext) {
//            $zis = self::getInst();
//            if (null === $zis->getJsonReader()) {
//                $zis->setJsonReader(new MeeJsonReader());
//            }
//            $ret = $zis->getJsonReader()->readFile($file);
//        }
        else {
            trigger_error(sprintf("Unknown file extension: %s", $ext), E_USER_WARNING);
        }
        return $ret;
    }


    /**
     *
     * @param $options :
     *
     * - dirMode: 0755
     * - fileMode: 0644
     * - useCdata: bool=true  // only for babyxml
     *
     * @return true on success, or false on failure
     */
//    public static function write($file, array $config, array $options = [])
//    {
//        $ret = false;
//        $ext = F::getExtension($file);
//        if ('yml' === $ext) {
//            $zis = self::getInst();
//            if (null === $zis->getYamlWriter()) {
//                $zis->setYamlWriter(new MeeBabyYamlWriter(new MeeRevertedCvaValueAdaptor()));
//            }
//            $ret = $zis->getYamlWriter()->write($config, $file, $options);
//        }
//        elseif ('xml' === $ext) {
//            $zis = self::getInst();
//            if (null === $zis->getXmlWriter()) {
//                $zis->setXmlWriter(new MeeBabyXmlWriter(new MeeRevertedCvaValueAdaptor()));
//            }
//            $ret = $zis->getXmlWriter()->write($config, $file, $options);
//        }
//        elseif ('json' === $ext) {
//            $zis = self::getInst();
//            if (null === $zis->getJsonWriter()) {
//                $zis->setJsonWriter(new MeeJsonWriter());
//            }
//            $ret = $zis->getJsonWriter()->write($config, $file, $options);
//        }
//        else {
//            trigger_error(sprintf("Unknown file extension: %s", $ext), E_USER_WARNING);
//        }
//        return $ret;
//    }


    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    private static function getInst()
    {
        if (null === self::$inst) {
            self::$inst = new self;
        }
        return self::$inst;
    }
}
