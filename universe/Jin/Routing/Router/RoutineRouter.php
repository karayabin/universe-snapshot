<?php


namespace Jin\Routing\Router;


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
 *     vars: array, variables shared by all routes.
 *     routes:
 *         $route_id:
 *             pattern: string, the route pattern. The route pattern is tested against the http request uri path to see if the route matches or not.
 *                       See more details in the "Pattern matching" section.
 *             ?page: string, the page to include if the route matches.
 *                      This property is ignored if the controller property is used (see controller property below).
 *                      A page is simply a file that displays html code. It can be an html file, or a php file.
 *                      The page property is a path relative to the application's "pages" directory.
 *
 *             ?controller: string, the controller to call if the route matches.
 *                      A controller in general is a callable.
 *                      This controller property defines which controller to call using the following notation:
 *                          BLABLA
 *             ?requirements: array, additional requirements of this route. See the "Requirements" section for more details.
 *             ?constraints: array, additional tag constraints for this route. See the "Constraints" section for more details.
 *             ?vars: array, additional variables to attach to the route. Those variables will be passed to the
 *                          target (the page or controller) if the route matches.
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
 * Sometimes, you will want more flexibility.
 * For instance, imagine that you are creating a blog app, and your urls look like this:
 *
 * - uriPath: /articles/58-the-cat-and-the-dog.html
 *
 * Where 58 is the id of the article.
 *
 * The RoutineRouter provides us with a tag system that allows us to create a
 * variable articleId (for instance) with a value of 58.
 *
 * Here is the pattern that would match the uriPath above and create articleId=58:
 *
 * - pattern: /articles/{articleId}-the-cat-and-the-dog.html
 *
 * As you can guess from the above example, a tag is wrapped by surrounding curly braces.
 *
 * Therefore, rule#1:
 * - you must escape curly braces that are not part of a tag (otherwise the router wouldn't be able to
 *      differentiate which is which). To escape a curly brace, put a backslash (\) in front of it.
 *
 *
 * Back to our example.
 * That's nice already, but there are a couple of problems that we need to address:
 *
 * - the {articleId} tag would match not only numbers, but also any string.
 *          We can fix that with the constraints system explained later in this document.
 * - the other problem that we have is that with this tag, we have to know the exact url by advance.
 *
 * So for instance if we go to the next article, our pattern doesn't work anymore:
 *
 * - uriPath: /articles/59-do-you-REALLY-like-sushis.html
 * - pattern: /articles/{articleId}-the-cat-and-the-dog.html
 *
 * As you can see, this pattern and this uriPath will NOT match at all.
 * It would be nice though if we could write a generic pattern that would match all articles.
 *
 * Fortunately, we can.
 * But in order to do so we have to learn the apricot syntax first.
 *
 *
 * ### The apricot syntax
 *
 * The apricot syntax is a notation used inside a tag, which allows more flexibility.
 *
 * First, let me show you the power of the apricot syntax by resolving the problem in the previous example.
 * Here is the generic pattern (using the apricot syntax) that would match any articles of our example above:
 *
 * - pattern: /articles/{!-..articleId}
 *
 * The pattern above will match both uri paths:
 *
 * - uriPath: /articles/58-the-cat-and-the-dog.html
 * - uriPath: /articles/59-do-you-REALLY-like-sushis.html
 *
 * Nice isn't it?
 *
 * Now let me explain how this works.
 *
 * A simple tag looks like this: {tag}.
 * By default, such a tag matches all the characters, starting from the tag position, and until the end of the uri path.
 *
 * So, for instance the following uriPath matches with any of the pattern below:
 *
 * - uriPath: /articles/58-the-cat-and-the-dog.html
 * - pattern: {all}                                 // with all = /articles/58-the-cat-and-the-dog.html
 * - pattern: /{all}                                // with all = articles/58-the-cat-and-the-dog.html
 * - pattern: /a{all}                               // with all = rticles/58-the-cat-and-the-dog.html
 * - pattern: /ar{all}                              // with all = ticles/58-the-cat-and-the-dog.html
 * - ...
 *
 *
 * But a tag can be as complex as this: {?.-_ob..!/!..var1:6}
 * (Don't worry, I made an especially complex tag just to show you the maximum complexity you'll have to deal with, but
 * at the end of this lecture, you'll see how actually easy it is to read that).
 *
 *
 * First of all, here is the anatomy of a tag:
 *
 * - the opening curly bracket
 * - the "beginning zone" of the tag, which is a place reserved for apricot syntax (!-.. in our first example above)
 * - the tag name: articleId in our example above. The tag name has the same restrictions as a php variable name,
 *          except that it isn't preceded by the $ symbol.
 *          So: the first char must not be a digit, and all chars are either the underscore or a letter or a digit.
 *          Nothing else.
 * - the "end zone" of the tag, which is another place reserved for apricot syntax (not used in our example above)
 * - the closing curly bracket
 *
 * So the two parts that we need to learn about now are the zones: the beginning zone and the end zone.
 * Each zone accepts a well-defined number of features:
 *
 * - the beginning zone accept the following features (in this order):
 *      - "optionally starting with" feature
 *      - "stop when encountering" feature
 *
 * - the end zone accept only one feature:
 *      - "limit to x chars" feature, which is not implemented at the time being (due to its lack of practicality)
 *
 *
 * #### optionally starting with
 *
 * This feature allows us to say: this tag also matches if it's preceded by this char (or this set of chars).
 * For instance, imagine that you want one pattern that could match the two following uriPaths:
 *
 * - uriPath: /blog
 * - uriPath: /blog/58
 *
 * Using the "optionally starting with" feature, you can do it, like this:
 *
 * - pattern: /blog{?/..articleId}        // articleId=null for the first uriPath, and 58 for the second
 *
 * The syntax of this feature is the following:
 *
 * - ?                          a question mark to enter the "optionally starting with" feature.
 * - one or many chars          a set of chars that will match if it's at the beginning of the pattern.
 *                              Note: if you use letters, this system is a case sensitive.
 *                              You can use any chars you want except { and }, which are the tag delimiter.
 *                              If you really need to indicate that the pattern should match an optional curly bracket
 *                              at the beginning, use the _ob (for opening bracket) and _cb (closing bracket) aliases.
 *
 * - ..                         the two consecutive dots to indicate the end of the feature.
 *
 * So now you know about this first feature, and if you're not sure, read the question mark as "optionally starting with"
 * and it should go smoothly.
 *
 * So can you understand the following pattern now:
 *
 * - pattern: /articles{?/..articleId}
 *
 * The tag {?/..articleId} translated to plain english simply means: optionally starting with / (and the name of the tag is articleId).
 * It's important that you mentally translate those tags to plain english, otherwise you'll just see a bunch of cryptic characters.
 *
 *
 * #### stop when encountering
 *
 * If you understood the first feature (optionally starting with), you'll have no problem with this one.
 * This is exactly the same principle, except that it reads: "stop when encountering" (or perhaps even simpler: "not including"), and as you can guess this pattern stops
 * when it encounters the specified set of chars, and the symbol to start this feature is the exclamation mark !.
 *
 * So, the syntax of this feature is this:
 *
 * - !                          an exclamation mark to enter the "stop when encountering" feature.
 * - one or many chars          a set of chars that will stop the capture when encountered.
 *                              Note: if you use letters, this system is a case sensitive.
 *                              You can use any chars you want except { and }, which are the tag delimiter.
 *                              If you really need to indicate that the pattern should stop when encountering a curly bracket
 *                              use the _ob (for opening bracket) and _cb (closing bracket) aliases.
 *
 * - ..                         the two consecutive dots to indicate the end of the feature.
 *
 * So by now you should be able to decipher this pattern:
 *
 * - pattern: /articles/{!-/..articleId}
 *
 * This pattern in plain english reads: stop when encountering dash or slash (and the tag name is articleId).
 *
 *
 * You can combine both features. Can you read the following pattern? (if you can, you're a pro at the apricot syntax)
 *
 * - pattern: /articles{?/..!-/..articleId}
 *
 *
 * This pattern reads: optionally starting with slash, and stop when encountering the dash or the slash char (and the tag name is articleId)
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
 * requirements_demo:
 *     pattern: /fake1
 *     page: main/home.php
 *     requirements:
 *         # This requirement is valid only if the method matches the one of the request
 *         method: GET
 *
 *         # The requirement is valid only if the request is https.
 *         # Note: if the value was false, this requirement would be only valid if the request was NOT https.
 *         is_https: true
 *
 *         # The requirement is valid only if the request port is 88
 *         port: 88
 *
 *         # This requirement is valid only if the time of the request is in between the boundaries value defined
 *         # The format used for dates is either Y-m-d H:i:s or Y-m-d
 *         time: [2019-01-19 00:00:00, 2020-01-19 00:00:00]
 *
 *         # This requirement is valid only the host matches the one of the request
 *         host: local.treasure
 *
 *         # This requirement is only valid if at least one of the specified referer domains matches the one of the request.
 *         # The referer domain can be declared either as a string or as a list
 *         #        referer_domain: my_friend.com
 *         referer_domain:
 *           - my_friend.com
 *           - my_friend2.com
 *
 *
 *         # This requirement is only valid when the referer page matches the one of the request.
 *         # The page does not include the question mark and the query string.
 *         # Again, the referer_page can be either a string or a list (like referer_domain)
 *         referer_page: my_friend.com/page2.php
 *         #        referer_page:
 *         #            - my_friend.com/page2.php
 *         #            - my_friend2.com/marshmallows.php
 *
 *
 *         # This requirement is only valid if the ip of the request matches one of the ip provided by the requirement.
 *         # This value can be either a string or a list
 *         allowed_ip: 88.45.12.34
 *         #        allowed_ip: [127.0.0.0, 88.45.12.34]
 *
 *
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
 *             # This section defines value that must exist and have the value specified. It's not available for the files super array.
 *             value:
 *               # This requirement is valid only if the request get has a variable named var1 which value is 5
 *               # AND a variable var2 with value "doo".
 *               var1: 5
 *               var2: doo
 *               # This sections below is not implemented yet, just ideas for possible future me
 *               #            value_regex:
 *               #                var1: \d
 *               # This sections below is not implemented yet, just ideas for possible future me
 *               #            value_optional:
 *               #                token: 78 # if token does not exist, the requirement is valid
 *               # This section below is not implemented, just ideas for possible future me
 *               # implementation of the dot notation (we don't want to add it directly to the "has" property,
 *               # as it could confuse the user, and this is a feature that will probably not be used a lot.
 *               #      hasDot: general.token
 *
 *
 *
 *              # files super array ONLY
 *              # --------------------------
 *              # The section below is only available with the file super array.
 *              # Type
 *              # It's an array of fileKey => acceptableTypes.
 *              # With:
 *              #     - fileKey: an actual key of the files super array provided by the request (The requirement will fail is such a key is not found in the files super array).
 *              #     - acceptableTypes: the list of accepted mime-types for the given fileKey. The requirement validates only if the mime-type of the file is in the list.
 *              #           Can be either a string or a list
 *             type:
 *                 the_file: application/pdf
 *                 #          the_file.jar.mac: application/pdf
 *                 # Remember that the type value is not reliable:
 *                 # http://php.net/manual/en/features.file-upload.post-method.php says:
 *                 # This mime type is however not checked on the PHP side and therefore don't take its value for granted.
 *                 # List of mime-types: http://svn.apache.org/repos/asf/httpd/httpd/trunk/docs/conf/mime.types
 *                 # Common mime types are:
 *                 # (text)
 *                 # - text/plain
 *                 # - text/html
 *
 *                 # (image)
 *                 # - image/gif
 *                 # - image/png
 *                 # - image/jpeg
 *                 # - image/bmp
 *
 *                 # (audio)
 *                 # - audio/wav
 *
 *                 # (video)
 *                 # - video/webm
 *                 # - video/ogg
 *                 # - video/mp4
 *
 *                 # (application)
 *                 # application/octet-stream
 *                 # application/pdf
 *                 # application/xml
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
 *
 * By reading the following example from a yml file, you should be able to understand how constraints work.
 *
 * ```yml
 *
 * ```
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
        $routes = Access::configurationFileParser()->parseFileWithDir($routesFile, $routesDir, false);

        /**
         * - null: no failure
         * - 1: requirements failure
         * - 2: uri match failure
         * - 3: constraint failure
         */
        $failureType = null;
        $routerResult = new RouterResult();


        foreach ($routes as $routeName => $route) {
            if (array_key_exists("requirements", $route)) {
                $failedRequirements = $this->matchRequirements($route['requirements'], $request);
                if (true !== $failedRequirements) {
                    $failureType = 1;
                }
            }

            // does the pattern match
            $pattern = $route["pattern"];
            $tagVars = $this->matchUriPath($request->uriPath, $pattern);
            if (false === $tagVars) {
                $failureType = 2;
            } else {
                az($route, "yo");
                if (array_key_exists("constraints", $route)) {
                    $route['constraints'];
                }
            }
        }


        return $routerResult;
    }

    /**
     * @info Match the given $requirements against the request.
     * Return true if all requirements pass, and a failure array otherwise.
     * The failure array structure is:
     *      requirementId => failureComponents
     * With:
     *      failureComponents being an array composed of two elements:
     *          - the requirement value (as specified by the user)
     *          - the appropriate request bit against which the requirement was matched
     *
     *
     *
     * @param array $requirements
     * @param HttpRequest $request
     * @return array|bool
     */
    private function matchRequirements(array $requirements, HttpRequest $request)
    {
        $failed = []; // type => value
        foreach ($requirements as $type => $value) {
            switch ($type) {
                case "method":
                    if ($request->method !== $value) {
                        $failed[$type] = [$value, $request->method];
                    }
                    break;
                case "is_https":
                    if ($request->isHttps !== (bool)$value) {
                        $failed[$type] = [$value, $request->isHttps];
                    }
                    break;
                case "port":
                    if ((int)$request->port !== (int)$value) {
                        $failed[$type] = [$value, $request->port];
                    }
                    break;
                case "time":
                    $time = (int)$request->time;
                    list($minTime, $maxTime) = $value;
                    $minTime = strtotime($minTime);
                    $maxTime = strtotime($maxTime);

                    if ($time < $minTime || $time > $maxTime) {
                        $failed[$type] = [$value, $time];
                    }
                    break;
                case "host":
                    if ($request->host !== $value) {
                        $failed[$type] = [$value, $request->host];
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
                        $failed[$type] = [$value, $refererHost];
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
                        $failed[$type] = [$value, $refererPage];
                    }
                    break;
                case "allowed_ip":
                    $ips = (is_array($value)) ? $value : [$value];
                    if (false === in_array($request->ip, $ips, true)) {
                        $failed[$type] = [$value, $request->ip];
                    }
                    break;
                case "forbidden_ip":
                    $ips = (is_array($value)) ? $value : [$value];
                    if (true === in_array($request->ip, $ips, true)) {
                        $failed[$type] = [$value, $request->ip];
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
                                $failed[$type] = [$value, $super];
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
                                $failed[$type] = [$value, $super];
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
                                $failed[$type] = [$value, $request->files];
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
                                $failed[$type] = [$value, $request->files];
                            }
                        }
                    }


                    break;
                default:
                    break;
            }
        }
        if ($failed) {
            return $failed;
        }
        return true;
    }

    //--------------------------------------------
    //
    //--------------------------------------------

    public function matchUriPath($uriPath, $pattern)
    {
        list($regex, $tagNames) = self::getRegexInfo($pattern);
        if (preg_match($regex, $uriPath, $matches)) {
            return array_intersect_key($matches, array_flip($tagNames));
        }
        return false;
    }

    public static function getRegexInfo($pattern)
    {


        $pattern = self::escapeNonTagSpecialChars($pattern);


        $tagNames = [];
        // converting the pattern to a php regex
        $regex = preg_replace_callback('!{
(\?(?<starter>.*?)\.\.)?
(\!(?<stopper>.*?)\.\.)?
(?<tagName>[_[:alnum:]]+)
}!x', function ($v) use (&$tagNames) {
            $starter = $v['starter']; // optionally starts with...
            $stopper = $v['stopper']; // stop when encoutering...

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
    //--------------------------------------------
    //
    //--------------------------------------------

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

    public function setDebug($debug)
    {
        $this->debug = (bool)$debug;
    }

    /**
     * @info Sends a debug log message on the routine_debug channel
     * @param $msg
     * @param $methodName
     */
    private function debug($msg, $methodName)
    {
        $this->logger->log('(Jin\Routing\Router\RoutineRouter->' . $methodName . '): ' . $msg, "routine_debug");
    }
}