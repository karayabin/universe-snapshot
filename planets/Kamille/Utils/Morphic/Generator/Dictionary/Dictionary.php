<?php


namespace Kamille\Utils\Morphic\Generator\Dictionary;


use Kamille\Utils\Morphic\Exception\MorphicException;

class Dictionary implements DictionaryInterface
{
    protected $dictionaryFile;
    protected $dictionaryEntries;

    public function __construct()
    {
        $this->dictionaryFile = null;
        $this->dictionaryEntries = null; // null|array
    }


    public static function create()
    {
        return new static();
    }


    public function setDictionaryFile($dictionaryFile)
    {
        $this->dictionaryFile = $dictionaryFile;
        return $this;
    }


    public function getLabel($table, $plural = false)
    {
        $this->init();
        if (array_key_exists($table, $this->dictionaryEntries)) {
            $entries = $this->dictionaryEntries[$table];
            if (false === $plural) {
                return $entries[0];
            }
            return $entries[1];
        }
        throw new \Exception("Entry not found in dictionary for table $table");
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    private function init()
    {
        if (null === $this->dictionaryEntries) {
            $dictionary = [];
            if (file_exists($this->dictionaryFile)) {
                include $this->dictionaryFile;
            } else {
                throw new MorphicException("File doesn't exist: " . $this->dictionaryFile);
            }
            $this->dictionaryEntries = $dictionary;
        }
    }
}