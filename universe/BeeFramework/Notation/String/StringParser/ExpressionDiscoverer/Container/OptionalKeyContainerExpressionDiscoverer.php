<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\String\StringParser\ExpressionDiscoverer\Container;

use BeeFramework\Bat\VarTool;
use BeeFramework\Component\String\StringIterator\StringIteratorInterface;
use BeeFramework\Notation\String\StringParser\ExpressionDiscoverer\GreedyExpressionDiscovererInterface;
use BeeFramework\Notation\String\StringParser\ExpressionDiscovererModel\ExpressionDiscovererModelInterface;
use BeeFramework\Notation\String\StringParser\Validator\ContainerValidator;
use BeeFramework\Notation\String\StringParser\Validator\ValidatorInterface;


/**
 * OptionalKeyContainerExpressionDiscoverer
 * @author Lingtalfi
 * 2015-05-14
 *
 * Symbol that need quote protection
 * --------------------------------------
 *
 * The following symbols need quote protection to be used:
 * - for the key:
 *      - the keyValueSep symbol, the valueSep symbol, and any container begin symbol that might be used as a discoverer.
 * - for the value:
 *      - the valueSep symbol and the container end symbol
 *
 *
 *
 *
 *
 *
 */
class OptionalKeyContainerExpressionDiscoverer extends TriContainerExpressionDiscoverer
{
    public function __construct()
    {
        parent::__construct(); 
        $this->setMonitorMessagePrefix('Opt: ');
    }


    final protected function getContainerSpecialSymbolsForKey()
    {
        // do not change here, an optionalKey class should detect value sep even while parsing a key
        return [$this->getKeyValueSep(), $this->getValueSep()];
    }


    protected function parseContainer(StringIteratorInterface $it)
    {
        $string = $it->getString();
        $len = mb_strlen($string);
        $keyValidator = ContainerValidator::create()->setSymbols($this->getContainerSpecialSymbolsForKey());
        $validator = ContainerValidator::create()->setSymbols($this->getContainerSpecialSymbols());


        $values = [];
        $searchType = 1;
        $autoIndex = false;
        $allowImplicitKeys = $this->implicitKeys;
        $allowImplicitValues = $this->implicitValues;
        $allowImplicitEntries = $this->implicitEntries;

        $key = null;
        $lastWasSep = false;


        while ($it->isValid()) {

            $itLen = 1;


            $this->skipNotSignificant($it);

            $this->notice("new iteration with char: " . $it->current() . " and position=" . $it->getPosition());

            if ($this->isContainerEnd($it)) {
                if (true === $lastWasSep) {
                    if (true === $allowImplicitEntries) {
                        list($key, $value) = $this->getDefaultImplicitEntry();
                        if (null === $key) {
                            $values[] = $value;
                        }
                        else {
                            $values[$key] = $value;
                        }
                    }
                    else {
                        $this->failure("The combination of the valueSep symbol followed by the end symbol would imply the creation of an implicit entry, but implicit entries is off");
                        return false;
                    }
                }
                $this->notice("Container end Found");
                $this->adjustIteratorPosition($it);
                return $values;
            }
            else {
                if (1 === $searchType) {
                    $this->info("now searchType=$searchType");

                    $pos = $it->getPosition();

                    /**
                     * Here, although we look for a key,
                     * there is a special case where the key is optional and the actual thing
                     * that we need to process is a container.
                     * So in order to take care of this possibility,
                     * we do process containers now, because a key cannot be a container,
                     * so if we find a container now, then it means that the key was optional.
                     * If not we will parse the key as normal.
                     *
                     * This whole problem is explained in conception notes.
                     * Basically, it's about how you interpret this string:
                     *
                     *          (a: 21, [a, b], [{po: ko}], b:)
                     *
                     * The correct interpretation is:
                     *
                     * - a: 21
                     * - 0:
                     * ----- 0: a
                     * ----- 1: b
                     * - 1:
                     * ----- 0:
                     * --------- po: ko
                     * - b: null
                     *
                     *
                     * However, without the following extra step that we take, the result would be:
                     *
                     * - a: 21
                     * - 0:
                     * ----- 0: a
                     * ----- 1: b
                     * - [{po: ko}]
                     * - b: null
                     *
                     *
                     *
                     *
                     * Note:
                     *      a user is supposed to escape the begin symbol of the containers
                     *
                     *
                     */
                    $this->notice("trying to parse a container in case this is an optional key with a container as value...");
                    $valueFound = false;
                    $v = $this->parseContainersFromValue($it, $validator, $string, $len, $valueFound);
                    if (true === $valueFound) {
                        $this->warning("container found: " . VarTool::toString($v, ['details' => true]));
                        $value = $v;
                        $it->next();
                        $this->skipNotSignificant($it);
                        $searchType = 4;
                        $key = null;
                        $autoIndex = true;
                    }
                    else {
                        $this->notice("no container found");
                    }

                    if (1 === $searchType) {
                        if ($this->isKeyValueSeparator($it)) {
                            $this->notice("isKeyValueSeparator");
                            if (true === $allowImplicitKeys) {
                                $key = $this->getDefaultImplicitKey();
                                if (null === $key) {
                                    $autoIndex = true;
                                }
                                $searchType = 2;
                            }
                            else {
                                $this->failure("kvSep was found, but no key was found, and implicit mode is off");
                                return false;
                            }
                        }
                        elseif ($this->isValueSeparator($it)) {
                            $this->notice("isValueSeparator");
                            if (true === $allowImplicitEntries) {
                                list($key, $value) = $this->getDefaultImplicitEntry();
                                if (null === $key) {
                                    $autoIndex = true;
                                }
                                $searchType = 4;
                            }
                            else {
                                $this->failure("valueSep was found, but no key/value pair was found, and implicit entries is off");
                                return false;
                            }
                        }
                        else {
                            $this->notice("trying to parse key...");
                            $keyFound = false;
                            $k = $this->parseKey($it, $keyValidator, $string, $keyFound);
                            if (true === $keyFound) {
                                $this->warning("key found: " . VarTool::toString($k, ['details' => true]));
                                $key = $k;
                                $it->next();
                                $this->skipNotSignificant($it);
                                $searchType = 2;
                            }
                            else {
                                $this->notice("key not found, will  be interpreted as value with optional key then");
                                $autoIndex = true;
                                $key = null;
                                $searchType = 3;
                            }
                        }
                    }


                    $this->info("now searchType=$searchType");

                    if (2 === $searchType) {
                        // at this point, cursor should be at the beginning of the kvSep                                    
                        // or possibly a valueSep for a value without key                                    
                        if ($this->isKeyValueSeparator($it)) {
                            $this->notice("isKeyValueSeparator");
                            $searchType = 3;
                            $this->next($this->getKeyValueSepLen(), $it);
                            $this->skipNotSignificant($it);
                        }
                        elseif ($this->isValueSeparator($it)) {
                            $this->notice("isValueSeparator and a key was found: so this is an optional key");
                            $value = null; // since the value could be a special symbol, we need to reparse it with the discoverers
                            $it->setPosition($pos); // rewind back to the beginning of the key
                            $key = null;
                            $autoIndex = true;
                            $searchType = 3;
                        }
                        else {
                            $this->failure("cursor should be in front of kvSep or Sep");
                            return false;
                        }
                    }

                    $this->info("now searchType=$searchType");

                    if (3 === $searchType) {
                        // at this point, cursor should be at the beginning of a value
                        $isValueSep = $this->isValueSeparator($it);
                        if (true === $isValueSep || true === $this->isContainerEnd($it)) {
                            $this->notice("isValueSep or END");
                            if (true === $allowImplicitValues) {
                                $value = $this->getDefaultImplicitValue();
                            }
                            else {
                                return false;
                            }
                        }
                        else {
                            $this->notice("trying to parse value...");
                            $valueFound = false;
                            $v = $this->parseValue($it, $validator, $string, $len, $valueFound);
                            if (true === $valueFound) {
                                $this->warning("value found: " . VarTool::toString($v, ['details' => true]));
                                $value = $v;
                                $it->next();
                                $this->skipNotSignificant($it);
                            }
                            else {
                                $this->notice("value not found");
                                return false;
                            }

                        }
                        $searchType = 4;
                    }


                    if (4 === $searchType) {
                        $this->success("adding key=$key and value=" . VarTool::toString($value) . " with autoIndex=$autoIndex");
                        $lastWasSep = false;
                        // at this point, both key and value should be defined
                        // at this point, the cursor should be on a valueSep or at the container end, or the end of the string
                        if (false === $autoIndex) {
                            $values[$key] = $value;
                        }
                        else {
                            $values[] = $value;
                        }
                        
                        $autoIndex = false;
                        $searchType = 1;
                        if (true === $this->isContainerEnd($it)) {
                            continue;
                        }
                        if ($this->isValueSeparator($it)) {

                            $itLen = $this->getValueSepLen();
                            $lastWasSep = true;
                        }
                    }

                }
            }

            $this->debug("going to next iteration with char=" . $it->current() . ", position=" . $it->getPosition() . ", itLen=$itLen");
            $this->next($itLen, $it);
        }

        return false;
    }

    protected function parseContainersFromValue(StringIteratorInterface $it, ValidatorInterface $validator, $string, $len, &$found)
    {
        $p = $it->getPosition();
        foreach ($this->getDiscoverers() as $d) {

            // handling recursion
            if ($d instanceof ExpressionDiscovererModelInterface) {
                $d = $d->getExpressionDiscoverer();
            }


            // handling greedy discoverers
            if ($d instanceof GreedyExpressionDiscovererInterface) {
                $d->setBoundarySymbols($this->getContainerSpecialSymbols());
            }

            if (
                $d instanceof ContainerExpressionDiscoverer &&
                true === $d->parse($string, $p)
            ) {
                /**
                 * discoverer has found a matching expression,
                 * but is the expression really valid?
                 */
                $lastP = $d->getLastPos();
                if (
                    true === $this->isLastChar($lastP, $len) ||
                    true === $this->testValidity($lastP, $it, $validator)
                ) {
                    $found = true;
                    $it->setPosition($lastP);
                    return $this->resolveValues($d->getValue());
                    break;
                }
            }
        }
        return false;
    }

}
