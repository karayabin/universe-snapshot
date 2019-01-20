<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Html\Crawler\CrawlerQuery\Syntax\Util;

use BeeFramework\Bat\StringTool;
use BeeFramework\Component\Html\Crawler\CrawlerQuery\Syntax\AtomicSelector;
use BeeFramework\Component\Html\Crawler\CrawlerQuery\Syntax\Phrase;
use BeeFramework\Component\Html\Crawler\Exception\CrawlerException;


/**
 * SyntaxUtil
 * @author Lingtalfi
 * 2015-06-24
 *
 */
class SyntaxUtilOld
{

    public static function create()
    {
        return new static();
    }

    public function phraseToXPath(Phrase $p)
    {
        return $this->doPhraseToXPath($p, false);
    }

    private function doPhraseToXPath(Phrase $p, $useNotMode = false)
    {

        $s = '';
        $ess = $p->getElementSelectors();
        $poss = null;
        $possOverride = false;

        if (false === $useNotMode) {
            $n = 0;
            foreach ($ess as $es) {
                if (0 !== $n) {
                    $s .= '|';
                }
                $ass = $es->getAtomicSelectors();
                $c = false;
                foreach ($ass as $asi) {
                    list($as, $operator) = $asi;
                    /**
                     * @var AtomicSelector $as
                     */
                    if (null === $poss && null !== $pof = $as->getCollectionPositionFilter()) {
                        $poss = $pof;
                    }

                    $sAs = self::getAtomicSelectorRepresentation($as);
                    if (false === $c) {
                        $c = true;
                        $s .= '//' . $sAs;
                    }
                    else {
                        switch ($operator) {
                            case 'descendant':
                                $s .= '//' . $sAs;
                                break;
                            case 'child':
                                $s .= '/' . $sAs;
                                break;
                            case 'nextFollowingSibling':
                                /**
                                 * @var AtomicSelector $as
                                 */
                                $name = $as->getName();
                                $s .= '/following-sibling::*[1]';
                                if ('*' !== $name) {
                                    $s .= '[name()=\'' . $name . '\']';
                                }
                                $s .= $this->stripElementName($sAs);
                                break;
                            case 'followingSibling':
                                $s .= '/following-sibling::' . $sAs;
                                break;
                            default:
                                $this->error("Unknown operator: $operator");
                                break;
                        }
                    }
                }
                $n++;
            }
        }
        else {
            /**
             * In "not" context, element operator are translated in a different manner (the inverse of the non not equivalent operator actually)
             */
            $n = 0;
            foreach ($ess as $es) {
                if (0 !== $n) {
                    $s .= ' or ';
                }
                $ass = $es->getAtomicSelectors();
                $c = false;
                $needOr = false;
                $lastOperator = null;
                $ass = array_reverse($ass);
                foreach ($ass as $asi) {
                    list($as, $operator) = $asi;
                    /**
                     * @var AtomicSelector $as
                     */
                    if (null === $poss && null !== $pof = $as->getCollectionPositionFilter()) {
                        $poss = $pof;
                    }

                    $sAs = self::getAtomicSelectorRepresentation($as);
                    if (false === $c) {
                        $c = true;
                        /**
                         * Does the last atomicSelector have predicates?
                         * If not, we will simply refer to that selector with a dot
                         */
                        if (false === $as->hasPredicate()) {
                            if (null !== $poss) {
                                // we are overriding the default poss behaviour here
                                $possOverride = true;
                                list($p, $n) = $poss;
                                switch ($p) {
                                    case 'first':
                                    case 'last':
                                    case 'nth':
                                        $pos = 1;
                                        if ('last' === $p) {
                                            $pos = 'last()';
                                        }
                                        elseif ('nth' === $p) {
                                            $pos = $n;
                                        }
                                        $s .= "position()=$pos";
                                        break;
                                    default:
                                        $this->error("Unknown position $p");
                                        break;
                                }

                            }
                            else {
                                $s .= '.';
                            }
                        }
                        else {
                            $s .= 'self::' . $sAs;
                            $needOr = true;
                        }
                    }
                    else {

                        if (true === $needOr) {
                            $s .= ' or .';
                        }

                        switch ($lastOperator) {
                            case 'descendant':
                                $s .= '/ancestor::' . $sAs;
                                break;
                            case 'child':
                                $s .= '/parent::' . $sAs;
                                break;
                            case 'nextFollowingSibling':
                                /**
                                 * @var AtomicSelector $as
                                 */
                                $name = $as->getName();
                                $s .= '/preceding-sibling::*[1]';
                                if ('*' !== $name) {
                                    $s .= '[name()=\'' . $name . '\']';
                                }
                                $s .= $this->stripElementName($sAs);
                                break;
                            case 'followingSibling':
                                $s .= '/preceding-sibling::' . $sAs;
                                break;
                            default:
                                $this->error("Unknown operator: $operator");
                                break;
                        }
                    }
                    $lastOperator = $operator;
                }
                $n++;
            }

        }


        // collection position filter (should be the very last operation, since it wraps the returned string)
        if (null !== $poss && false === $possOverride) {
            list($p, $n) = $poss;
            switch ($p) {
                case 'first':
                case 'last':
                case 'nth':
                    $pos = 1;
                    if ('last' === $p) {
                        $pos = 'last()';
                    }
                    elseif ('nth' === $p) {
                        $pos = $n;
                    }
                    $s = "(" . $s . ")[position()=$pos]";
                    break;
                default:
                    $this->error("Unknown position $p");
                    break;
            }
        }


        return $s;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function getAtomicSelectorRepresentation(AtomicSelector $as)
    {
        $s = '';
        $s .= $as->getName();
        $classes = $as->getCssClasses();
        if ($classes) {
            $t = 0;
            $s .= '[';
            foreach ($classes as $c) {
                if (0 !== $t) {
                    $s .= ' and ';
                }
                $cl0 = $this->concat($c);
                $cl1 = $this->concat("$c ");
                $cl2 = $this->concat(" $c ");
                $cl3 = $this->concat(" $c");
                $len = strlen($c);
                $s .= "(@class=$cl0 or starts-with(@class, $cl1) or contains(@class, $cl2) or substring(@class, string-length(@class)-$len)=$cl3)";
                $t++;
            }
            $s .= ']';
        }

        // element filters
        // attributes
        $conds = $as->getAttributesConditions();
        if ($conds) {
            foreach ($conds as $info) {
                list($name, $operator, $value) = $info;
                if ('exists' === $operator) {
                    $s .= "[@$name]";
                }
                else {
                    $safe = $this->concat($value);
                    switch ($operator) {
                        case 'equals':
                            $sign = "=";
                            $s .= "[@$name" . $sign . $safe . ']';
                            break;
                        case 'notEquals':
                            $sign = "!=";
                            $s .= "[@$name" . $sign . $safe . ']';
                            break;
                        case 'contains':
                            $s .= "[contains(@$name, " . $safe . ')]';
                            break;
                        case 'startsWith':
                            $s .= "[starts-with(@$name, " . $safe . ')]';
                            break;
                        case 'endsWith':
                            $len = strlen($value) - 1;
                            $s .= "[substring(@$name, string-length(@data-id) - $len)=$safe]";
                            break;
                        default:
                            $this->error("Unknown operator $operator");
                            break;
                    }
                }
            }
        }


        // contains
        $cont = $as->getContainsFilter();
        if ($cont) {
            foreach ($cont as $info) {
                list($text, $rec) = $info;
                $t = $this->concat($text);
                $k = (false === $rec) ? 'text()' : '.';
                $s .= "[contains($k, $t)]";
            }
        }


        // not
        $nots = $as->getNotPhrases();
        if ($nots) {
            foreach ($nots as $not) {
                $sp = $this->doPhraseToXPath($not, true);
                $s .= "[not($sp)]";
            }
        }

        // position filter
        if (null !== $poss = $as->getPositionFilter()) {
            list($p, $n) = $poss;
            switch ($p) {
                case 'firstChild':
                case 'lastChild':
                case 'nthChild':
                case 'nthLastChild':
                    $pos = 1;
                    if ('lastChild' === $p) {
                        $pos = 'last()';
                    }
                    elseif ('nthChild' === $p) {
                        $pos = $n;
                    }
                    elseif ('nthLastChild' === $p) {
                        $pos = 'last()-' . ((int)$n - 1);
                    }
                    $s .= "[position()=$pos]";
                    break;
                default:
                    $this->error("Unknown position $p");
                    break;
            }
        }


        return $s;
    }

    private function stripElementName($s)
    {
        if (false !== $pos = StringTool::strposMultiple($s, ['[', ':'])) {
            $s = substr($s, $pos);
        }
        else {
            $s = '';
        }
        return $s;
    }

    private function concat($s)
    {
        $p = explode("'", $s);
        if (count($p) > 1) {
            $r = 'concat(';
            $c = 0;
            foreach ($p as $pa) {
                if (0 !== $c) {
                    $r .= ', "\'", ';
                }
                $r .= "'$pa'";
                $c++;
            }
            $r .= ')';
            return $r;
        }
        else {
            return "'" . $s . "'";
        }
    }


    private function error($m)
    {
        throw new CrawlerException($m);
    }

}
