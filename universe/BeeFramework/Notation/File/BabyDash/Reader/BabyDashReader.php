<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\File\BabyDash\Reader;

use BeeFramework\Component\Error\CodifiedErrors\Tools\CodifiedErrorsTool;
use BeeFramework\Notation\File\BabyDash\Exception\BabyDashException;
use BeeFramework\Notation\File\BabyDash\IndentedLines\BabyDashNodeTreeBuilder;
use BeeFramework\Notation\File\BabyDash\IndentedLines\BabyDashValueInterpreter;
use BeeFramework\Notation\File\IndentedLines\Node\NodeInterface;
use BeeFramework\Notation\File\IndentedLines\NodeToArrayConvertor\NodeToArrayConvertor;
use BeeFramework\Notation\File\IndentedLines\NodeToArrayConvertor\NodeToArrayConvertorInterface;
use BeeFramework\Notation\File\IndentedLines\NodeTreeBuilder\NodeTreeBuilderInterface;


/**
 * BabyDashReader
 * @author Lingtalfi
 * 2015-04-17
 *
 */
class BabyDashReader
{

    /**
     * @var NodeTreeBuilderInterface
     */
    protected $builder;

    /**
     * @var NodeToArrayConvertorInterface
     */
    protected $convertor;

    /**
     * @var BabyDashValueInterpreter
     */
    protected $interpreter;
    protected $options;
    protected $errors;


    public function __construct(array $options = [])
    {
        $this->options = array_replace([
            /**
             * errorMode:
             *      - 0: silent, a failing method returns false, errors are accessible through getErrors
             *      - 1: exception
             */
            'errorMode' => 1,
        ], $options);
        $this->builder = new BabyDashNodeTreeBuilder();
        $this->interpreter = new BabyDashValueInterpreter();
        $this->convertor = new NodeToArrayConvertor();
        $this->errors = [];
    }


    public static function create()
    {
        return new static();
    }


    /**
     * @return array|false in case of failure.
     * @throws BabyDashException, depending on the errorMode.
     *
     */
    public function readString($string)
    {
        return $this->handleReadResult($this->builder->buildByString($string));
    }


    public function readFile($file)
    {
        return $this->handleReadResult($this->builder->buildByFile($file));
    }


    /**
     * @var array of errors
     */
    public function getErrors()
    {
        return $this->errors;
    }


    /**
     * @return BabyDashValueInterpreter
     */
    public function getInterpreter()
    {
        return $this->interpreter;
    }

    /**
     * @return BabyDashNodeTreeBuilder
     */
    public function getBuilder()
    {
        return $this->builder;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function handleReadResult($res)
    {
        $this->errors = [];
        $ret = false;


        // check inline value parsing errors
        if ($res instanceof NodeInterface) {
            $ret = $this->convertor->convert($res, $this->interpreter);
            if (true === $this->interpreter->hasError()) {
                $this->errors = CodifiedErrorsTool::toPlainErrorMessages($this->interpreter->getErrors());
                $ret = false;
            }
        }
        else {
            $this->errors = CodifiedErrorsTool::toPlainErrorMessages($this->builder->getErrors());
        }


        // check for building indented lines notation error
        $nErrors = $this->builder->getErrors();
        if ($nErrors) {
            $this->errors = array_merge($this->errors, CodifiedErrorsTool::toPlainErrorMessages($nErrors));
        }


        if ($this->errors) {
            $errMode = $this->options['errorMode'];
            switch ($errMode) {
                case 0:
                    $ret = false;
                    break;
                case 1:
                    $msg = implode(';' . PHP_EOL, $this->errors);
                    throw new BabyDashException($msg);
                    break;
                default:
                    throw new \RuntimeException(sprintf("Unknown errorMode: %s", $errMode));
                    break;
            }
        }
        return $ret;
    }
}
