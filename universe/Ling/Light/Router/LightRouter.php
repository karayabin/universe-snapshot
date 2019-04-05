<?php


namespace Ling\Light\Router;


use Ling\Light\Http\HttpRequestInterface;


/**
 * The LightRouter class.
 */
class LightRouter implements LightRouterInterface
{

    /**
     * This property holds the debug for this instance.
     * When debug is true, all failing routes explain why they failed.
     * @var bool
     */
    protected $debug;


    /**
     * Builds the LightRouter instance.
     */
    public function __construct()
    {
        $this->debug = false;
    }


    /**
     * @implementation
     */
    public function match(HttpRequestInterface $request, array $routes)
    {
        foreach ($routes as $routeName => $route) {


            // normalizing the route
            $this->normalizeRoute($route, $routeName);


            /**
             * - null: no failure
             * - 1: requirements failure
             * - 2: uri match failure
             * - 3: constraint failure
             */
            $failureType = null;
            $allFailureDetails = [];
            if (array_key_exists("requirements", $route)) {
                if (false === $this->matchRequirements($route['requirements'], $request, $failedRequirements)) {
                    $failureType = 1;
                    if (true === $this->debug) {
                        $allFailureDetails["requirements"] = $failedRequirements;
                    }
                }
            }

            // does the pattern match
            $pattern = $route["pattern"];


            $tagVars = [];
            if (false === $this->matchUriPath($request->getUriPath(), $pattern, $tagVars, $uriDetails)) {
                $failureType = 2;
                if (true === $this->debug) {
                    $allFailureDetails["uri"] = $uriDetails;
                }
            } else {
                $this->onUriMatchAfter();
            }


            // route match?
            if (null === $failureType) {

                $this->onRouteMatchSuccessAfter();

                return $route;
                break;
            } else {
                if (true === $this->debug) {
                    $this->onRouteMatchFailureAfter($allFailureDetails);
                }
            }

        }
        return false;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    protected function onUriMatchAfter()
    {
    }

    protected function onRouteMatchSuccessAfter()
    {
    }

    protected function onRouteMatchFailureAfter()
    {
    }


    /**
     * Tests the given $requirements against the request.
     *
     * Return true if all requirements pass, and false otherwise.
     * In case of failure, if debug=true, the $failed array is fed and has the following structure:
     *
     * - 0: the failing requirement name
     * - 1: the requirement value (as specified in the route)
     * - 2: the appropriate request bit against which the requirement was matched
     *
     * If debug=false, the $failed array is not fed.
     *
     *
     *
     * @param array $requirements
     * @param HttpRequestInterface $request
     * @param array|null $failed
     * @return array|bool
     */
    protected function matchRequirements(array $requirements, HttpRequestInterface $request, &$failed = null)
    {
        $failed = []; // type => value
        $noError = true;
        foreach ($requirements as $type => $value) {
            switch ($type) {
                case "method":
                    $method = $request->getMethod();
                    if ($method !== $value) {
                        $noError = false;
                        if (true === $this->debug) {
                            $failed = [$type, $value, $method];
                        }
                    }
                    break;
                default:
                    break;
            }
            if (false === $noError) { // we just want the first failing requirement
                break;
            }
        }
        return (true === $noError);
    }

    /**
     * Returns whether the $pattern matches against the given $uriPath.
     * If the test is successful, the $tagVars array is fed with the captured variables (key => value).
     *
     * If debug=true, the $details array is fed like this:
     * - 0: bool, whether the pattern uses tags (true) or not (false)
     * - 1: null|string, the php regex corresponding to the pattern (only if the pattern uses tags)
     *
     * If debug=false, the $details array is not fed.
     *
     *
     * @param string $uriPath
     * @param string $pattern
     * @param array|null $tagVars
     * @param array|null $details
     * @return bool
     */
    protected function matchUriPath(string $uriPath, string $pattern, array &$tagVars = null, array &$details = null)
    {
        return ($uriPath === $pattern);
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Normalizes the given $route.
     *
     *
     * @param array $route
     * @param string $routeName
     */
    private function normalizeRoute(array &$route, string $routeName)
    {
        $route['name'] = $routeName;
        if (false === array_key_exists("requirements", $route)) {
            $route['requirements'] = [
                "method" => "get",
            ];
        } elseif (false === array_key_exists("method", $route['requirements'])) {
            $route['requirements']['method'] = "get";
        }
    }
}