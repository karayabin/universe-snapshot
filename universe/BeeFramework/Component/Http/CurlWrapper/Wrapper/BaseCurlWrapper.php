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

use BeeFramework\Component\Http\CurlWrapper\Connexion\CurlConnexionInterface;
use BeeFramework\Component\Http\CurlWrapper\Exception\CurlWrapperException;
use BeeFramework\Component\Http\CurlWrapper\Response\HttpResponse;


/**
 * BaseCurlWrapper
 * @author Lingtalfi
 * 2015-06-10
 *
 */
class BaseCurlWrapper implements CurlWrapperInterface
{

    /**
     * @var CurlConnexionInterface
     */
    private $connexion;

    public static function create()
    {
        return new static();
    }
    //------------------------------------------------------------------------------/
    // IMPLEMENTS CurlWrapperInterface
    //------------------------------------------------------------------------------/
    /**
     * @return $this
     */
    public function setCurlConnexion(CurlConnexionInterface $c)
    {
        $this->connexion = $c;
        return $this;
    }

    /**
     * @return CurlConnexionInterface
     */
    public function getCurlConnexion()
    {
        if (null === $this->connexion) {
            throw new CurlWrapperException("connexion not set");
        }
        return $this->connexion;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function getHttpResponse()
    {
        $conn = $this->getCurlConnexion();
        $conn->setOption(CURLOPT_HEADER, true);
        $conn->setOption(CURLOPT_RETURNTRANSFER, true);
        $ch = $conn->getCurlHandle();
        if (false !== $data = curl_exec($ch)) {
            curl_close($ch);
        }
        else {
            throw new CurlWrapperException(curl_error($ch));
        }
        return HttpResponse::create()->setRaw($data);
    }
}
