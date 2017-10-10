<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\String\ParentsAwareMarkupParser;

use Komin\Component\String\ParentsAwareMarkupParser\ParentsAwareMarkupParser\Adaptor\ParentsAwareMarkupParserAdaptorInterface;


/**
 * ParentsAwareMarkupParser
 * @author Lingtalfi
 * 2015-05-21
 *
 *
 * This implementation identifies:
 *
 * - an opening tag
 * - a closing tag
 *
 * The opening and closing tag share the same identifier.
 *
 *
 */
class ParentsAwareMarkupParser implements ParentsAwareMarkupParserInterface
{

    /**
     * @var ParentsAwareMarkupParserAdaptorInterface
     */
    private $adaptor;
    private $openTagFormat;
    private $closeTagFormat;
    private $parents;

    public function __construct()
    {
        $this->adaptor = null;
        $this->parents = [];
        $this->openTagFormat = '<([a-zA-Z0-9_]+)>';
        $this->closeTagFormat = '</([a-zA-Z0-9_]+)>';
    }


    public static function create()
    {
        return new static();
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS ParentsAwareMarkupParserInterface
    //------------------------------------------------------------------------------/
    public function parse($string)
    {
        if (null === $this->adaptor) {
            throw new \LogicException("Please set the adaptor before you use the parse method");
        }
        $pattern = $this->getPattern();
        $ret = preg_replace_callback($pattern, function ($matches) {
            $ret = '';
            $isClosing = ('' === $matches['open'] && array_key_exists('close', $matches));
            if (true === $isClosing) {
                $identifier = $matches[4];
            }
            else {
                $identifier = $matches[2];
            }


            if (false === $isClosing) {
                if (false === $ret = $this->adaptor->getStartTagValue($identifier, $this->parents)) {
                    // don't touch the string if it's an unknown code
                    return $matches[0];
                }
                $this->addParent($identifier);
            }
            else {
                $this->removeParent($identifier);
                if (false === $ret = $this->adaptor->getStopTagValue($identifier, $this->parents)) {
                    // don't touch the string if it's an unknown code
                    return $matches[0];
                }
            }
            return $ret;
        }, $string);

        return $ret;

    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setAdaptor(ParentsAwareMarkupParserAdaptorInterface $adaptor)
    {
        $this->adaptor = $adaptor;
        return $this;
    }

    public function setCloseTagFormat($closeTagFormat)
    {
        $this->closeTagFormat = $closeTagFormat;
        return $this;
    }

    public function setOpenTagFormat($openTagFormat)
    {
        $this->openTagFormat = $openTagFormat;
        return $this;
    }




    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * @return string, a pattern which must contain an open and a close named patterns.
     */
    protected function getPattern()
    {
        $pattern = '!(?P<open>' . $this->openTagFormat . ')|(?P<close>' . $this->closeTagFormat . ')!Usm';
        return $pattern;
    }

    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    private function addParent($name)
    {
        $this->parents[] = $name;
    }

    private function removeParent($name)
    {
        foreach ($this->parents as $k => $v) {
            if ($v === $name) {
                unset($this->parents[$k]);
            }
        }
    }
}
