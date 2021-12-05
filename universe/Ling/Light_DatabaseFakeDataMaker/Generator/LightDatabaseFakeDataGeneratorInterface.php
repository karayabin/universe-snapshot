<?php


namespace Ling\Light_DatabaseFakeDataMaker\Generator;


/**
 * The LightDatabaseFakeDataGeneratorInterface interface.
 */
interface LightDatabaseFakeDataGeneratorInterface
{

    /**
     * Returns a column generator, or null if no generator is defined for this column.
     *
     *
     *
     * See the @page(Light_DatabaseFakeDataMaker conception notes) for more details.
     *
     *
     * @param string $column
     * @return mixed
     */
    public function getColumnGenerator(string $column);
}