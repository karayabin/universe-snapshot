<?php

namespace RssUtil\RssWriter;

/*
 * LingTalfi 2015-10-23
 */

class AuthorRssFeedWriterUtil extends RssFeedWriterUtil
{
    public function __construct()
    {
        parent::__construct(); 
        $this->setCDataFields([
            'title',
            'description',
            'img-title',
            'img-description',
            'item-title',
            'item-description',
        ]);
    }


}
