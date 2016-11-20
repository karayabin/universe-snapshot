<?php

/*
 * This file is part of the Bee package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ArrayToString\SymbolManager;


/**
 * BaseArrayToStringSymbolManager
 * @author Lingtalfi
 * 2015-10-27
 *
 *
 */
abstract class BaseArrayToStringSymbolManager implements ArrayToStringSymbolManagerInterface
{

    private $showKeysMode;
    private $startSymbol;
    private $endSymbol;
    private $kvSepSymbol;
    private $lineSepSymbol;
    private $useLineSepOnLastLine;

    public function __construct()
    {
    }


    public static function create()
    {
        return new static();
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS ArrayExportUtilSymbolsManagerInterface
    //------------------------------------------------------------------------------/
    public function getStartSymbol($level, array $thisLevelArray)
    {
        if (is_callable($this->startSymbol)) {
            return call_user_func($this->startSymbol, $level, $thisLevelArray);
        }
        return $this->startSymbol;
    }

    public function getEndSymbol($level, array $thisLevelArray)
    {
        if (is_callable($this->endSymbol)) {
            return call_user_func($this->endSymbol, $level, $thisLevelArray);
        }
        return $this->endSymbol;
    }

    public function getKeyValueSepSymbol($level, $key, $value, array $thisLevelArray)
    {
        return $this->kvSepSymbol;
    }

    public function getLineSepSymbol($level, $key, $value, array $thisLevelArray)
    {
        return $this->lineSepSymbol;
    }


    public function useLineSepSymbolOnLastLine($level, $key, $value, array $thisLevelArray)
    {
        if (is_callable($this->useLineSepOnLastLine)) {
            return call_user_func($this->useLineSepOnLastLine, $level, $key, $value, $thisLevelArray);
        }
        return $this->useLineSepOnLastLine;
    }

    public function getShowKey($level, $key, $value, array $thisLevelArray)
    {
        if (is_callable($this->showKeysMode)) {
            return call_user_func($this->showKeysMode, $level, $key, $value, $thisLevelArray);
        }
        if ('auto' === $this->showKeysMode) {
            return (!is_numeric($key));
        }
        return $this->showKeysMode;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setEndSymbol($endSymbol)
    {
        $this->endSymbol = $endSymbol;
        return $this;
    }

    public function setKvSepSymbol($kvSepSymbol)
    {
        $this->kvSepSymbol = $kvSepSymbol;
        return $this;
    }


    public function setLineSepSymbol($lineSepSymbol)
    {
        $this->lineSepSymbol = $lineSepSymbol;
        return $this;
    }

    /**
     * @param $showKeysMode
     *                  auto|false|true
     *                      If auto, will only display a key if it's associative (not numeric).
     * @return $this
     */
    public function setShowKeysMode($showKeysMode)
    {
        $this->showKeysMode = $showKeysMode;
        return $this;
    }

    public function setStartSymbol($startSymbol)
    {
        $this->startSymbol = $startSymbol;
        return $this;
    }

    public function setUseLineSepOnLastLine($useLineSepOnLastLine)
    {
        $this->useLineSepOnLastLine = $useLineSepOnLastLine;
        return $this;
    }


}
