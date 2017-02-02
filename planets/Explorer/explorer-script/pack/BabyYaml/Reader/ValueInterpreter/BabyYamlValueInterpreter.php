<?php



namespace BabyYaml\Reader\ValueInterpreter;
use BabyYaml\Reader\StringParser\BabyYamlLineExpressionDiscoverer;


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
