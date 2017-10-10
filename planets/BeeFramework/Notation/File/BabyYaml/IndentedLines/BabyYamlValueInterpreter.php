<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\File\BabyYaml\IndentedLines;

use BeeFramework\Notation\File\BabyYaml\StringParser\BabyYamlLineExpressionDiscoverer;
use BeeFramework\Notation\File\IndentedLines\ValueInterpreter\ValueInterpreterInterface;


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
