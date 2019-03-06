<?php


namespace BabyYaml\Reader\StringParser\ExpressionDiscoverer\Miscellaneous;


use Ling\BabyYaml\Reader\StringIterator\StringIterator;
use Ling\BabyYaml\Reader\StringIterator\StringIteratorInterface;
use Ling\BabyYaml\Reader\StringParser\ExpressionDiscoverer\Container\MandatoryKeyContainerExpressionDiscoverer;
use Ling\BabyYaml\Reader\StringParser\ExpressionDiscoverer\Container\OptionalKeyContainerExpressionDiscoverer;
use Ling\BabyYaml\Reader\StringParser\ExpressionDiscoverer\HybridExpressionDiscoverer;
use Ling\BabyYaml\Reader\StringParser\ExpressionDiscoverer\SimpleQuoteExpressionDiscoverer;
use Ling\BabyYaml\Reader\StringParser\ExpressionDiscovererModel\ExpressionDiscovererModel;


/**
 * ShortCodeExpressionDiscoverer
 * @author Lingtalfi
 * 2015-05-14
 *
 *
 * To emulate a line of short codes.
 * See doc for more details.
 *
 * Basically:
 *
 * - each shortCode is separated from another by a comma
 * - a shortCode is composed of a mandatory key and a value separated by an equal symbol
 *
 * - we can use quotes to escape special symbols (comma, square brackets, the => operator)
 * - the value can be an array in the style of php (including nesting)
 *
 * - all scalar can be directly written without quotes if they don't contain the special symbols mentioned above
 * - all quotedString use simple escaping mechanism
 *
 *
 * Example of possible syntax:
 *
 *          fruit=apple
 *          fruits=[apple, banana], phrase=I like shortCodes, word="bo=ob"
 *
 *
 *
 * Implicit values are not allowed.
 *
 * 
 * With this implementation, it is assumed that the given str/pos combo IS actually a short code 
 * (i.e. there is no checking on the string, and it is directly parsed AS shortCode)
 * 
 *
 */
class ShortCodeExpressionDiscoverer extends MandatoryKeyContainerExpressionDiscoverer
{


    public function __construct()
    {
        parent::__construct();
        $arr = new OptionalKeyContainerExpressionDiscoverer();
        $arrModel = new ExpressionDiscovererModel($arr);
        $discoverers = [
            $arrModel,
            new SimpleQuoteExpressionDiscoverer(),
            new HybridExpressionDiscoverer(),
        ];
        $arr
            ->setBeginSep('[')
            ->setEndSep(']')
            ->setKeyValueSep('=>')
            ->setValueSep(',')
            ->setImplicitKeys(false)
            ->setImplicitValues(false)
            ->setImplicitEntries(false)
            ->setDiscoverers($discoverers)
            ->setKeyDiscoverers([
                new SimpleQuoteExpressionDiscoverer(),
                HybridExpressionDiscoverer::create(),
            ]);


        $quote = new SimpleQuoteExpressionDiscoverer();
        $this
            ->setKeyDiscoverers([
                $quote,
                HybridExpressionDiscoverer::create(),
            ])
            ->setDiscoverers($discoverers)
            ->setImplicitKeys(false)
            ->setImplicitValues(false)
            ->setImplicitEntries(false)
            ->setKeyValueSep('=')
            ->setValueSep(',');
    }

    public function parse($string, $pos = 0)
    {
        // reset
        $this->pos = false;
        $this->value = null;

        $it = new StringIterator($string);
        $it->setPosition($pos);
        if (false !== $values = $this->parseContainer($it)) {
            $this->value = $values;
            $this->pos = $it->getPosition();
            return true;
        }
        return false;
    }

    protected function isContainerEnd(StringIteratorInterface $it)
    {
        return !$it->isValid();
    }
}
