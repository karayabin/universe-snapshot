<?php


namespace Ling\ClassCooker\FryingPan\Ingredient;


/**
 * The UseStatementIngredient class.
 *
 * This class will add an "use statement" to the class we're working on.
 *
 *
 *
 *
 */
class UseStatementIngredient extends BaseIngredient
{


    /**
     * @implementation
     */
    public function execute()
    {
        list($useStatementClassName, $options) = $this->valueInfo;
        $cooker = $this->fryingPan->getCooker();
        $className = $cooker->getClassName();

        if (true === $cooker->hasUseStatement($useStatementClassName)) {
            $this->fryingPan->sendToLog("The use statement with class \"$useStatementClassName\" is already found in class \"$className\".", 'skip');
        } else {


            $s = 'use ' . $useStatementClassName;
            if (array_key_exists('alias', $options)) {
                $alias = $options['alias'];
                $s .= ' as ' . $alias;
            }
            $s .= ';';
            $this->fryingPan->sendToLog("Adding use statement with class \"$useStatementClassName\" to class \"$className\".", 'add');
            $cooker->addUseStatements([
                $s,
            ]);
        }
    }


}