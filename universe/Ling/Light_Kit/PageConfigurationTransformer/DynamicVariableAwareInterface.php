<?php


namespace Ling\Light_Kit\PageConfigurationTransformer;


/**
 * The DynamicVariableAwareInterface interface.
 */
interface DynamicVariableAwareInterface
{

    /**
     * Sets the dynamic variables into the instance.
     *
     * @param array $variables
     * @return void
     */
    public function setVariables(array $variables);
}