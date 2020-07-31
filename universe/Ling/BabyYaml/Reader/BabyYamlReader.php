<?php


namespace Ling\BabyYaml\Reader;


use Ling\BabyYaml\Reader\Exception\ParseErrorException;
use Ling\BabyYaml\Reader\NodeToArrayConvertor\NodeToArrayConvertor;
use Ling\BabyYaml\Reader\ValueInterpreter\BabyYamlValueInterpreter;
use Ling\BabyYaml\Reader\ValueInterpreter\ValueInterpreter;

class BabyYamlReader
{
    /**
     * @var BabyYamlBuilder
     */
    protected $builder;

    /**
     * @var NodeToArrayConvertor
     */
    protected $convertor;

    /**
     * @var ValueInterpreter
     */
    protected $interpreter;


    public function __construct()
    {
        $this->convertor = new NodeToArrayConvertor();
        $this->builder = new BabyYamlBuilder();
        $this->interpreter = new BabyYamlValueInterpreter();
    }


    public static function create()
    {
        return new static();
    }


    /**
     * @return array|false in case of failure.
     * @throws ParseErrorException
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


    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    protected function handleReadResult($res)
    {
        return $this->convertor->convert($res, $this->interpreter);
    }
}