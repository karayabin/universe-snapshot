<?php

namespace IndentedLines\ValueInterpreter;

use Quoter\QuoteTool;


/**
 * QuotableValueInterpreter
 * @author Lingtalfi
 * 2015-12-19
 *
 */
class QuotableValueInterpreter extends ValueInterpreter
{

    private $quotedValueIsAlwaysString;

    public function __construct()
    {
        parent::__construct();
        $this->quotedValueIsAlwaysString = false;
    }





    //------------------------------------------------------------------------------/
    // IMPLEMENTS ValueInterpreterInterface
    //------------------------------------------------------------------------------/
    /**
     * @return mixed
     */
    public function getValue($line)
    {
        if (false !== $line2 = QuoteTool::unquote($line)) {
            $line = $line2;
            if (true === $this->quotedValueIsAlwaysString) {
                return $line;
            }
        }
        return parent::getValue($line);
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setQuotedValueIsAlwaysString($quotedValueIsAlwaysString)
    {
        $this->quotedValueIsAlwaysString = $quotedValueIsAlwaysString;
        return $this;
    }


}
