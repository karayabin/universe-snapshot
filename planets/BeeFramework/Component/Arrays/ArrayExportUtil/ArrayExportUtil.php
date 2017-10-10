<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Arrays\ArrayExportUtil;

use BeeFramework\Component\Arrays\ArrayExportUtil\Exception\ArrayExportUtilException;
use BeeFramework\Component\Arrays\ArrayExportUtil\SymbolsManager\ArrayExportUtilSymbolsManagerInterface;


/**
 * ArrayExportUtil
 * @author Lingtalfi
 * 2015-04-26
 *
 * A tool to export a php array into a custom format.
 *
 * Here is the structure of an array:
 *
 * arrayStructure: <containerStartIndentationSymbol> <startSymbol> <lines> <containerEndIndentationSymbol> <endSymbol>
 * lines: <line>*
 * line: <lineIndentationSymbol> (<key> <keyValueSepSymbol>)? <value> <lineSepSymbol>?
 *
 *
 * The symbols can be customized on a per level (array depth) basis.
 * The very first level is 1.
 * The following options are also customizable on a per level basis:
 *
 * - showKey: whether or not to show the key
 * - useLineSepOnLastLine: whether or not add the last line sep for the last element (usually the trailing comma)
 *
 *
 *
 *
 *
 */
class ArrayExportUtil
{


    private $keyFormatter;
    private $valueFormatter;
    /**
     * @var ArrayExportUtilSymbolsManagerInterface
     */
    private $symbolsManager;

    public function __construct()
    {
        $this->keyFormatter = function ($key, $level) {
            return var_export($key, true);
        };
        $this->valueFormatter = function ($value, $level) {
            return var_export($value, true);
        };
    }


    public static function create()
    {
        return new static();
    }

    public function arrayExport(array $array, $return = false, $style = 'php')
    {
        $manager = $this->getSymbolsManager($style);
        $s = $this->doExport($manager, $array, 1);
        if (true === $return) {
            return $s;
        }
        echo $s;
    }

    public function setSymbolsManager(ArrayExportUtilSymbolsManagerInterface $symbolsManager)
    {
        $this->symbolsManager = $symbolsManager;
        return $this;
    }

    public function setKeyFormatter(callable $keyFormatter)
    {
        $this->keyFormatter = $keyFormatter;
        return $this;
    }

    public function setValueFormatter(callable $valueFormatter)
    {
        $this->valueFormatter = $valueFormatter;
        return $this;
    }




    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function doExport(ArrayExportUtilSymbolsManagerInterface $manager, array $array, $level)
    {
        $s = $manager->getContainerStartIndentationSymbol($level, $array);
        $s .= $manager->getStartSymbol($level, $array);
        $c = 0;
        $k = null;
        $v = null;
        foreach ($array as $k => $v) {
            if (0 !== $c) {
                $s .= $manager->getLineSepSymbol($level, $k, $v, $array);
            }

            $s .= $manager->getLineIndentationSymbol($level, $k, $v, $array);
            $showKey = $manager->getShowKey($level, $k, $v, $array);

            if (true === $showKey) {
                $s .= call_user_func($this->keyFormatter, $k, $level);
                $s .= $manager->getKeyValueSepSymbol($level, $k, $v, $array);
            }
            if (is_array($v)) {
                $s .= $this->doExport($manager, $v, $level + 1);
            }
            else {
                $s .= call_user_func($this->valueFormatter, $v, $level);
            }
            $c++;
        }

        if (0 !== $c && true === $manager->useLineSepSymbolOnLastLine($level, $k, $v, $array)) {
            $s .= $manager->getLineSepSymbol($level, $k, $v, $array);
        }


        $s .= $manager->getContainerEndIndentationSymbol($level, $array);
        $s .= $manager->getEndSymbol($level, $array);
        return $s;
    }


    /**
     * @return ArrayExportUtilSymbolsManagerInterface
     */
    private function getSymbolsManager($style)
    {
        if (null === $this->symbolsManager) {
            $class = ucfirst($style) . 'ArrayExportUtilSymbolsManager';
            $file = __DIR__ . '/SymbolsManager/' . $class . '.php';
            if (file_exists($file)) {
                require_once $file;
                $class = 'BeeFramework\Component\Arrays\ArrayExportUtil\SymbolsManager\\' . $class;
                $this->symbolsManager = new $class();
            }
            else {
                $this->error("Unknown symbols manager with style $style");
            }
        }
        return $this->symbolsManager;
    }

    private function error($m)
    {
        throw new ArrayExportUtilException($m);
    }
}
