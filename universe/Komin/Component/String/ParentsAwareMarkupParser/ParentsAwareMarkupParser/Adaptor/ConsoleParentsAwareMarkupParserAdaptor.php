<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\String\ParentsAwareMarkupParser\ParentsAwareMarkupParser\Adaptor;


/**
 * ConsoleParentsAwareMarkupParserAdaptor
 * @author Lingtalfi
 * 2015-05-21
 *
 *
 */
class ConsoleParentsAwareMarkupParserAdaptor implements ParentsAwareMarkupParserAdaptorInterface
{


    /**
     * @var array of identifier => formatCode (to print in the console)
     */
    protected $formatCodes;
    protected $escapeSequence;

    public function __construct()
    {
        $this->formatCodes = [];
        $this->escapeSequence = "\033";
    }

    public static function create()
    {
        return new static();
    }

    //------------------------------------------------------------------------------/
    // IMPLEMENTS BabyTagParserAdaptorInterface
    //------------------------------------------------------------------------------/

    public function getStartTagValue($identifier, array $parents = [])
    {
        if (false === $this->checkIdentifier($identifier)) {
            return false;
        }
        $parents[] = $identifier;
        return $this->getTagValue($parents);
    }

    public function getStopTagValue($identifier, array $parents = [])
    {
        if (false === $this->checkIdentifier($identifier)) {
            return false;
        }
        $ret = $this->escapeSequence . "[0m";
        $ret .= $this->getTagValue($parents);
        return $ret;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setEscapeSequence($escapeSequence)
    {
        $this->escapeSequence = $escapeSequence;
        return $this;
    }

    public function setFormatCodes(array $formatCodes)
    {
        foreach ($formatCodes as $k => $v) {
            $this->setFormatCode($k, $v);
        }
        return $this;
    }

    public function setFormatCode($identifier, $formatCode)
    {
        $this->formatCodes[$identifier] = $formatCode;
        return $this;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function checkIdentifier($identifier)
    {
        return (array_key_exists($identifier, $this->formatCodes));
    }

    /**
     * @param array $parents
     * @return array of format codes
     */
    protected function getFormatCodesByParents(array $parents)
    {
        $ret = [];
        foreach ($parents as $id) {
            if (array_key_exists($id, $this->formatCodes)) {
                $ret[] = $this->formatCodes[$id];
            }
        }
        return $ret;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function getTagValue(array $parents)
    {
        $formats = $this->getFormatCodesByParents($parents);
        if ($formats) {
            return $this->escapeSequence . "[" . implode(';', $formats) . "m";
        }
        return '';
    }


}
