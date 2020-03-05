<?php


namespace Ling\Kit\ConfStorage;


/**
 * The VariableAwareConfStorageInterface interface.
 */
interface VariableAwareConfStorageInterface
{


    /**
     * Sets the variables to inject to this instance.
     *
     * @param array $variables
     */
    public function setVariables(array $variables);
}