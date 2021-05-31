<?php


namespace Ling\BabyYaml\Reader\ValueInterpreter;

use Ling\BabyYaml\Reader\StringParser\BabyYamlLineExpressionDiscoverer;
use Ling\BabyYaml\Reader\StringParser\ExpressionDiscoverer\HybridExpressionDiscoverer;


/**
 * BabyYamlValueInterpreter
 * @author Lingtalfi
 * 2015-02-28
 *
 */
class BabyYamlValueInterpreter implements ValueInterpreterInterface
{

    /**
     * @var BabyYamlLineExpressionDiscoverer
     */
    protected $discoverer;
    protected $errors;


    public function __construct()
    {
        $this->discoverer = new BabyYamlLineExpressionDiscoverer();
        $this->errors = [];
    }


    /**
     * Sets the numbersAsString.
     *
     * @param bool $numbersAsString
     */
    public function setNumbersAsString(bool $numbersAsString)
    {
        $hybridExpressionDiscovererIndex = 3; // assuming we're using the default BabyYamlLineExpressionDiscoverer instance.
        $d = HybridExpressionDiscoverer::create();
        $d->setNumbersAsString($numbersAsString);
        $this->discoverer->setDiscovererAt($hybridExpressionDiscovererIndex, $d);
    }

    //------------------------------------------------------------------------------/
    // IMPLEMENTS ValueInterpreterInterface
    //------------------------------------------------------------------------------/
    /**
     * @return mixed
     */
    public function getValue($line)
    {
        $this->errors = [];
        if (true === $this->discoverer->parse($line)) {
            return $this->discoverer->getValue();
        }
        $this->errors[] = 'Syntax error';
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function hasError()
    {
        return (!empty($this->errors));
    }

    public function getErrors()
    {
        return $this->errors;
    }

}
