<?php


namespace BabyYaml\Helper\ArrayExportUtil\SymbolsManager;


/**
 * HtmlArrayExportUtilSymbolsManager
 * @author Lingtalfi
 * 2015-05-27
 *
 *
 */
class HtmlArrayExportUtilSymbolsManager extends SpaceIndentedArrayExportUtilSymbolsManager
{
    public function __construct()
    {
        parent::__construct();
        $this
            ->setSpaceSymbol('&nbsp;')
            ->setNbSpaces(4)
            ->setKvSepSymbol(' => ')
            ->setLineSepSymbol(',<br' . '>')
            ->setStartSymbol('[<br' . '>')
            ->setEndSymbol(']')
            ->setUseLineSepOnLastLine(true)
            ->setShowKeysMode('auto');
    }


}
