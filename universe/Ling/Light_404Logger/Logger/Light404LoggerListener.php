<?php


namespace Ling\Light_404Logger\Logger;


use Ling\Bat\FileSystemTool;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light_Logger\Listener\LightFileLoggerListener;

/**
 * The Light404LoggerListener class.
 * See more details in the @page(Light_404Logger conception notes).
 *
 */
class Light404LoggerListener extends LightFileLoggerListener
{

    /**
     * This property holds the keepOnlyIf for this instance.
     * @var array
     */
    protected $keepOnlyIf;

    /**
     * This property holds the excludeIf for this instance.
     * @var array
     */
    protected $excludeIf;

    /**
     * This property holds the httpRequestFormat for this instance.
     * @var string = {uri}
     */
    protected $httpRequestFormat;


    /**
     * Builds the Light404LoggerListener instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->keepOnlyIf = [];
        $this->excludeIf = [];
        $this->httpRequestFormat = '{uri}';
    }


    /**
     * Configures this instance.
     *
     * The available options are:
     * - keepOnlyIf (array = [] )
     * - excludeIf (array = [] )
     * - httpRequestFormat (string = {uri})
     *
     * See the @page(Light_404Logger conception notes) for more details.
     *
     * - ...more options in the parent class, check it out (@page(LightFileLoggerListener))
     *
     *
     * @param array $options
     */
    public function configure(array $options)
    {
        parent::configure($options);
        if (array_key_exists("keepOnlyIf", $options)) {
            $this->keepOnlyIf = $options['keepOnlyIf'];
        }
        if (array_key_exists("excludeIf", $options)) {
            $this->excludeIf = $options['excludeIf'];
        }
        if (array_key_exists("httpRequestFormat", $options)) {
            $this->httpRequestFormat = $options['httpRequestFormat'];
        }
    }

    /**
     *
     * @implementation
     */
    public function listen($msg, string $channel)
    {
        if ($msg instanceof HttpRequestInterface) {
            $httpRequest = $msg;

            //--------------------------------------------
            // APPLY THE FILTERS
            //--------------------------------------------
            if (true === $this->executeFilters($httpRequest)) {
                $message = $this->formatHttpRequestMessage($httpRequest);
                parent::listen($message, $channel);
            }
        }
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Pass the given http request through the filters defined in the configuration, and returns
     * whether the given http request passes the filters or is discarded.
     *
     * @param HttpRequestInterface $request
     * @return bool
     */
    protected function executeFilters(HttpRequestInterface $request): bool
    {
        foreach ($this->keepOnlyIf as $k => $v) {
            switch ($k) {
                case "extension.inArray":
                    $uri = $request->getUriPath();
                    $extension = FileSystemTool::getFileExtension($uri);
                    if (false === in_array($extension, $v)) {
                        return false;
                    }
                    break;
                default:
                    break;
            }
        }


        foreach ($this->excludeIf as $k => $v) {
            switch ($k) {
                case "extension.inArray":
                    $uri = $request->getUriPath();
                    $extension = FileSystemTool::getFileExtension($uri);
                    if (true === in_array($extension, $v)) {
                        return false;
                    }
                    break;
                case "ip.inArray":
                    $ip = $request->getIp();
                    if (true === in_array($ip, $v, true)) {
                        return false;
                    }
                    break;
                case "uri.startsWith":
                    $uri = $request->getUriPath();
                    if (false === is_array($v)) {
                        $v = [$v];
                    }
                    foreach ($v as $prefix) {
                        if (0 === strpos($uri, $prefix)) {
                            return false;
                        }
                    }
                    break;
            }
        }
        return true;
    }

    /**
     * Formats the given http request according to the configuration.
     *
     * @param HttpRequestInterface $request
     * @return string
     */
    protected function formatHttpRequestMessage(HttpRequestInterface $request): string
    {

        $protocol = (true === $request->isHttpsRequest()) ? 'https' : 'http';

        return str_replace([
            '{uri}',
            '{uriPath}',
            '{host}',
            '{port}',
            '{protocol}',
            '{ip}',
            '{nr}',
        ], [
            $request->getUri(),
            $request->getUriPath(),
            $request->getHost(),
            $request->getPort(),
            $protocol,
            $request->getIp(),
            PHP_EOL,
        ], $this->httpRequestFormat);
    }

}