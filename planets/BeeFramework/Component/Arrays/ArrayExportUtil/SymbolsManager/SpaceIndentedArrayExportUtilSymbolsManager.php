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
 * SpaceIndentedArrayExportUtilSymbolsManager
 * @author Lingtalfi
 * 2015-05-27
 *
 *
 */
class SpaceIndentedArrayExportUtilSymbolsManager extends GenericArrayExportUtilSymbolsManager
{

    private $nbSpaces;
    private $spaceSymbol;
    private $indentationCallback;


    public function __construct()
    {
        parent::__construct();
        $this->nbSpaces = 4;
        $this->spaceSymbol = ' ';
        $this->indentationCallback = function ($spaceSymbol, $nbSpaces, $level) {
            return str_repeat($spaceSymbol, $nbSpaces * $level);
        };
    }

    //------------------------------------------------------------------------------/
    // IMPLEMENTS ArrayExportUtilSymbolsManagerInterface
    //------------------------------------------------------------------------------/
    public function getLineIndentationSymbol($level, $key, $value, array $thisLevelArray)
    {
        return call_user_func($this->indentationCallback, $this->spaceSymbol, $this->nbSpaces, $level);
    }

    public function getContainerStartIndentationSymbol($level, array $thisLevelArray)
    {
        return '';
    }

    public function getContainerEndIndentationSymbol($level, array $thisLevelArray)
    {
        return call_user_func($this->indentationCallback, $this->spaceSymbol, $this->nbSpaces, $level - 1);
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setIndentationCallback(callable $indentationCallback)
    {
        $this->indentationCallback = $indentationCallback;
        return $this;
    }

    public function setNbSpaces($nbSpaces)
    {
        $this->nbSpaces = $nbSpaces;
        return $this;
    }

    public function setSpaceSymbol($spaceSymbol)
    {
        $this->spaceSymbol = $spaceSymbol;
        return $this;
    }

    public function getEndSymbol($level, array $thisLevelArray)
    {
        $s = '';
        $s .= parent::getEndSymbol($level, $thisLevelArray);
        return $s;
    }


}
