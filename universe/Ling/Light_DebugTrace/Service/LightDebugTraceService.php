<?php


namespace Ling\Light_DebugTrace\Service;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\ArrayTool;
use Ling\Bat\FileSystemTool;
use Ling\Bat\FileTool;
use Ling\Light\Events\LightEvent;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_CsrfSession\Service\LightCsrfSessionService;
use Ling\Light_CsrfSimple\Service\LightCsrfSimpleService;
use Ling\Light_Events\Service\LightEventsService;

/**
 * The LightDebugTraceService class.
 */
class LightDebugTraceService
{

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;

    /**
     * This property holds the targetFile for this instance.
     * @var string
     */
    protected $targetFile;


    /**
     * This property holds the targetDir for this instance.
     * @var string
     */
    protected $targetDir;

    /**
     * This property holds the targetDirCurrentFileName for this instance.
     * @var string
     */
    protected $targetDirCurrentFileName;


    /**
     * This property holds the httpRequestFilters for this instance.
     * @var array
     */
    protected $httpRequestFilters;


    /**
     * This property holds the _isAcceptedRequest for this instance.
     * Assuming that if we accept the request, it's for the whole process.
     * Null means the flag has not been set yet.
     *
     * @var bool
     */
    private $_isAcceptedRequest;


    /**
     * Builds the LightKitAdminDebugTraceService instance.
     */
    public function __construct()
    {
        $this->container = null;
        $this->targetFile = null;
        $this->targetDir = null;
        $this->targetDirCurrentFileName = null;
        $this->httpRequestFilters = [];
        $this->_isAcceptedRequest = true;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Listener for the @page(Light.initialize_1 event).
     * It will write information about the http request and the csrf token into the debug trace file.
     *
     *
     * @param LightEvent $event
     * @return void
     * @throws \Exception
     */
    public function initialize(LightEvent $event)
    {

        $httpRequest = $event->getHttpRequest();

        $this->testRequest($httpRequest);

        if (true === $this->isAcceptedRequest()) {


            $this->resetFile($httpRequest);
            $info = [
                "datetime" => date("Y-m-d H:i:s"),
                "http_request" => [
                    'url' => $httpRequest->getUri(),
                    '$_GET' => $httpRequest->getGet(),
                    '$_POST' => $httpRequest->getPost(),
                    '$_FILES' => $httpRequest->getFiles(),
                    '$_COOKIE' => $httpRequest->getCookie(),
                ],
            ];

            if ($this->container->has('csrf_session')) {
                /**
                 * @var $csrfService LightCsrfSessionService
                 */
                $csrfService = $this->container->get("csrf_session");
                $info["csrf_token"] = $csrfService->getToken();

            } elseif ($this->container->has('csrf_simple')) {
                /**
                 * @var $csrfSimple LightCsrfSimpleService
                 */
                $csrfSimple = $this->container->get("csrf_simple");
                $info["csrf_token"] = [
                    'old' => $csrfSimple->getOldToken(),
                    'new' => $csrfSimple->getToken(),
                ];
            }

            $this->appendSection($info);
        }

    }


    /**
     * Callable for the Light.on_route_found event provided by @page(the Light framework).
     *
     * @param LightEvent $event
     * @param string $eventName
     * @throws \Exception
     */
    public function onRouteFound(LightEvent $event, string $eventName)
    {
        if (true === $this->isAcceptedRequest()) {
            $route = $event->getVar("route");
            $this->appendSection(["route" => $route]);
        }

    }


    /**
     * Callable for the Light_CsrfSimple.on_csrf_token_regenerated event provided by @page(the Light_CsrfSimple plugin).
     *
     * @param LightEvent $event
     * @param string $eventName
     * @throws \Exception
     */
    public function onCsrfTokenRegenerated(LightEvent $event, string $eventName)
    {
        if (true === $this->isAcceptedRequest()) {
            $token = $event->getVar("token");
            $this->appendSection(["csrf_token_regenerated" => $token]);
        }

    }


    /**
     * Callable for @page(the Light.end_routine event).
     * @param LightEvent $event
     * @throws \Exception
     */
    public function onEndRoutine(LightEvent $event)
    {
        if (true === $this->isAcceptedRequest()) {

            $session = $_SESSION;
            array_walk_recursive($session, function (&$v) {
                if (is_object($v)) {
                    $v = ArrayTool::objectToArray($v);
                }
                return $v;
            });


            /**
             * @var $events LightEventsService
             */
            $events = $this->container->get("events");
            $this->appendSection([
                "events" => $events->getDispatchedEvents(),
                "session" => $session,
            ]);
        }

    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * Sets the targetFile.
     *
     * @param string $targetFile
     */
    public function setTargetFile(string $targetFile)
    {
        $this->targetFile = $targetFile;
    }

    /**
     * Sets the targetDir.
     *
     * @param string $targetDir
     */
    public function setTargetDir(string $targetDir)
    {
        $this->targetDir = $targetDir;
    }


    /**
     * Sets the httpRequestFilters.
     *
     * @param array $httpRequestFilters
     */
    public function setHttpRequestFilters(array $httpRequestFilters)
    {
        $this->httpRequestFilters = $httpRequestFilters;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Appends a section to the target file, if the target file is defined.
     *
     * And/or appends a section to a file (which named is based on the http request uri) in the target dir,
     * if the target dir is defined.
     *
     *
     * The section is an array of key/value pairs.
     *
     * @param array $section
     */
    protected function appendSection(array $section)
    {

        $s = BabyYamlUtil::getBabyYamlString($section);

        if (null !== $this->targetFile) {
            FileTool::append($s . PHP_EOL . PHP_EOL, $this->targetFile);
        }

        if (null !== $this->targetDir) {
            $f = $this->targetDir . "/" . $this->targetDirCurrentFileName;
            FileTool::append($s . PHP_EOL . PHP_EOL, $f);
        }


    }


    /**
     * Empty the target file (if set) and/or the target dir (if target dir is set).
     * Also prepares the name of the file to put in the target dir (if target dir is set).
     *
     * @param HttpRequestInterface $request
     */
    protected function resetFile(HttpRequestInterface $request)
    {
        if (null !== $this->targetFile) {
            FileSystemTool::mkfile($this->targetFile, "");
        }

        if (null !== $this->targetDir) {


            $this->targetDirCurrentFileName =
                str_replace([
                    '/',
                ], [
                    '_slash_',
                ], $request->getUri())
                . ".txt";

            if (strlen($this->targetDirCurrentFileName) > 255) {
                $this->targetDirCurrentFileName = substr($this->targetDirCurrentFileName, 0, 255);
            }
        }
    }


    /**
     * Returns whether the http request is valid, based on the http request filters
     * defined for this instance.
     *
     * @param HttpRequestInterface $httpRequest
     * @return bool
     */
    protected function testRequest(HttpRequestInterface $httpRequest): bool
    {
        $this->_isAcceptedRequest = true;
        $uri = $httpRequest->getUri();


        $urlIgnoreIfStartWith = $this->httpRequestFilters['urlIgnoreIfStartWith'] ?? [];
        if (false === is_array($urlIgnoreIfStartWith)) {
            $urlIgnoreIfStartWith = [$urlIgnoreIfStartWith];
        }
        foreach ($urlIgnoreIfStartWith as $prefix) {
            if (0 === strpos($uri, $prefix)) {
                $this->_isAcceptedRequest = false;
            }
        }
        return $this->_isAcceptedRequest;
    }

    /**
     * Returns whether the current http request has been accepted.
     * @return bool
     */
    protected function isAcceptedRequest(): bool
    {
        return $this->_isAcceptedRequest;
    }

}