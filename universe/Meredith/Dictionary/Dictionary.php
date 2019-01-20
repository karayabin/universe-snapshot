<?php

namespace Meredith\Dictionary;

/*
 * LingTalfi 2016-01-02
 */
class Dictionary implements DictionaryInterface
{

    private static $inst;
    /**
     * array of english word => translated word
     */
    private $words;

    protected function __construct()
    {
        $this->words = [];
    }

    public static function inst()
    {
        if (null === self::$inst) {
            self::$inst = new static;
        }
        return self::$inst;
    }

    /**
     * @param $word
     * @return false|string
     */
    public function search($word)
    {
        if (array_key_exists($word, $this->words)) {
            return $this->words[$word];
        }
        return false;
    }

    public function setWords(array $words)
    {
        $this->words = $words;
        return $this;
    }


}
