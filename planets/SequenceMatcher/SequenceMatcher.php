<?php


namespace SequenceMatcher;


use SequenceMatcher\Element\AlternateGroupInterface;
use SequenceMatcher\Element\ElementInterface;
use SequenceMatcher\Element\EntityInterface;
use SequenceMatcher\Element\GroupInterface;
use SequenceMatcher\Exception\EndOfModelException;
use SequenceMatcher\Exception\EndOfSequenceException;
use SequenceMatcher\Exception\ModelDoesNotMatchException;

class SequenceMatcher
{

    private $matchedElements;
    private $sequence;
    private $curSequenceIndex;
    private $maxSequenceIndex;
    private $curTmpSeqIndex;

    private $debugLine;
    private $debugLineCr;
    private $_debugMode;
    private $debugThingToStringFunc;
    private $level;

    public function __construct()
    {
        $this->_symbol = null;
        $this->debugLineCr = ('cli' === php_sapi_name()) ? PHP_EOL : '<br>';
        $this->debugLine = '';
        $this->_debugMode = false;
    }

    public static function create()
    {
        return new self();
    }


    public function debugMode($func = null)
    {
        if (null === $func) {
            $func = function ($s) {
                return (string)$s;
            };
        }
        $this->debugThingToStringFunc = $func;
        $this->_debugMode = true;
        return $this;
    }


    public function match(array $sequence, Model $model, $func)
    {
        $this->matchedElements = [];

        $this->sequence = $sequence;
        $this->curSequenceIndex = 0;
        $this->maxSequenceIndex = count($sequence) - 1;
        if ($this->maxSequenceIndex < 0) {
            return false;
        }

        $this->curTmpSeqIndex = 0;
        $this->level = 0;


        $allMatchedThings = [];

        for ($seqIndex = $this->curSequenceIndex; $seqIndex <= $this->maxSequenceIndex; $seqIndex++) {
            $matchedElements = [];
            $matchedThings = [];
            $this->debugStore('s[' . $seqIndex . ']=' . $this->debugThingToString($this->sequence[$seqIndex]) . ':');
            $this->debugDump();
            $this->level++;
            if (true === $this->matchGroupAtIndex($model, $seqIndex, $matchedElements, $matchedThings)) {
                $this->matchedElements[] = $matchedElements;
                $allMatchedThings[] = $matchedThings;
            }
            $this->level--;
        }



        foreach ($this->matchedElements as $k => $match) {
            $things = $allMatchedThings[$k];


            //------------------------------------------------------------------------------/
            // COMPUTE MAKERS
            //------------------------------------------------------------------------------/
            $allModelInfo = [];
            foreach ($match as $element) {
                $modelInfo = null;
                $this->findModelInfo($model, $element, $modelInfo);
                $allModelInfo[] = $modelInfo;
            }
            $markers = [];
            foreach ($allModelInfo as $k => $info) {
                if (null !== ($marker = $info[2])) {
                    $markers[$marker][] = $things[$k];
                }
            }

            call_user_func($func, $match, $things, $markers);
        }

    }


    private function findModelInfo(GroupInterface $group, ElementInterface $element, &$info)
    {
        $el = null;
        foreach ($group->getElements() as $elInfo) {
            $_element = $elInfo[0];
            if ($_element === $element) {
                $info = $elInfo;
            } elseif ($_element instanceof GroupInterface) {
                $this->findModelInfo($_element, $element, $info);
            } elseif ($_element instanceof AlternateGroupInterface) {
                foreach ($_element->getAlternatives() as $_group) {
                    $this->findModelInfo($_group, $element, $info);
                }
            }
        }
        return $el;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * If a match occurs:
     * - then the matchedElements array should be updated
     * - also the index (of the sequence) is updated accordingly
     *
     */
    private function matchGroupAtIndex(GroupInterface $group, &$index, array &$matchedElements, array &$matchedThings)
    {

        $modelMatches = false;
        $this->curTmpSeqIndex = $index;

        try {

            /**
             * Move through every element of the model, the result should be binary:
             * - either the current iteration fails
             * - or the current iteration succeeds
             *
             */
            $_els = $group->getElements();
            $nbElements = count($_els);
            $numElement = 0;

            foreach ($_els as $elInfo) {
                $numElement++;

                $theThing = $this->sequence[$this->curTmpSeqIndex];
                $this->debugStore(' s[' . $this->curTmpSeqIndex . ']=' . $this->debugThingToString($theThing) . ' - ');

                /**
                 * @var Element $element
                 */
                list($element, $modificator, $marker) = $elInfo;

                if ($element instanceof EntityInterface) {
                    $this->debugStore('entity[' . $element->__toString() . '] ');


                    if (true === $element->match($theThing)) {
                        $this->debugStore('match with ' . $this->debugThingToString($theThing));
                        $matchedElements[] = $element;
                        $matchedThings[] = $theThing;
                        $this->nextSequenceElement($modelMatches, $numElement, $nbElements, $_els);


                        if ('+' === $modificator || '*' === $modificator) {
                            while (true) {
                                $theThing = $this->sequence[$this->curTmpSeqIndex];
                                if (true === $element->match($theThing)) {
                                    $this->debugDump();
                                    $this->debugStore('match ' . $modificator . ' with ' . $this->debugThingToString($theThing));
                                    $matchedElements[] = $element;
                                    $matchedThings[] = $theThing;
                                    $this->nextSequenceElement($modelMatches, $numElement, $nbElements, $_els);
                                } else {
                                    break;
                                }
                            }
                        }

                    } else {
                        if ('?' === $modificator || '*' === $modificator) {
                            $this->debugStore($modificator . ' ' . $this->debugThingToString($theThing));
                            $modelMatches = true;
                        } else {
                            $matchedElements = [];
                            $matchedThings = [];
                            $this->debugStore('fails against ' . $this->debugThingToString($theThing));
                            $this->modelFails();
                        }
                    }


                } elseif ($element instanceof GroupInterface) {
                    $curTmpSeqIndex = $this->curTmpSeqIndex;
                    $startIndex = $this->curTmpSeqIndex;
                    $this->debugStore('group - ');
                    $this->debugDump();
                    $_matchedElements = [];
                    $_matchedThings = [];
                    $this->level++;
                    $res = $this->matchGroupAtIndex($element, $curTmpSeqIndex, $_matchedElements, $_matchedThings);
                    $this->level--;
                    if (true === $res) {
                        $modelMatches = true;
                        $this->debugStore('group matched ');
                        foreach ($_matchedElements as $el) {
                            $matchedElements[] = $el;
                        }
                        foreach ($_matchedThings as $th) {
                            $matchedThings[] = $th;
                        }

                        if ('+' === $modificator || '*' === $modificator) {
                            while (true) {
                                $curTmpSeqIndex = $this->curTmpSeqIndex;
                                $startIndex = $this->curTmpSeqIndex;
                                if (array_key_exists($curTmpSeqIndex, $this->sequence)) {
                                    $modelMatches = true;
                                    $this->debugStore('group ' . $modificator . ' - ');
                                    $this->debugDump();
                                    $_matchedElements = [];
                                    $_matchedThings = [];
                                    $this->level++;
                                    $res = $this->matchGroupAtIndex($element, $curTmpSeqIndex, $_matchedElements, $_matchedThings);
                                    $this->level--;
                                    if (true === $res) {
                                        $this->debugStore('group ' . $modificator . ' matched ');
                                        foreach ($_matchedElements as $el) {
                                            $matchedElements[] = $el;
                                        }
                                        foreach ($_matchedThings as $th) {
                                            $matchedThings[] = $th;
                                        }
                                    } else {
                                        break;
                                    }
                                } else {
                                    break;
                                }
                            }
                        }

                    } else {
                        if ('?' === $modificator || '*' === $modificator) {
                            $modelMatches = true;
                            $this->debugStore('group failed but ' . $modificator . ' ');
                            $this->curTmpSeqIndex = $startIndex;
                        } else {
                            $matchedElements = [];
                            $matchedThings = [];
                            $this->debugStore('group failed');
                            $this->modelFails();
                        }
                    }


                } elseif ($element instanceof AlternateGroupInterface) {
                    $alts = $element->getAlternatives();
                    $nbAlts = count($alts);
                    $a = 0;
                    foreach ($alts as $alt) {
                        $a++;
                        $group = $alt[0];
                        $groupModificator = $alt[1];

                        $curTmpSeqIndex = $this->curTmpSeqIndex;
                        $startIndex = $this->curTmpSeqIndex;
                        $this->debugStore('alt - ');
                        $this->debugDump();
                        $_matchedElements = [];
                        $_matchedThings = [];
                        $this->level++;
                        $res = $this->matchGroupAtIndex($group, $curTmpSeqIndex, $_matchedElements, $_matchedThings);
                        $this->level--;
                        if (true === $res) {
                            $modelMatches = true;
                            $this->debugStore('alt matched ');
                            foreach ($_matchedElements as $el) {
                                $matchedElements[] = $el;
                            }
                            foreach ($_matchedThings as $th) {
                                $matchedThings[] = $th;
                            }


                            if ('+' === $modificator || '*' === $modificator) {

                                $curTmpSeqIndex++;
                                $z = 0;
                                while (true) {
                                    $z++;
                                    if ($z > 10) {
                                        az("k");
                                    }


                                    $b = 0;
                                    foreach ($alts as $alt2) {
                                        $b++;
                                        $group2 = $alt2[0];
                                        $groupModificator = $alt2[1];

//                                    $curTmpSeqIndex = $this->curTmpSeqIndex;
//                                    $startIndex = $this->curTmpSeqIndex;
                                        $this->debugStore('alt - ' . $modificator);
                                        $this->debugDump();
                                        $_matchedElements = [];
                                        $_matchedThings = [];
                                        $this->level++;
                                        $res = $this->matchGroupAtIndex($group2, $curTmpSeqIndex, $_matchedElements, $_matchedThings);
                                        $this->level--;
                                        if (true === $res) {
                                            $modelMatches = true;
                                            $this->debugStore('alt matched ');
                                            foreach ($_matchedElements as $el) {
                                                $matchedElements[] = $el;
                                            }
                                            foreach ($_matchedThings as $th) {
                                                $matchedThings[] = $th;
                                            }
                                            $curTmpSeqIndex++;
                                            if (!array_key_exists($curTmpSeqIndex, $this->sequence)) {
                                                break 2;
                                            }
                                        } else {
                                            if ($nbAlts === $b) {
                                                break 2;
                                            }
                                        }
                                    }
                                }
                            }


                            break;
                        } else {

                            $this->curTmpSeqIndex = $startIndex;

                            // if all alternatives fail, it fails...
                            if ($a === $nbAlts) {

                                // ... unless there was an optional modificator
                                if ('?' === $modificator || '*' === $modificator) {
                                    $modelMatches = true;
                                    $this->debugStore('alt failed but ' . $modificator . ' ');
                                } else {
                                    $matchedElements = [];
                                    $matchedThings = [];
                                    $this->debugStore('alt failed');
                                    $this->modelFails();
                                }
                            }

                        }
                    }


                } else {
                    throw new \Exception("not implemented yet");
                }


                $this->debugDump();
            }

            $this->debugStore(' EndOfModelOrGroup');


        } catch (ModelDoesNotMatchException $e) {
            $this->debugStore(' - [ModelDoesNotMatch]');
            $modelMatches = false;
        } catch (EndOfSequenceException $e) {
            $this->debugStore(' - [EndOfSequence]');
//            $modelMatches = false;
        }


        $this->debugStore((true === $modelMatches) ? ' -> success' : ' -> failure');
        $this->debugDump();
        if (true === $modelMatches) {
            $index = $this->curTmpSeqIndex - 1;
            $this->debugStore('update real seqIndex: ' . $index . ', merging tmp matched elements');
            $this->debugDump();
            return true;
        }
        return false;
    }


    private function nextSequenceElement(&$modelMatches, $numElement, $nbElements, array $elements)
    {
        $this->debugStore(' - update tmp seqIndex: ' . $this->curTmpSeqIndex);
        $this->curTmpSeqIndex++;
        $this->debugStore(' -> ' . $this->curTmpSeqIndex);
        if ($numElement === $nbElements) {
            $modelMatches = true;
        } elseif ($numElement < $nbElements) {
            /**
             * If the sequence ends before the model,
             * by default the match will fail, but sometimes,
             * all the remaining elements in the model are optional,
             * so it should match.
             */
            $allOptional = true;
            for ($i = $numElement; $i < $nbElements; $i++) {
                $el = $elements[$i];
                $modif = $el[1];
                if ('?' !== $modif && '*' !== $modif) {
                    $allOptional = false;
                }
            }
            if (true === $allOptional) {
                $modelMatches = true;
            }
        }


        if ($this->curTmpSeqIndex > $this->maxSequenceIndex) {

            throw new EndOfSequenceException();
        }
    }

    private function modelFails()
    {
        throw new ModelDoesNotMatchException();
    }

//    private function debugStart()
//    {
//        $this->debugLine = '';
//    }

    private function debugStore($m)
    {
        $this->debugLine .= $m;
    }

    private function debugDump()
    {
        if (true === $this->_debugMode) {
            echo str_repeat('_', $this->level * 2) . ' ' . $this->debugLine . $this->debugLineCr;
        }
        $this->debugLine = '';
    }

    private function debugThingToString($thing)
    {
        if (null !== $this->debugThingToStringFunc) {
            return call_user_func($this->debugThingToStringFunc, $thing);
        }
    }
}