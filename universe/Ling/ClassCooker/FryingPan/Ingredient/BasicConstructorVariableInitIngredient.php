<?php


namespace Ling\ClassCooker\FryingPan\Ingredient;


/**
 * The BasicConstructorVariableInitIngredient class.
 *
 * This class will add a **variable initialization statement** inside the constructor of the class we're working on.
 *
 * If the class doesn't have a constructor, a @page(basic constructor) will be added first.
 *
 *
 *
 */
class BasicConstructorVariableInitIngredient extends BaseIngredient
{


    /**
     * @implementation
     */
    public function execute()
    {
        list($varName, $options) = $this->valueInfo;
        $cooker = $this->fryingPan->getCooker();
        $className = $cooker->getClassName();


        if (array_key_exists('template', $options)) {
            $template = $options['template'];


            // adding the basic constructor if necessary
            if (false === $cooker->hasMethod('__construct')) {
                $ingredient = BasicConstructorIngredient::create();
                $ingredient->setFryingPan($this->fryingPan);
                $ingredient->execute();
            }

            // update the constructor's content
            $cooker->updateMethodContent('__construct', function (string $innerContent) use ($varName, $template, $className) {

                // note: I use trimmed version for comparison to prevent "ide reformatting, which might strip whitespaces" messing up with this condition
                if (false === strpos($innerContent, trim($template))) {
                    $innerContent .= $template;
                    $this->fryingPan->sendToLog("Adding initialization string for variable \"$varName\" to class \"$className\".", 'add');
                } else {
                    $this->fryingPan->sendToLog("The initialization string for variable \"$varName\" was already found inside the constructor method.", 'skip');
                }
                return $innerContent;
            });


        } else {
            $this->fryingPan->sendToLog("template option not found for the BasicConstructorVariableInitIngredient with varName \"$varName\".", 'error');
        }
    }


}