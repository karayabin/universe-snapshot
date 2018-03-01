<?php


namespace Kamille\Utils\Morphic\Generator\ConfigFileGenerator;


use Kamille\Utils\Morphic\Generator\Dictionary\DictionaryInterface;

interface ConfigFileGeneratorInterface
{
    public function setDictionary(DictionaryInterface $dictionary);

    /**
     * @return DictionaryInterface|null
     */
    public function getDictionary();

    public function getConfigFileContent(array $operation, array $config = []);
}