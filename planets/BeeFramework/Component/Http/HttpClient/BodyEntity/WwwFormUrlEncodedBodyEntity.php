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
 * WwwFormUrlEncodedBodyEntity
 * @author Lingtalfi
 * 2015-06-12
 *
 */
class WwwFormUrlEncodedBodyEntity extends BodyEntity
{

    public function setParams(array $params)
    {
        $this->setContent(http_build_query($params));
        $this->setContentType('application/x-www-form-urlencoded');
        return $this;
    }
}
