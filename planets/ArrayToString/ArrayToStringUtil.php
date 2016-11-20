<?php

namespace ArrayToString;

/*
 * LingTalfi 2015-10-26
 *
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
 * The structure symbols are handled by a SymbolManager object which must be bound to this instance.
 * 
 * 
 *
 * keyFormatter and valueFormatter callbacks are used to represent the key and non array values respectively.
 *
 *
 */
use ArrayToString\Exception\ArrayToStringException;
use ArrayToString\SymbolManager\ArrayToStringSymbolManagerInterface;

class ArrayToStringUtil
{


    private $keyFormatter;
    private $valueFormatter;
    /**
     * @var ArrayToStringSymbolManagerInterface
     */
    private $manager;

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

    public function toString(array $array)
    {
        if (!$this->manager instanceof ArrayToStringSymbolManagerInterface) {
            $this->error("Undefined symbol manager");
        }
        $s = $this->doExport($array, 1);
        return $s;
    }

    public function setSymbolManager(ArrayToStringSymbolManagerInterface $symbolManager)
    {
        $this->manager = $symbolManager;
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
    private function doExport(array $array, $level)
    {
        $s = $this->manager->getContainerStartIndentationSymbol($level, $array);
        $s .= $this->manager->getStartSymbol($level, $array);
        $c = 0;
        $k = null;
        $v = null;
        foreach ($array as $k => $v) {
            if (0 !== $c) {
                $s .= $this->manager->getLineSepSymbol($level, $k, $v, $array);
            }

            $s .= $this->manager->getLineIndentationSymbol($level, $k, $v, $array);
            $showKey = $this->manager->getShowKey($level, $k, $v, $array);

            if (true === $showKey) {
                $s .= call_user_func($this->keyFormatter, $k, $level);
                $s .= $this->manager->getKeyValueSepSymbol($level, $k, $v, $array);
            }
            if (is_array($v)) {
                $s .= $this->doExport($v, $level + 1);
            }
            else {
                $s .= call_user_func($this->valueFormatter, $v, $level);
            }
            $c++;
        }

        if (0 !== $c && true === $this->manager->useLineSepSymbolOnLastLine($level, $k, $v, $array)) {
            $s .= $this->manager->getLineSepSymbol($level, $k, $v, $array);
        }


        $s .= $this->manager->getContainerEndIndentationSymbol($level, $array);
        $s .= $this->manager->getEndSymbol($level, $array);
        return $s;
    }


    private function error($m)
    {
        throw new ArrayToStringException($m);
    }

}
