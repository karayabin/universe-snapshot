<?php


namespace Jin\Component\Routing\Router;


use Bat\DebugTool;
use Jin\Http\HttpRequest;
use Jin\Log\Logger;
use Jin\Registry\Access;

/**
 *
 *
 *
 *
 * @info The RoutineRouter class is a router for a jin application.
 *
 *
 * This router tries to match an http request by testing a collection of routes against the given http request.
 * If a route matches, it provides information on how the request should be handled.
 *
 *
 * You can activate debug mode, this will send log messages to the "routine_debug" channel.
 * Note: don't forget to subscribe to that channel (see @class(Jin\Configuration\LoggerConfigurator) class description for more details)
 * @see \Jin\Configuration\LoggerConfigurator
 *
 *
 *
 * Declaration of routes
 * ===========================
 *
 * Routes are defined using yml files.
 *
 *
 * ```txt
 * - config/
 * ----- routes.yml                 # this file contains the routes specific to this application
 * ----- routes/                    # this directory contains routes provided by third-party plugins
 * --------- $plugin.yml
 * ```
 *
 * Inside a route file, routes are always contained in a route collection.
 * A route collection is a simple container for routes.
 * It basically allows us to define common properties for all the routes it contains at once (rather than modifying each route individually).
 *
 * Here is the structure of a route file:
 *
 *
 * ```yml
 * $route_collection_id:
 *     ?controller: string|array, the controller to call by default if the route matches. Note: if defined, all routes will use
 *                  this controller unless the route further defines a page or a controller.
 *     vars: array, variables shared by all routes.
 *     routes:
 *         $route_name:
 *             pattern: string, the route pattern. The route pattern is tested against the http request uri path to see if the route matches or not.
 *                       See more details in the "Pattern matching" section.
 *             ?page: string, the page to include if the route matches (see Jin\Component\Routing\Router\RouterResult for more details).
 *             ?controller: string||array, the controller to call if the route matches (see Jin\Component\Routing\Router\RouterResult for more details).
 *             ?requirements: array, additional requirements of this route. See the "Requirements" section for more details.
 *             ?constraints: array, additional tag constraints for this route. See the "Constraints" section for more details.
 *             ?vars: array, additional variables to attach to the route. Those variables will be passed to the
 *                          target (the page or controller) if the route matches.
 *
 *                          It's possible to use values from the http request's get array ($_GET) as the variable values.
 *                          We do so by using the following notation:
 *
 *                          - articleId: $get.article_id
 *
 *                          The property above will create a route variable named articleId, which value will
 *                          be $_GET[article_id] (if it exists) or null (if it doesn't exist).
 *
 *
 *
 * ```
 *
 *
 * Naming conventions for route collections
 * ----------------------------
 *
 * By convention, the route collections in the *config/routes.yml* file start with the "app_" prefix, and
 * the route collections defined in a *config/routes/$plugin_identifier.yml* start with the "$plugin_identifier_" prefix.
 *
 * Why?
 * Before the router tries to match an http request, it needs to create an array of routes.
 * It does so by merging all the route files (config/routes.yml and all files in config/routes/) altogether in one big
 * array, without consideration of the file name.
 *
 * So if we don't use a good naming convention, the risk is that when we try do debug the app, we see a
 * route collection name appear in the debug message, but we have no idea which file it comes from;
 * and we might spend a considerable amount of time just looking for that information.
 * By naming the route collections in a more clever way, we can significantly reduce that time.
 *
 *
 *
 *
 *
 *
 *
 *
 * Testing a route
 * =====================
 * A route is tested against an http request (Jin\Http\HttpRequest).
 * A route test is composed of the steps below:
 *
 * - uri matching: testing whether the pattern of the route matches the uri path of the http request.
 *                 See more details in the "Pattern matching" section.
 * - requirements: testing other (i.e. not the uri path) properties of the http request.
 *                 For instance the port, the host, the existence of some $_POST variables, and more...
 *                 See more details in the "Requirements" section.
 * - constraints: if the "uri matching" step is successful, AND IF the pattern of the route contains tags, then the "constraints" system allows
 *                to perform additional tests on the values of the tags.
 *                Examples of constraints include:
 *                  - the tag with name post_number must be an integer
 *                  - the tag named lang must be one of fr|en
 *                 See more details in the "Constraints" section.
 *
 *
 * If all tests pass, the route matches the given http request.
 * If one of the following steps fails, the route doesn't match (and the next route available is tested until there is no more routes available).
 *
 *
 *
 *
 *
 *
 * Pattern matching
 * --------------------
 *
 * Each route has a property named "pattern".
 *
 * A pattern is a string that is compared against the http request's uri path to see whether the route matches.
 *
 * If both the pattern and the uri path are identical, there is a match.
 *
 * For instance if we have:
 * - uriPath: /articles.php
 * - pattern: /articles.php
 *
 * Since uriPath and pattern are the same, we have a match.
 *
 *
 * ### Tag system
 *
 * RoutineRouter also let you use a tag system that allows to also capture some parts of the uri path as php variables.
 *
 * For instance:
 *
 * - uriPath: /articles/58-the-cat-and-the-dog.html
 * - pattern: /articles/{articleId}-the-cat-and-the-dog.html
 *
 * In the example above, the tag {articleId} will capture the value 58 (and the variable $articleId=58
 * will be available in the php code).
 *
 *
 * A tag is wrapped with curly braces, and therefore:
 *
 * - you must escape curly braces that are not part of a tag (otherwise the router wouldn't be able to
 *      differentiate which is which). To escape a curly brace, put a backslash (\) in front of it.
 *
 *
 * The tag anatomy is the following:
 *
 * - <openingCurlyBrace> <beginZone> <tagName> <endZone> <closingCurlyBrace>
 *
 * With:
 * - openingCurlyBrace: the opening curly brace char "{"
 * - beginZone: see explanations below
 * - tagName: a php variable like name (alpha num chars including underscore, the first char must not be a digit)
 * - endZone: see explanations below
 * - closingCurlyBrace: the closing curly brace char "}"
 *
 *
 * In the begin zone and end zone we can write features.
 * There are two features:
 *
 * - the "optionally starting with" feature, which must be written in the begin zone
 * - the "stop when encountering" feature, which must be written in the end zone
 *
 * A feature has the following notation:
 *
 * - <featureStartChar> <featureBody> <featureEndDelimiter>
 *
 * With:
 *
 * - featureStartChar: a character to indicate the beginning of the feature. The start chars are:
 *              - optionally starting with: ?  (question mark)
 *              - stop when encountering:   !  (exclamation mark)
 *
 * - featureBody:
 *          A set of character(s) for the feature to work with.
 *          The interpretation of those characters depends on the feature:
 *
 *          - optionally starting with: the char(s) that optionally start the pattern, but are not captured.
 *                      See the examples below for more details.
 *          - stop when encountering: the char(s) that stop the pattern
 *
 *          The feature body must not contain the "{" and "}" characters.
 *          You can still write curly braces by using their aliases "_ob" for "{" and "_cb" for "}".
 *          Note: these aliases only work inside the feature body.
 *
 * - featureEndDelimiter: .. (two consecutive dots)
 *
 *
 *
 * ### Pattern matching examples:
 *
 *
 *
 * #### No tag: an exact match is required
 *
 *
 * - uriPath: /articles/58-the-cat-and-the-dog.html
 * - pattern: /articles/58-the-cat-and-the-dog.html
 * - match: yes
 *
 *
 * - uriPath: /articles/58-the-cat-and-the-dog.html
 * - pattern: /articles/58-the-cat-and-the-dog
 * - match: no
 *
 *
 * #### Default tag: captures as much chars as it possibly can
 *
 * - uriPath: /articles/58-the-cat-and-the-dog.html
 * - pattern: /articles/{articleId}
 * - articleId: 58-the-cat-and-the-dog.html
 * - match: yes
 *
 * - uriPath: /articles/58-the-cat-and-the-dog.html
 * - pattern: /articles/{articleId}-the
 * - articleId: 58-the-cat-and
 * - match: yes
 *
 *
 * - uriPath: /articles/58-the-cat-and-the-dog.html
 * - pattern: /articles/{articleId}-the-cat
 * - articleId: 58
 * - match: yes
 *
 *
 * - uriPath: /articles/58-the-cat-and-the-dog.html
 * - pattern: /articles/{articleId}-the-cat-and-the-dog.html
 * - articleId: 58
 * - match: yes
 *
 * - uriPath: /articles/58-the-cat-and-the-dog.html
 * - pattern: /articles/{articleId}-mix
 * - match: no
 *
 *
 * #### Tag with "Optionally starting with" feature
 *
 * osw: optionally starting with
 *
 * Optionally starting with (but not capturing) ONE char in...
 *
 *
 * - uriPath: /articles/58-the-cat-and-the-dog.html
 * - pattern: /articles{?/..articleId}-the-cat
 * - articleId: 58
 * - osw char: yes (/)
 * - match: yes
 *
 *
 * - uriPath: /articles/58-the-cat-and-the-dog.html
 * - pattern: /article{?/s..articleId}-the-cat
 * - articleId: /58
 * - osw match: yes (s)
 * - match: yes
 *
 *
 * - uriPath: /articles/58-the-cat-and-the-dog.html
 * - pattern: /article{?/..articleId}-the-cat
 * - articleId: s/58
 * - osw match: no
 * - match: yes
 *
 *
 * #### Tag with "Stop when encountering" feature
 *
 * swe: stop when encountering
 *
 *
 * - uriPath: /articles/58-the-cat-and-the-dog.html
 * - pattern: /articles/{articleId!-..}
 * - articleId: 58
 * - swe match: yes (-)
 * - match: yes
 *
 *
 * - uriPath: /articles/58-the-cat-and-the-dog.html
 * - pattern: /articles/{articleId!-..}-the-cat
 * - articleId: 58
 * - swe match: yes (-)
 * - match: yes
 *
 *
 * - uriPath: /articles/58-the-cat-and-the-dog.html
 * - pattern: /articles/{articleId!-..}-mix
 * - match: no
 *
 *
 *
 *
 *
 *
 * Requirements
 * -----------------
 * In addition to pattern matching, we can test an http request against some requirements.
 * To specify requirements, simply add an entry with "requirements" as the key;
 * By reading the examples below you should be able to understand how the requirements work:
 *
 *
 * ```yml
 * #---------------------------
 * # Requirements examples
 * #---------------------------
 * requirements_demo:
 *     pattern: /fake1
 *     page: main/home.php
 *     requirements:
 *         # This requirement is valid only if the method matches the one of the request
 *         method: GET
 *         # The requirement is valid only if the request is https.
 *         # Note: if the value was false, this requirement would be only valid if the request was NOT https.
 *         is_https: true
 *         # The requirement is valid only if the request port is 88
 *         port: 88
 *         # This requirement is valid only if the time of the request is in between the boundaries value defined
 *         # The format used for dates is either Y-m-d H:i:s or Y-m-d
 *         time: [2019-01-19 00:00:00, 2020-01-19 00:00:00]
 *         # This requirement is valid only the host matches the one of the request
 *         host: local.treasure
 *         # This requirement is only valid if the referer domain matches the one of the request.
 *         # The referer domain can be declared either as a string or as a list
 *         #        referer_domain: my_friend.com
 *         referer_domain:
 *             - my_friend.com
 *             - my_friend2.com
 *         # This requirement is only valid when the referer page matches the one of the request.
 *         # The page does not include the question mark and the query string.
 *         # Again, the referer_page can be either a string or a list (like referer_domain)
 *         referer_page: my_friend.com/page2.php
 *         #        referer_page:
 *         #            - my_friend.com/page2.php
 *         #            - my_friend2.com/marshmallows.php
 *         # This requirement is only valid if the ip of the request matches one of the ip provided by the requirement.
 *         # This value can be either a string or a list
 *         allowed_ip: 88.45.12.34
 *         #        allowed_ip: [127.0.0.0, 88.45.12.34]
 *         # This requirement is only valid if the ip of the request matches IS NOT one of the ip provided by the requirement.
 *         # This value can be either a string or a list
 *         #        forbidden_ip: [69.69.69.69, 88.46.27.34]
 *         forbidden_ip: [69.69.69.69, 88.46.27.34]
 *
 *         # The following get example matches against the get ($_GET) property of the request.
 *         # It works the same for other super arrays of the request:
 *         # - post ($_POST)
 *         # - cookie ($_COOKIE)
 *         # - files ($_FILES)
 *         get:
 *             # This requirement is only valid if the request's get contains all specified entries.
 *             #
 *             # An entry can provide alternatives by using an array instead of a string.
 *             # In other words, the logical operator used between lines is AND.
 *             # However, if the entry is an array, the logical operator used between the elements of this array is OR.
 *             # See commented examples below.
 *
 *             # The following requirement reads: only match if get contains token.
 *             #            has: token
 *
 *             # The following requirement reads: only match if get contains token.
 *             #            has:
 *             #                - token
 *             # The following requirement reads: only match if (get contains (token OR jeton) AND get contains req_type)
 *             has:
 *                 - [token, jeton]
 *                 - req_type
 *             # This section defines value that must exist and have the value specified
 *             value:
 *                 # This requirement is valid only if the request get has a variable named var1 which value is 5
 *                 # AND a variable var2 with value "doo".
 *                 var1: 5
 *                 var2: doo
 *                 # This section below is not implemented yet, just ideas for possible future me
 *                 #            value_regex:
 *                 #                var1: \d
 *                 # This section below is not implemented yet, just ideas for possible future me
 *                 #            value_optional:
 *                 #                token: 78 # if token does not exist, the requirement is valid
 *
 *             # This section below is not implemented, just ideas for possible future me
 *             # implementation of the dot notation (we don't want to add it directly to the "has" property,
 *             # as it could confuse the user, and this is a feature that will probably not be used a lot.
 *             #      hasDot: general.token
 *
 *             # files super array ONLY
 *             # --------------------------
 *             # The section below is only available with the file super array.
 *
 *
 *             # Type
 *             # It's an array of fileKey => acceptableTypes.
 *             # With:
 *             #     - fileKey: an actual key of the files super array provided by the request (The requirement will fail is such a key is not found in the files super array).
 *             #     - acceptableTypes: the list of accepted mime-types for the given fileKey. The requirement validates only if the mime-type of the file is in the list.
 *             #           Can be either a string or a list
 *             type:
 *                 the_file: application/pdf
 *             #          the_file.jar.mac: application/pdf
 *             # Remember that the type value is not reliable:
 *             # http://php.net/manual/en/features.file-upload.post-method.php says:
 *             # This mime type is however not checked on the PHP side and therefore don't take its value for granted.
 *             # List of mime-types: http://svn.apache.org/repos/asf/httpd/httpd/trunk/docs/conf/mime.types
 *             # Common mime types are:
 *             # (text)
 *             # - text/plain
 *             # - text/html
 *
 *             # (image)
 *             # - image/gif
 *             # - image/png
 *             # - image/jpeg
 *             # - image/bmp
 *
 *             # (audio)
 *             # - audio/wav
 *
 *             # (video)
 *             # - video/webm
 *             # - video/ogg
 *             # - video/mp4
 *
 *             # (application)
 *             # application/octet-stream
 *             # application/pdf
 *             # application/xml
 *
 *
 *
 *             # Size
 *             # It's an array of fileKey => sizeBoundaries.
 *             # With:
 *             #     - fileKey: an actual key of the files super array provided by the request (The requirement will fail is such a key is not found in the files super array).
 *             #     - sizeBoundaries: defines the boundary sizes within which the file size shall be.
 *             #               It's an array which first entry is the minimum size and which second entry is the maximum size.
 *             #               The requirement only validates if the file size is comprised between this minimum and maximum value.
 *             #               Value is expressed using the human notation (see https://github.com/lingtalfi/Bat/blob/master/ConvertTool.md#converthumansizetobytes
 *             #               or Bat\ConvertTool::convertHumanSizeToBytes comments for more details).
 *             size:
 *                 the_file: [0, 2M]
 *
 * ```
 *
 * Note: for now requirements against the super arrays get, post, and cookie can only match against scalar value.
 * If we need to match against arrays, additional methods might be added.
 *
 *
 * All statements declared in the requirements are evaluated to a boolean, and the request
 * matches ONLY IF ALL OF THEM are true.
 *
 *
 * (Tag) Constraints
 * -----------------------
 * Constraints are yet other tests that we can perform on tags.
 * So, if the pattern matching test passes and your pattern yields tags, you can test those tags further using the "constraints".
 *
 * IF a constraint fails, then the route will not match.
 *
 * A constraint let you use the power of php regex to test against a tag.
 * If the regex doesn't match the tag value, the route test fails.
 *
 * By reading the following example from a yml file, you should be able to understand how constraints work.
 *
 *
 * ```yml
 * #---------------------------
 * # Constraints examples
 * #---------------------------
 * constraints1:
 *     pattern: /articles/{?/..articleId!-..}
 *     page: any
 *     constraints:
 *         articleId: ^[0-9]{2}$       # a two digits number
 *         blogId: [0-9]+              # any number (integers)
 *         lang: ^(eng|fra)$           # the string eng or fra
 * ```
 *
 *
 * Note: a constraint DOES NOT FAIL IF the corresponding tag variable is not defined.
 * Note2: internally, the slash (/) char is used as the regex delimiter: your constraint will be wrapped with slashes
 *          to produce the php regex that will actually be used.
 *          This generally shouldn't be a problem, since you probably won't use slashes in your constraint.
 *          However, if you do, you are responsible for escaping them when appropriate.
 *
 *
 *
 *
 *
 *
 */
class RoutineRouter implements RouterInterface
{


    /**
     * @info This property holds whether this instance is in debug mode.
     * In debug mode, the following extra things are done:
     * - logging of debug messages on the routine_debug channel
     *
     */
    private $debug;

    /**
     * @info This property holds the logger instance.
     * Note that if no logger instance is set this class will not work properly.
     * The logger instance should be set using the Jin\Registry\Access::setConf method.
     * In a regular jin app this is done automatically by the Jin\ApplicationEnvironment\ApplicationEnvironment::boot method.
     *
     *
     * @var Logger
     */
    private $logger;

    /**
     * @implementation
     */
    public function match(HttpRequest $request): RouterResult
    {
        $this->logger = Access::log();

        $appDir = Access::conf()->get('appDir');
        $routesFile = $appDir . "/config/routes.yml";
        $routesDir = $appDir . "/config/routes";
        $routeCollections = Access::configurationFileParser()->parseFileWithDir($routesFile, $routesDir, true);


        $routerResult = new RouterResult();
        $routerResult->success = false;


        foreach ($routeCollections as $collectionName => $collectionConfig) {
            $collectionController = $collectionConfig['controller'] ?? null;
            $routes = $collectionConfig['routes'];


            foreach ($routes as $routeName => $route) {
                /**
                 * - null: no failure
                 * - 1: requirements failure
                 * - 2: uri match failure
                 * - 3: constraint failure
                 */
                $failureType = null;
                if (array_key_exists("requirements", $route)) {
                    if (false === $this->matchRequirements($route['requirements'], $request, $failedRequirements)) {
                        $failureType = 1;
                    }
                }

                // does the pattern match
                $pattern = $route["pattern"];


                $tagVars = [];
                if (false === $this->matchUriPath($request->uriPath, $pattern, $tagVars, $uriDetails)) {
                    $failureType = 2;
                } else {

                    if (array_key_exists("constraints", $route)) {
                        if (false === $this->matchConstraints($route['constraints'], $tagVars, $failureDetails)) {
                            $failureType = 3;
                        }
                    }
                }


                $routeFullName = $collectionName . "." . $routeName;
                // route match?
                if (null === $failureType) {
                    $routeVars = (array_key_exists("vars", $route)) ? $route['vars'] : [];
                    if (!is_array($routeVars)) {
                        $routeVars = [];
                    }
                    $vars = array_merge($routeVars, $tagVars);

                    // injecting get vars
                    array_walk_recursive($vars, function (&$v) use ($request) {
                        if (0 === strpos($v, '$get.')) {
                            $key = explode('.', $v, 2)[1];
                            $v = $request->get[$key] ?? null;
                        }
                    });


                    $routerResult->success = true;
                    $routerResult->vars = $vars;

                    if (array_key_exists("controller", $route)) {
                        $routerResult->controller = $route['controller'];
                    } elseif (array_key_exists("page", $route)) {
                        $routerResult->page = $route['page'];
                    } elseif (null !== $collectionController) {
                        $routerResult->controller = $collectionController;
                    }
                    $routerResult->route = $routeFullName;

                    if (true === $this->debug) {
                        $msg = "$routeFullName matched! Pattern: $pattern, Uri: " . $request->uriPath;
                        list($useTag, $regex) = $uriDetails;
                        if (true === $useTag) {
                            $msg .= ", Regex: $regex";
                        }
                        $this->debug($msg);
                    }
                    break 2;
                } else {
                    if (true === $this->debug) {
                        $msg = "$routeFullName failed ";
                        switch ($failureType) {
                            case "1":

                                list($requirementName, $requirementValue, $requestValue) = $failedRequirements;
                                $requirementValue = DebugTool::toString($requirementValue);
                                $requestValue = DebugTool::toString($requestValue);
                                $msg .= "by requirement test. Requirement: $requirementName, Requirement value: $requirementValue, HttpRequest value: " . $requestValue;
                                break;
                            case "2":
                                $msg .= "by uri test. Pattern: $pattern, Uri: " . $request->uriPath;
                                list($useTag, $regex) = $uriDetails;
                                if (true === $useTag) {
                                    $msg .= ", Regex: $regex";
                                }
                                break;
                            case "3":
                                list($tagName, $tagValue, $constraintValue) = $failureDetails;
                                $msg .= "by constraint test. Tag: $tagName, Tag value: $tagValue, Constraint value: " . $constraintValue;
                                break;
                        }
                        $this->debug($msg);
                    }
                }

            }
        }


        return $routerResult;
    }

    /**
     * @info Tests the given $requirements against the request.
     *
     * Return true if all requirements pass, and false otherwise.
     * In case of failure, the $failed array is fed and has the following structure:
     *
     * - 0: the failing requirement name
     * - 1: the requirement value (as specified in the route)
     * - 2: the appropriate request bit against which the requirement was matched
     *
     *
     *
     * @param array $requirements
     * @param HttpRequest $request
     * @param array|null $failed
     * @return array|bool
     */
    private function matchRequirements(array $requirements, HttpRequest $request, &$failed = null)
    {
        $failed = []; // type => value
        foreach ($requirements as $type => $value) {
            switch ($type) {
                case "method":
                    if ($request->method !== $value) {
                        $failed = [$type, $value, $request->method];
                    }
                    break;
                case "is_https":
                    if ($request->isHttps !== (bool)$value) {
                        $failed = [$type, $value, $request->isHttps];
                    }
                    break;
                case "port":
                    if ((int)$request->port !== (int)$value) {
                        $failed = [$type, $value, $request->port];
                    }
                    break;
                case "time":
                    $time = (int)$request->time;
                    list($minTime, $maxTime) = $value;
                    $minTime = strtotime($minTime);
                    $maxTime = strtotime($maxTime);

                    if ($time < $minTime || $time > $maxTime) {
                        $failed = [$type, $value, $time];
                    }
                    break;
                case "host":
                    if ($request->host !== $value) {
                        $failed = [$type, $value, $request->host];
                    }
                    break;
                case "referer_domain":
                    if ($request->referer) {
                        $refererHost = parse_url($request->referer, \PHP_URL_HOST);
                    } else {
                        $refererHost = "";
                    }
                    $refArray = (is_array($value)) ? $value : [$value];
                    if (false === in_array($refererHost, $refArray, true)) {
                        $failed = [$type, $value, $refererHost];
                    }
                    break;
                case "referer_page":
                    if ($request->referer) {
                        $urlComponents = parse_url($request->referer);
                        $refererPage = $urlComponents['host'] . $urlComponents['path'];
                    } else {
                        $refererPage = "";
                    }
                    $refArray = (is_array($value)) ? $value : [$value];
                    if (false === in_array($refererPage, $refArray, true)) {
                        $failed = [$type, $value, $refererPage];
                    }
                    break;
                case "allowed_ip":
                    $ips = (is_array($value)) ? $value : [$value];
                    if (false === in_array($request->ip, $ips, true)) {
                        $failed = [$type, $value, $request->ip];
                    }
                    break;
                case "forbidden_ip":
                    $ips = (is_array($value)) ? $value : [$value];
                    if (true === in_array($request->ip, $ips, true)) {
                        $failed = [$type, $value, $request->ip];
                    }
                    break;
                case "get":
                case "post":
                case "cookie":
                case "files":
                    $super = ("get" === $type) ? $request->get : (('post' === $type) ? $_POST : (('cookies' === $type) ? $request->cookie : $request->files));


                    //--------------------------------------------
                    // has part
                    //--------------------------------------------
                    if (array_key_exists('has', $value)) {
                        $has = (is_array($value['has'])) ? $value['has'] : [$value['has']];
                        foreach ($has as $hasLine) {
                            $lineMatch = true;
                            if (is_array($hasLine)) {
                                $lineMatch = false;
                                foreach ($hasLine as $hasAlt) {
                                    if (array_key_exists($hasAlt, $super)) {
                                        $lineMatch = true;
                                        break;
                                    }
                                }
                            } elseif (false === array_key_exists($hasLine, $super)) {
                                $lineMatch = false;
                            }
                            if (false === $lineMatch) {
                                $failed = [$type, $value, $super];
                                break;
                            }
                        }
                    }


                    //--------------------------------------------
                    // value part
                    //--------------------------------------------
                    if ("files" !== $type) {

                        if (array_key_exists("value", $value)) {
                            $values = $value['value'];
                            $valid = true;
                            foreach ($values as $k => $v) {
                                if (
                                    false === array_key_exists($k, $super) ||
                                    (string)$v !== (string)$super[$k]
                                ) {
                                    $valid = false;
                                    break;
                                }
                            }

                            if (false === $valid) {
                                $failed = [$type, $value, $super];
                                break;
                            }
                        }
                    } else {
                        //--------------------------------------------
                        // file type
                        //--------------------------------------------
                        if (array_key_exists('type', $value)) {

                            $isValid = true;
                            foreach ($value["type"] as $fileKey => $allowedTypes) {
                                if (array_key_exists($fileKey, $request->files)) {
                                    $fileType = $request->files[$fileKey]["type"];
                                    if (false === is_array($allowedTypes)) {
                                        $allowedTypes = [$allowedTypes];
                                    }
                                    if (false === in_array($fileType, $allowedTypes, true)) {
                                        $isValid = false;
                                        break;
                                    }
                                } else {
                                    $isValid = false;
                                    break;
                                }
                            }
                            if (false === $isValid) {
                                $failed = [$type, $value, $request->files];
                            }
                        }
                        //--------------------------------------------
                        // file size
                        //--------------------------------------------
                        if (array_key_exists('size', $value)) {

                            $isValid = true;
                            foreach ($value["size"] as $fileKey => $sizeBoundaries) {
                                if (array_key_exists($fileKey, $request->files)) {
                                    $fileSize = $request->files[$fileKey]["size"];
                                    if ($fileSize < $sizeBoundaries[0] || $fileSize > $sizeBoundaries[1]) {
                                        $isValid = false;
                                        break;
                                    }
                                } else {
                                    $isValid = false;
                                    break;
                                }
                            }
                            if (false === $isValid) {
                                $failed = [$type, $value, $request->files];
                            }
                        }
                    }


                    break;
                default:
                    break;
            }

            if ($failed) { // we just want the first failing requirement 
                break;
            }
        }
        if ($failed) {
            return false;
        }
        return true;
    }

    /**
     * @info Returns whether the $pattern matches against the given $uriPath.
     * If the test is successful, the $tagVars array is fed with the captured variables (key => value).
     *
     * The $details array is fed like this:
     * - 0: bool, whether the pattern uses tags (true) or not (false)
     * - 1: null|string, the php regex corresponding to the pattern (only if the pattern uses tags)
     *
     *
     * @param $uriPath
     * @param $pattern
     * @param array|null $tagVars
     * @param array|null $details
     * @return bool
     */
    public function matchUriPath($uriPath, $pattern, &$tagVars = null, &$details = null)
    {
        $tagVars = [];

        // no tags?
        if (false === strpos($pattern, "{")) {
            $details = [
                false,
                null,
            ];
            if ($uriPath !== $pattern) {
                return false;
            }
            return true;
        }

        // tags?
        list($regex, $tagNames) = self::getRegexInfo($pattern);
        $details = [
            true,
            $regex,
        ];


        if (preg_match($regex, $uriPath, $matches)) {
            $tagVars = array_intersect_key($matches, array_flip($tagNames));
            return true;
        }
        return false;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @info Analyzes the given $pattern and returns the corresponding regex info array, which has the following structure:
     *
     * - 0: php regex
     * - 1: array of tag names
     *
     *
     * See more details about the tag notation and features in this class description.
     *
     *
     * @param $pattern
     * @return array
     */
    private static function getRegexInfo($pattern)
    {


        $pattern = self::escapeNonTagSpecialChars($pattern);


        $tagNames = [];
        // converting the pattern to a php regex
        $regex = preg_replace_callback('!{
(\?(?<starter>.*?)\.\.)?
(?<tagName>[_[:alnum:]]+)
(\!(?<stopper>.*?)\.\.)?
}!x', function ($v) use (&$tagNames) {

            $starter = $v['starter']; // optionally starts with...
            $stopper = $v['stopper'] ?? ""; // stop when encountering...

            // aliases
            if (!empty($starter)) {
                $starter = str_replace([
                    '_ob',
                    '_cb',
                ], [
                    '\{',
                    '\}',
                ], $starter);
            }
            if (!empty($stopper)) {
                $stopper = str_replace([
                    '_ob',
                    '_cb',
                ], [
                    '\{',
                    '\}',
                ], $stopper);
            }


            $tagName = $v['tagName'];
            $tagNames[] = $tagName;
            $regex = "";
            if (empty($stopper) && empty($starter)) {
                $regex = '(?<' . $tagName . '>.*)';
            } elseif (empty($stopper) && !empty($starter)) {
                // note: ! is escaped because it is assumed that the final regex will be using ! as a delimiter.
                $regex = '(?:[' . addcslashes($starter, ']^!') . ']?)(?<' . $tagName . '>.*)';
            } elseif (empty($starter) && !empty($stopper)) {
                // note: ! is escaped because it is assumed that the final regex will be using ! as a delimiter.
                $regex = '(?<' . $tagName . '>[^' . addcslashes($stopper, ']!') . ']*)';
            } elseif (!empty($starter) && !empty($stopper)) {
                // note: ! is escaped because it is assumed that the final regex will be using ! as a delimiter.
                $regex = '(?:[' . addcslashes($starter, ']^!') . ']?)(?<' . $tagName . '>[^' . addcslashes($stopper, ']!') . ']*)';
            }
            return $regex;

        }, $pattern);

        if (0 === count($tagNames)) { // no tags used
            $regex = '^' . addcslashes($pattern, '!') . '$'; // the pattern must match exactly
        }
        return ['!' . $regex . '!', $tagNames];
    }

    /**
     * @info Escapes the special chars that are not part of a tag (i.e. outside the tags), and return the
     * resulting string.
     *
     * The escaped chars are the regex sensitive chars ((http://php.net/manual/en/regexp.reference.meta.php)), except for the curly braces.
     *
     * Note: the user is responsible for escaping the curly braces manually.
     * See class description for more info.
     *
     *
     *
     * @param $pattern
     * @return string
     */
    private static function escapeNonTagSpecialChars($pattern)
    {

        // Escape all meta-chars (http://php.net/manual/en/regexp.reference.meta.php)
        // that are not inside the tags and that are not the brackets of the tags (meta-chars below checked on 2019-01-19):
        // \ ^ $ . [ ] | ( ) ? * + { }
        // Note: the user is responsible for escaping curly braces that are not part of a tag (so we don't need to escape them).
        // philosophical note: this will cost in terms of perf, but the alternative was to let the user do it herself, so,
        // choosing the lesser of two evils..., we will bother the user as few as possible...

        $chars = str_split($pattern);
        $prevChar = null;
        $escapeChars = [
            '\\',
            '^',
            '$',
            '.',
            '[',
            ']',
            '|',
            '(',
            ')',
            '?',
            '*',
            '+',
        ];

        // algo:
        // skip \ if followed by { or }
        // skip tags
        // all other special: escape


        $newChars = [];
        $insideTag = false;
        foreach ($chars as $k => $c) {

            if (true === $insideTag) {
                if ('}' === $c) {
                    $insideTag = false;
                }
                goto end;
            }

            if ('\\' === $c && array_key_exists($k + 1, $chars) && (
                    '{' === $chars[$k + 1] || '}' === $chars[$k + 1]
                )) {
                goto end;
            }


            if ('{' === $c) { // starting a tag
                $insideTag = true;
                goto end;
            }


            if (in_array($c, $escapeChars, true)) {
                $newChars[] = '\\';
            }

            end:
            $newChars[] = $c;
        }
        return implode("", $newChars);
    }
    //--------------------------------------------
    //
    //--------------------------------------------

    /**
     * @info Returns whether all $constraints match the given $tagVars.
     * Note: a constraint doesn't fail if the tag var is not defined.
     *
     * In case of failure, stop at the first failure and feeds the failure details.
     *
     *
     *
     * @param array $constraints
     * @param array $tagVars
     * @param null|array $failureDetails :
     *      - 0: the tag name
     *      - 1: the tag value
     *      - 2: the route constraint value
     * @return bool
     */
    private function matchConstraints(array $constraints, array $tagVars, &$failureDetails = null)
    {
        $isValid = true;
        foreach ($constraints as $tagName => $constraint) {
            if (array_key_exists($tagName, $tagVars)) {
                $value = $tagVars[$tagName];
                $regex = '/' . $constraint . '/'; // assuming the user will never use / in her pattern
                if (!preg_match($regex, $value)) {
                    $failureDetails = [$tagName, $value, $constraint];
                    $isValid = false;
                    break;
                }
            }
        }
        return $isValid;
    }

    /**
     * @info Sends a debug log message on the routine_debug channel
     * @param $msg
     * @param $methodName
     */
    private function debug($msg)
    {
        $this->logger->log('(Jin\Component\Routing\Router\RoutineRouter->match): ' . $msg, "routine_debug");
    }

    /**
     * @info Sets the debug mode for this instance.
     * @param $debug
     */
    public function setDebug($debug)
    {
        $this->debug = (bool)$debug;
    }
}