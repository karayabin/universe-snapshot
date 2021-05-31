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
     * Sets the numbersAsString.
     *
     * @param bool $numbersAsString
     */
    public function setNumbersAsString(bool $numbersAsString)
    {
        $this->interpreter->setNumbersAsString($numbersAsString);

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


    /**
     * Returns the babyYaml array from the given file.
     *
     * @param $file
     * @return array
     */
    public function readFile($file): array
    {
        return $this->handleReadResult($this->builder->buildByFile($file));
    }


    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    /**
     * Returns the babyYaml array for the given handle read result.
     *
     *
     * Available options are:
     * - numbersToString: bool=false. If true, the numbers (i.e. int, float) are returned as strings.
     *
     *
     * @param $res
     * @param array $options
     * @return array
     */
    protected function handleReadResult($res)
    {
        return $this->convertor->convert($res, $this->interpreter);
    }
}