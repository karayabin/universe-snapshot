<?php


namespace Ling\Light_DatabaseFakeDataMaker\Generator;


/**
 * The LightDatabaseFakeDataGenerator class.
 */
class LightDatabaseFakeDataGenerator implements LightDatabaseFakeDataGeneratorInterface
{


    /**
     *
     * This property holds the columnGenerators for this instance.
     * @var array
     */
    private array $columnGenerators;


    /**
     * Builds the LightDatabaseFakeDataGenerator instance.
     */
    public function __construct()
    {
        $this->columnGenerators = [];
    }


    /**
     *
     * Adds a column generator to this instance.
     *
     * @param string $column
     * @param $generator
     * @return $this
     */
    public function addColumnGenerator(string $column, $generator): static
    {
        $this->columnGenerators[$column] = $generator;
        return $this;
    }

    /**
     * @implementation
     */
    public function getColumnGenerator(string $column)
    {
        if (true === array_key_exists($column, $this->columnGenerators)) {
            return $this->columnGenerators[$column];
        }
        return null;
    }


}