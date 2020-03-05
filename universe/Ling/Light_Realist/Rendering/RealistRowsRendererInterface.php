<?php


namespace Ling\Light_Realist\Rendering;


/**
 * The RealistRowsRendererInterface interface.
 * See @page(the realist conception notes) for more details.
 */
interface RealistRowsRendererInterface
{

    /**
     * Binds a type to the given column name.
     *
     * @param string $columnName
     * @param string $type
     * @param array $options
     * @return void
     */
    public function setColumnType(string $columnName, string $type, array $options = []);

    /**
     * Sets the ric.
     *
     * @param array $ric
     * @return mixed
     */
    public function setRic(array $ric);

    /**
     * Sets the hidden columns.
     *
     * @param array $hiddenColumns
     * @return mixed
     */
    public function setHiddenColumns(array $hiddenColumns);


    /**
     * Adds a dynamic column at the given position.
     *
     * Position can be one of:
     * - pre: will prepend the column to the row
     * - post: will append the column to the row
     *
     *
     *
     * @param string $columnName
     * @param string $position
     * @return void
     */
    public function addDynamicColumn(string $columnName, $position = 'post');

    /**
     * Returns the html representing the given rows
     * @param array $rows
     * @return string
     */
    public function render(array $rows): string;
}