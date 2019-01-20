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

use BeeFramework\Bat\ClassTool;
use BeeFramework\Component\String\StringIterator\StringIterator;
use BeeFramework\Component\String\StringIterator\StringIteratorInterface;
use BeeFramework\Notation\String\StringParser\ExpressionDiscoverer\ExpressionDiscoverer;
use BeeFramework\Notation\String\StringParser\ExpressionDiscoverer\GreedyExpressionDiscovererInterface;
use BeeFramework\Notation\String\StringParser\ExpressionDiscoverer\Tool\ExpressionDiscovererTool;
use BeeFramework\Notation\String\StringParser\ExpressionDiscovererModel\ExpressionDiscovererModelInterface;
use BeeFramework\Notation\String\StringParser\Validator\ValidatorInterface;
use Komin\Component\Monitor\Traits\ClassicMonitorTrait;


/**
 * TriContainerExpressionDiscoverer
 * @author Lingtalfi
 * 2015-05-14
 *
 *
 *
 * General
 * ----------------------
 *
 * This container serves as the base class for 3 common container formats:
 *
 * - sequence       (see ValueContainerExpressionDiscoverer)
 * - mapping        (see MandatoryKeyContainerExpressionDiscoverer)
 * - arrangement    (see OptionalKeyContainerExpressionDiscoverer)
 *
 *
 *
 * Discoverers & keyDiscoverers
 * -----------------------------------
 *
 * To match the inner expression(s) (the components of the container if you will),
 * it uses discoverers.
 * There are discoverers to match values, and discoverers to match key.
 *
 *
 *
 *
 * Special symbols
 * -----------------------
 *
 * Special symbols is the name for symbols that are used for:
 *
 * - validation
 *      if the char after a discoverer's match is not a special symbol,
 *      the match is discarded.
 *
 * - to limit the matching of an expression
 *      so called "greedy" discoverers match every char until they reach those special symbols.
 *
 *
 * Possible special symbols are:
 *  - the container end symbol
 *  - value separator symbol
 *  - key value separator symbol (only useful for mapping and arrangement)
 *
 *
 * The actual special symbols being used depend on the type of expression being parsed (key or value?), and the
 * parsing mode (sequence, mapping, arrangement).
 * In other words, the concrete instance defines which special symbols are being used and when.
 *
 *
 *
 * Implicit values
 * ----------------------
 *
 * Implicit values are values that are suggested by the notation, but not explicitly written by the user.
 * A simple example to understand this is the following sequences:
 *
 * - [a, b, c]
 * - [a, b, c, ]
 *
 * The first sequence has 3 explicit values: a, b and c.
 * The second sequence has 3 explicit values: a, b and c, and one implicit value after the c.
 *
 * There are 3 types of implicit values:
 *
 * - implicitKeys    (only for mapping or arrangement)
 * - implicitValues  (for all types)
 * - implicitEntries (only for arrangement)
 *
 *
 * An important concept to grasp when working with implicit values is that when the concrete class
 * faces an implicit value problem, it will ask the default value to use.
 * We can control which value will be return.
 * The interesting thing though is that if we return null as a key (when an implicit key is asked, or the key in
 * an implicit entry is asked), which is the default, it means: "use php default indexing mechanism".
 *
 * It's worth noticing that in php, the following array:
 *
 *          [null => 6]  is seen as   ['' => 6]
 *
 * That's why we can safely use the null char for the purpose of auto indexing in our system.
 *
 *
 *
 *
 *
 * Guidelines for algorithm
 * ---------------------------------
 *
 * The general algorithm used by all modes is basically linear.
 * This means it goes from the left most char to the right most char,
 * looking for a type of data (a key, a value, a keyValueSeparator, a valueSeparator, or the end container symbol) at a time,
 * jumping from a data to the next (for instance jumping from the key to the keyValueSep, then from the keyValueSep to the
 * value, then from the value to either the valueSep or the container end, and again from the valueSep to the key and so on... )
 * until it reaches the container end (if any).
 *
 * It handles all implicit values along the way, as one would expect.
 * It ignores non significant symbols (the space and tab by default).
 * It also uses retro-validation, which is a concept discussed in the next section
 *
 *
 *
 *
 * Validation
 * ------------------
 *
 * The parsing algorithm uses the concept of retro-validation, called validation.
 *
 * The validation allows us to discard a match found by a discoverer.
 * Take a look at those two expressions:
 *
 * - [root]
 * - [root]/to/home
 *
 *
 * The first expression is a sequence, and an imaginary SequenceDiscoverer would say: it's a sequence.
 * The second expression starts like a sequence, but is actually thought as a string.
 * However, a SequenceDiscoverer would say: it's a sequence, because it's the nature of a discoverer to stop as soon
 * as it can find a match.
 *
 * This can lead to undesirable results, and therefore we have implement the validation concept,
 * which is the ability to discard the match found by a discoverer in certain circumstances.
 *
 * Basically, there is a validator for key parsing, and a validator for value parsing, and both works the same way:
 * they invalidate a match only if it is followed by certain symbols.
 * Those symbols depend on the situation. See concrete classes to see how it is implemented.
 * The key methods you might want to look at are:
 *
 * - getContainerSpecialSymbols
 * - getContainerSpecialSymbolsForKey
 *
 * That's right, special symbols have a lot to do with validation.
 *
 *
 *
 *
 * Other symbols
 * -----------------
 *
 * This class works with symbols:
 *
 *  - container begin
 *  - container end
 *  - key value sep
 *  - value sep
 *  - not significant symbols
 *
 *
 * The container begin can be either a callback or a string.
 * As for now, all other chars are just strings.
 *
 * Symbols and quote protection
 * --------------------------------------
 *
 * Some symbols need quote protection.
 * See the concrete implementations to see which symbols exactly.
 *
 *
 */
abstract class TriContainerExpressionDiscoverer extends ContainerExpressionDiscoverer
{


    private $keyDiscoverers;
    private $discoverers;

    protected $implicitKeys;
    protected $implicitValues;
    protected $implicitEntries;


    private $keyValueSep;
    private $keyValueSepLen;
    private $notSignificantSymbols;

    public function __construct()
    {
        parent::__construct();
        $this->keyDiscoverers = [];
        $this->discoverers = [];

        $this->keyValueSep = ':';
        $this->keyValueSepLen = 1;

        $this->notSignificantSymbols = [
            ' ' => 1,
            "\t" => 1,
            PHP_EOL => mb_strlen(PHP_EOL),
        ];


        $this->implicitKeys = false;
        $this->implicitValues = false;
        $this->implicitEntries = false;

    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setKeyDiscoverers(array $keyDiscoverers)
    {
        $this->keyDiscoverers = $keyDiscoverers;
        return $this;
    }

    public function getKeyDiscoverers()
    {
        return $this->keyDiscoverers;
    }

    public function getDiscoverers()
    {
        return $this->discoverers;
    }

    public function setDiscoverers(array $discoverers)
    {
        $this->discoverers = $discoverers;
        return $this;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/

    public function setImplicitKeys($bool)
    {
        $this->implicitKeys = $bool;
        return $this;
    }

    public function setImplicitValues($bool)
    {
        $this->implicitValues = $bool;
        return $this;
    }

    public function setImplicitEntries($bool)
    {
        $this->implicitEntries = $bool;
        return $this;
    }


    protected function getDefaultImplicitKey()
    {
        return null;
    }

    protected function getDefaultImplicitValue()
    {
        return null;
    }

    protected function getDefaultImplicitEntry()
    {
        return [null, null];
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/


    public function setKeyValueSep($keyValueSep)
    {
        $this->keyValueSep = $keyValueSep;
        $this->keyValueSepLen = mb_strlen($keyValueSep);
        return $this;
    }


    public function setNotSignificantSymbols(array $notSignificantSymbols)
    {
        $this->notSignificantSymbols = [];
        foreach ($notSignificantSymbols as $s) {
            $this->notSignificantSymbols[$s] = mb_strlen($s);
        }
//        if (true === $recursive) {
//            foreach ($this->getDiscoverers() as $d) {
//                if ($d instanceof TriContainerExpressionDiscoverer) {
//                    $d->setNotSignificantSymbols($notSignificantSymbols, $recursive);
//                }
//            }
//        }
        return $this;
    }
    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/


    protected function getKeyValueSep()
    {
        return $this->keyValueSep;
    }

    protected function getKeyValueSepLen()
    {
        return $this->keyValueSepLen;
    }


    protected function skipNotSignificant(StringIteratorInterface $it)
    {
        if ($this->notSignificantSymbols) {
            $string = $it->getString();
            while (true) {
                $moved = false;
                foreach ($this->notSignificantSymbols as $symbol => $len) {
                    if ($symbol === mb_substr($string, $it->getPosition(), $len)) {
                        $it->setPosition($it->getPosition() + $len);
                        $moved = true;
                    }
                }
                if (false === $moved) {
                    break;
                }
            }
        }
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/

    protected function isKeyValueSeparator(StringIteratorInterface $it)
    {
        return ($this->keyValueSep === mb_substr($it->getString(), $it->getPosition(), $this->keyValueSepLen));
    }

    protected function isLastChar($pos, $len)
    {
        return ($pos === ($len - 1));
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function getContainerSpecialSymbols()
    {
        return [$this->getEndSep(), $this->getValueSep()];
    }

    protected function getContainerSpecialSymbolsForKey()
    {
        return [$this->getKeyValueSep()];
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function testValidity($lastPos, StringIteratorInterface $it, ValidatorInterface $validator)
    {

        /**
         * We temporarily set the cursor to the next significant position to perform the validity test,
         * but this is internal and code outside this method won't notice.
         */
        $ret = false;
        $pos = $it->getPosition();

        $nextPos = $lastPos + 1;
        $it->setPosition($nextPos);
        $this->skipNotSignificant($it);
        $nextSignificantP = $it->getPosition();
        if (true === $validator->isValid($it->getString(), $pos, $lastPos, $nextSignificantP)) {
            $ret = true;
        }
        $it->setPosition($pos);
        return $ret;
    }



    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/

    protected function parseKey(StringIteratorInterface $it, ValidatorInterface $keyValidator, $string, &$keyFound)
    {

        $ret = false;
        $p = $it->getPosition();
        foreach ($this->getKeyDiscoverers() as $d) {

            // handling greedy discoverers
            if ($d instanceof GreedyExpressionDiscovererInterface) {
                $d->setBoundarySymbols($this->getContainerSpecialSymbolsForKey());
            }

            if (true === $d->parse($string, $p)) {
                /**
                 * discoverer has found a matching expression,
                 * but is the expression really valid?
                 */
                $lastP = $d->getLastPos();
                if (true === $this->testValidity($lastP, $it, $keyValidator)) {
                    $it->setPosition($lastP);
                    $keyFound = true;
                    return $this->resolveValues($d->getValue());
                    break;
                }
            }
        }
        return $ret;
    }


    protected function parseValue(StringIteratorInterface $it, ValidatorInterface $validator, $string, $len, &$found)
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


            if (true === $d->parse($string, $p)) {

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

    protected function resolveValues($mixed)
    {
        return $mixed;
    }


    /**
     * A container end symbol could have a length > 1.
     * We still have to return the last char of the matching expression though,
     * so this method fixes just that for container which end symbol's length is more than 1.
     *
     */
    protected function adjustIteratorPosition(StringIteratorInterface $it)
    {
        $len = $this->getEndSepLen();
        if ($len > 1) {
            $it->setPosition(ExpressionDiscovererTool::getLastCharRealPosition($it->getPosition(), $len));
        }
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/


}
