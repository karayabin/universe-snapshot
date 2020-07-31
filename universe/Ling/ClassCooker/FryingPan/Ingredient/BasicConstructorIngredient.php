<?php


namespace Ling\ClassCooker\FryingPan\Ingredient;


/**
 * The BasicConstructorIngredient class.
 *
 * This class will add a @page(basic constructor) to the class we're working on.
 *
 *
 *
 *
 */
class BasicConstructorIngredient extends BaseIngredient
{


    /**
     * @implementation
     */
    public function execute()
    {
        $cooker = $this->fryingPan->getCooker();
        $className = $cooker->getClassName();

        $methodName = '__construct';

        if (true === $cooker->hasMethod($methodName)) {
            $this->fryingPan->sendToLog("The method \"$methodName\" is already found in class \"$className\".", 'skip');
        } else {

            $this->fryingPan->sendToLog("Adding basic constructor to class \"$className\".", 'add');


            $hasParent = $cooker->hasParent();
            $template = $this->getTemplate($className, $hasParent);
            $cooker->addMethod($methodName, $template, [
                'firstMethod' => true,
            ]);
        }
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns a constructor template.
     *
     * @param string $className
     * @param bool $hasParent
     * @return string
     */
    private function getTemplate(string $className, bool $hasParent = false): string
    {

        $p = explode('\\', $className);
        $shortName = array_pop($p);


        if (true === $hasParent) {
            return "
    /**
     * Builds the $shortName instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

";

        }

        return "
    /**
     * Builds the $shortName instance.
     */
    public function __construct()
    {

    }
    
";
    }

}