<?php


namespace Ling\Light_Realist\Rendering;


/**
 * The RealistListItemRendererInterface interface.
 * See @page(the realist conception notes) for more details.
 */
interface RealistListItemRendererInterface
{

    /**
     * Binds a type to the given property name.
     * See more info in the explanations of the @page(list item renderer documentation).
     *
     * @param string $property
     * @param string $type
     * @param array $options
     * @return void
     */
    public function setPropertyType(string $property, string $type, array $options = []);

    /**
     * Sets the ric.
     *
     * @param array $ric
     * @return mixed
     */
    public function setRic(array $ric);


    /**
     * Sets the property to display.
     * In the end, only those properties will be returned.
     *
     * @param array $propertyNames
     * @return mixed
     */
    public function setPropertiesToDisplay(array $propertyNames);


    /**
     * Adds a dynamic column.
     *
     * See the @page(dynamic properties of the list item renderer page) for more info.
     *
     *
     * @param string $property
     * @return void
     */
    public function addDynamicProperty(string $property);

    /**
     * Returns the html representing the given rows
     * @param array $rows
     * @return string
     */
    public function render(array $rows): string;
}