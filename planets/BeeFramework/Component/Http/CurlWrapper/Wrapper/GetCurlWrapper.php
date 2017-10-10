<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Http\CurlWrapper\Wrapper;

use BeeFramework\Component\Http\CurlWrapper\Exception\CurlWrapperException;
use BeeFramework\Component\Http\CurlWrapper\Response\HttpResponseInterface;


/**
 * GetCurlWrapper
 * @author Lingtalfi
 * 2015-06-10
 *
 */
class GetCurlWrapper extends BaseCurlWrapper
{

    /**
     * @var string, the uri in utf8 (not url encoded),
     *          without the query string (query string will be stripped if any)
     */
    private $uri;

    /**
     * @var array of key => value to pass as url parameters
     */
    private $params;

    public function __construct()
    {
        $this->params = [];
    }

    public function setParams(array $params)
    {
        $this->params = $params;
        return $this;
    }

    public function setUri($uri)
    {
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        $this->uri = $uri;
        return $this;
    }


    /**
     * @return HttpResponseInterface
     */
    public function send()
    {
        if (null === $this->uri) {
            throw new CurlWrapperException("Please set the uri first");
        }
        $ch = $this->getCurlConnexion();

        $uri = $this->uri;
        if ($this->params) {
            $uri .= '?' . http_build_query($this->params);
        }

        $ch->setOption(CURLOPT_URL, $uri);        
        return $this->getHttpResponse();

    }

}
