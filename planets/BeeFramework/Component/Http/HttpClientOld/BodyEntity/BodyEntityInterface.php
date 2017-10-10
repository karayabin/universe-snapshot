<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Http\HttpClient\BodyEntity;


/**
 * BodyEntityInterface
 * @author Lingtalfi
 * 2015-06-12
 *
 */
interface BodyEntityInterface
{

    public function getContentType();

    /**
     * @return static
     */
    public function setContentType($type);

    public function getContent();

    /**
     * @return static
     */
    public function setContent($content);


}
