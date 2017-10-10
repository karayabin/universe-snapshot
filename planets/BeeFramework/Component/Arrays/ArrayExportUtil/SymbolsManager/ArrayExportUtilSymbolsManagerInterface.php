<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Arrays\ArrayExportUtil\SymbolsManager;


/**
 * ArrayExportUtilSymbolsManagerInterface
 * @author Lingtalfi
 * 2015-05-27
 *
 *
 */
interface ArrayExportUtilSymbolsManagerInterface
{


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
