<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ling\BeeFramework\Notation\String\StringParser\ExpressionDiscoverer\Container;

use Ling\BeeFramework\Bat\VarTool;
use Ling\BeeFramework\Component\String\StringIterator\StringIteratorInterface;
use Ling\BeeFramework\Notation\String\StringParser\Validator\ContainerValidator;


/**
 * MandatoryKeyContainerExpressionDiscoverer
 * @author Lingtalfi
 * 2015-05-13
 *
 * This container works with mandatory keys, and values.
 * A mandatory key means that the keyValueSep symbol must be found for every entry.
 * However, it is possible to partially control the behaviour of the parsing
 * with the implicitKeys and implicitValues switches.
 *
 *
 *
 *
 * Symbol that need quote protection
 * --------------------------------------
 *
 * The following symbols need quote protection to be used:
 * - for the key:
 *      - the keyValueSep symbol
 * - for the value:
 *      - the valueSep symbol and the container end symbol
 *
 *
 *
 *
 *
 * 2019-07-03 Update
 * ----------------------
 * I needed optional keys for shortcode notation, so I added the optionalKey option.
 * It basically allows to write values directly, without the "key=" prefix.
 *
 *
 *
 *
 *
 *
 */
class MandatoryKeyContainerExpressionDiscoverer extends TriContainerExpressionDiscoverer
{

    /**
     * This property holds the optionalKeys for this instance.
     * @var bool
     */
    protected $optionalKeys;


    public function __construct()
    {
        parent::__construct();
        $this->optionalKeys = true;
        $this->setMonitorMessagePrefix('Man: ');
    }

    /**
     * Sets the optionalKeys.
     *
     * @param bool $optionalKeys
     */
    public function setOptionalKeys(bool $optionalKeys)
    {
        $this->optionalKeys = $optionalKeys;
    }


    final protected function getContainerSpecialSymbolsForKey()
    {
        // do not add valueSep here, or it's semantically not a mandatoryKey class anymore
        return [$this->getKeyValueSep()];
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
        $optionalKeys = $this->optionalKeys;

        $key = null;
        $lastWasSep = false;


        while ($it->isValid()) {

            $itLen = 1;

            $this->notice("new iteration with char: " . $it->current() . " and position=" . $it->getPosition());

            $this->skipNotSignificant($it);


            if ($this->isContainerEnd($it)) {
                if (true === $lastWasSep) {
                    $this->failure("The combination of the valueSep symbol followed by the end symbol would imply the creation of an implicit key, which is forbidden with this mandatoryKey class");
                    return false;
                }
                $this->notice("Container end Found");
                $this->adjustIteratorPosition($it);
                return $values;
            } else {
                if (1 === $searchType) {
                    $this->info("now searchType=$searchType");

                    if ($this->isKeyValueSeparator($it)) {
                        $this->notice("isKeyValueSeparator");
                        if (true === $allowImplicitKeys) {
                            $key = $this->getDefaultImplicitKey();
                            if (null === $key) {
                                $autoIndex = true;
                            }
                            $searchType = 2;
                        } else {
                            $this->failure("kvSep was found, but no key was found, and implicit mode is off");
                            return false;
                        }
                    } else {
                        $this->notice("trying to parse key...");
                        $keyFound = false;
                        $k = $this->parseKey($it, $keyValidator, $string, $keyFound);
                        if (true === $keyFound) {
                            $this->warning("key found: " . VarTool::toString($k, ['details' => true]));
                            $key = $k;
                            $it->next();
                            $this->skipNotSignificant($it);
                            $searchType = 2;
                        } else {

                            $this->notice("key not found");

                            if (true === $optionalKeys) {
                                $searchType = 3;
                                $autoIndex = true;
                            } else {
                                return false;
                            }
                        }
                    }

                    $this->info("now searchType=$searchType");

                    if (2 === $searchType) {
                        // at this point, cursor should be at the beginning of the kvSep                                    
                        if ($this->isKeyValueSeparator($it)) {
                            $this->notice("isKeyValueSeparator");
                            $searchType = 3;
                            $this->next($this->getKeyValueSepLen(), $it);
                            $this->skipNotSignificant($it);
                        } else {
                            $this->failure("cursor should be in front of kvSep");
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
                            } else {
                                return false;
                            }
                        } else {
                            $this->notice("trying to parse value...");
                            $valueFound = false;
                            $v = $this->parseValue($it, $validator, $string, $len, $valueFound);
                            if (true === $valueFound) {
                                $this->warning("value found: " . VarTool::toString($v, ['details' => true]));
                                $value = $v;
                                $it->next();
                                $this->skipNotSignificant($it);
                            } else {
                                $this->notice("value not found");
                                return false;
                            }

                        }

                        $this->success("adding key=$key and value=" . VarTool::toString($value) . " with autoIndex=$autoIndex");
                        $lastWasSep = false;
                        // at this point, both key and value should be defined
                        // at this point, the cursor should be on a valueSep or at the container end, or the end of the string
                        if (false === $autoIndex) {
                            $values[$key] = $value;
                        } else {
                            $values[] = $value;
                        }

                        $autoIndex = false;
                        $searchType = 1;
                        if (true === $this->isContainerEnd($it)) {
                            if (true === $lastWasSep) {
                                $this->failure("The combination of the valueSep symbol followed by the end symbol would imply the creation of an implicit key, which is forbidden with this mandatoryKey class");
                                return false;
                            }
                            $this->notice("Container end Found");
                            $this->adjustIteratorPosition($it);
                            return $values;
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


}
