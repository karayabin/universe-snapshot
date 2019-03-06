<?php


namespace Ling\Jin\Component\Exception;


use Ling\Bat\ClassTool;
use Ling\Jin\Http\HttpResponse;
use Ling\Jin\Registry\Access;

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
 * A default handler can be set with the reserved name of "default" (instead of the exception class name).
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
     * - exceptionShortClassName: the short class name of the exception (ex: JinNoRouteMatchesException).
     *                          The special keyword "default" can be used to create a fallback handler, which will
     *                          be used by default if no other handlers matches.
     * - resourceId: the resourceId to pass to the template engine master instance (see
     *          Jin\TemplateEngine\TemplateEngineMaster class description for more details)
     * - ?variables: an optional array containing the variables to pass to the template engine master instance (see
     *          Jin\TemplateEngine\TemplateEngineMaster class description for more details)
     *
     *
     *
     *
     *
     * Tags
     * -------------------------
     * The following tags will be interpreted if found in the variables values:
     *
     * - {e}: the exception
     * - {e.message}: the exception message
     * - {e.line}: the exception line
     * - {e.code}: the exception code
     * - {e.file}: the exception file
     * - {e.trace}: the exception trace
     * - {e.traceAsString}: the exception traceAsString
     *
     *
     * The {e} tag, since it returns an instance, must be on its own to be interpreted as such.
     * The {e.trace} tag, since it returns an array, must also be on its own to be interpreted as such.
     * Other tags return string and can therefore be integrated inline with other strings.
     *
     *
     *
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
        $response = null;
        $shortName = ClassTool::getShortName($e);
        if (
            array_key_exists($shortName, $this->handlers) ||
            array_key_exists("default", $this->handlers)
        ) {

            if (array_key_exists($shortName, $this->handlers)) {
                $params = $this->handlers[$shortName];
            } else {
                $params = $this->handlers["default"];
            }

            $vars = $params[1] ?? [];

            // variables special notation
            array_walk_recursive($vars, function (&$v) use ($e) {
                if ('{e}' === $v) {
                    $v = $e;
                    return;
                }
                if ('{e.trace}' === $v) {
                    $v = $e->getTrace();
                    return;
                }

                if (is_string($v)) {

                    $v = str_replace([
                        '{e.message}',
                        '{e.line}',
                        '{e.code}',
                        '{e.file}',
                        '{e.traceAsString}',
                    ], [
                        $e->getMessage(),
                        $e->getLine(),
                        $e->getCode(),
                        $e->getFile(),
                        $e->getTraceAsString(),
                    ], $v);
                }

            });

            if (false !== ($html = Access::templateEngine()->render($params[0], $vars))) {
                Access::log()->log("(Jin\Component\Exception\PageExceptionHandler->handleException): Response created from template \"" . $params[0] . '"', "app_synopsis");
                $response = new HttpResponse($html, 200);
            }
        }
        return $response;
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



