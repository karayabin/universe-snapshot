<?php


namespace BabyYaml\Helper\ArrayExportUtil\SymbolsManager;


/**
 * PhpArrayExportUtilSymbolsManager
 * @author Lingtalfi
 * 2015-05-27
 *
 *
 */
class PhpArrayExportUtilSymbolsManager extends SpaceIndentedArrayExportUtilSymbolsManager
{
    public function __construct()
    {
        parent::__construct();
        $this
            ->setSpaceSymbol(' ')
            ->setNbSpaces(4)
            ->setKvSepSymbol(' => ')
            ->setLineSepSymbol(',' . PHP_EOL)
            ->setStartSymbol('[' . PHP_EOL)
            ->setEndSymbol(']')
            ->setUseLineSepOnLastLine(true)
            ->setShowKeysMode('auto');
    }


}
