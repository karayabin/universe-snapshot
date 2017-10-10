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
 * FsockConnexion
 * @author Lingtalfi
 * 2015-06-17
 *
 * Note: this connexion will not work with ssl,
 *          if you need ssl, please use the Connexion object.
 *
 */
class FsockConnexion implements ConnexionInterface
{

    

    public function send(HttpRequestInterface $req, CookieJarInterface $jar=null)
    {
        $host = $req->headers()->get('Host');
        if (null === $host) {
            $this->error("Please define the httpRequest host");
        }

        $port = $req->getPort();
        if ('https' === $req->getScheme()) {
            $host = 'ssl://' . $host;
        }
        $timeOut = 30; // this is the socket connexion timeout only
        if (false === $fp = fsockopen($host, $port, $errNo, $errMsg, $timeOut)) {
            $this->error("$errMsg ($errNo)");
        }
        $reqInfo = RequestTool::getRequestInfo($req, $jar);
        $r = RequestTool::getRawRequestByRequestInfo($reqInfo);
        fwrite($fp, $r);
        $s = '';
        while (!feof($fp)) {
            $s .= fgets($fp);
        }
        fclose($fp);
        return $s;
    }

    private function error($m)
    {
        throw new HttpClientException($m);
    }

    
    
}
