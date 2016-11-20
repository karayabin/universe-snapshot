<?php

namespace ArrayToString\SymbolManager;

/*
 * LingTalfi 2015-10-26
 */
interface ArrayToStringSymbolManagerInterface {

    public function getStartSymbol($level, array $thisLevelArray);

    public function getEndSymbol($level, array $thisLevelArray);

    public function getContainerStartIndentationSymbol($level, array $thisLevelArray);

    public function getContainerEndIndentationSymbol($level, array $thisLevelArray);


    public function getKeyValueSepSymbol($level, $key, $value, array $thisLevelArray);

    public function getLineSepSymbol($level, $key, $value, array $thisLevelArray);

    public function getLineIndentationSymbol($level, $key, $value, array $thisLevelArray);

    /**
     * $key and $value might be null if the current array is empty
     */
    public function useLineSepSymbolOnLastLine($level, $key, $value, array $thisLevelArray);


    public function getShowKey($level, $key, $value, array $thisLevelArray);
}
