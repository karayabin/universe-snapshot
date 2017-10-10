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


/**
 * CurlWrapperInterface
 * @author Lingtalfi
 * 2015-06-10
 * 
 */
interface CurlWrapperInterface {

    /**
     * @return static
     */
    public function setCurlConnexion(CurlConnexionInterface $c);

    /**
     * @return CurlConnexionInterface
     */
    public function getCurlConnexion();
}
