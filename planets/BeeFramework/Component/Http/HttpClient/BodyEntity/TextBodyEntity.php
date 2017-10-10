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
 * TextBodyEntity
 * @author Lingtalfi
 * 2015-06-12
 *
 */
class TextBodyEntity extends BodyEntity
{

    public function setText($text)
    {
        // no particular encoding
        $this->setContent($text);
        $this->setContentType('application/octet-stream');
//        $this->setContentType(null);
        return $this;
    }
}
