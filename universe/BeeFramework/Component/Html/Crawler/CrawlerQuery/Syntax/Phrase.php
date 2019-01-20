<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Html\Crawler\CrawlerQuery\Syntax;


/**
 * Phrase
 * @author Lingtalfi
 * 2015-06-24
 *
 */
class Phrase
{

    private $elements;

    public function __construct()
    {
        $this->elements = [];
    }

    public static function create()
    {
        return new static();
    }

    public function addElementSelector(ElementSelector $s)
    {
        $this->elements[] = $s;
        return $this;
    }

    /**
     * @return ElementSelector[]
     */
    public function getElementSelectors()
    {
        return $this->elements;
    }


}
