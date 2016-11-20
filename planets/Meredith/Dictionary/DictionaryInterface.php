<?php

namespace Meredith\Dictionary;

/*
 * LingTalfi 2016-01-02
 */
interface DictionaryInterface
{


    /**
     * @param $word
     * @return false|string
     */
    public function search($word);
}
