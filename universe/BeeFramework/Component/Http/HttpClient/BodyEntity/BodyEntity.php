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
 * BodyEntity
 * @author Lingtalfi
 * 2015-06-12
 *
 */
class BodyEntity implements BodyEntityInterface
{
    private $contentType;
    private $content;

    public function __construct()
    {
        $this->contentType = 'application/octet-stream';
        $this->content = '';
    }

    public static function create()
    {
        return new static();
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS BodyEntityInterface
    //------------------------------------------------------------------------------/
    public function getContentType()
    {
        return $this->contentType;
    }

    /**
     * @return static
     */
    public function setContentType($type)
    {
        $this->contentType = $type;
        return $this;
    }

    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return static
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }


}
