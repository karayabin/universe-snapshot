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



/**
 * SyntaxTool
 * @author Lingtalfi
 * 2015-06-25
 *
 */
class SyntaxTool
{



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
                $cl1 = $this->concat("$c ");
                $cl2 = $this->concat(" $c ");
                $cl3 = $this->concat(" $c");
                $len = strlen($c);
                $s .= "(contains(@class, $cl1) or starts-with(@class, $cl2) or substring(@class, string-length(@class)-$len)=$cl3)";
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
                    $sign = '=';
                    switch ($operator) {
                        case 'equals':
                            $sign = "=";
                            break;
                        case 'notEquals':
                            $sign = "!=";
                            break;
                        case 'contains':
                            $sign = "*=";
                            break;
                        case 'startsWith':
                            $sign = "^=";
                            break;
                        case 'endsWith':
                            $sign = "$=";
                            break;
                        default:
                            $this->error("Unknown operator $operator");
                            break;
                    }
                    $s .= "[@$name" . $sign . $safe . ']';
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
        if($nots){
            foreach($nots as $not){
                $s .= "[not()]";
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
        

        // collection position filter (should be the very last operation, since it wraps the returned string)
        if (null !== $poss = $as->getCollectionPositionFilter()) {
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
