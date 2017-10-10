<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Http\HttpClient\Connexion;

use BeeFramework\Component\Http\HttpClient\CookieJar\CookieJarInterface;
use BeeFramework\Component\Http\HttpClient\Exception\HttpClientException;
use BeeFramework\Component\Http\HttpClient\Request\HttpRequestInterface;
use BeeFramework\Component\Http\HttpClient\Tool\RequestTool;


/**
 * StreamConnexion
 * @author Lingtalfi
 * 2015-06-17
 *
 * This connexion can handle ssl.
 * You
 *
 */
class StreamConnexion implements ConnexionInterface
{

    private $sslOptions;

    /**
     * A notification callback, as defined here:
     * http://php.net/manual/en/function.stream-notification-callback.php
     */
    private $notificationCallback;

    public function __construct()
    {
        $this->sslOptions = [];
    }


    public static function create()
    {
        return new static();
    }


    public function send(HttpRequestInterface $req, CookieJarInterface $jar = null)
    {
        $host = $req->headers()->get('Host');
        if (null === $host) {
            $this->error("Please define the httpRequest host");
        }


        $target = $req->getRequestTarget();
        $scheme = $req->getScheme();
        $port = $req->getPort();
        $uri = $scheme . '://' . $host;


        if (
            ('http' === $scheme && 80 !== $port) ||
            ('https' === $scheme && 443 !== $port)
        ) {
            $uri .= ':' . $port;
        }
        $uri .= $target;


        $reqInfo = RequestTool::getRequestInfo($req, $jar);
        $context_options = array(
            'http' => array(
                'method' => $req->getMethod(),
                'header' => $reqInfo[1],
                'content' => $reqInfo[2],
            ),
        );

        if ($this->sslOptions) {
            $context_options['ssl'] = $this->sslOptions;
        }
        $params = [];
        if (null !== $this->notificationCallback) {
            $params['notification'] = $this->notificationCallback;
        }


        $context = stream_context_create($context_options, $params);
        $responseBody = file_get_contents($uri, false, $context);
        $eol = "\r\n";
        return implode("\r\n", $http_response_header) . $eol . $eol . $responseBody;
    }


    public function setSslOptions(array $options)
    {
        $this->sslOptions = $options;
        return $this;
    }

    public function setNotificationCallback(callable $notificationCallback)
    {
        $this->notificationCallback = $notificationCallback;
        return $this;
    }




    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function error($m)
    {
        throw new HttpClientException($m);
    }


}
