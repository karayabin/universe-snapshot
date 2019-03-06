<?php


namespace Ling\UniversalTemplateEngine;


interface UniversalTemplateEngineInterface
{


    /**
     * Parses the template identified by $resourceId and returns the interpreted template (the template with the variables injected in it).
     *
     * @param $resourceId , this is specific to the concrete template engine.
     * @param array $variables
     * @return false|string. False is returned in case something went wrong, in which case errors are accessible via the getErrors method.
     */
    public function render($resourceId, array $variables = []);


    /**
     * Returns an array of errors which occurred during the render method call.
     *
     * @return array
     */
    public function getErrors();

}