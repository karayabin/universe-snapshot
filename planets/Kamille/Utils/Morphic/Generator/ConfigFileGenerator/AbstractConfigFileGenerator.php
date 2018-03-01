<?php


namespace Kamille\Utils\Morphic\Generator\ConfigFileGenerator;


use Kamille\Utils\Morphic\Generator\Dictionary\DictionaryInterface;

abstract class AbstractConfigFileGenerator implements ConfigFileGeneratorInterface
{

    /**
     * @var $dictionary DictionaryInterface
     */
    protected $dictionary;

    public function __construct()
    {
        $this->dictionary = null;
    }


    public static function create()
    {
        return new static();
    }

    public function setDictionary(DictionaryInterface $dictionary)
    {
        $this->dictionary = $dictionary;
        return $this;
    }

    public function getDictionary()
    {
        return $this->dictionary;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
}