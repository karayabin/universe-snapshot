<?php


namespace Kamille\Utils\Morphic\Generator;


use Bat\CaseTool;
use Bat\FileSystemTool;
use Kamille\Utils\Morphic\Exception\MorphicException;
use Kamille\Utils\Morphic\Generator\ConfigFileGenerator\ConfigFileGeneratorInterface;
use Kamille\Utils\Morphic\Generator\Dictionary\DictionaryInterface;
use OrmTools\Helper\OrmToolsHelper;
use QuickPdo\QuickPdo;
use QuickPdo\QuickPdoInfoTool;


/**
 * Synopsis:
 *
 * <?php
 * // ...
 * $file = __DIR__ . "/../config/morphic/Ekom/_ekom-morphic-generator.php";
 * $dicFile = __DIR__ . "/../config/morphic/Ekom/_ekom-morphic-dictionary.php";
 * $morphic = EkomNullosMorphicGenerator::create();
 * $morphic->setDictionary(Dictionary::create()->setDictionaryFile($dicFile));
 * $morphic->generateByFile($file);
 *
 */
abstract class MorphicGenerator implements MorphicGeneratorInterface
{


    /**
     * @var DictionaryInterface
     */
    protected $dictionary;
    protected $conf;
    private $_file;
    private $formConfigFileGen;
    private $listConfigFileGen;
    private $filterOperationsTables;


    public function __construct()
    {
        $this->conf = [];
        $this->filterOperationsTables = [];
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



    //--------------------------------------------
    //
    //--------------------------------------------
    public function generateByFile($file)
    {
        $this->_file = $file;
        $configuration = [];
        $operations = [];
        include $this->_file;
        $this->conf = $configuration;


        $this->onExecuteOperationsBefore($operations);
        foreach ($operations as $operation) {
            $operation = $this->prepareOperation($operation);
            $this->executeOperation($operation);
        }
        $this->onGenerateAfter();
    }

    public function generateByOperations(array $operations, array $configuration)
    {
        $this->conf = $configuration;
        $this->onExecuteOperationsBefore($operations);
        foreach ($operations as $operation) {
            $operation = $this->prepareOperation($operation);
            $this->executeOperation($operation);
        }
        $this->onGenerateAfter();
    }


    public function setFormConfigFileGen(ConfigFileGeneratorInterface $formConfigFileGen)
    {
        $this->formConfigFileGen = $formConfigFileGen;
        return $this;
    }

    public function setListConfigFileGen(ConfigFileGeneratorInterface $listConfigFileGen)
    {
        $this->listConfigFileGen = $listConfigFileGen;
        return $this;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sanitizer function to flatten the operation structure.
     * The operation structure is defined in
     * the "Kamille/Utils/Morphic/Generator/morphic-generator-brainstorm-2.md" file.
     *
     * - ?operationType
     * - elementTable
     * - elementName
     * - elementLabel (singular)
     * - elementLabelPlural
     * - elementRoute
     * - ric
     * - ...more custom fields
     *
     *
     * This function will add the following:
     * - columns: array of columns contained in the table
     * - columnTypes: array of column names => column types (mysql types)
     * - CamelCase: the CamelCase version of the element name
     *
     *
     *
     *
     *
     */
    protected function prepareOperation(array $operation)
    {
        if (false === array_key_exists("operationType", $operation)) {
            $operation['operationType'] = "create";
        }


        $hasPrimaryKey = false;
        $operation['columns'] = QuickPdoInfoTool::getColumnNames($operation['elementTable']);
        $operation['ric'] = OrmToolsHelper::getRic($operation['elementTable'], $hasPrimaryKey);
        $operation['hasPrimaryKey'] = $hasPrimaryKey;
        $operation['columns'] = QuickPdoInfoTool::getColumnNames($operation['elementTable']);
        $operation['columnTypes'] = QuickPdoInfoTool::getColumnDataTypes($operation['elementTable']);
        $operation['columnTypesPrecision'] = QuickPdoInfoTool::getColumnDataTypes($operation['elementTable'], true);
        $operation['columnFkeys'] = QuickPdoInfoTool::getForeignKeysInfo($operation['elementTable']);
        $operation['nullableKeys'] = QuickPdoInfoTool::getColumnNullabilities($operation['elementTable']);
        $operation['CamelCase'] = str_replace(' ', '', CaseTool::snakeToFlexiblePascal($operation['elementName']));
        $operation['ai'] = QuickPdoInfoTool::getAutoIncrementedField($operation['elementTable']);
        return $operation;
    }


    /**
     * @param array $operation , a well-formatted operation
     * Executes the given operation, which most of the time (if not always)
     * is of type "create" (generate the morphic files).
     * @throws MorphicException
     */
    protected function executeOperation(array $operation)
    {
        switch ($operation['operationType']) {
            case "create":
                $this->executeCreateOperation($operation);
                break;
            default:
                throw new MorphicException("Unknown operationType: " . $operation['operationType']);
                break;
        }
    }


    protected function executeCreateOperation(array $operation)
    {
        $this->onCreateOperationBefore($operation);
        /**
         * @var $formGen ConfigFileGeneratorInterface
         */
        $formGen = $this->formConfigFileGen;
        /**
         * @var $listGen ConfigFileGeneratorInterface
         */
        $listGen = $this->listConfigFileGen;


        if (null === $formGen) {
            throw new MorphicException("Undefined formConfigFileGen variable");
        }
        if (null === $formGen->getDictionary() && $this->dictionary) {
            $formGen->setDictionary($this->dictionary);
        }
        if (null === $listGen->getDictionary() && $this->dictionary) {
            $listGen->setDictionary($this->dictionary);
        }


        $content = $formGen->getConfigFileContent($operation, $this->conf);
        $formConfigFileDst = $this->getFormConfigFileDestination($operation, $this->conf);
        FileSystemTool::mkfile($formConfigFileDst, $content);

        $content = $listGen->getConfigFileContent($operation, $this->conf);

        $listConfigFileDst = $this->getListConfigFileDestination($operation, $this->conf);
        FileSystemTool::mkfile($listConfigFileDst, $content);


    }

    protected function onCreateOperationBefore(array $operation)
    {

    }


    protected function getFormConfigFileDestination(array $operation, array $config = [])
    {
        throw new MorphicException("override me");
    }


    protected function getListConfigFileDestination(array $operation, array $config = [])
    {
        throw new MorphicException("override me");
    }


    protected function onGenerateAfter() // override me
    {

    }

    protected function onExecuteOperationsBefore(array $operations)
    {

    }
}