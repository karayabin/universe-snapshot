<?php


namespace Ling\ClassCooker\FryingPan\Ingredient;


/**
 * The MethodIngredient class.
 *
 * This class will add a method to the class we're working on.
 *
 * The method will be added using the same heuristics and options as the @page(ClassCooker->addMethod) method.
 *
 *
 *
 */
class MethodIngredient extends BaseIngredient
{


    /**
     * @implementation
     */
    public function execute()
    {
        list($methodName, $options) = $this->valueInfo;
        $cooker = $this->fryingPan->getCooker();
        $className = $cooker->getClassName();

        if (true === $cooker->hasMethod($methodName)) {
            $this->fryingPan->sendToLog("The method \"$methodName\" is already found in class \"$className\".", 'skip');
        } else {
            if (array_key_exists('template', $options)) {
                $template = $options['template'];
                $this->fryingPan->sendToLog("Adding method \"$methodName\" to class \"$className\".", 'add');

                unset($options['template']);
                $options['throwEx'] = false;
                $cooker->addMethod($methodName, $template, $options);




            } else {
                $this->fryingPan->sendToLog("template option not found for the MethodIngredient.", 'error');
            }
        }

    }


}