<?php


namespace Jin\TemplateEngine;


use UniversalTemplateEngine\UniversalTemplateEngineInterface;

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
 * - resourceId: ```<@> <templateEngineId> <:> <resourceId>```
 *
 * With:
 * - templateEngineId being the key by which the template engine is registered.
 * - resourceId being the default resourceId argument passed to template engines
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
     * @info Builds the template engine master instance.
     */
    public function __construct()
    {
        $this->defaultEngine = null;
        $this->engines = [];
    }


    public function render($resourceId, array $variables)
    {

        if (0 === strpos($resourceId, '@')) {
            $p = explode(':', $resourceId, 2);
            list($templateEngineId, $realResourceId) = $p;
        } else {
            $realResourceId = $resourceId;
            $templateEngineId = $this->defaultEngine;
        }
    }

    public function getErrors()
    {

    }

    /**
     * @info Sets the default engine name
     * @param string $engine
     */
    public function setDefaultEngine($engine)
    {
        $this->defaultEngine = $engine;
    }

    public function addEngine($name, UniversalTemplateEngineInterface $engine)
    {
        $this->engines[$name] = $engine;
    }
}