<?php


namespace Jin\Component\Exception;


use Bat\ClassTool;
use Jin\Http\HttpResponse;
use Jin\Registry\Access;

/**
 * @info The PageExceptionHandler class recovers from an exception by displaying a pre-defined page template.
 *
 *
 * It does so by mapping exception class names to template parameters (resourceId and variables).
 * Then when an exception occurs, it looks in its map to see whether this exception is defined.
 * If so, it calls the corresponding template and returns the http response.
 *
 * Otherwise it fails.
 *
 *
 *
 */
class PageExceptionHandler
{


    /**
     * @info This property holds the map of exception names to template parameters.
     * This is an array with the following structure:
     *
     * - exceptionShortClassName => [ resourceId, ?variables ]
     *
     * With:
     * - exceptionShortClassName: the short class name of the exception (ex: JinNoRouteMatchesException)
     * - resourceId: the resourceId to pass to the template engine master instance (see
     *          Jin\TemplateEngine\TemplateEngineMaster class description for more details)
     * - ?variables: an optional array containing the variables to pass to the template engine master instance (see
     *          Jin\TemplateEngine\TemplateEngineMaster class description for more details)
     *
     *
     *
     *
     * @type array
     */
    private $handlers;

    /**
     * @info Returns an Jin\Http\HttpResponse instance corresponding to the given exception,
     * or null if no template was associated to the given exception.
     *
     * @param \Exception $e
     * @return \Jin\Http\HttpResponse|null
     *
     * @seeMethod setHandlers
     */
    public function handleException(\Exception $e)
    {
        $shortName = ClassTool::getShortName($e);
        if (array_key_exists($shortName, $this->handlers)) {
            $params = $this->handlers[$shortName];
            $vars = $params[1] ?? [];
            if (false !== ($html = Access::templateEngine()->render($params[0], $vars))) {

            }
            a($params);
        }
        az("yes, PageExceptionHandler");
        return new HttpResponse();
    }


    /**
     * @info Sets the page exception handlers for this instance.
     * @param array $handlers
     */
    public function setHandlers(array $handlers)
    {
        $this->handlers = $handlers;
    }
}



