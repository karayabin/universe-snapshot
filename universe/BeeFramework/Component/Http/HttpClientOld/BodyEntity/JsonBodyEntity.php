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
 * JsonBodyEntity
 * @author Lingtalfi
 * 2015-06-12
 *
 */
class JsonBodyEntity extends BodyEntity
{

    public function setJsonContent($mixed, $convertToJson = true)
    {
        if (true === $convertToJson) {
            $mixed = json_encode($mixed);
        }
        $this->setContent($mixed);
        $this->setContentType('application/json');
        return $this;
    }
}
