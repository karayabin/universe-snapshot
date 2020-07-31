<?php


namespace Ling\ClassCooker\FryingPan\Ingredient;


/**
 * The PropertyIngredient class.
 *
 * This class will add a property to the class we're working on.
 *
 * The property will be added using the same heuristics and options as the @page(ClassCooker->addProperty) method.
 *
 *
 *
 */
class PropertyIngredient extends BaseIngredient
{


    /**
     * @implementation
     */
    public function execute()
    {
        list($propertyName, $options) = $this->valueInfo;
        $cooker = $this->fryingPan->getCooker();
        $className = $cooker->getClassName();

        if (true === $cooker->hasProperty($propertyName)) {
            $this->fryingPan->sendToLog("The property \"$propertyName\" is already found in class \"$className\".", 'skip');
        } else {
            if (array_key_exists('template', $options)) {
                $template = $options['template'];
                $this->fryingPan->sendToLog("Adding property \"$propertyName\" to class \"$className\".", 'add');

                unset($options['template']);
                $cooker->addProperty($propertyName, $template, $options);




            } else {
                $this->fryingPan->sendToLog("template option not found for the PropertyIngredient.", 'error');
            }
        }

    }


}