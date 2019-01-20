<?php


namespace BabyYaml\Helper\ArrayExportUtil\SymbolsManager;


/**
 * InlineArgsArrayExportUtilSymbolsManager
 * @author Lingtalfi
 * 2015-05-27
 *
 */
class InlineArgsArrayExportUtilSymbolsManager extends SpaceIndentedArrayExportUtilSymbolsManager
{
    public function __construct()
    {
        parent::__construct();
        $this
            ->setSpaceSymbol('')
            ->setNbSpaces(0)
            ->setKvSepSymbol(' => ')
            ->setLineSepSymbol(',')
            ->setStartSymbol('[')
            ->setEndSymbol(']')
            ->setUseLineSepOnLastLine(false)
            ->setShowKeysMode('auto');
    }


}
