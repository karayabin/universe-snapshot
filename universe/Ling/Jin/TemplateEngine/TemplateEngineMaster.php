<?php


namespace Ling\Jin\TemplateEngine;


use Ling\Jin\Registry\Access;
use Ling\UniversalTemplateEngine\UniversalTemplateEngineInterface;

/**
 * @info The TemplateEngineMaster class is the template engine master used by a jin app.
 *
 *
 * In a jin app, when the router finds a matching route, it delegates the handling of the http request to one of two mechanisms:
 *
 * - page
 * - controller
 *
 * The controller mechanism is specific to the application.
 * However the page mechanism is handled internally by Jin.
 *
 * In order to display the page, Jin uses the so-called TemplateEngineMaster, which is basically an adapter for template engine instances.
 *
 * The idea is that we attach any number of template engines to the template engine master.
 *
 * Then, when we want to display a page, we call the render method of the template engine master, which will in turn forward
 * the rendering task to the relevant template engine instance.
 *
 * How does the template engine master know which template engine to choose?
 *
 * Well it has two mechanisms:
 *
 * - a default template engine can be configured, and will be used by default
 * - the caller of the template engine master's render method can specify the id of a template engine to use inside the resourceId string.
 *
 * The resourceId string of the template engine master uses the following notation:
 *
 * - resourceId: ```(<@> <templateEngineId> <:>)? <templateEngineResourceId>```
 *
 * With:
 * - templateEngineId being the key by which the template engine is registered.
 * - templateEngineResourceId being the regular resourceId argument passed to template engines
 *
 *
 * The registration of template engines is done via in the Jin\Configuration\TemplateEngineMasterConfigurator object,
 * inside the Jin\ApplicationEnvironment\ApplicationEnvironment::boot method.
 *
 *
 * @see \Jin\Configuration\TemplateEngineMasterConfigurator
 * @see \Jin\ApplicationEnvironment\ApplicationEnvironment
 *
 *
 *
 */
class TemplateEngineMaster
{

    /**
     * @info This property holds the name of the default engine.
     * @type string=null
     */
    private $defaultEngine;

    /**
     * @info This property holds the array of engine instances.
     * The structure of the array is name => instance.
     * @type array
     */
    private $engines;

    /**
     * @info This property holds the errors of this instance.
     * @type array
     */
    private $errors;


    /**
     * @info Builds the template engine master instance.
     */
    public function __construct()
    {
        $this->defaultEngine = null;
        $this->engines = [];
        $this->errors = [];
    }


    /**
     * Parses the template identified by $resourceId and returns the interpreted template (the template with the variables injected in it).
     *
     * Logs the first error that occurs (including the template engine's errors) to the template_engine_master channel.
     * See Jin\Log\Logger for more details.
     *
     * All errors are also available through the getErrors method of this instance.
     *
     *
     * @param $resourceId , see the class description for more. Its notation is the following:
     *                  - resourceId: ("@" "templateEngineId" ":")? "templateEngineResourceId"
     *
     *                      With:
     *                      - templateEngineId being the key by which the template engine is registered.
     *                      - templateEngineResourceId being the regular resourceId argument passed to template engines
     *
     * @param array $variables
     * @return false|string. False is returned in case something went wrong, in which case errors are accessible via the getErrors method.
     */
    public function render($resourceId, array $variables = [])
    {

        if (0 === strpos($resourceId, '@')) {
            $p = explode(':', $resourceId, 2);
            list($templateEngineId, $realResourceId) = $p;
        } else {
            $realResourceId = $resourceId;
            $templateEngineId = $this->defaultEngine;
            if (null === $templateEngineId) {
                $this->addError("default template engine required by template with resourceId: $resourceId");
            }
        }


        if (0 === count($this->errors)) {
            if (array_key_exists($templateEngineId, $this->engines)) {
                $engine = $this->engines[$templateEngineId];
                /**
                 * @var UniversalTemplateEngineInterface $engine
                 */
                if (false !== ($code = $engine->render($realResourceId, $variables))) {
                    return $code;
                } else {
                    $errors = $engine->getErrors();
                    foreach ($errors as $error) {
                        $this->addError($error);
                    }
                }
            } else {
                $this->addError("template engine $templateEngineId not found (resourceId: $resourceId)");
            }
        }


        // logging the first error if any
        if (count($this->errors) > 0) {
            $errors = $this->errors;
            $firstError = array_shift($errors);
            Access::log()->log("(Jin\TemplateEngine\TemplateEngineMaster): $firstError", "template_engine_master");
        }

        return false;
    }


    /**
     * @info Returns the errors of this instance.
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @info Sets the default engine name
     * @param string $engine
     */
    public function setDefaultEngine($engine)
    {
        $this->defaultEngine = $engine;
    }

    /**
     * @info Adds an engine to this instance.
     * @param $name
     * @param UniversalTemplateEngineInterface $engine
     */
    public function addEngine($name, UniversalTemplateEngineInterface $engine)
    {
        $this->engines[$name] = $engine;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @info Adds an error message to this instance.
     */
    private function addError($msg)
    {
        $this->errors[] = "(Jin\TemplateEngine\TemplateEngineMaster): " . $msg;
    }
}