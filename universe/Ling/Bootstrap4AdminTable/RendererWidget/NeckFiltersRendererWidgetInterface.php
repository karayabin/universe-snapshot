<?php


namespace Ling\Bootstrap4AdminTable\RendererWidget;


/**
 * The NeckFiltersRendererWidgetInterface interface.
 */
interface NeckFiltersRendererWidgetInterface extends RendererWidgetInterface
{

    /**
     * Sets the columns and data types.
     * An array of columnName => dataType.
     *
     *
     * @param array $column2DataTypes
     * @return void
     */
    public function setColumns2DataTypes(array $column2DataTypes);

    /**
     * Sets whether to use the checkbox.
     *
     * @param bool $useCheckbox
     * @return void
     */
    public function setUseCheckbox(bool $useCheckbox);
}