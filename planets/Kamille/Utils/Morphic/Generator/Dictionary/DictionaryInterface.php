<?php


namespace Kamille\Utils\Morphic\Generator\Dictionary;


interface DictionaryInterface
{
    public function getLabel($table, $plural = false);
}