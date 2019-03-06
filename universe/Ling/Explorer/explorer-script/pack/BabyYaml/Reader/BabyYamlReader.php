<?php


namespace BabyYaml\Reader;



use Ling\BabyYaml\Reader\Exception\ParseErrorException;
use Ling\BabyYaml\Reader\NodeToArrayConvertor\NodeToArrayConvertor;
use Ling\BabyYaml\Reader\ValueInterpreter\BabyYamlValueInterpreter;
use Ling\BabyYaml\Reader\ValueInterpreter\ValueInterpreter;

class BabyYamlReader
{
    /**
     * @var BabyYamlBuilder
     */
    private $builder;

    /**
     * @var NodeToArrayConvertor
     */
    private $convertor;

    /**
     * @var ValueInterpreter
     */
    private $interpreter;


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